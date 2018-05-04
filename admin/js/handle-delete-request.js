var getSelectedItems = function () {
    return $('#entryTable tr.selected');
};

var getIdsFromSelectedItems = function () {
    var id = [];
    getSelectedItems().each(function () {
        id.push($(this).find('td').attr('data-id'));
    });
    return id;
};

var actions = {
    delete: function () {
        return {
            mainBtn: $('#confirmDeletion'),
            modalId: $('#deleteModal'),
            modalConfirmBtn: $('#deleteConfirm')
        };
    },
    deletionSuccess: function () {
        return {
            modalId: $('#deletionSuccessModal'),
            modalCloseBtn: $('#deletionSuccessClose')
        }
    }
};

var appendResponse = function (response) {
    actions.deletionSuccess().modalId.modal('show');
    actions.deletionSuccess().modalId.find(".alert").empty();
    actions.deletionSuccess().modalId.find(".alert").prepend(response);
    actions.deletionSuccess().modalCloseBtn.click(function (e) {
        e.preventDefault();
        actions.deletionSuccess().modalId.modal('hide');
        setTimeout(location.reload.bind(location), 500);
    })
};

var deleteItems = function () {
  actions.delete().mainBtn.click(function() {
      if (getSelectedItems().length === 0) {
          alert('nothing selected');
          return false;
      }
      actions.delete().modalId.modal("show");
      actions.delete().modalConfirmBtn.click(function (e) {
         e.preventDefault();
         deleteRequestUsingAjax(getIdsFromSelectedItems());
      });
  });
};

var deleteRequestUsingAjax = function (selectedItems) {
    $.ajax({
        url: 'app/manage_deletion.php',
        type: 'post',
        data: {items: selectedItems, deletion: true}
    }).done(function (response) {
        actions.delete().modalId.modal('hide');
        appendResponse(response);
    });
};

$(document).ready(function () {
    $('#entryTable').DataTable({
        responsive: true,
        select: {
            style: 'multi'
        },
        'pageLength': 6
    });

    deleteItems();
});
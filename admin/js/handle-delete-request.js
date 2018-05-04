var getTblContainer = function () {
    return $('#tableContainer');
};

var getSelectedItems = function () {
    return $('#entryTable tr.selected');
};

// store the ids of the selected items
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
            modalConfirmBtn: $('#deleteTrue')
        };
    }
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
         console.log(getIdsFromSelectedItems());
         //deleteRequestUsingAjax(getIdsFromSelectedItems());
      });
  });
};


var deleteRequestUsingAjax = function (selectedItems) {
    $.ajax({
        url: 'index.php',
        type: 'post',
        data: {items: selectedItems, deletion: true}
    }).done(function (response) {
        actions.delete().modalId.modal('hide');
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
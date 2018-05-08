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
var redirectToIndexPage = function () {
    var locHref = location.href;
    var homePageLink = locHref.substring(0, locHref.lastIndexOf('/')) + '/index.php';
    window.location.replace(homePageLink);
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
    },
    login: function () {
        return {
            formId: $('#loginForm'),
            email: $('input[name="loginEmail"]').val(),
            password: $('input[name="loginPassword"]').val(),
            submitBtn: $('input[name="loginSubmitBtn"]').val(),
            errorMsg: $('.error-msg')
        };
    },
    logout: function () {
        return {
            id: $('#sign-out')
        }
    }
};
var DeleteItems = {
    modalSuccess: function (response) {
        actions.deletionSuccess().modalId.modal('show');
        actions.deletionSuccess().modalId.find(".alert").empty().prepend(response);
        actions.deletionSuccess().modalCloseBtn.click(function (e) {
            e.preventDefault();
            actions.deletionSuccess().modalId.modal('hide');
            setTimeout(location.reload.bind(location), 500);
        })
    },
    request: function (selectedItems) {
        $.ajax({
            url: 'app/controllers/manage_deletion.php',
            type: 'post',
            data: {items: selectedItems, deletion: true}
        }).done(function (response) {
            actions.delete().modalId.modal('hide');
            DeleteItems.modalSuccess(response);
        });
    },
    main: function () {
        actions.delete().mainBtn.click(function() {
            if (getSelectedItems().length === 0) {
                alert('nothing selected');
                return false;
            }
            actions.delete().modalId.modal("show");
            actions.delete().modalConfirmBtn.click(function (e) {
                e.preventDefault();
                DeleteItems.request(getIdsFromSelectedItems());
            });
        });
    }
};
var Login = {
  request: function () {
      var loginData = actions.login().formId.serialize();
      $.ajax({
          url: 'app/controllers/manage_login.php',
          type: 'post',
          data: loginData
      }).done(function (response) {
          if (response === '1') {
              redirectToIndexPage();
          } else {
              actions.login().errorMsg.empty().prepend(response);
          }
      });
  },
  main: function () {
      actions.login().formId.submit(function (e) {
          Login.request();
          e.preventDefault();
          return false;
      });
  }
};
var SignOut = {
  request: function () {
      $.ajax({
          url: 'app/controllers/manage_logout.php',
          type: 'get'
      }).done(function (response) {
          if (response === '1') {
              redirectToIndexPage();
          }
      });
  },
  main: function () {
      actions.logout().id.click(function (e) {
          SignOut.request();
          e.preventDefault();
          return false;
      });
  }
};
$(document).ready(function () {
    $('#entryTable').DataTable({
        responsive: true,
        select: {
            style: 'multi'
        },
        'pageLength': 6
    });
    DeleteItems.main();
    Login.main();
    SignOut.main();
});

var Util = {
    isValidEmail: function (email) {
        return (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email))
    },
    isEmpty: function (field) {
        return field.length === 0 || field === "";
    }
};

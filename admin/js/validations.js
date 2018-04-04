$('#login-form').validate({
    rules: {
        inputEmail: {
            required: true
        },
        inputPassword: {
            required: true
        }
    },
    messages: {
        inputEmail: {
            required: "Please enter a valid email."
        },
        inputPassword: {
            required: "Please enter your password."
        }
    },
    errorPlacement: function (error, element) {
        error.appendTo(element.parent());
    },
    submitHandler: function () {
        alert("submitted");
    }
});

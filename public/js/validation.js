$(document).ready(function () {

    $('#myform').validate({ // initialize the plugin
        rules: {
            email: {
                required: true,
                email: true
            },
            username: {
                required: true,
                minlength: 8
            },
            password: {
                required: true,
                minlength: 8
            }
        },

        /* FOR CUSTOM MESSAGE
        messages: {
          username: "",
          email: "",
          password: ""
        }, */

        submitHandler: function (form) {
            //FOR SUCCESS VALIDATION
            document.form.submit();
            return true;
        }

    });

});
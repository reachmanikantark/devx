$(function () {

    $("#UserSignupForm").validate({
        rules: {
            'data[User][firstname]': {
                required: true,
                lettersonly: true
            },
            'data[User][lastname]': {
                'required': true,
                lettersonly: true
            },
            'data[User][email]': {
                required: true,
                email: true,
                validate_email:true,
            },
            'data[User][password]': {
                'required':true,
                minlength: 6, 
                maxlength: 20 
            },
            'retypepassword': {
                required: true,
                equalTo: "#UserPassword"
            },
            'data[User][contactnumber]': {
                'required': true,
                digits: true,
                exactlength: 10,
                noZeroFirst:true,

            },
            'data[User][address]': 'required',
            'data[User][state]': 'required',
        },
        messages: {
            'data[User][firstname]': {
                required: 'Please enter your First Name',
                lettersonly: 'Please enter alphabet characters only'
            },
            'data[User][lastname]': {
                required: "Please enter your Last name",
                lettersonly: 'Please enter alphabet characters only'
            },
            'data[User][email]': {
                required: "Please enter your Email address",
                email: "Please enter valid Email address",
                validate_email:"Please enter valid Email address",
            },
            'data[User][password]': {
                required:'Please enter Password',
                minlength:'Please enter minimum 6 characters',
                maxlength:'Please enter maximum 20 characters'
            },
            'retypepassword': {
                required: "Please enter Re type password",
                equalTo: "Re type password should match with password"
            },
            'data[User][contactnumber]': {
                required: 'Please enter contact number',
                digits: "Please enter only digits",
                length: "Please enter 10 digit contact number",
                noZeroFirst:"Contact number cannot start with zero."
            },
            'data[User][address]': 'Please enter address',
            'data[User][state]': 'Please enter state',

        },
        submitHandler: function(event) {
        var formData = $("#UserSignupForm").serialize();
            $.ajax({
                type: 'POST',
                url: 'signup', // URL to your login action
                data: formData,
                dataType: 'json',
                success: function (response) {
                    if (response.status === 'success') {
                      //  console.log(response);
                        window.location.href = response.redirect; // Redirect to the next page
                    } else {
                        $('#loginMessage').html(response.message);
                        $('#loginMessage').show();
                        return false;
                    }
                    
                }
            });
        }


    });

    $("#UserLoginForm").validate({
        rules: {
            'data[User][email]': {
                required: true,
                email: true,
                validate_email:true,
            },
            'data[User][password]': 'required',
        },
        messages: {
            'data[User][email]': {
                required: "Please enter your Email address",
                email: "Please enter valid Email address",
                validate_email:"Please enter valid Email address",
            },
            'data[User][password]': 'Please enter Password',
        },
        submitHandler: function(event) {
           // console.log('Entering');
            //event.preventDefault();
            var formData = $('#UserLoginForm').serialize();
            $.ajax({
                type: 'POST',
                url: 'login', // URL to your login action
                data: formData,
                dataType: 'json',
                success: function (response) {
                    if (response.status === 'success') {
                        console.log(response);
                        window.location.href = response.redirect; // Redirect to the next page
                    } else {
                        $('#loginMessage').html(response.message);
                        $('#loginMessage').show();
                        return false;
                    }
                    
                }
            });
           
        }
    });

    $("#UserEditForm").validate({
        rules: {
            'data[User][firstname]': {
                required: true,
                lettersonly: true
            },
            'data[User][lastname]': {
                'required': true,
                lettersonly: true
            },
            'data[User][email]': {
                required: true,
                email: true,
                validate_email:true,
            },
            'data[User][contactnumber]': {
                'required': true,
                digits: true,
                exactlength: 10,
                noZeroFirst:true,

            },
            'data[User][address]': 'required',
            'data[User][state]': 'required',
        },
        messages: {
            'data[User][firstname]': {
                required: 'Please enter your First Name',
                lettersonly: 'Please enter alphabet characters only'
            },
            'data[User][lastname]': {
                required: "Please enter your Last name",
                lettersonly: 'Please enter alphabet characters only'
            },
            'data[User][email]': {
                required: "Please enter your Email address",
                email: "Please enter valid Email address",
                validate_email:"Please enter valid Email address",
            },
            'data[User][contactnumber]': {
                required: 'Please enter contact number',
                digits: "Please enter only digits",
                length: "Please enter 10 digit contact number",
                noZeroFirst:"Contact number cannot start with zero."
            },
            'data[User][address]': 'Please enter address',
            'data[User][state]': 'Please enter state',

        },
        submitHandler: function(event) {
        var formData = $("#UserEditForm").serialize();
        var id=$('#UserId').val();
            $.ajax({
                type: 'POST',
                url: '' + id, // URL to your login action
                data: formData,
                dataType: 'json',
                success: function (response) {
                    if (response.status === 'success') {
                      //  console.log(response);
                        window.location.href = response.redirect; // Redirect to the next page
                    } else {
                        $('#loginMessage').html(response.message);
                        $('#loginMessage').show();
                        return false;
                    }
                    
                }
            });
        }


    });

    //$("#UserContactnumber").rules("add", { regex: "^[^0]$" })

    $.validator.addMethod("lettersonly", function (value, element) {
        return this.optional(element) || /^[a-z]+$/i.test(value);
    }, "Letters only please");
    $.validator.addMethod("exactlength", function (value, element, param) {
        return this.optional(element) || value.length == param;
    }, $.validator.format("Please enter exactly {0} digits."));
    $.validator.addMethod("noZeroFirst", function(value, element) {
        return this.optional(element) || /^[1-9]/.test(value);
    }, "Phone number cannot start with zero.");
    jQuery.validator.addMethod("validate_email", function(value, element) {

        if (/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(value)) {
            return true;
        } else {
            return false;
        }
    }, "Please enter a valid Email.");
});
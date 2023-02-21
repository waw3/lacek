
Lacek.onLoad((() => class {
     static initValidation() {
         Lacek.helpers("jq-validation"), jQuery(".js-validation-signin").validate({
             rules: {
                 "email": {
                     required: !0,
                     minlength: 3
                 },
                 "password": {
                     required: !0,
                     minlength: 5
                 }
             },
             messages: {
                 "email": {
                     required: "Please enter a username",
                     minlength: "Your username must consist of at least 3 characters"
                 },
                 "password": {
                     required: "Please provide a password",
                     minlength: "Your password must be at least 5 characters long"
                 }
             }
         })
     }
     static init() {
         this.initValidation()
     }
 }.init()));

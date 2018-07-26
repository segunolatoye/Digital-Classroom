
var form_validation = function() {
    var e = function() {
        jQuery(".form-valide").validate({
            ignore: [],
            errorClass: "invalid-feedback animated fadeInDown",
            errorElement: "div",
            errorPlacement: function(e, a) {
                jQuery(a).parents(".form-group > div").append(e)
            },
            highlight: function(e) {
                jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-invalid")
            },
            success: function(e) {
                jQuery(e).closest(".form-group").removeClass("is-invalid"), jQuery(e).remove()
            },
            rules: {
                "name": {
                    required: !0,
                    minlength: 3,
                    noHTML: true
                },
                "title": {
                    required: !0,
                    minlength: 3,
                    noHTML: true
                },
                "email": {
                    required: !0,
                    email: !0,
                    noHTML: true
                },
                "password": {
                    required: !0,
                    minlength: 5,
                    noHTML: true
                },
                "confirm-password": {
                    required: !0,
                    equalTo: "password",
                    noHTML: true
                },
                "select2": {
                    required: !0
                },
                "val-select2-multiple": {
                    required: !0,
                    minlength: 2
                },
                "val-suggestions": {
                    required: !0,
                    minlength: 5
                },
                "dpt_id": {
                    required: !0,noHTML: true
                },
                "file": {
                    required: !0
                },
                "lec_file": {
                    required: !0
                },
                "department": {
                    required: !0,noHTML: true
                },
                "teacher_id": {
                    required: !0,noHTML: true
                },
                "batch_id": {
                    required: !0,noHTML: true
                },
                "batch": {
                    required: !0,noHTML: true
                },
                "subject_id": {
                    required: !0,noHTML: true
                },
                "sub_id": {
                    required: !0,noHTML: true
                },
                "session_id": {
                    required: !0
                },
                "sub_name": {
                    required: !0,
                    noHTML: true
                },
                "subject": {
                    required: !0,
                    noHTML: true
                },
                "session": {
                    required: !0
                },
                "val-currency": {
                    required: !0,
                    currency: ["$", !0]
                },
                "val-website": {
                    required: !0,
                    url: !0
                },
                "mobile": {
                    required: !0,
                    phoneUS: !0
                },
                "val-digits": {
                    required: !0,
                    digits: !0
                },
                "val-number": {
                    required: !0,
                    number: !0
                },
                "val-range": {
                    required: !0,
                    range: [1, 5]
                },
                "val-terms": {
                    required: !0
                },
                "info":{
                    required: !0,
                    minlength: !30
                },
                "#name":{
                    required: !0,
                    minlength: !30
                }
            },
            messages: {
                "name": {
                    required: "Please enter a username",
                    minlength: "Your username must consist of at least 3 characters"
                },
                "title": {
                    required: "Please enter a Title",
                    minlength: "Your username must consist of at least 3 characters"
                },
                "email": "Please enter a valid email address",
                "password": {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },
                "confirm-password": {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long",
                    equalTo: "Please enter the same password as above"
                },
                "val-select2": "Please select a value!",
                "val-select2-multiple": "Please select at least 2 values!",
                "val-suggestions": "What can we do to become better?",
                "dpt_id": "Please select a Department!",
                "sub_name": "Please enter a subject name!",
                "subject": "Please enter a subject name!",
                "department": "Please select a Department!",
                "teacher_id": "Please select a Teacher!",
                "batch_id": "Please select a Batch!",
                "batch": "Please select a Batch!",
                "session_id": "Please select a Session!",
                "session": "Please select a Session!",
                "subject_id": "Please select a Subject!",
                "sub_id": "Please select a Subject!",
                "val-currency": "Please enter a price!",
                "val-website": "Please enter your website!",
                "mobile": "Please enter phone number!",
                "file": "Please enter a file!",
                "lec_file": "Please enter a file!",
                "val-digits": "Please enter only digits!",
                "val-number": "Please enter a number!",
                "val-range": "Please enter a number between 1 and 5!",
                "val-terms": "You must agree to the service terms!",
                "info": {
                    required: "Please enter your information!",
                    minlength: "Your info must consist of at least 30 characters"
                },
                "#name": {
                    required: "Please Fill It",
                    minlength: "Your username must consist of at least 3 characters"
                }
            }
        })
    }
    return {
        init: function() {
            e(), jQuery(".js-select2").on("change", function() {
                jQuery(this).valid()
            })
        }
    }
}();
jQuery(function() {
    form_validation.init()
});
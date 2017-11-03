/*
    Library for validation

    Functionality
    1) real-time validation of values in iput fields
    2) validation in case of submitting the form

  _________________________________________________________________________________

    to install just include to project...
    <script src="..."></script>

    All the input fields must have the data-validate="name_of_validator"
 */
function Validator(form) {

    var self = this;

    this.form = form;

    this.form.find('input').keyup(function() {
        validator.validateInput($(this));
    });

    this.form.find('input').change(function() {
        validator.validateInput($(this));
    });

    this.form.submit(function(e) {
        var valid = validator.validateForm();

        if(!valid) {
        e.preventDefault();
        }
    });

};

Validator.prototype = {

    form : null,

    info: function() {
        return 'I am validator of ' + this.form.attr('id');
    },

    validateInput: function(input){
        // console.log(this, input);

        var value = input.val();
        var validate = input.data('validate');

        var valid = true;

        valid = this.validators[validate](value);
        // do the validation

         this.showValidation(input, valid);
        console.log(valid);
        return valid;

    },

    validateForm: function() {
        var validator = this;
        var valid = true;

        this.form.find('input').each(function() {

            valid = validator.validateInput($(this)) && valid;
        });

        return valid;
    },

    validators: {
        title: function(value) {
          return value.length >= 5;
        },

        finished: function(value) {
            return !isNaN(value);
        },
    },

    showValidation: function(input, valid){
        var name = input.data('validate');
        if(valid) {
            input.removeClass('is-invalid').addClass('is-valid');
            input.siblings('.invalid-feedback').remove();
        } else {
            input.addClass('is-invalid').removeClass('is-valid');
            if(input.siblings('.invalid-feedback').length == 0) {
                input.after('<div class="invalid-feedback age">\n' +
                    '                            Please provide a valid ' + name + '.\n' +
                    '                        </div>');
            };
        };
        if(input.val().length == 0) {
            input.removeClass('is-invalid');
            input.siblings('.invalid-feedback').remove();
        }
    },
};
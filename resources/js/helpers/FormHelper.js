export default class FormHelper {
    /**
     * @param {HTMLFormElement} form
     */
    constructor(form) {
        this.jqueryForm = $(form);
    }

    /**
     * Disable type submit elements for current form
     */
    disableSubmitInputs() {
        this.jqueryForm.find('[type=submit]').each(function () {
            $(this).prop('disabled', true);
        });
    }

    /**
     * Enable type submit elements for current form
     */
    enableSubmitInputs() {
        this.jqueryForm.find('[type=submit]').each(function () {
            $(this).prop('disabled', false);
        });
    }

    /**
     * Clear error texts and classes
     */
    clearErrorsHtml() {
        this.jqueryForm.find('.error').html('');
        this.jqueryForm.find('.success').html('');
        this.jqueryForm.find('input, textarea, select').each(function () {
            $(this).removeClass('input__error');
            $(this).parent().find('.label__error').html('');
        })
    }

    /**
     * Add error text and classes
     * @param {JSON} data
     */
    addErrorsFormJsonResponse(data) {
        let message = '';
        if (data.errors) {
            for (let error in data.errors) {
                message += '<br>' + data.errors[error].join();
                this.jqueryForm.find('[name="' + error + '"]').addClass('input__error');
                this.jqueryForm.find('[name="' + error + '"]').parent().find('.label__error').html(data.errors[error].join());
            }
            this.jqueryForm.find('.error').html(message);
        }
    }

    /**
     * Get action attribute value from form
     * @returns {string|undefined}
     */
    getAction() {
        return this.jqueryForm.attr('action')
    }

    /**
     * Get method attribute value from form
     * @returns {string|undefined}
     */
    getMethod() {
        return this.jqueryForm.attr('method')
    }

    /**
     * Get serialized form
     * @returns {string}
     */
    getSerialized() {
        return this.jqueryForm.serialize()
    }
}

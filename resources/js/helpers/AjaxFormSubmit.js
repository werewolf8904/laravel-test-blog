import FormHelper from "./FormHelper";
import ClosureDebouncer from "./ClosureDebouncer";

const formDebouncer = new ClosureDebouncer();

export default class AjaxFormSubmit {
    /**
     * @param {HTMLFormElement} form
     * @param {number} timeout
     */
    static submit(form, timeout = 300) {
        const formHelper = new FormHelper(form);
        formHelper.disableSubmitInputs();

        const closure = function () {

            formHelper.clearErrorsHtml();

            axios({
                url: formHelper.getAction(),
                method: formHelper.getMethod(),
                data: formHelper.getSerialized()
            })
                .then(() => {
                    window.location.reload();
                })
                .catch((response) => {
                    formHelper.addErrorsFormJsonResponse(response.response.data);
                })
                .then(() => {
                    formHelper.enableSubmitInputs();

                });
        };
        formDebouncer.pushClosure(closure, timeout);
    }
}

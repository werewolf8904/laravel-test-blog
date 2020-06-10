import AjaxFormSubmit from "./helpers/AjaxFormSubmit";

// Ajax form handler
$(document).on('submit', '[data-ajax=1]', function (event) {
    event.preventDefault();

    AjaxFormSubmit.submit(this);
    return false;
});

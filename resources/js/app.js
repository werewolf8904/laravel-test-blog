require('./bootstrap');

let submit_timeout = 0;
$(document).on('submit', '[data-ajax=1]', function (event) {
    event.preventDefault();
    const form = $(this);


    form.find('[type=submit]').each(function () {
        $(this).prop('disabled', true);
    });
    form.find('[type=submit]').each(function () {
        $(this).prop('disabled', true);
    });
    const closure = function () {
        form.find('.error').html('');
        form.find('.success').html('');
        form.find('input, textarea, select').each(function(){
            $(this).removeClass('input__error');
            $(this).parent().find('.label__error').html('');
        })
        axios({
            url: form.attr('action'),
            method: form.attr('method'),
            data: form.serialize()})
            .then(()=> {
                window.location.reload();
            }).catch((response)=>{

            let message='';

            const data=response.response.data;
            for (let error in  data.errors)
            {
                message+='<br>'+data.errors[error].join();
                form.find('[name="'+error+'"]').addClass('input__error');
                form.find('[name="'+error+'"]').parent().find('.label__error').html(data.errors[error].join());
            }
            form.find('.error').html(message);
        }).then(()=> {
                form.find('[type=submit]').each(function () {
                    $(this).prop('disabled', false);
                });

        });
    };
    clearTimeout(submit_timeout);
    submit_timeout = setTimeout(closure, 300);
    return false;
});

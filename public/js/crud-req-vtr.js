function requestVtr() {
    const formData = new FormData(document.getElementById('requestVtr'))

    // Verificação
    if (formData.get('rank') == '') {
        $('#rank').addClass('error');
        return false;
    } else {
        $('#rank').removeClass('error');
    }
    if (formData.get('professional_name') == '' || formData.get('professional_name').length > 200) {
        $('#professional_name').addClass('error');
        return false;
    } else {
        $('#professional_name').removeClass('error');
    }
    if (formData.get('mission') == '' || formData.get('mission').length > 200) {
        $('#mission').addClass('error');
        return false;
    } else {
        $('#mission').removeClass('error');
    }
    if (formData.get('destiny') == '' || formData.get('destiny').length > 20) {
        $('#destiny').addClass('error');
        return false;
    } else {
        $('#destiny').removeClass('error');
    }
    if (formData.get('date_part') == '') {
        $('#date_part').addClass('error');
        return false;
    } else {
        $('#date_part').removeClass('error');
    }
    if (formData.get('phone') == '' || formData.get('phone').length > 17) {
        $('#phone').addClass('error');
        return false;
    } else {
        $('#phone').removeClass('error');
    }
    if (formData.get('qtd_mil') == '') {
        $('#qtd_mil').addClass('error');
        return false;
    } else {
        $('#qtd_mil').removeClass('error');
    }

    var values = {
        rank: formData.get('rank'),
        name: formData.get('professional_name'),
        mission: formData.get('mission'),
        destiny: formData.get('destiny'),
        date_part: formData.get('date_part'),
        contact: formData.get('phone'),
        qtd_mil: formData.get('qtd_mil'),
        obs: formData.get('obs'),
    }

    const URL = 'request_vtr'

    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        url: URL,
        type: 'POST',
        data: values,
        dataType: 'text',
        success: function (data) {
            $('#requestVtr')[0].reset();
            $('#obs').summernote('code', '');


        },

        error: function (data) {

        }
    });
}

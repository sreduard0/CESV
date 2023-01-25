function selectFichaRel(value) {
    if (value) {
        var url = 'get_info_ficha/' + value
        $.get(url, function (result) {
            $('#driver').val(result.motinfo.pg + ' ' + result.motinfo.name)
            $('#in_order').val(result.in_order)
            if (result.missioninfo) {
                $('#mission').val(result.missioninfo.mission_name)
            } else {
                $('#mission').val(result.nat_of_serv)
            }
            $('#vtr').val(result.vtrinfo.ebplaca + '|' + result.vtrinfo.mod_vtr)
            if (result.missioninfo) {
                $('#destiny').val(result.missioninfo.destiny)
            }
        })
    } else {
        $('#form-request-fuel')[0].reset();
        $('#obs').summernote('code', '');
    }
}

function requestFuel() {
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 4000
    });
    const formData = new FormData(document.getElementById('form-request-fuel'))

    // Verificação
    if (formData.get('id_ficha') == '') {
        $('#id_ficha').addClass('is-invalid');
        return false;
    } else {
        $('#id_ficha').removeClass('is-invalid');
    }
    if (formData.get('od') == '') {
        $('#od').addClass('is-invalid');
        return false;
    } else {
        $('#od').removeClass('is-invalid');
    }
    if (formData.get('destiny') == '') {
        $('#destiny').addClass('is-invalid');
        return false;
    } else {
        $('#destiny').removeClass('is-invalid');
    }



    var values = {
        id_ficha: formData.get('id_ficha'),
        od: formData.get('od'),
        destiny: formData.get('destiny'),
        obs: formData.get('obs'),
    }

    const URL = '/request_fuel'

    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        url: URL,
        type: 'POST',
        data: values,
        dataType: 'text',
        success: function (data) {
            switch (data) {
                case 'ficha':
                    Toast.fire({
                        icon: 'warning',
                        title: '&nbsp&nbsp Ja há uma solicitação de combustível para esta ficha.'
                    });
                    break;
                default:
                    Toast.fire({
                        icon: 'success',
                        title: '&nbsp&nbsp Solicitação enviada.'
                    });
                    $('#request-fuel').modal('hide');
                    $('#form-request-fuel')[0].reset();
                    $('#obs').summernote('code', '');
                    $("#table").DataTable().clear().draw();
                    break;
            }
        },

        error: function (data) {
            Toast.fire({
                icon: 'error',
                title: '&nbsp&nbsp Erro ao solicitar.'
            });
        }
    });

}

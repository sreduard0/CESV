function registerMot() {
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 4000
    });
    const formData = new FormData(document.getElementById('form-register-drive'))

    // Verificação
    if (formData.get('pgMot') == '') {
        $('#pgMot').addClass('is-invalid');
        return false;
    } else {
        $('#pgMot').removeClass('is-invalid');
    }

    if (formData.get('nameMot') == '' || formData.get('nameMot').length > 200) {
        $('#nameMot').addClass('is-invalid');
        return false;
    } else {
        $('#nameMot').removeClass('is-invalid');
    }

    if (formData.get('catMot') == '') {
        $('#catMot').addClass('is-invalid');
        return false;
    } else {
        $('#catMot').removeClass('is-invalid');
    }

    if (formData.get('fullNameMot') == '' || formData.get('fullNameMot').length > 250) {
        $('#fullNameMot').addClass('is-invalid');
        return false;
    } else {
        $('#fullNameMot').removeClass('is-invalid');
    }

    if (formData.get('contactMot') == '' || formData.get('contactMot').length != 16) {
        $('#contactMot').addClass('is-invalid');
        return false;
    } else {
        $('#contactMot').removeClass('is-invalid');
    }

    if (formData.get('cnhMot') == '' || formData.get('cnhMot').length > 20) {
        $('#cnhMot').addClass('is-invalid');
        return false;
    } else {
        $('#cnhMot').removeClass('is-invalid');
    }

    if (formData.get('ValCnhMot') == '') {
        $('#ValCnhMot').addClass('is-invalid');
        return false;
    } else {
        $('#ValCnhMot').removeClass('is-invalid');
    }
    if (formData.get('idtMot') == '' || formData.get('idtMot').length != 13) {
        $('#idtMot').addClass('is-invalid');
        return false;
    } else {
        $('#idtMot').removeClass('is-invalid');
    }
    var values = {
        pgMot: formData.get('pgMot'),
        nameMot: formData.get('nameMot'),
        catMot: formData.get('catMot'),
        fullNameMot: formData.get('fullNameMot'),
        contactMot: formData.get('contactMot'),
        cnhMot: formData.get('cnhMot'),
        ValCnhMot: formData.get('ValCnhMot'),
        idtMot: formData.get('idtMot'),
    }

    const URL = '/register_mot'

    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        url: URL,
        type: 'POST',
        data: values,
        dataType: 'text',
        success: function (data) {

            switch (data) {
                case 'idt':
                    Toast.fire({
                        icon: 'warning',
                        title: '&nbsp&nbsp Já existe um motorista com essa <strong>idt mil</strong>.'
                    });
                    $('#idtMot').addClass('is-invalid');
                    break;
                case 'cnh':
                    Toast.fire({
                        icon: 'warning',
                        title: '&nbsp&nbsp   Já existe um motorista com essa <strong>CNH</strong>.'
                    });
                    $('#cnhMot').addClass('is-invalid')
                    break;

                default:
                    Toast.fire({
                        icon: 'success',
                        title: '&nbsp&nbsp Motorisca cadastrado com sucesso.'
                    });

                    $('#register-drive').modal('hide');
                    $('#form-register-drive')[0].reset();
                    $("#table").DataTable().clear().draw();
                    break;
            }
        },

        error: function (data) {
            Toast.fire({
                icon: 'error',
                title: '&nbsp&nbsp Erro ao cadastrar.'
            });
        }
    });
}


function registerMission() {
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 4000
    });
    const formData = new FormData(document.getElementById('form-register-mission'))

    // Verificação
    if (formData.get('typeMission') == '') {
        $('#typeMission').addClass('is-invalid');
        return false;
    } else {
        $('#typeMission').removeClass('is-invalid');
    }
    if (formData.get('nameMission') == '') {
        $('#nameMission').addClass('is-invalid');
        return false;
    } else {
        $('#nameMission').removeClass('is-invalid');
    }
    if (formData.get('destinyMission') == '') {
        $('#destinyMission').addClass('is-invalid');
        return false;
    } else {
        $('#destinyMission').removeClass('is-invalid');
    }
    if (formData.get('classMission') == '') {
        $('#classMission').addClass('is-invalid');
        return false;
    } else {
        $('#classMission').removeClass('is-invalid');
    }
    if (formData.get('vtrMission') == '') {
        $('#vtrMission').addClass('is-invalid');
        return false;
    } else {
        $('#vtrMission').removeClass('is-invalid');
    }
    if (formData.get('docMission') == '') {
        $('#docMission').addClass('is-invalid');
        return false;
    } else {
        $('#docMission').removeClass('is-invalid');
    }
    if (formData.get('originMission') == '') {
        $('#originMission').addClass('is-invalid');
        return false;
    } else {
        $('#originMission').removeClass('is-invalid');
    }
    if (formData.get('pgMotMission') == '') {
        $('#pgMotMission').addClass('is-invalid');
        return false;
    } else {
        $('#pgMotMission').removeClass('is-invalid');
    }
    if (formData.get('nameMotMission') == '') {
        $('#nameMotMission').addClass('is-invalid');
        return false;
    } else {
        $('#nameMotMission').removeClass('is-invalid');
    }
    if (formData.get('pgSegMission') == '') {
        $('#pgSegMission').addClass('is-invalid');
        return false;
    } else {
        $('#pgSegMission').removeClass('is-invalid');
    }
    if (formData.get('nameSegMission') == '') {
        $('#nameSegMission').addClass('is-invalid');
        return false;
    } else {
        $('#nameSegMission').removeClass('is-invalid');
    }
    if (formData.get('datePrevPartMission') == '') {
        $('#datePrevPartMission').addClass('is-invalid');
        return false;
    } else {
        $('#datePrevPartMission').removeClass('is-invalid');
    }
    if (formData.get('datePrevChgdMission') == '') {
        $('#datePrevChgdMission').addClass('is-invalid');
        return false;
    } else {
        $('#datePrevChgdMission').removeClass('is-invalid');
    }
    if (formData.get('contactCmtMission') == '') {
        $('#contactCmtMission').addClass('is-invalid');
        return false;
    } else {
        $('#contactCmtMission').removeClass('is-invalid');
    }

    var values = {
        typeMission: formData.get('typeMission'),
        nameMission: formData.get('nameMission'),
        destinyMission: formData.get('destinyMission'),
        classMission: formData.get('classMission'),
        vtrMission: formData.get('vtrMission'),
        docMission: formData.get('docMission'),
        originMission: formData.get('originMission'),
        pgMotMission: formData.get('pgMotMission'),
        nameMotMission: formData.get('nameMotMission'),
        pgSegMission: formData.get('pgSegMission'),
        nameSegMission: formData.get('nameSegMission'),
        datePrevPartMission: formData.get('datePrevPartMission'),
        datePrevChgdMission: formData.get('datePrevChgdMission'),
        contactCmtMission: formData.get('contactCmtMission'),
        obsMission: formData.get('obsMission')
    }

    const URL = window.location.href + 'register_mission'

    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        url: URL,
        type: 'POST',
        data: values,
        dataType: 'text',
        success: function (data) {
            Toast.fire({
                icon: 'success',
                title: '&nbsp&nbsp Missão adicionada com sucesso.'
            });

            $('#register-mission').modal('hide');
            $('#form-register-mission')[0].reset();
            $('#obsMission').summernote('code', '');
            $("#table").DataTable().clear().draw();
        },

        error: function (data) {
            Toast.fire({
                icon: 'error',
                title: '&nbsp&nbsp Erro ao cadastrar.'
            });
        }
    });
}
function editMission() {
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 4000
    });
    const formData = new FormData(document.getElementById('form-edit-mission'))

    // Verificação
    if (formData.get('typeMission') == '') {
        $('#typeMission').addClass('is-invalid');
        return false;
    } else {
        $('#typeMission').removeClass('is-invalid');
    }
    if (formData.get('nameMission') == '') {
        $('#nameMission').addClass('is-invalid');
        return false;
    } else {
        $('#nameMission').removeClass('is-invalid');
    }
    if (formData.get('destinyMission') == '') {
        $('#destinyMission').addClass('is-invalid');
        return false;
    } else {
        $('#destinyMission').removeClass('is-invalid');
    }
    if (formData.get('classMission') == '') {
        $('#classMission').addClass('is-invalid');
        return false;
    } else {
        $('#classMission').removeClass('is-invalid');
    }
    if (formData.get('vtrMission') == '') {
        $('#vtrMission').addClass('is-invalid');
        return false;
    } else {
        $('#vtrMission').removeClass('is-invalid');
    }
    if (formData.get('docMission') == '') {
        $('#docMission').addClass('is-invalid');
        return false;
    } else {
        $('#docMission').removeClass('is-invalid');
    }
    if (formData.get('originMission') == '') {
        $('#originMission').addClass('is-invalid');
        return false;
    } else {
        $('#originMission').removeClass('is-invalid');
    }
    if (formData.get('pgMotMission') == '') {
        $('#pgMotMission').addClass('is-invalid');
        return false;
    } else {
        $('#pgMotMission').removeClass('is-invalid');
    }
    if (formData.get('nameMotMission') == '') {
        $('#nameMotMission').addClass('is-invalid');
        return false;
    } else {
        $('#nameMotMission').removeClass('is-invalid');
    }
    if (formData.get('pgSegMission') == '') {
        $('#pgSegMission').addClass('is-invalid');
        return false;
    } else {
        $('#pgSegMission').removeClass('is-invalid');
    }
    if (formData.get('nameSegMission') == '') {
        $('#nameSegMission').addClass('is-invalid');
        return false;
    } else {
        $('#nameSegMission').removeClass('is-invalid');
    }
    if (formData.get('datePrevPartMission') == '') {
        $('#datePrevPartMission').addClass('is-invalid');
        return false;
    } else {
        $('#datePrevPartMission').removeClass('is-invalid');
    }
    if (formData.get('datePrevChgdMission') == '') {
        $('#datePrevChgdMission').addClass('is-invalid');
        return false;
    } else {
        $('#datePrevChgdMission').removeClass('is-invalid');
    }
    if (formData.get('contactCmtMission') == '') {
        $('#contactCmtMission').addClass('is-invalid');
        return false;
    } else {
        $('#contactCmtMission').removeClass('is-invalid');
    }

    var values = {
        typeMission: formData.get('typeMission'),
        nameMission: formData.get('nameMission'),
        destinyMission: formData.get('destinyMission'),
        classMission: formData.get('classMission'),
        vtrMission: formData.get('vtrMission'),
        docMission: formData.get('docMission'),
        originMission: formData.get('originMission'),
        pgMotMission: formData.get('pgMotMission'),
        nameMotMission: formData.get('nameMotMission'),
        pgSegMission: formData.get('pgSegMission'),
        nameSegMission: formData.get('nameSegMission'),
        datePrevPartMission: formData.get('datePrevPartMission'),
        datePrevChgdMission: formData.get('datePrevChgdMission'),
        contactCmtMission: formData.get('contactCmtMission'),
        obsMission: formData.get('obsMission')
    }

    const URL = window.location.href + 'edit_mission'

    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        url: URL,
        type: 'POST',
        data: values,
        dataType: 'text',
        success: function (data) {
            Toast.fire({
                icon: 'success',
                title: '&nbsp&nbsp Missão editada com sucesso.'
            });

            // $('#register-mission').modal('hide');
            $('#form-edit-mission')[0].reset();
            // $('#obsMission').summernote('code', '');
            $("#table").DataTable().clear().draw();
        },

        error: function (data) {
            Toast.fire({
                icon: 'error',
                title: '&nbsp&nbsp Erro ao cadastrar.'
            });
        }
    });
}

function deleteMission(id) {
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 4000
    });
    bootbox.confirm({
        title: ' Deseja excluir esta missão?',
        message: '<strong>Essa operação não pode ser desfeita e apagará todos os dados desta missão.</strong>',
        callback: function (confirmacao) {

            if (confirmacao)
                $.ajax({
                    url: window.location.href + 'delete_mission/' + id,
                    type: "GET",
                    success: function (data) {
                        $("#table").DataTable().clear().draw();
                        Toast.fire({
                            icon: 'success',
                            title: '&nbsp&nbsp Missão excluida com sucesso.'
                        });
                        $("#table").DataTable().clear().draw();


                    },
                    error: function (data) {
                        Toast.fire({
                            icon: 'error',
                            title: '&nbsp&nbsp Erro excluir.'
                        });

                    }
                });
        },
        buttons: {
            cancel: {
                label: 'Cancelar',
                className: 'btn-default'
            },
            confirm: {
                label: 'Excluir',
                className: 'btn-danger'
            }

        }
    });
}

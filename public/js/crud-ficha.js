function registerFicha() {
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 4000
    });
    const formData = new FormData(document.getElementById('form-register-ficha'))

    // Verificação
    var nrficha = formData.get('nrFicha').replace("_", "")
    if (formData.get('nrFicha') == '' || nrficha.length < 4) {
        $('#nrFicha').addClass('is-invalid');
        return false;
    } else {
        $('#nrFicha').removeClass('is-invalid');
    }
    if (formData.get('vtrFicha') == '') {
        $('#vtrFicha').addClass('is-invalid');
        return false;
    } else {
        $('#vtrFicha').removeClass('is-invalid');
    }
    if (formData.get('missionFicha') == '') {
        $('#missionFicha').addClass('is-invalid');
        return false;
    } else {
        $('#missionFicha').removeClass('is-invalid');
    }
    if (formData.get('inOrderFicha') == '' || formData.get('nameSegFicha').length > 200) {
        $('#inOrderFicha').addClass('is-invalid');
        return false;
    } else {
        $('#inOrderFicha').removeClass('is-invalid');
    }
    if (formData.get('pgMotFicha') == '') {
        $('#pgMotFicha').addClass('is-invalid');
        return false;
    } else {
        $('#pgMotFicha').removeClass('is-invalid');
    }
    if (formData.get('nameMotFicha') == '' || formData.get('nameMotFicha').length > 200) {
        $('#nameMotFicha').addClass('is-invalid');
        return false;
    } else {
        $('#nameMotFicha').removeClass('is-invalid');
    }
    if (formData.get('natOfServFicha') == '' || formData.get('nameSegFicha').length > 200) {
        $('#natOfServFicha').addClass('is-invalid');
        return false;
    } else {
        $('#natOfServFicha').removeClass('is-invalid');
    }




    var values = {
        nrFicha: formData.get('nrFicha'),
        vtrFicha: formData.get('vtrFicha'),
        missionFicha: formData.get('missionFicha'),
        inOrderFicha: formData.get('inOrderFicha'),
        pgMotFicha: formData.get('pgMotFicha'),
        nameMotFicha: formData.get('nameMotFicha'),
        pgSegFicha: formData.get('pgSegFicha'),
        nameSegFicha: formData.get('nameSegFicha'),
        natOfServFicha: formData.get('natOfServFicha'),
    }

    const URL = '/register_ficha'

    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        url: URL,
        type: 'POST',
        data: values,
        dataType: 'text',
        success: function (data) {
            switch (data) {
                case 'vtr':
                    Toast.fire({
                        icon: 'warning',
                        title: '&nbsp&nbsp Esta viatura já contém uma ficha aberta.'
                    });
                    $('#vtrFicha').addClass('is-invalid')
                    break;
                case 'ficha':
                    Toast.fire({
                        icon: 'warning',
                        title: '&nbsp&nbsp  Já existe uma ficha com este número.'
                    });
                    $('#nrFicha').addClass('is-invalid')
                    break;

                default:
                    Toast.fire({
                        icon: 'success',
                        title: '&nbsp&nbsp Ficha adicionada com sucesso.'
                    });

                    $('#register-ficha').modal('hide');
                    $('#form-register-ficha')[0].reset();
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
function editFicha() {
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 4000
    });
    const formData = new FormData(document.getElementById('form-edit-ficha'))

    // Verificação
    var nrficha = formData.get('e_nrFicha').replace("_", "")
    if (formData.get('e_nrFicha') == '' || nrficha.length < 4) {
        $('#e_nrFicha').addClass('is-invalid');
        return false;
    } else {
        $('#e_nrFicha').removeClass('is-invalid');
    }
    if (formData.get('e_e_vtrFicha') == '') {
        $('#e_vtrFicha').addClass('is-invalid');
        return false;
    } else {
        $('#e_vtrFicha').removeClass('is-invalid');
    }
    if (formData.get('missionFicha') == '') {
        $('#e_missionFicha').addClass('is-invalid');
        return false;
    } else {
        $('#e_missionFicha').removeClass('is-invalid');
    }
    if (formData.get('e_inOrderFicha') == '' || formData.get('e_inOrderFicha').length > 200) {
        $('#e_inOrderFicha').addClass('is-invalid');
        return false;
    } else {
        $('#e_inOrderFicha').removeClass('is-invalid');
    }
    if (formData.get('e_pgMotFicha') == '') {
        $('#e_pgMotFicha').addClass('is-invalid');
        return false;
    } else {
        $('#e_pgMotFicha').removeClass('is-invalid');
    }
    if (formData.get('nameMotFicha') == '' || formData.get('e_nameMotFicha').length > 200) {
        $('#e_nameMotFicha').addClass('is-invalid');
        return false;
    } else {
        $('#nameMotFicha').removeClass('is-invalid');
    }
    if (formData.get('e_natOfServFicha') == '' || formData.get('e_natOfServFicha').length > 200) {
        $('#e_natOfServFicha').addClass('is-invalid');
        return false;
    } else {
        $('#e_natOfServFicha').removeClass('is-invalid');
    }




    var values = {
        id: formData.get('id_ficha'),
        nrFicha: formData.get('e_nrFicha'),
        vtrFicha: formData.get('e_vtrFicha'),
        missionFicha: formData.get('e_missionFicha'),
        inOrderFicha: formData.get('e_inOrderFicha'),
        pgMotFicha: formData.get('e_pgMotFicha'),
        nameMotFicha: formData.get('e_nameMotFicha'),
        pgSegFicha: formData.get('e_pgSegFicha'),
        nameSegFicha: formData.get('e_nameSegFicha'),
        natOfServFicha: formData.get('e_natOfServFicha'),
    }

    const URL = '/edit_ficha'

    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        url: URL,
        type: 'POST',
        data: values,
        dataType: 'text',
        success: function (data) {
            switch (data) {
                case 'vtr':
                    Toast.fire({
                        icon: 'warning',
                        title: '&nbsp&nbsp Esta viatura já contém uma ficha aberta.'
                    });
                    break;
                case 'ficha':
                    Toast.fire({
                        icon: 'warning',
                        title: '&nbsp&nbsp  Já existe uma ficha com este número.'
                    });
                    break;

                default:
                    Toast.fire({
                        icon: 'success',
                        title: '&nbsp&nbsp Ficha editada com sucesso.'
                    });

                    $('#edit-ficha').modal('hide');
                    $('#form-edit-ficha')[0].reset();
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

function finishFicha(id) {
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 4000
    });
    bootbox.confirm({
        title: ' Deseja fechar esta ficha?',
        message: '<strong>Essa operação não pode ser desfeita.</strong>',
        callback: function (confirmacao) {

            if (confirmacao)
                $.ajax({
                    url: '/finish_ficha/' + id,
                    type: "GET",
                    success: function (data) {
                        $("#table").DataTable().clear().draw();
                        Toast.fire({
                            icon: 'success',
                            title: '&nbsp&nbsp Ficha finalizada com sucesso.'
                        });
                        $("#table").DataTable().clear().draw();


                    },
                    error: function (data) {
                        Toast.fire({
                            icon: 'error',
                            title: '&nbsp&nbsp Erro ao fechar.'
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
                label: 'Fechar',
                className: 'btn-success'
            }

        }
    });
}

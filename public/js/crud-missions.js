
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
    if (formData.get('nameMission') == '' || formData.get('nameMission').length > 200) {
        $('#nameMission').addClass('is-invalid');
        return false;
    } else {
        $('#nameMission').removeClass('is-invalid');
    }
    if (formData.get('destinyMission') == '' || formData.get('destinyMission').length > 200) {
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
    if (formData.get('docMission').length > 200) {
        $('#docMission').addClass('is-invalid');
        return false;
    } else {
        $('#docMission').removeClass('is-invalid');
    }
    if (formData.get('originMission') == '' || formData.get('originMission').length > 200) {
        $('#originMission').addClass('is-invalid');
        return false;
    } else {
        $('#originMission').removeClass('is-invalid');
    }
    if (formData.get('pgSegMission') == '') {
        $('#pgSegMission').addClass('is-invalid');
        return false;
    } else {
        $('#pgSegMission').removeClass('is-invalid');
    }
    if (formData.get('nameSegMission') == '' || formData.get('nameSegMission').length > 150) {
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

    if (formData.get('contactCmtMission').length != 16) {
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
        // pgMotMission: formData.get('pgMotMission'),
        // nameMotMission: formData.get('nameMotMission'),
        pgSegMission: formData.get('pgSegMission'),
        nameSegMission: formData.get('nameSegMission'),
        datePrevPartMission: formData.get('datePrevPartMission'),
        datePrevChgdMission: formData.get('datePrevChgdMission'),
        contactCmtMission: formData.get('contactCmtMission'),
        obsMission: formData.get('obsMission')
    }

    const URL = '/register_mission'

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
    if (formData.get('e_typeMission') == '') {
        $('#e_typeMission').addClass('is-invalid');
        return false;
    } else {
        $('#e_typeMission').removeClass('is-invalid');
    }
    if (formData.get('e_nameMission') == '' || formData.get('e_nameMission').length > 200) {
        $('#e_nameMission').addClass('is-invalid');
        return false;
    } else {
        $('#e_nameMission').removeClass('is-invalid');
    }
    if (formData.get('e_destinyMission') == '' || formData.get('e_destinyMission').length > 200) {
        $('#e_destinyMission').addClass('is-invalid');
        return false;
    } else {
        $('#e_destinyMission').removeClass('is-invalid');
    }
    if (formData.get('e_classMission') == '') {
        $('#e_classMission').addClass('is-invalid');
        return false;
    } else {
        $('#e_classMission').removeClass('is-invalid');
    }
    if (formData.get('e_docMission').length > 200) {
        $('#e_docMission').addClass('is-invalid');
        return false;
    } else {
        $('#e_docMission').removeClass('is-invalid');
    }
    if (formData.get('e_originMission') == '' || formData.get('e_originMission').length > 200) {
        $('#e_originMission').addClass('is-invalid');
        return false;
    } else {
        $('#e_originMission').removeClass('is-invalid');
    }
    if (formData.get('e_pgSegMission') == '') {
        $('#e_pgSegMission').addClass('is-invalid');
        return false;
    } else {
        $('#e_pgSegMission').removeClass('is-invalid');
    }
    if (formData.get('e_nameSegMission') == '' || formData.get('e_nameSegMission').length > 150) {
        $('#e_nameSegMission').addClass('is-invalid');
        return false;
    } else {
        $('#e_nameSegMission').removeClass('is-invalid');
    }
    if (formData.get('e_datePrevPartMission') == '') {
        $('#e_datePrevPartMission').addClass('is-invalid');
        return false;
    } else {
        $('#e_datePrevPartMission').removeClass('is-invalid');
    }
    if (formData.get('e_datePrevChgdMission') == '') {
        $('#e_datePrevChgdMission').addClass('is-invalid');
        return false;
    } else {
        $('#e_datePrevChgdMission').removeClass('is-invalid');
    }
    if (formData.get('e_contactCmtMission').length != 16) {
        $('#e_contactCmtMission').addClass('is-invalid');
        return false;
    } else {
        $('#e_contactCmtMission').removeClass('is-invalid');
    }

    var values = {
        id: $('#idMission').val(),
        typeMission: formData.get('e_typeMission'),
        nameMission: formData.get('e_nameMission'),
        destinyMission: formData.get('e_destinyMission'),
        classMission: formData.get('e_classMission'),
        docMission: formData.get('e_docMission'),
        originMission: formData.get('e_originMission'),
        pgSegMission: formData.get('e_pgSegMission'),
        nameSegMission: formData.get('e_nameSegMission'),
        datePrevPartMission: formData.get('e_datePrevPartMission'),
        datePrevChgdMission: formData.get('e_datePrevChgdMission'),
        contactCmtMission: formData.get('e_contactCmtMission'),
        obsMission: formData.get('e_obsMission')
    }

    const URL = '/edit_mission'

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

            $('#edit-mission').modal('hide');
            $('#form-edit-mission')[0].reset();
            $('#e_obsMission').summernote('code', '');
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
                    url: '/delete_mission/' + id,
                    type: "GET",
                    success: function (data) {
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
function finishMission(id) {
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 4000
    });
    var url = "/info_mission/" + id;
    $.get(url, function (result) {
        const Vtrs = result.vtr_info.map(vtr => {
            if (vtr.pg_seg) {
                var segName = vtr.pg_seg + ' ' + vtr.name_seg
            } else {
                var segName = 'Não informado'
            }
            return ' ' + vtr.nr_ficha
        })

        const message = "<strong>Essa operação não pode ser desfeita e fechará todas as fichas vinculadas a esta missão.</strong><br><br>Fichas que serão fechadas: " + Vtrs

        bootbox.confirm({
            title: ' Deseja encerrar esta missão?',
            message: message,
            callback: function (confirmacao) {

                if (confirmacao)
                    $.ajax({
                        url: '/finish_mission/' + id,
                        type: "GET",
                        success: function (data) {
                            Toast.fire({
                                icon: 'success',
                                title: '&nbsp&nbsp Missão encerrada com sucesso.'
                            });
                            $("#table").DataTable().clear().draw();


                        },
                        error: function (data) {
                            Toast.fire({
                                icon: 'error',
                                title: '&nbsp&nbsp Erro encerrar.'
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
                    label: 'Encerrar',
                    className: 'btn-danger'
                }

            }
        });
    })
}
function altStatusMission(id) {
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 4000
    });
    const message = "Tem certeza que deseja mudar o status da missão <br>para <strong>'Em andamento'</strong>?<br>Esta operação não pode ser desfeita. "
    bootbox.confirm({
        title: ' Deseja alterar o status da missão?',
        message: message,
        callback: function (confirmacao) {

            if (confirmacao)
                $.ajax({
                    url: '/alt_sts_mission/' + id,
                    type: "GET",
                    success: function (data) {
                        if (data == 'vtr') {
                            Toast.fire({
                                icon: 'warning',
                                title: '&nbsp&nbsp Esta missão ainda não possui viatura.'
                            });
                        } else {
                            Toast.fire({
                                icon: 'success',
                                title: '&nbsp&nbsp Status da missão alterado.'
                            });
                            $("#table").DataTable().clear().draw();
                        }
                    },
                    error: function (data) {
                        Toast.fire({
                            icon: 'error',
                            title: '&nbsp&nbsp Erro ao alterar.'
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
                label: 'Alterar',
                className: 'btn-success'
            }

        }
    });
}


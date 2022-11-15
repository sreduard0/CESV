function selectVtrType(value) {
    // Mostrando data no campo
    $('#_hora').val(moment().format('DD-MM-YYYY HH:mm'))
    $('#hourSai').val(moment().format('DD-MM-YYYY HH:mm'))



    switch (value) {
        case 'civil':
            $('#veicle_type').val('civil')
            $("#f-civil").css("display", "block")
            $("#f-oom").css("display", "none")
            $("#f-om").css("display", "none")
            break;
        case 'oom':
            $('#veicle_type').val('oom')
            $("#f-oom").css("display", "block")
            $("#f-civil").css("display", "none")
            $("#f-om").css("display", "none")
            break;
        case 'adm':
        case 'op':
        case 'om':
            $('#veicle_type').val('om')
            $("#f-civil").css("display", "none")
            $("#f-oom").css("display", "none")
            $("#f-om").css("display", "block")

            break;
        default:
            $('#veicle_type').val('')
            $("#f-civil").css("display", "none")
            $("#f-oom").css("display", "none")
            $("#f-om").css("display", "none")

            break;
    }
}
function selectFichaRel(value) {
    var url = 'get_info_ficha/' + value
    $('#nrFichaRel').val(value)
    $.get(url, function (result) {
        $('#typeVtr').val(result.vtrinfo.type_vtr)
        // selectVtrType(result.vtrinfo.type_vtr)
        $('#vtrTypeRel').val(result.vtrinfo.type_vtr)
        $('#pgMotRel').val(result.pg_mot)
        $('#nameMotRel').val(result.name_mot)
        $('#pgSegRel').val(result.pg_seg)
        $('#nameSegRel').val(result.name_seg)
        $('#modVtrRel').val(result.vtrinfo.mod_vtr)
        $('#ebPlacaRel').val(result.vtrinfo.ebplaca)
        if (result.missioninfo) {
            $('#destinyRel').val(result.missioninfo.destiny + " | " + result.missioninfo.mission_name)
        } else {
            $('#destinyRel').val('Viatura de serviço')

        }
    })
}

// REGISTRAR
function registerCivil() {
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 4000
    });
    const formData = new FormData(document.getElementById('form-civil'))

    // Verificação
    if (formData.get('nameMotCivilRel') == '' || formData.get('nameMotCivilRel').length > 200) {
        $('#nameMotCivilRel').addClass('is-invalid');
        return false;
    } else {
        $('#nameMotCivilRel').removeClass('is-invalid');
    }

    if (formData.get('docCivilRel') == '' || formData.get('docCivilRel').length > 15) {
        $('#docCivilRel').addClass('is-invalid');
        return false;
    } else {
        $('#docCivilRel').removeClass('is-invalid');
    }

    if (formData.get('modVeiCivilRel') == '' || formData.get('modVeiCivilRel').length > 200) {
        $('#modVeiCivilRel').addClass('is-invalid');
        return false;
    } else {
        $('#docCivilRel').removeClass('is-invalid');
    }

    if (formData.get('placaCivilRel') == '' || formData.get('placaCivilRel').length > 15) {
        $('#placaCivilRel').addClass('is-invalid');
        return false;
    } else {
        $('#placaCivilRel').removeClass('is-invalid');
    }

    if (formData.get('qtdPassCivilRel') == '') {
        $('#qtdPassCivilRel').addClass('is-invalid');
        return false;
    } else {
        $('#qtdPassCivilRel').removeClass('is-invalid');
    }


    if (formData.get('destinyCivilRel') == '' || formData.get('destinyCivilRel').length > 15) {
        $('#destinyCivilRel').addClass('is-invalid');
        return false;
    } else {
        $('#destinyCivilRel').removeClass('is-invalid');
    }

    var values = {
        nameMot: formData.get('nameMotCivilRel'),
        doc: formData.get('docCivilRel'),
        modVtr: formData.get('modVeiCivilRel'),
        placaVtr: formData.get('placaCivilRel'),
        qtdPass: formData.get('qtdPassCivilRel'),
        destiny: formData.get('destinyCivilRel'),
        obs: formData.get('obsCivilRel'),
        hourEnt: $('#hourSai').val(),
        vtrType: $('#veicle_type').val()
    }

    const URL = '/register_relgda'

    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        url: URL,
        type: 'POST',
        data: values,
        dataType: 'text',
        success: function (data) {
            switch (data) {
                case 'veicle':
                    Toast.fire({
                        icon: 'warning',
                        title: '&nbsp&nbsp Este veículo já está registrado.'
                    });
                    break;
                default:
                    Toast.fire({
                        icon: 'success',
                        title: '&nbsp&nbsp Veículo registrado.'
                    });
                    $('#register-vtr ').modal('hide');
                    selectVtrType('')
                    $('#form-civil')[0].reset();
                    $('#obsCivilRel').summernote('code', '');
                    $("#table").DataTable().clear().draw();
                    selectVtrType('')
                    contRel()
                    break;
            }
        },

        error: function (data) {
            Toast.fire({
                icon: 'error',
                title: '&nbsp&nbsp Erro ao registrar.'
            });
        }
    });

}
function registerOom() {
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 4000
    });

    const formData = new FormData(document.getElementById('form-oom'))


    if (formData.get('pgSegOomRel') == '') {
        $('#pgSegOomRel').addClass('is-invalid');
        return false;
    } else {
        $('#pgSegOomRel').removeClass('is-invalid');
    }

    if (formData.get('nameSegOomRel') == '' || formData.get('nameSegOomRel').length > 200) {
        $('#nameSegOomRel').addClass('is-invalid');
        return false;
    } else {
        $('#nameSegOomRel').removeClass('is-invalid');
    }

    if (formData.get('idtMilOomRel') == '' || formData.get('idtMilOomRel').length > 15) {
        $('#idtMilOomRel').addClass('is-invalid');
        return false;
    } else {
        $('#idtMilOomRel').removeClass('is-invalid');
    }

    if (formData.get('modVtrOomRel') == '' || formData.get('modVtrOomRel').length > 200) {
        $('#modVtrOomRel').addClass('is-invalid');
        return false;
    } else {
        $('#modVtrOomRel').removeClass('is-invalid');
    }

    if (formData.get('ebPlacaOomRel') == '' || formData.get('ebPlacaOomRel').length > 15) {
        $('#ebPlacaOomRel').addClass('is-invalid');
        return false;
    } else {
        $('#ebPlacaOomRel').removeClass('is-invalid');
    }

    if (formData.get('omOomRel') == '' || formData.get('omOomRel').length > 15) {
        $('#omOomRel').addClass('is-invalid');
        return false;
    } else {
        $('#omOomRel').removeClass('is-invalid');
    }

    if (formData.get('destinyOomRel') == '' || formData.get('destinyOomRel').length > 200) {
        $('#destinyOomRel').addClass('is-invalid');
        return false;
    } else {
        $('#destinyOomRel').removeClass('is-invalid');
    }

    var values = {
        pgMot: formData.get('pgMotOomRel'),
        nameMot: formData.get('nameMotOomRel'),
        pgSeg: formData.get('pgSegOomRel'),
        nameSeg: formData.get('nameSegOomRel'),
        idtMil: formData.get('idtMilOomRel'),
        modVtr: formData.get('modVtrOomRel'),
        ebPlaca: formData.get('ebPlacaOomRel'),
        om: formData.get('omOomRel'),
        destiny: formData.get('destinyOomRel'),
        obs: formData.get('obsOomRel'),
        hourEnt: $('#hourSai').val(),
        vtrType: $('#veicle_type').val()
    }

    const URL = '/register_relgda'

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
                        title: '&nbsp&nbsp Esta viatura já está registrada.'
                    });
                    break;
                default:
                    Toast.fire({
                        icon: 'success',
                        title: '&nbsp&nbsp Viatura de outra OM registrada.'
                    });
                    $('#register-vtr ').modal('hide');
                    $('#form-oom')[0].reset();
                    $('#obsOomRel').summernote('code', '');
                    $("#table").DataTable().clear().draw();
                    selectVtrType('')
                    contRel()


                    break;
            }
        },

        error: function (data) {
            Toast.fire({
                icon: 'error',
                title: '&nbsp&nbsp Erro ao registrar.'
            });
        }
    });
}
function registerOm() {
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 4000
    });
    const formData = new FormData(document.getElementById('form-om'))

    // Verificação
    if (formData.get('nrFichaRel') == '') {
        $('#nrFichaRel').addClass('is-invalid');
        return false;
    } else {
        $('#nrFichaRel').removeClass('is-invalid');
    }

    if (formData.get('pgMotRel') == '') {
        $('#pgMotRel').addClass('is-invalid');
        return false;
    } else {
        $('#pgMotRel').removeClass('is-invalid');
    }

    if (formData.get('nameMotRel') == '' || formData.get('nameMotRel').length > 200) {
        $('#nameMotRel').addClass('is-invalid');
        return false;
    } else {
        $('#nameMotRel').removeClass('is-invalid');
    }

    if (formData.get('pgSegRel') == '') {
        $('#pgSegRel').addClass('is-invalid');
        return false;
    } else {
        $('#pgSegRel').removeClass('is-invalid');
    }

    if (formData.get('nameSegRel') == '' || formData.get('nameSegRel').length > 200) {
        $('#nameSegRel').addClass('is-invalid');
        return false;
    } else {
        $('#nameSegRel').removeClass('is-invalid');
    }

    if (formData.get('modVtrRel') == '' || formData.get('modVtrRel').length > 200) {
        $('#modVtrRel').addClass('is-invalid');
        return false;
    } else {
        $('#modVtrRel').removeClass('is-invalid');
    }

    if (formData.get('ebPlacaRel') == '' || formData.get('ebPlacaRel').length > 15) {
        $('#ebPlacaRel').addClass('is-invalid');
        return false;
    } else {
        $('#ebPlacaRel').removeClass('is-invalid');
    }

    if (formData.get('odSaiRel') == '' || formData.get('odSaiRel').length > 150) {
        $('#odSaiRel').addClass('is-invalid');
        return false;
    } else {
        $('#odSaiRel').removeClass('is-invalid');
    }

    if (formData.get('destinyRel') == '' || formData.get('destinyRel').length > 150) {
        $('#destinyRel').addClass('is-invalid');
        return false;
    } else {
        $('#destinyRel').removeClass('is-invalid');
    }

    var values = {
        nrFicha: formData.get('nrFichaRel'),
        pgMot: formData.get('pgMotRel'),
        nameMot: formData.get('nameMotRel'),
        nameMot: formData.get('nameMotRel'),
        pgSeg: formData.get('pgSegRel'),
        nameSeg: formData.get('nameSegRel'),
        modVtr: formData.get('modVtrRel'),
        ebPlaca: formData.get('ebPlacaRel'),
        odSai: formData.get('odSaiRel'),
        destiny: formData.get('destinyRel'),
        obs: formData.get('obsRel'),
        vtrType: $('#vtrTypeRel').val(),
        hourSai: $('#hourSai').val(),
    }

    const URL = '/register_relgda'

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
                        title: '&nbsp&nbsp Esta viatura já está registrada.'
                    });
                    break;
                default:
                    Toast.fire({
                        icon: 'success',
                        title: '&nbsp&nbsp Saída de viatura registrada.'
                    });
                    $('#register-vtr ').modal('hide');
                    $('#form-om')[0].reset();
                    $('#obsRel').summernote('code', '');
                    $("#table").DataTable().clear().draw();
                    selectVtrType('')
                    contRel()


                    break;
            }
        },

        error: function (data) {
            Toast.fire({
                icon: 'error',
                title: '&nbsp&nbsp Erro ao registrar.'
            });
        }
    });
}

function registerVtr() {
    switch ($('#veicle_type').val()) {
        case 'civil':
            registerCivil()
            break;
        case 'oom':
            registerOom()
            break;
        case 'om':
            registerOm()
            break;
        default:
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 4000
            });
            Toast.fire({
                icon: 'warning',
                title: '&nbsp&nbsp Selecione um tipo de viatura.'
            });
            break;
    }
}

// FECHAR
function closeRegisterModal(id, vtr) {
    $('#close-register-modal').modal('show')
    // Mostrando data no campo
    $('#ent_hora').val(moment().format('DD-MM-YYYY HH:mm'))
    $('#hourEnt').val(moment().format('DD-MM-YYYY HH:mm'))
    $('#idResgister').val(id)
    $('#vtr').val(vtr)
    if (vtr == 'civil' || vtr == 'oom') {
        $('.od').addClass('d-none');
    } else {
        $('.od').removeClass('d-none');
    }

}
function closeRegister() {
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 4000
    });
    const formData = new FormData(document.getElementById('form-reg-close'))

    // Verificação
    if (formData.get('hourEnt') == '') {
        $('#ent_hora').addClass('is-invalid');
        return false;
    } else {
        $('#ent_hora').removeClass('is-invalid');
    }

    if (formData.get('idResgister') == '' || formData.get('vtr') == '') {
        Toast.fire({
            icon: 'warning',
            title: '&nbsp&nbsp Erro ao encontrar registro'
        });
        return false;
    }

    if (formData.get('vtr') == 'adm' || formData.get('vtr') == 'op') {
        if (formData.get('odEntRel') == '' || formData.get('odEntRel').length > 150) {
            $('#odEntRel').addClass('is-invalid');
            return false;
        } else {
            $('#odEntRel').removeClass('is-invalid');
        }
    }

    var values = {
        od: formData.get('odEntRel'),
        hour: formData.get('hourEnt'),
        id_rel: formData.get('idResgister'),
        vtrType: formData.get('vtr'),
    }

    const URL = '/close_relgda'

    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        url: URL,
        type: 'POST',
        data: values,
        dataType: 'text',
        success: function (data) {
            switch (data) {
                case 'erro':
                    Toast.fire({
                        icon: 'warning',
                        title: '&nbsp&nbsp Este registro não existe.'
                    });
                    break;
                case 'fin':
                    Toast.fire({
                        icon: 'warning',
                        title: '&nbsp&nbsp Este registro já está finalizado.'
                    });
                    break;
                case 'od':
                    Toast.fire({
                        icon: 'warning',
                        title: '&nbsp&nbsp Odômetro menor que o anterior.'
                    });
                    break;
                default:
                    const km = data ? '<br> Viatura andou ' + data + ' Km(s)' : ''
                    Toast.fire({
                        icon: 'success',
                        title: '&nbsp&nbsp Finalizado com sucesso.' + km
                    });
                    $('#close-register-modal').modal('hide');
                    $('#form-reg-close')[0].reset();
                    $("#table").DataTable().clear().draw();
                    contRel()

                    break;
            }
        },

        error: function (data) {
            Toast.fire({
                icon: 'error',
                title: '&nbsp&nbsp Erro na rede.'
            });
        }
    });
}

// EXCLUIR
function deleteRelGda(id) {

    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 4000
    });
    bootbox.confirm({
        title: ' Deseja excluir este registro?',
        message: '<strong>Essa operação não pode ser desfeita.</strong>',
        callback: function (confirmacao) {

            if (confirmacao)
                $.ajax({
                    url: '/deleterelgda/' + id,
                    type: "GET",
                    success: function (data) {
                        $("#table").DataTable().clear().draw();
                        Toast.fire({
                            icon: 'success',
                            title: '&nbsp&nbsp Registro excluido com sucesso.'
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
                label: 'Excluir',
                className: 'btn-danger'
            }

        }
    });
}

// EDITAR REGISTRO
function selectEditVtrType(id) {
    // Mostrando data no campo
    var url = "/get_info_register/" + id;
    $.get(url, function (result) {
        switch (result.type_veicle) {
            case 'op':
            case 'adm':
                $('#nameMotOm').val(result.pg_mot + ' ' + result.name_mot)
                $('#nameSegOm').val(result.pg_seg + ' ' + result.name_seg)
                $('#modVtrOm').val(result.mod_veicle)
                $('#ebPlacaOm').val(result.placaeb)
                $('#destinyOm').val(result.destiny + ' | ' + mission)
                $('#hourEntOm').val(result.hour_ent ? moment(result.hour_ent).format(
                    'DD-MM-YYYY HH:mm') : 'Está fora da OM')
                $('#hourSaiOm').val(moment(result.hour_sai).format('DD-MM-YYYY HH:mm'))
                $('#obsOm').val(result.obs ? result.obs : 'Sem observações')

                $("#e-f-om").css("display", "block")
                $("#e-f-oom").css("display", "none")
                $("#e-f-civil").css("display", "none")
                break;
            case 'oom':
                $('#title').html('<i class="fas fa-car mr-1"></i> Veículo de outra OM')

                $('#nameMotOom').val(result.pg_mot + ' ' + result.name_mot)
                $('#nameSegOom').val(result.pg_seg + ' ' + result.name_seg)
                $('#modVtrOom').val(result.mod_veicle)
                $('#ebPlacaOom').val(result.placaeb)
                $('#idtMilOom').val(result.idt)
                $('#omOom').val(result.om)
                $('#destinyOom').val(result.destiny)
                $('#hourEntOom').val(moment(result.hour_ent).format('DD-MM-YYYY HH:mm'))
                $('#hourSaiOom').val(result.hour_sai ? moment(result.hour_sai).format(
                    'DD-MM-YYYY HH:mm') : 'Dentro da OM')
                $('#obsOom').val(result.obs ? result.obs : 'Sem observações')

                $("#e-f-om").css("display", "none")
                $("#e-f-oom").css("display", "block")
                $("#e-f-civil").css("display", "none")
                break;
            case 'civil':
                $('#e_nameMotCivilRel').val(result.name_mot)
                $('#e_docCivilRel').val(result.idt)
                $('#e_modVeiCivilRel').val(result.mod_veicle)
                $('#e_placaCivilRel').val(result.placaeb)
                $('#e_qtdPassCivilRel').val(result.passengers)
                $('#e_destinyCivilRel').val(result.destiny)
                $('#e_obsCivilRel').summernote('code', result.obs)
                $('#e_hourEntCivilRel').val(moment(result.hour_ent).format('DD-MM-YYYY HH:mm'))
                result.hour_sai ? $('#e_hourSaiCivilRel').val(moment(result.hour_sai).format('DD-MM-YYYY HH:mm')) : ''

                $("#e-f-om").css("display", "none")
                $("#e-f-oom").css("display", "none")
                $("#e-f-civil").css("display", "block")
                break;
        }
    })
    $('#edit-register-gda').modal('show')

}
function EditRegisterCivil() {
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 4000
    });
    const formData = new FormData(document.getElementById('form-civil'))

    // Verificação
    if (formData.get('nameMotCivilRel') == '' || formData.get('nameMotCivilRel').length > 200) {
        $('#nameMotCivilRel').addClass('is-invalid');
        return false;
    } else {
        $('#nameMotCivilRel').removeClass('is-invalid');
    }

    if (formData.get('docCivilRel') == '' || formData.get('docCivilRel').length > 15) {
        $('#docCivilRel').addClass('is-invalid');
        return false;
    } else {
        $('#docCivilRel').removeClass('is-invalid');
    }

    if (formData.get('modVeiCivilRel') == '' || formData.get('modVeiCivilRel').length > 200) {
        $('#modVeiCivilRel').addClass('is-invalid');
        return false;
    } else {
        $('#docCivilRel').removeClass('is-invalid');
    }

    if (formData.get('placaCivilRel') == '' || formData.get('placaCivilRel').length > 15) {
        $('#placaCivilRel').addClass('is-invalid');
        return false;
    } else {
        $('#placaCivilRel').removeClass('is-invalid');
    }

    if (formData.get('qtdPassCivilRel') == '') {
        $('#qtdPassCivilRel').addClass('is-invalid');
        return false;
    } else {
        $('#qtdPassCivilRel').removeClass('is-invalid');
    }


    if (formData.get('destinyCivilRel') == '' || formData.get('destinyCivilRel').length > 15) {
        $('#destinyCivilRel').addClass('is-invalid');
        return false;
    } else {
        $('#destinyCivilRel').removeClass('is-invalid');
    }

    var values = {
        nameMot: formData.get('nameMotCivilRel'),
        doc: formData.get('docCivilRel'),
        modVtr: formData.get('modVeiCivilRel'),
        placaVtr: formData.get('placaCivilRel'),
        qtdPass: formData.get('qtdPassCivilRel'),
        destiny: formData.get('destinyCivilRel'),
        obs: formData.get('obsCivilRel'),
        hourEnt: $('#hourSai').val(),
        vtrType: $('#veicle_type').val()
    }

    const URL = '/register_relgda'

    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        url: URL,
        type: 'POST',
        data: values,
        dataType: 'text',
        success: function (data) {
            switch (data) {
                case 'veicle':
                    Toast.fire({
                        icon: 'warning',
                        title: '&nbsp&nbsp Este veículo já está registrado.'
                    });
                    break;
                default:
                    Toast.fire({
                        icon: 'success',
                        title: '&nbsp&nbsp Veículo registrado.'
                    });
                    $('#register-vtr ').modal('hide');
                    selectVtrType('')
                    $('#form-civil')[0].reset();
                    $('#obsCivilRel').summernote('code', '');
                    $("#table").DataTable().clear().draw();
                    selectVtrType('')
                    contRel()
                    break;
            }
        },

        error: function (data) {
            Toast.fire({
                icon: 'error',
                title: '&nbsp&nbsp Erro ao registrar.'
            });
        }
    });

}
function EditRegisterOom() {
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 4000
    });

    const formData = new FormData(document.getElementById('form-oom'))


    if (formData.get('pgSegOomRel') == '') {
        $('#pgSegOomRel').addClass('is-invalid');
        return false;
    } else {
        $('#pgSegOomRel').removeClass('is-invalid');
    }

    if (formData.get('nameSegOomRel') == '' || formData.get('nameSegOomRel').length > 200) {
        $('#nameSegOomRel').addClass('is-invalid');
        return false;
    } else {
        $('#nameSegOomRel').removeClass('is-invalid');
    }

    if (formData.get('idtMilOomRel') == '' || formData.get('idtMilOomRel').length > 15) {
        $('#idtMilOomRel').addClass('is-invalid');
        return false;
    } else {
        $('#idtMilOomRel').removeClass('is-invalid');
    }

    if (formData.get('modVtrOomRel') == '' || formData.get('modVtrOomRel').length > 200) {
        $('#modVtrOomRel').addClass('is-invalid');
        return false;
    } else {
        $('#modVtrOomRel').removeClass('is-invalid');
    }

    if (formData.get('ebPlacaOomRel') == '' || formData.get('ebPlacaOomRel').length > 15) {
        $('#ebPlacaOomRel').addClass('is-invalid');
        return false;
    } else {
        $('#ebPlacaOomRel').removeClass('is-invalid');
    }

    if (formData.get('omOomRel') == '' || formData.get('omOomRel').length > 15) {
        $('#omOomRel').addClass('is-invalid');
        return false;
    } else {
        $('#omOomRel').removeClass('is-invalid');
    }

    if (formData.get('destinyOomRel') == '' || formData.get('destinyOomRel').length > 200) {
        $('#destinyOomRel').addClass('is-invalid');
        return false;
    } else {
        $('#destinyOomRel').removeClass('is-invalid');
    }

    var values = {
        pgMot: formData.get('pgMotOomRel'),
        nameMot: formData.get('nameMotOomRel'),
        pgSeg: formData.get('pgSegOomRel'),
        nameSeg: formData.get('nameSegOomRel'),
        idtMil: formData.get('idtMilOomRel'),
        modVtr: formData.get('modVtrOomRel'),
        ebPlaca: formData.get('ebPlacaOomRel'),
        om: formData.get('omOomRel'),
        destiny: formData.get('destinyOomRel'),
        obs: formData.get('obsOomRel'),
        hourEnt: $('#hourSai').val(),
        vtrType: $('#veicle_type').val()
    }

    const URL = '/register_relgda'

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
                        title: '&nbsp&nbsp Esta viatura já está registrada.'
                    });
                    break;
                default:
                    Toast.fire({
                        icon: 'success',
                        title: '&nbsp&nbsp Viatura de outra OM registrada.'
                    });
                    $('#register-vtr ').modal('hide');
                    $('#form-oom')[0].reset();
                    $('#obsOomRel').summernote('code', '');
                    $("#table").DataTable().clear().draw();
                    selectVtrType('')
                    contRel()


                    break;
            }
        },

        error: function (data) {
            Toast.fire({
                icon: 'error',
                title: '&nbsp&nbsp Erro ao registrar.'
            });
        }
    });
}
function EditRegisterOm() {
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 4000
    });
    const formData = new FormData(document.getElementById('form-om'))

    // Verificação
    if (formData.get('nrFichaRel') == '') {
        $('#nrFichaRel').addClass('is-invalid');
        return false;
    } else {
        $('#nrFichaRel').removeClass('is-invalid');
    }

    if (formData.get('pgMotRel') == '') {
        $('#pgMotRel').addClass('is-invalid');
        return false;
    } else {
        $('#pgMotRel').removeClass('is-invalid');
    }

    if (formData.get('nameMotRel') == '' || formData.get('nameMotRel').length > 200) {
        $('#nameMotRel').addClass('is-invalid');
        return false;
    } else {
        $('#nameMotRel').removeClass('is-invalid');
    }

    if (formData.get('pgSegRel') == '') {
        $('#pgSegRel').addClass('is-invalid');
        return false;
    } else {
        $('#pgSegRel').removeClass('is-invalid');
    }

    if (formData.get('nameSegRel') == '' || formData.get('nameSegRel').length > 200) {
        $('#nameSegRel').addClass('is-invalid');
        return false;
    } else {
        $('#nameSegRel').removeClass('is-invalid');
    }

    if (formData.get('modVtrRel') == '' || formData.get('modVtrRel').length > 200) {
        $('#modVtrRel').addClass('is-invalid');
        return false;
    } else {
        $('#modVtrRel').removeClass('is-invalid');
    }

    if (formData.get('ebPlacaRel') == '' || formData.get('ebPlacaRel').length > 15) {
        $('#ebPlacaRel').addClass('is-invalid');
        return false;
    } else {
        $('#ebPlacaRel').removeClass('is-invalid');
    }

    if (formData.get('odSaiRel') == '' || formData.get('odSaiRel').length > 150) {
        $('#odSaiRel').addClass('is-invalid');
        return false;
    } else {
        $('#odSaiRel').removeClass('is-invalid');
    }

    if (formData.get('destinyRel') == '' || formData.get('destinyRel').length > 150) {
        $('#destinyRel').addClass('is-invalid');
        return false;
    } else {
        $('#destinyRel').removeClass('is-invalid');
    }

    var values = {
        nrFicha: formData.get('nrFichaRel'),
        pgMot: formData.get('pgMotRel'),
        nameMot: formData.get('nameMotRel'),
        nameMot: formData.get('nameMotRel'),
        pgSeg: formData.get('pgSegRel'),
        nameSeg: formData.get('nameSegRel'),
        modVtr: formData.get('modVtrRel'),
        ebPlaca: formData.get('ebPlacaRel'),
        odSai: formData.get('odSaiRel'),
        destiny: formData.get('destinyRel'),
        obs: formData.get('obsRel'),
        vtrType: $('#vtrTypeRel').val(),
        hourSai: $('#hourSai').val(),
    }

    const URL = '/register_relgda'

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
                        title: '&nbsp&nbsp Esta viatura já está registrada.'
                    });
                    break;
                default:
                    Toast.fire({
                        icon: 'success',
                        title: '&nbsp&nbsp Saída de viatura registrada.'
                    });
                    $('#register-vtr ').modal('hide');
                    $('#form-om')[0].reset();
                    $('#obsRel').summernote('code', '');
                    $("#table").DataTable().clear().draw();
                    selectVtrType('')
                    contRel()


                    break;
            }
        },

        error: function (data) {
            Toast.fire({
                icon: 'error',
                title: '&nbsp&nbsp Erro ao registrar.'
            });
        }
    });
}

function EditRegisterVtr(type) {
    switch (type) {
        case 'civil':
            EditRegisterCivil()
            break;
        case 'oom':
            EditRegisterOom()
            break;
        case 'om':
            EditRegisterOm()
            break;
        default:
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 4000
            });
            Toast.fire({
                icon: 'warning',
                title: '&nbsp&nbsp Nenhuma registro escolhida.'
            });
            break;
    }
}







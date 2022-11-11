function checkTime(i) {
    if (i < 10) { i = "0" + i };  // add zero in front of numbers < 10
    return i;
}

function selectVtrType(value) {
    var today = new Date();
    var dmy = today.toLocaleDateString()
    var h = today.getHours();
    var m = today.getMinutes();
    h = checkTime(h);
    m = checkTime(m);

    // Mostrando data no campo
    $('#_hora').val(dmy + ' ' + h + ':' + m)
    $('#hourSai').val(dmy + ' ' + h + ':' + m)



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

    // var values = {
    //     typeMission: formData.get('typeMission'),
    //     nameMission: formData.get('nameMission'),
    //     destinyMission: formData.get('destinyMission'),
    //     classMission: formData.get('classMission'),
    //     vtrMission: formData.get('vtrMission'),
    //     docMission: formData.get('docMission'),
    //     originMission: formData.get('originMission'),
    //     // pgMotMission: formData.get('pgMotMission'),
    //     // nameMotMission: formData.get('nameMotMission'),
    //     pgSegMission: formData.get('pgSegMission'),
    //     nameSegMission: formData.get('nameSegMission'),
    //     datePrevPartMission: formData.get('datePrevPartMission'),
    //     datePrevChgdMission: formData.get('datePrevChgdMission'),
    //     contactCmtMission: formData.get('contactCmtMission'),
    //     obsMission: formData.get('obsMission')
    // }

    // const URL = '/register_mission'

    // $.ajax({
    //     headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
    //     url: URL,
    //     type: 'POST',
    //     data: values,
    //     dataType: 'text',
    //     success: function (data) {
    //         Toast.fire({
    //             icon: 'success',
    //             title: '&nbsp&nbsp Missão adicionada com sucesso.'
    //         });

    //         $('#register-mission').modal('hide');
    //         $('#form-register-mission')[0].reset();
    //         $('#obsMission').summernote('code', '');
    //         $("#table").DataTable().clear().draw();
    //     },

    //     error: function (data) {
    //         Toast.fire({
    //             icon: 'error',
    //             title: '&nbsp&nbsp Erro ao cadastrar.'
    //         });
    //     }
    // });
}
function registerOom() {
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 4000
    });
    const formData = new FormData(document.getElementById('form-oom'))

    // Verificação
    if (formData.get('pgMotOomRel') == '') {
        $('#pgMotOomRel').addClass('is-invalid');
        return false;
    } else {
        $('#pgMotOomRel').removeClass('is-invalid');
    }

    if (formData.get('nameMotOomRel') == '' || formData.get('nameMotOomRel').length > 200) {
        $('#nameMotOomRel').addClass('is-invalid');
        return false;
    } else {
        $('#nameMotOomRel').removeClass('is-invalid');
    }

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
                    $('#veicle_type').val('')
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
                    $('#veicle_type').val('')
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
function closeRegister(id) {
    var today = new Date();
    var dmy = today.toLocaleDateString()
    var h = today.getHours();
    var m = today.getMinutes();
    h = checkTime(h);
    m = checkTime(m);
    $('#close-register-modal').modal('show')
    // Mostrando data no campo
    $('#ent_hora').val(dmy + ' ' + h + ':' + m)
    $('#hourEnt').val(dmy + ' ' + h + ':' + m)
    $('#idResgister').val(id)
}





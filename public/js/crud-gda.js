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
            $("#f-om").css("display", "block")
            $("#f-civil").css("display", "none")
            $("#f-oom").css("display", "none")
            break;
        default:
            $("#f-civil").css("display", "none")
            $("#f-oom").css("display", "none")
            $("#form-vtr-om").css("display", "none")

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
        $('#idVtrRel').val(result.vtrinfo.id)
        $('#idMissionRel').val(result.id_mission)

        if (result.missioninfo) {
            $('#destinyRel').val(result.missioninfo.destiny + " | " + result.missioninfo.mission_name)
        } else {
            $('#destinyRel').val('Viatura de serviço')

        }
    })
}

function registerCivil() {
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
    if (formData.get('docMission') == '' || formData.get('docMission').length > 200) {
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
function registerOom() {
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
    if (formData.get('docMission') == '' || formData.get('docMission').length > 200) {
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

    if (formData.get('obsRel') == '') {
        $('#obsRel').addClass('is-invalid');
        return false;
    } else {
        $('#obsRel').removeClass('is-invalid');
    }

    var values = {
        nrFicha: formData.get('nrFichaRel'),
        pgMotRel: formData.get('pgMotRel'),
        nameMotRel: formData.get('nameMotRel'),
        nameMotRel: formData.get('nameMotRel'),
        pgSegRel: formData.get('pgSegRel'),
        nameSegRel: formData.get('nameSegRel'),
        modVtrRel: formData.get('modVtrRel'),
        ebPlacaRel: formData.get('ebPlacaRel'),
        odSaiRel: formData.get('odSaiRel'),
        destinyRel: formData.get('destinyRel'),
        obsRel: formData.get('obsRel'),
        vtrTypeRel: formData.get('vtrTypeRel'),
        idMissionRel: formData.get('idMissionRel'),
        idVtrRel: formData.get('idVtrRel'),
        hourSai: formData.get('hourSai'),
    }

    console.log(values)

    // const URL = '/register_relgda'

    // $.ajax({
    //     headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
    //     url: URL,
    //     type: 'POST',
    //     data: values,
    //     dataType: 'text',
    //     success: function (data) {
    //         Toast.fire({
    //             icon: 'success',
    //             title: '&nbsp&nbsp Saída de viatura registrada.'
    //         });

    //         $('#register-vtr ').modal('hide');
    //         $('#form-om')[0].reset();
    //         $('#obsRel').summernote('code', '');
    //         $("#table").DataTable().clear().draw();
    //     },

    //     error: function (data) {
    //         Toast.fire({
    //             icon: 'error',
    //             title: '&nbsp&nbsp Erro ao registrar.'
    //         });
    //     }
    // });
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



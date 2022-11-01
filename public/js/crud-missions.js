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
    }
    if (formData.get('nameMission') == '') {
        $('#nameMission').addClass('is-invalid');
        return false;
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
            $('#obsMission').summernote().code('');
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










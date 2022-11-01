function registerMission() {
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 4000
    });
    const formData = new FormData(document.getElementById('form-register-mission'))
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
        datePrevPartMission: formData.get('dataPrevPartMission'),
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

            // if (data == "error") {

            //     Toast.fire({
            //         icon: 'error',
            //         title: '&nbsp&nbsp Os campos com * são obrigatórios.'
            //     });
            // } else if (data == 'errorcheckMil') {
            //     Toast.fire({
            //         icon: 'error',
            //         title: '&nbsp&nbsp Esse (Ex)Militar já está cadastrado.'
            //     });
            // } else if (data == 'godfather') {
            //     Toast.fire({
            //         icon: 'error',
            //         title: '&nbsp&nbsp Já existe um militar com este padrinho.'
            //     });
            // } else if (data == 'godfather2') {
            //     Toast.fire({
            //         icon: 'error',
            //         title: '&nbsp&nbsp Já existe um militar com este substituto do padrinho.'
            //     });
            // } else {
            //     $("#register").modal('hide');
            //     $("#table").DataTable().clear().draw(6);
            //     Toast.fire({
            //         icon: 'success',
            //         title: '&nbsp&nbsp (Ex) Militar cadastrado(a) com sucesso.'
            //     });

            //     $('#form-adido')[0].reset();
            //     $(".new_menu").summernote('code', '');
            // }

            Toast.fire({
                icon: 'success',
                title: '&nbsp&nbsp Missão adicionada com sucesso.'
            });


            $('#register-mission').modal('hide');
            $('#form-register-mission')[0].reset();
            $("#table_apps").DataTable().clear().draw();



        },

        error: function (data) {
            Toast.fire({
                icon: 'error',
                title: '&nbsp&nbsp Erro ao cadastrar.'
            });
        }
    });
}










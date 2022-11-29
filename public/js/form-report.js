function saveReport() {

    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 4000
    });
    const formData = new FormData(document.getElementById('form-report'))

    // Verificação
    // if (formData.get('dateFinish') == '') {
    //     $('#dateFinish').addClass('is-invalid');
    //     return false;
    // } else {
    //     $('#dateFinish').removeClass('is-invalid');
    // }

    // if (formData.get('kiloGram') == '') {
    //     $('#kiloGram').addClass('is-invalid');
    //     return false;
    // } else {
    //     $('#kiloGram').removeClass('is-invalid');
    // }

    // if (formData.get('metersCub') == '') {
    //     $('#metersCub').addClass('is-invalid');
    //     return false;
    // } else {
    //     $('#metersCub').removeClass('is-invalid');
    // }

    // if (formData.get('consGas') == '') {
    //     $('#consGas').addClass('is-invalid');
    //     return false;
    // } else {
    //     $('#consGas').removeClass('is-invalid');
    // }

    // if (formData.get('consDiesel') == '') {
    //     $('#consDiesel').addClass('is-invalid');
    //     return false;
    // } else {
    //     $('#consDiesel').removeClass('is-invalid');
    // }

    // if (formData.get('altMission') == '') {
    //     $('#altMission').addClass('is-invalid');
    //     return false;
    // } else {
    //     $('#altMission').removeClass('is-invalid');
    // }

    // if ($('#sendReport').val() == '') {
    //     2
    //     $('#sendReport').addClass('is-invalid');
    //     return false;
    // } else {
    //     $('#sendReport').removeClass('is-invalid');
    // }

    var values = {
        id: formData.get('id_mission'),
        dateFinish: formData.get('dateFinish'),
        kiloGram: formData.get('kiloGram').replace(/_/g, ''),
        metersCub: formData.get('metersCub').replace(/_/g, ''),
        consGas: formData.get('consGas').replace(/_/g, ''),
        consDiesel: formData.get('consDiesel').replace(/_/g, ''),
        altMission: formData.get('altMission'),
        obsMission: formData.get('obsMission'),
        sendReport: $('#sendReport').val(),
    }
    const URL = '/save_report_cmt_mission'

    bootbox.confirm({
        title: 'Deseja salvar este relatório de missão?',
        message: '<strong>Após salvar você não poderá editar os dados preenchidos.</strong><br> Você optou por não receber este relatório em seu Email ou WhatsApp.',
        callback: function (confirmacao) {

            if (confirmacao)
                $('#form').remove()
            $("#send-loading").addClass('loading').append(
                '<div class="load-block"><div class="c-loader"></div></div>'
            );
            $.ajax({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                url: URL,
                type: 'POST',
                data: values,
                dataType: 'text',
                success: function (result) {
                    $("#send-loading").addClass('loading').append(
                        '<div class="load-block"><i class="fs-50 fa fa-check"></i></div>'
                    );

                    setTimeout(() => {
                        $("#send-loading").remove()
                        //     $('#dateFinMission').text(formData.get('dateFinish'))
                        //     $('#kg').text(formData.get('kiloGram').replace(/_/g, ''))
                        //     $('#m3').text(formData.get('metersCub').replace(/_/g, ''))
                        //     $('#conGas').text(formData.get('consGas').replace(/_/g, ''))
                        //     $('#conDiesel').text(formData.get('consDiesel').replace(/_/g, ''))
                        //     $('#alt').text(formData.get('altMission') == 1 ? "Sim " : "Não")
                        //     $('#obs').html(formData.get('obsMission') ? formData.get('obsMission') : 'Sem observações')
                        //     $('#panelInfoCon').removeClass('d-none')
                    }, 1500);
                },

                error: function (data) {
                    Toast.fire({
                        icon: 'error',
                        title: '&nbsp&nbsp Erro ao registrar.'
                    });
                }
            })
        },
        buttons: {
            cancel: {
                label: 'Cancelar',
                className: 'btn-default'
            },
            confirm: {
                label: 'Salvar',
                className: 'btn-success'
            }

        }
    });
}

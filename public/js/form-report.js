


function printReport(id) {
    const URL = '/relatorio/print/' + id
    $.ajax({
        url: URL,
        type: 'GET',
        success: function (result) {

            // var name = config.exportOptions.fullNameUser.toUpperCase();
            // var professionalName = config.exportOptions.nameUser.toUpperCase();
            // var fullname = name.replace(professionalName, professionalName.bold());



            var html = 'teste'












































            var a = window.open('', '', 'height=700, width=700');
            a.document.write('<html><body>');
            a.document.write(
                "<style>@media print {@page {margin-top: 0; margin-bottom: 0;}body {padding-top: 25px;padding-bottom: 72px ;} html, * {margin: 0; padding: 0;}body{font- family: 'calibri light', calibri, arial, sans - serif;}body-content{margin - bottom: 40px;}footer.fixar - rodape{border - top: 1px solid #333;bottom: 0;left: 0;height: 40px;position: fixed;width: 100 %;} </style><table align='center' cellpadding='0' cellspacing='0' class='cabecalho' id='cabecalho' style='font-family:times new roman; font-size:12pt;margin-bottom:1cm; margin-top:0cm; width:100%'><tbody><tr><td style='text-align:center'><img width='200' src='/img/republica.png' /></td></tr><tr><td style='text-align:center'><strong>MINIST&Eacute;RIO DA DEFESA</strong></td></tr><tr><td style='text-align:center'><strong>EX&Eacute;RCITO BRASILEIRO</strong></td></tr><tr><td style='text-align:center'><strong>3&ordm; BATALH&Atilde;O DE SUPRIMENTO</strong></td></tr><tr><td style='text-align:center'><strong>(BATALH&Atilde;O MARECHAL BITENCOURT)</strong></td></tr><tr><td style='text-align:center'><strong><br><br>Relatório da missão XXXXXXXX</strong></td></tr></tbody></table>" +
                html +
                '<div><div style="font-family:times new roman; font-size:12pt; margin-left:0cm; margin-right:0.1cm; margin-top:3cm"><div><div class="topico_nome" style="text-align:center">_______________________________ <br><br>Eduardo - Cb</div><div><div class="funcao-signatario" style="text-align:center">Chefe de viatura</div></div></div><div style="font:bolder 12pt Times New Roman; margin-bottom:0; margin-left:0; margin-right:0; margin-top:1cm; text-align:center">&nbsp;</div></div></div>'
            );
            a.document.write('</body></html>');
            a.document.close();
            a.print();

        },

        error: function (data) {
            window.close()
        }
    })

}

function saveReport() {
    const formData = new FormData(document.getElementById('form-report'))

    // // Verificação
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

    return printReport(values.id)
    // const URL = '/save_report_cmt_mission'

    // bootbox.confirm({
    //     title: 'Deseja salvar este relatório de missão?',
    //     message: '<strong>Após salvar você não poderá editar os dados preenchidos.</strong><br> Você optou por não receber este relatório em seu Email ou WhatsApp.',
    //     callback: function (confirmacao) {
    //         if (confirmacao) {
    //             $('#form').addClass('d-none')
    //             $("#send-loading").addClass('loading').append('<div class="load-block border-s"><div class="c-loader"></div></div>')
    // $.ajax({
    //     headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
    //     url: URL,
    //     type: 'POST',
    //     data: values,
    //     dataType: 'text',
    //     success: function (result) {
    // $("#send-loading").addClass('loading').append('<div class="load-block border-s"><i class="fs-50 fa fa-check"></i></div>')
    // setTimeout(() => {
    //     $('#dateFinMission').text(formData.get('dateFinish'))
    //     $('#kg').text(formData.get('kiloGram').replace(/_/g, '') + ' Kg')
    //     $('#m3').text(formData.get('metersCub').replace(/_/g, '') + ' m')
    //     $('#conGas').text(formData.get('consGas').replace(/_/g, '') + ' L')
    //     $('#conDiesel').text(formData.get('consDiesel').replace(/_/g, '') + ' L')
    //     $('#alt').text(formData.get('altMission') == 1 ? "Sim " : "Não")
    //     $('#obs').html(formData.get('obsMission') ? formData.get('obsMission') : 'Sem observações')
    //     $('#panelInfoCon').removeClass('d-none')
    //     $("#send-loading").remove()
    //     $('#form').remove()
    //     if (values.sendReport == 3) {
    //         return printReport(values.id)
    //     }
    // }, 1500);

    //     },

    //     error: function (data) {
    //         $("#send-loading").append('<div class="load-block border-r"><i class="text-danger fs-60 fa fa-times"></i></div>')
    //         setTimeout(() => {
    //             $("#send-loading").addClass('d-none')
    //             $('#form').removeClass('d-none')
    //         }, 1500);

    //     }
    // })
    // }
    //     },
    //     buttons: {
    //         cancel: {
    //             label: 'Cancelar',
    //             className: 'btn-default'
    //         },
    //         confirm: {
    //             label: 'Salvar',
    //             className: 'btn-success'
    //         }

    //     }
    // });

}

<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script>
    function createFichaSisLogMnt() {
        data = {
            eb: '',
            pg_motorista: '',
            pg_ch_vtr: '',
            motorista: '',
            ch_vtr: '',
            pg_por_ordem_de: '',
            por_ordem_de: '',
            local: '',
            dt_prev_saida_viatura: '',
            hora_prev_saida: '',
            missao: '',
            itinerario: '',
            od_saida: '',
            operacao: '',
            cod_modelo_vtr: '',
            apres_a: '',
        }

        // var Toast = Swal.mixin({
        //     toast: true,
        //     position: 'top-end',
        //     showConfirmButton: false,
        //     timer: 4000
        // });
        // const formData = new FormData(document.getElementById('form-om'))

        // // Verificação
        // if (formData.get('nrFichaRel') == '') {
        //     $('#nrFichaRel').addClass('is-invalid');
        //     return false;
        // } else {
        //     $('#nrFichaRel').removeClass('is-invalid');
        // }


        const URL = 'http://sislogmnt.eb.mil.br/index.php?nomeArquivo=gravar_ficha_saida.php'
        data = {
            eb: 'EB3414185100',
            pg_motorista: 'Cb',
            motorista: 'Eduardo',
            pg_ch_vtr: '',
            ch_vtr: '',
            pg_por_ordem_de: 'Cap',
            por_ordem_de: 'Silva Lara',
            local: 'Teste',
            dt_prev_saida_viatura: '14/12/22',
            hora_prev_saida: '08:00',
            missao: 'teste',
            itinerario: 'teste',
            od_saida: '12345',
            operacao: '1',
            cod_modelo_vtr: '24',
            apres_a: '',
        }

        $.ajax({
            headers: {
                'Access-Control-Allow-Origin': 'http://sislogmnt.eb.mil.br',

            },
            url: URL,
            type: 'POST',
            data: data,
            dataType: 'text',
            success: function(result) {
                $('#erro').text(result)
                console.log(result)

            },

            error: function(result) {
                // Toast.fire({
                //     icon: 'error',
                //     title: '&nbsp&nbsp Erro ao registrar.'
                // });
                $('#erro').text(result)
                console.log(result)
            }
        });
    }
</script>
<div id='erro'></div>
<button onclick="return createFichaSisLogMnt()">ENVIAR</button>

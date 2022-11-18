@section('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
<!-- Perfil usuario -->
<div class="modal fade" id="info-register" tabindex="-1" role="dialog" aria-labelledby="info-register" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="info-register">Informações do registro </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                    <div class="m-b-10 card-header">
                                        <h3 id="title" class="card-title card-title-background "></h3>
                                        <span id="registred_for" class="float-r m-t-10"> </span>
                                    </div>
                                    <div id="infoCivil" style="display: none">
                                        <div class="float-l col-md-6">
                                            <strong>Nome do motorista</strong>

                                            <p id="nameMotCivil" class="m-l-10 text-muted">-</p>

                                            <hr>

                                            <strong>Modelo veículo</strong>

                                            <p id="modVtrCivil" class="m-l-10 text-muted">-</p>

                                            <hr>

                                            <strong>Placa</strong>

                                            <p id="placaCivil" class="m-l-10 text-muted">-</p>

                                            <hr>

                                            <strong>CPF/RG/CNH</strong>

                                            <p id="idtCivil" class="m-l-10 text-muted">-</p>
                                            <hr>

                                            <strong>Qtd. passageiros</strong>

                                            <p id="qtdPassCivil" class="m-l-10 text-muted">-</p>





                                        </div>
                                        <div class=" float-r col-md-6">
                                            <strong>Destino</strong>

                                            <p id="destinyCivil" class="m-l-10 text-muted">-</p>
                                            <hr>
                                            <strong>Horário de entrada</strong>

                                            <p id="hourEntCivil" class="m-l-10 text-muted">-</p>

                                            <hr>

                                            <strong>Horário de saída</strong>
                                            <p id="hourSaiCivil" class="m-l-10 text-muted">-</p>

                                            <hr>

                                            <strong>Obs</strong>

                                            <p id="obsCivil" class="m-l-10 text-muted">-</p>
                                        </div>
                                    </div>

                                    <div id="infoOom" style="display: none">
                                        <div class="float-l col-md-6">
                                            <strong>Nome do motorista</strong>

                                            <p id="nameMotOom" class="m-l-10 text-muted">-</p>

                                            <hr>

                                            <strong>Nome do segurança</strong>

                                            <p id="nameSegOom" class="m-l-10 text-muted">-</p>

                                            <hr>

                                            <strong>Modelo veículo</strong>

                                            <p id="modVtrOom" class="m-l-10 text-muted">-</p>

                                            <hr>

                                            <strong>Placa/EB</strong>

                                            <p id="ebPlacaOom" class="m-l-10 text-muted">-</p>

                                            <hr>

                                            <strong>Idt militar mais antigo</strong>

                                            <p id="idtMilOom" class="m-l-10 text-muted">-</p>



                                        </div>
                                        <div class="float-r col-md-6">

                                            <strong>OM</strong>

                                            <p id="omOom" class="m-l-10 text-muted">-</p>
                                            <strong>Destino</strong>
                                            <p id="destinyOom" class="m-l-10 text-muted">-</p>

                                            <hr>

                                            <strong>Horário de entrada</strong>

                                            <p id="hourEntOom" class="m-l-10 text-muted">-</p>

                                            <hr>

                                            <strong>Horário de saída</strong>

                                            <p id="hourSaiOom" class="m-l-10 text-muted">-</p>

                                            <hr>


                                            <strong>Obs</strong>

                                            <p id="obsOom" class="m-l-10 text-muted">-</p>
                                        </div>
                                    </div>

                                    <div id="infoVtrOm" style="display: none">
                                        <div class="float-l col-md-6">
                                            <strong>Ficha</strong>

                                            <p id="nrFichaOm" class="m-l-10 text-muted">-</p>

                                            <hr>

                                            <strong>Nome do motorista</strong>

                                            <p id="nameMotOm" class="m-l-10 text-muted">-</p>

                                            <hr>

                                            <strong>Nome do segurança</strong>

                                            <p id="nameSegOm" class="m-l-10 text-muted">-</p>

                                            <hr>

                                            <strong>Modelo veículo</strong>

                                            <p id="modVtrOm" class="m-l-10 text-muted">-</p>

                                            <hr>

                                            <strong>Placa/EB</strong>

                                            <p id="ebPlacaOm" class="m-l-10 text-muted">-</p>
                                            <hr>
                                            <strong>Destino / Missão</strong>

                                            <p id="destinyOm" class="m-l-10 text-muted">-</p>


                                        </div>
                                        <div class="float-r col-md-6">


                                            <strong>Horário de saída</strong>

                                            <p id="hourSaiOm" class="m-l-10 text-muted">-</p>

                                            <hr>
                                            <strong>Horário de entrada</strong>

                                            <p id="hourEntOm" class="m-l-10 text-muted">-</p>

                                            <hr>
                                            <strong>Odômetro de entrada</strong>
                                            <p id="odEntOm" class="m-l-10 text-muted">-</p>
                                            <hr>
                                            <strong>Odômetro de saída</strong>
                                            <p id="odSaiOm" class="m-l-10 text-muted">-</p>

                                            <hr>
                                            <strong>Km(s) rodados</strong>
                                            <p id="odTotalSaiOm" class="m-l-10 text-muted">-</p>

                                            <hr>

                                            <strong>Obs</strong>

                                            <p id="obsOm" class="m-l-10 text-muted">-</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>

            </div>
        </div>
    </div>
</div>
{{-- SCRIPTS --}}
<script>
    $('#info-register').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var modal = $(this);
        var url = "{{ url('get_info_register') }}/" + id;
        $.get(url, function(result) {
            var registredEnt = result.user_rel_ent ? result.user_rel_ent :
                '&nbsp&nbsp &nbsp&nbsp - &nbsp&nbsp &nbsp&nbsp '
            var registredSai = result.user_rel_sai ? result.user_rel_sai :
                '&nbsp&nbsp &nbsp&nbsp  - &nbsp&nbsp &nbsp&nbsp '
            $('#registred_for').html('Entrada: ' + registredEnt + ' | Saida: ' + registredSai)
            switch (result.type_veicle) {
                case 'op':
                case 'adm':
                    $('#title').html('<i class="fas fa-car mr-1"></i> Veículo desta OM')
                    const mission = result.ficha.missioninfo ? result.ficha.missioninfo.mission_name :
                        "Missão interna"
                    modal.find('#nrFichaOm').html(result.ficha.nr_ficha +
                        '<button class="float-r m-r-30 btn btn-sm btn-success" data-toggle="modal" data-target="#info-ficha" data-id="' +
                        result
                        .ficha.id +
                        '">Ver</button>')
                    modal.find('#nameMotOm').text(result.pg_mot + ' ' + result.name_mot)
                    modal.find('#nameSegOm').text(result.pg_seg + ' ' + result.name_seg)
                    modal.find('#modVtrOm').text(result.mod_veicle)
                    modal.find('#ebPlacaOm').text(result.placaeb)
                    modal.find('#destinyOm').text(result.destiny + ' | ' + mission)
                    modal.find('#hourEntOm').text(result.hour_ent ? moment(result.hour_ent).format(
                        'DD-MM-YYYY HH:mm') : 'Está fora da OM')
                    modal.find('#hourSaiOm').text(moment(result.hour_sai).format('DD-MM-YYYY HH:mm'))
                    modal.find('#odEntOm').text(result.od_ent ? result.od_ent : 'Está fora da OM')
                    modal.find('#odSaiOm').text(result.od_sai)
                    modal.find('#odTotalSaiOm').text(result.total_od + ' Km(s)')
                    modal.find('#obsOm').html(result.obs ? result.obs : 'Sem observações')

                    $("#infoVtrOm").css("display", "block")
                    $("#infoOom").css("display", "none")
                    $("#infoCivil").css("display", "none")
                    break;
                case 'oom':
                    $('#title').html('<i class="fas fa-car mr-1"></i> Veículo de outra OM')

                    modal.find('#nameMotOom').text(result.pg_mot + ' ' + result.name_mot)
                    modal.find('#nameSegOom').text(result.pg_seg + ' ' + result.name_seg)
                    modal.find('#modVtrOom').text(result.mod_veicle)
                    modal.find('#ebPlacaOom').text(result.placaeb)
                    modal.find('#idtMilOom').text(result.idt)
                    modal.find('#omOom').text(result.om)
                    modal.find('#destinyOom').text(result.destiny)
                    modal.find('#hourEntOom').text(moment(result.hour_ent).format('DD-MM-YYYY HH:mm'))
                    modal.find('#hourSaiOom').text(result.hour_sai ? moment(result.hour_sai).format(
                        'DD-MM-YYYY HH:mm') : 'Dentro da OM')

                    modal.find('#obsOom').html(result.obs ? result.obs : 'Sem observações')

                    $("#infoVtrOm").css("display", "none")
                    $("#infoOom").css("display", "block")
                    $("#infoCivil").css("display", "none")
                    break;
                case 'civil':
                    $('#title').html('<i class="fas fa-car mr-1"></i> Veículo civil')

                    modal.find('#nameMotCivil').text(result.name_mot)
                    modal.find('#modVtrCivil').text(result.mod_veicle)
                    modal.find('#placaCivil').text(result.placaeb)
                    modal.find('#idtCivil').text(result.idt)
                    modal.find('#qtdPassCivil').text(result.passengers)
                    modal.find('#destinyCivil').text(result.destiny)
                    modal.find('#hourEntCivil').text(moment(result.hour_ent).format('DD-MM-YYYY HH:mm'))
                    modal.find('#hourSaiCivil').text(result.hour_sai ? moment(result.hour_sai).format(
                        'DD-MM-YYYY HH:mm') : 'Dentro da OM')

                    modal.find('#obsCivil').html(result.obs ? result.obs : 'Sem observações')

                    $("#infoVtrOm").css("display", "none")
                    $("#infoOom").css("display", "none")
                    $("#infoCivil").css("display", "block")
                    break;
            }
        })
    });
    $('#info-register').on('hide.bs.modal', function(event) {
        var modal = $(this);
        $('#title').html('')
        modal.find('#nrFichaOm').text('-')
        modal.find('#nameMotOm').text('-')
        modal.find('#nameSegOm').text('-')
        modal.find('#modVtrOm').text('-')
        modal.find('#ebPlacaOm').text('-')
        modal.find('#destinyOm').text('-')
        modal.find('#hourEntOm').text('-')
        modal.find('#hourSaiOm').text('-')
        modal.find('#obsOm').text('-')
        modal.find('#nameMotOom').text('-')
        modal.find('#nameSegOom').text('-')
        modal.find('#modVtrOom').text('-')
        modal.find('#ebPlacaOom').text('-')
        modal.find('#idtMilOom').text('-')
        modal.find('#omOom').text('-')
        modal.find('#destinyOom').text('-')
        modal.find('#hourEntOom').text('-')
        modal.find('#hourSaiOom').text('-')
        modal.find('#obsOom').text('-')
        modal.find('#nameMotCivil').text('-')
        modal.find('#modVtrCivil').text('-')
        modal.find('#placaCivil').text('-')
        modal.find('#idtCivil').text('-')
        modal.find('#qtdPassCivil').text('-')
        modal.find('#destinyCivil').text('-')
        modal.find('#hourEntCivil').text('-')
        modal.find('#hourSaiCivil').text('-')
        modal.find('#obsCivil').text('-')
    });
</script>

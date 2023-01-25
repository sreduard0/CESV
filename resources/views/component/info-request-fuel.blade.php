<!-- Perfil usuario -->
<div class="modal fade" id="info-request-fuel" tabindex="-1" role="dialog" aria-labelledby="info-request-fuelLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content  ">
            <div class="modal-header">
                <h5 class="modal-title" id="info-request-fuelLabel">Solicitação de abastecimento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title card-title-background ">
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="float-l col-md-6">
                                <strong>Viatura</strong>

                                <p id="vtr_modal" class="text-muted">-</p>

                                <hr>

                                <strong>Odômetro</strong>

                                <p id="od_modal" class="text-muted">-</p>

                                <hr>

                                <strong>Etinerário</strong>

                                <p id="destiny_modal" class="text-muted">-</p>

                                <hr>


                                <strong>Data da solicitação</strong>

                                <p id="request_date_modal" class="text-muted">-</p>

                                <hr>

                                <strong>Solicitado por</strong>
                                <p id="request_by_modal" class="text-muted">-</p>


                                <hr>



                            </div>
                            <div class=" float-r col-md-6">
                                <strong>EB/ Placa</strong>

                                <p id="ebplaca_modal" class="text-muted">-</p>
                                <hr>

                                <strong>Missão</strong>

                                <p id="mission_modal" class="text-muted">-</p>

                                <hr>

                                <strong>Motorista</strong>

                                <p id="mot_modal" class="text-muted">-</p>

                                <hr>

                                <strong>Combustível</strong>

                                <p id="fuel_modal" class="text-muted">-</p>

                                <hr>
                                <strong>Status</strong>

                                <p id="status_modal" class="text-muted">-</p>
                                <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">

                                <strong>Observações do solicitante</strong>

                                <p id="obs_request_modal" class="text-muted">-</p>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="card" id="panelInfoAbst" style="display: none">
                    <div class="card-header">
                        <h3 class="card-title card-title-background "> <i class="fas fa-info-circle mr-1"></i>
                            Informações para abastecimento</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class=" float-l col-md-6">
                                <strong>Código de Segurança</strong>

                                <p id="cede_sec_modal" class="text-muted">-</p>

                                <hr>

                                <strong>Autorizado por</strong>

                                <p id="autorized_by_modal" class="text-muted">-</p>

                                <hr>



                            </div>
                            <div class=" float-r col-md-6">
                                <strong>Quantidade autorizada</strong>

                                <p id="qtd_autorized_modal" class="text-muted">-</p>
                                <hr>

                                <strong>Data Autorização</strong>
                                <p id="date_autorized_modal" class="text-muted">-</p>

                                <hr>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <strong>Observações do FiscAdm</strong>

                                <p id="obs_fiscadm_modal" class="text-muted">-</p>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <div class="link"></div>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

{{-- SCRIPTS --}}
<script>
    $('#info-request-fuel').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var modal = $(this);
        var url = "{{ url('info_request_fuel') }}/" + id;
        $.get(url, function(result) {
            modal.find('.card-title').text('<i class="fas fa-info-circle mr-1"></i> Ficha ' + result
                .infoficha.nr_ficha)
            modal.find('#').text(moment(result.prev_date_chgd).format('DD-MM-YYYY HH:mm'))

            if (result.finish_mission) {

                $('#dateFinMission').text(result.finish_mission)
                $('#obs').html(result.obs_alteration ? result.obs_alteration :
                    'Sem observações')

                $("#panelInfoCon").css("display", "block")

            } else {

                $("#panelInfoCon").css("display", "none")
                $(".link").html(
                    '<button title="Gerar link da missão" class="btn btn-primary" onclick="generatelink(' +
                    id + ')">Gerar link de relatório</button>'
                )


            }
        })


    });
</script>

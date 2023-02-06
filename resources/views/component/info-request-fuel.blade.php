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
                        <h3 class="card-title title card-title-background ">
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

                <div class="card" id="panelInfoDenied" style="display: none">
                    <div class="card-header">
                        <h3 class="card-title card-title-background "> <i class="fas fa-info-circle mr-1"></i>
                            Solicitação negada</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <strong>Solicitaçao negada por</strong>
                                <p id="denied_request_modal" class="text-muted">-</p>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer actions">
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
                modal.find('.title').html('<i class="fas fa-info-circle mr-1"></i> Ficha ' + result
                    .fichainfo.nr_ficha)
                modal.find('#vtr_modal').text(result.vtrinfo.mod_vtr)
                modal.find('#od_modal').text(result.od)
                modal.find('#destiny_modal').text(result.destiny)
                modal.find('#request_date_modal').text(moment(result.created_at).format(
                    'DD-MM-YYYY '))
                modal.find('#request_by_modal').text(result.request_by)
                modal.find('#ebplaca_modal').text(result.vtrinfo.ebplaca)
                if (result.missioninfo) {
                    modal.find('#mission_modal').text(result.missioninfo.mission_name)
                } else {
                    modal.find('#mission_modal').text(result.fichainfo.nat_of_serv)

                }
                modal.find('#mot_modal').text(result.motinfo.pg + ' ' + result.motinfo.name)
                modal.find('#fuel_modal').text(result.fuel ? result.fuel : 'Não especificado')
                switch (result.status) {
                    case 1:
                        modal.find('#status_modal').text('Aguardando autorização')
                        $("#panelInfoAbst").css("display", "none")
                        @if (session('CESV')['profileType'] == 4 || session('CESV')['profileType'] == 6)
                            $(".actions").html(
                                ' <button title="Negar" class="btn btn-danger" onclick="authorize(' +
                                id +
                                ',2)">Negar</button>  <button title="Autorizar" class="btn btn-success" onclick="authorize(' +
                                id +
                                ',1)">Autorizar</button>'
                            )
                        @endif
                        break;
                    case 2:
                        modal.find('#status_modal').text('Autorizado')
                        $("#panelInfoAbst").css("display", "block")
                        modal.find('#cede_sec_modal').text(result.code_auth)
                        modal.find('#autorized_by_modal').text(result.autorized_by)
                        modal.find('#qtd_autorized_modal').text(result.qnt_released + ' Litros')
                        modal.find('#date_autorized_modal').text(moment(result.updated_at).format(
                            'DD-MM-YYYY '))
                        if (result.obs_fiscadm) {
                            modal.find('#obs_fiscadm_modal').html(result.obs_fiscadm)
                        }
                        @if (session('CESV')['profileType'] == 1 || session('CESV')['profileType'] == 6)
                            $(".actions").html(
                                '<button title="Viatura abastecida" class="btn btn-success" onclick="finishRequestFuel(' +
                                id + ')">Viatura abastecida</button>'
                            )
                        @endif
                        break;
                    case 3:
                        modal.find('#status_modal').text('Abastecido')
                        $("#panelInfoAbst").css("display", "block")
                        modal.find('#cede_sec_modal').text(result.code_auth)
                        modal.find('#autorized_by_modal').text(result.autorized_by)
                        modal.find('#qtd_autorized_modal').text(result.qnt_released + ' Litros')
                        modal.find('#date_autorized_modal').text(moment(result.updated_at).format(
                            'DD-MM-YYYY '))
                        if (result.obs_fiscadm) {
                            modal.find('#obs_fiscadm_modal').html(result.obs_fiscadm)
                        }
                        break;
                    case 4:
                        modal.find('#status_modal').text('Não autorizado')
                        $("#panelInfoDenied").css("display", "block")
                        modal.find('#denied_request_modal').text(result.autorized_by)
                        break;
                }

                if (result.obs) {
                    modal.find('#obs_request_modal').html(result.obs)
                }

            })


        });
        $('#info-request-fuel').on('hide.bs.modal', function(event) {
            var modal = $(this);
            modal.find('.title').html('<i class="fas fa-info-circle mr-1"></i>')
            modal.find('#vtr_modal').text('-')
            modal.find('#od_modal').text('-')
            modal.find('#destiny_modal').text('-')
            modal.find('#request_date_modal').text('-')
            modal.find('#request_by_modal').text('-')
            modal.find('#ebplaca_modal').text('-')
            modal.find('#mission_modal').text('-')
            modal.find('#mot_modal').text('-')
            modal.find('#fuel_modal').text('-')
            modal.find('#status_modal').text('-')
            modal.find('#obs_request_modal').text('-')
            modal.find('#cede_sec_modal').text('-')
            modal.find('#autorized_by_modal').text('-')
            modal.find('#qtd_autorized_modal').text('-')
            modal.find('#date_autorized_modal').text('-')
            modal.find('#obs_fiscadm_modal').html('-')
            $("#panelInfoAbst").css("display", "none")
            $("#panelInfoDenied").css("display", "none")
            $(".actions").html(
                '<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>'
            )

        });
    </script>

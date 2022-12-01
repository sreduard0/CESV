<!-- Perfil usuario -->
<div class="modal fade" id="info-vtr" tabindex="-1" role="dialog" aria-labelledby="info-vtr" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="info-vtr">Informações do veículo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <section class="content">
                    <div class="container-fluid">
                        <div class="card card-widget widget-user">
                            <!-- Add the bg color to the header using any of the bg-* classes -->
                            <div class="widget-user-header text-white"
                                style="background: url('{{ asset('img/bg-visitors.png') }}') center center;background-size:100%">

                            </div>
                            <div class="widget-user-image">
                                <img class="img-circle" src="{{ asset('img/viatura.jpg') }}" alt="User Avatar">
                            </div>
                            <div class="card-footer m-t-30">
                                <div class="description-block">
                                    <h3 id="mod_vtr" class="widget-user-desc text-center">
                                        Modelo</h3>
                                    <h4 id="ebplaca" class="widget-user-username text-center text-muted">
                                        0000000 </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <section class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-header">
                                            <input type="hidden" id="eb_placa" value="">
                                            <h3 class="card-title card-title-background "> <i
                                                    class="fas fa-car mr-1"></i>
                                                Informações do veículo</h3>
                                            <button disabled class="float-r btn btn-success ger-qr"
                                                onclick="qr_vtr($('#eb_placa').val())"><i
                                                    class=" fa fa-qrcode"></i></button>
                                        </div>
                                        <div class="card-body">
                                            <div class="card-body">
                                                <div class="col">
                                                    <strong>Nº</strong>

                                                    <p id="nr_vtr" class="text-muted">xx</p>
                                                    <hr>
                                                    <strong>Tipo</strong>

                                                    <p id="type_vtr" class="text-muted">xx</p>
                                                    <hr>
                                                    <strong>Ton</strong>

                                                    <p id="ton" class="text-muted">0</p>

                                                    <hr>

                                                    <strong>M <sup>3</sup></strong>

                                                    <p id="vol" class="text-muted">0</p>

                                                    <hr>

                                                    <strong>Status</strong>

                                                    <p id="status" class="text-muted">-</p>

                                                    <hr>
                                                    <strong>Observações</strong>

                                                    <p id="obs_vtr" class="text-muted">-
                                                    </p>



                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </section>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>

            </div>
        </div>
    </div>
</div>

@include('component.modal-qrcode')
<script type="text/javascript">
    $('#info-vtr').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var modal = $(this);
        var url = "{{ url('get_info_vtr') }}/" + id;
        $.get(url, function(result) {
            modal.find('#mod_vtr').text(result.mod_vtr)
            modal.find('#ebplaca').text(result.ebplaca)
            modal.find('#eb_placa').val(result.ebplaca)
            modal.find('#nr_vtr').text(result.nr_vtr)
            modal.find('#ton').text(result.ton)
            modal.find('#vol').text(result.vol)
            if (result.type_vtr == 'op') {
                modal.find('#type_vtr').text('Operacional')
            } else {
                modal.find('#type_vtr').text('Administrativa')
            }
            if (result.obs == null) {
                modal.find('#obs_vtr').text('Sem observações')
            } else {
                modal.find('#obs_vtr').html(result.obs)
            }
            switch (result.status) {
                case 1:
                    modal.find('#status').text('Disponível')
                    break;
                case 2:
                    modal.find('#status').text('Indisponível')

                    break;
                case 3:
                    modal.find('#status').text('Disp. c/ restrição')
                    break;
            }
            $('.ger-qr').prop('disabled', false)

        })
    });
    $('#info-vtr').on('hide.bs.modal', function(event) {
        var modal = $(this);
        modal.find('#vtr_mod').text('Não consta')
        modal.find('#ebplaca').text('Não consta')
        modal.find('#type_vtr').text('Não consta')
        modal.find('#nr_vtr').text('Não consta')
        modal.find('#ton').text('Não consta')
        modal.find('#vol').text('Não consta.')
        modal.find('#status').text('Não consta.')
        modal.find('#obs_vtr').html('Não consta.')
        modal.find('#status').text('Não consta.')
        $('.ger-qr').prop('disabled', true)

    });
</script>

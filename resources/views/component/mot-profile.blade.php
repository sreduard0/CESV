<!-- Perfil usuario -->
<div class="modal fade" id="mot-profile" tabindex="-1" role="dialog" aria-labelledby="mot-profile" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mot-profile">Informações do motorista</h5>
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
                                <img class="img-circle" src="{{ asset('img/img_profile_padrao.png') }}"
                                    alt="User Avatar">
                            </div>
                            <div class="card-footer m-t-30">
                                <div class="description-block">
                                    <h3 id="pdNameProfile" class="widget-user-desc text-center">
                                        Pg Nome</h3>
                                    <h4 id="catProfile" class="widget-user-username text-center text-muted">
                                        Categoria B </h4>
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
                                            <a href='' id="phone"
                                                title='Telefone'class='btn btn-sm btn-primary'><i
                                                    class='fas fa-phone'></i></a>
                                            <a href='' target='_blank' title='WhatsApp' id='wpp'
                                                class='btn btn-sm btn-success'><i class='fab fa-whatsapp'></i></a>
                                        </div>
                                        <div class="card-body">
                                            <div class="card-body">
                                                <div class="col">
                                                    <strong>CNH</strong>

                                                    <p id="cnhProfile" class="text-muted">xx</p>
                                                    <hr>
                                                    <strong>Validade CNH</strong>

                                                    <p id="valCnhProfile" class="text-muted">xx</p>
                                                    <hr>
                                                    <strong>Idt Mil</strong>

                                                    <p id="idmMilProfile" class="text-muted">0</p>

                                                    <hr>

                                                    <strong>Contato</strong>

                                                    <p id="contactProfile" class="text-muted">0</p>

                                                    <hr>

                                                    <strong>Especializações</strong>

                                                    <p id="espProfile" class="text-muted">-</p>

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
<script type="text/javascript">
    $('#mot-profile').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var modal = $(this);
        var url = "{{ url('get_info_mot') }}/" + id;
        $.get(url, function(result) {

            var mopp = result.mopp == 1 ? 'MOPP <br>' : ''
            var tc = result.tc == 1 ? 'Transporte Coletivo <br>' : ''
            var cve = result.cve == 1 ? 'Condutor de Veículo de Emergência <br>' : ''
            var ci = result.ci == 1 ? 'Condutor de Indivisiveis <br>' : ''

            modal.find('#pdNameProfile').text(result.pg + ' ' + result.name)
            modal.find('#catProfile').text('Categoria ' + result.cat)
            modal.find('#cnhProfile').text(result.cnh)
            modal.find('#valCnhProfile').text(moment(result.val_cnh).format('DD/MM/YYYY'))
            modal.find('#idmMilProfile').text(result.idt_mil)
            modal.find('#contactProfile').text(result.contact)
            modal.find('#espProfile').html(mopp + tc + cve + ci)
            modal.find('#wpp').attr('href', 'https://api.whatsapp.com/send?phone=55' + result.contact)
            modal.find('#phone').attr('href', 'tel:' + result.contact)
        })
    });
    $('#mot-profile').on('hide.bs.modal', function(event) {
        var modal = $(this);
        modal.find('#pdNmaeProfile').text('Não consta')
        modal.find('#catProfile').text('Não consta')
        modal.find('#cnhProfile').text('Não consta')
        modal.find('#valCnhProfile').text('Não consta')
        modal.find('#idmMilProfile').text('Não consta')
        modal.find('#contactProfile').text('Não consta.')
        modal.find('#espProfile').text('Não consta.')
        modal.find('#wpp').attr('href', '')
        modal.find('#phone').attr('href', '')
    });
</script>

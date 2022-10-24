@section('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
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
                                <a type="button" id="profile_link" href=""
                                    class="float-r m-r-5 btn btn-success">Ver perfil completo</a>
                                <img id="edit_img" class="img-circle" src="{{ asset('img/people.png') }}"
                                    alt="User Avatar">
                            </div>
                            <div class="card-footer m-t-30">
                                <div class="description-block">
                                    <h3 id="adido_name" class="widget-user-desc text-center">
                                        Nome</h3>
                                    <h4 id="name_cia" class="widget-user-username text-center text-muted">
                                        Cia </h4>
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
                                            <h3 class="card-title card-title-background "> <i
                                                    class="fas fa-user mr-1"></i>
                                                Informações pessoais</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="card-body">
                                                <input type="hidden" id="v_id" value="">
                                                <input type="hidden" id="enterprise_id" value="">
                                                <div class="  float-l col-md-6">
                                                    <strong> Nome completo</strong>

                                                    <p id="fullname" class="text-muted"></p>

                                                    <hr>

                                                    <strong>Contato</strong>

                                                    <p id="phone_mil" class="text-muted"></p>

                                                    <hr>

                                                    <strong>CPF</strong>

                                                    <p id="cpf" class="text-muted"></p>

                                                    <hr>

                                                    <strong>Data de praça</strong>

                                                    <p id="joinedarmy_mil" class="text-muted"></p>
                                                    <hr>

                                                    <strong>Substituto do padrinho</strong>

                                                    <p id="godfather2_mil" class="text-muted"></p>


                                                </div>
                                                <div class=" float-r col-md-6">
                                                    <strong>Situação</strong>

                                                    <p id="situation_mil" class="text-muted"></p>

                                                    <hr>

                                                    <strong>Contato</strong>

                                                    <p id="phone2_mil" class="text-muted"></p>

                                                    <hr>

                                                    <strong>PREC-CP</strong>

                                                    <p id="prec_mil" class="text-muted"></p>

                                                    <hr>

                                                    <strong>Padrinho</strong>

                                                    <p id="godfather_mil" class="text-muted"></p>

                                                    <hr>

                                                    <strong>Dados processuais</strong>

                                                    <p id="proceduraldata_mil" class="text-muted"></p>



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
{{-- SCRIPTS --}}
<script>
    // $('#visitor_profile').on('show.bs.modal', function(event) {
    //     var button = $(event.relatedTarget);
    //     var id = button.data('id');
    //     var modal = $(this);
    //     var url = '/get_profile/' + id;
    //     modal.find('#phone2_visitor').text('')
    //     modal.find('#prec_mil').text('')
    //     modal.find('#godfather2_mil').text('Não consta.')
    //     modal.find('#joinedarmy_mil').text('Não consta.')
    //     modal.find('#proceduraldata_mil').text('Não consta.')
    //     $('#phone_mil').mask('(00) 0 0000-0000');
    //     $('#phone2_mil').mask('(00) 0 0000-0000');
    //     $('#cpf').mask('000.000.000-00');
    //     $('#prec_mil').mask('00 0000000');
    //     $("#profile_link").attr("href", '');
    //     $.get(url, function(result) {
    //         $("#profile_link").attr("href", "/profile/" + result.id);
    //         modal.find('#edit_img').attr("src", result.photo)
    //         modal.find('#adido_name').text(result.rank.rankAbbreviation + ' ' + result
    //             .professionalName)
    //         modal.find('#name_cia').text(result.company.name)
    //         modal.find('#fullname').text(result.fullName)
    //         modal.find('#cpf').text($('#cpf').masked(result.cpf))
    //         modal.find('#phone_mil').text($('#phone_mil').masked(result.phone))
    //         modal.find('#phone2_mil').text($('#phone2_mil').masked(result.phone2))
    //         modal.find('#prec_mil').text($('#prec_mil').masked(result.preccp))
    //         modal.find('#joinedarmy_mil').text(moment(result.joinedArmy).format('DD-MM-YYYY'))
    //         if (result.proceduraldata) {
    //             modal.find('#proceduraldata_mil').text('Há dados processuais.')
    //         }
    //         modal.find('#situation_mil').text(result.condition.condition)
    //         modal.find('#godfather_mil').text(result.godfather.rank.rankAbbreviation + ' ' +
    //             result
    //             .godfather.professionalName)
    //         modal.find('#godfather2_mil').text(result.godfather2.rank.rankAbbreviation +
    //             ' ' + result
    //             .godfather2.professionalName)
    //     })
    // });
</script>

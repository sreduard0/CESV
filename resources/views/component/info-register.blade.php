@section('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
<!-- Perfil usuario -->
<div class="modal fade" id="info-register" tabindex="-1" role="dialog" aria-labelledby="info-register" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="info-register">Informações do registro de entrada/saida</h5>
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
                                    <div class="card-header">
                                        <h3 class="card-title card-title-background "> <i class="fas fa-car mr-1"></i>
                                            Civil</h3>
                                        <button id="btnEdit" onclick="return activeEdit()"
                                            class="btn btn-primary float-r"><i id="icoEdit"
                                                class="fa fa-edit"></i></button>
                                    </div>
                                    <div class="card-body" id="panelInfo" style="display: block">
                                        <div id="infoCivil" style="display: none">
                                            <div class="  float-l col-md-6">
                                                <strong>Nome do motorista</strong>

                                                <p id="fullname" class="text-muted">-</p>

                                                <hr>

                                                <strong>Modelo veículo</strong>

                                                <p id="phone_mil" class="text-muted">-</p>

                                                <hr>

                                                <strong>Placa</strong>

                                                <p id="cpf" class="text-muted">-</p>

                                                <hr>

                                                <strong>CPF/RG/CNH</strong>

                                                <p id="joinedarmy_mil" class="text-muted">-</p>
                                                <hr>

                                                <strong>Qtd. passageiros</strong>

                                                <p id="godfather2_mil" class="text-muted">-</p>


                                            </div>
                                            <div class=" float-r col-md-6">
                                                <strong>Destino</strong>

                                                <p id="situation_mil" class="text-muted">-</p>

                                                <hr>

                                                <strong>Horário de entrada</strong>

                                                <p id="phone2_mil" class="text-muted">-</p>

                                                <hr>

                                                <strong>Horário de saída</strong>

                                                <p id="prec_mil" class="text-muted">-</p>

                                                <hr>

                                                <strong>Obs</strong>

                                                <p id="godfather_mil" class="text-muted">-</p>
                                            </div>
                                        </div>

                                        <div id="infoOom" style="display: none">
                                            <div class="  float-l col-md-6">
                                                <strong>Nome do motorista</strong>

                                                <p id="fullname" class="text-muted">-</p>

                                                <hr>

                                                <strong>Nome do segurança</strong>

                                                <p id="phone_mil" class="text-muted">-</p>

                                                <hr>

                                                <strong>Modelo veículo</strong>

                                                <p id="phone_mil" class="text-muted">-</p>

                                                <hr>

                                                <strong>Placa/EB</strong>

                                                <p id="cpf" class="text-muted">-</p>

                                                <hr>

                                                <strong>Idt militar mais antigo</strong>

                                                <p id="joinedarmy_mil" class="text-muted">-</p>


                                            </div>
                                            <div class=" float-r col-md-6">
                                                <strong>OM</strong>

                                                <p id="situation_mil" class="text-muted">-</p>

                                                <hr>
                                                <strong>Destino</strong>

                                                <p id="situation_mil" class="text-muted">-</p>

                                                <hr>

                                                <strong>Horário de entrada</strong>

                                                <p id="phone2_mil" class="text-muted">-</p>

                                                <hr>

                                                <strong>Horário de saída</strong>

                                                <p id="prec_mil" class="text-muted">-</p>

                                                <hr>

                                                <strong>Obs</strong>

                                                <p id="godfather_mil" class="text-muted">-</p>
                                            </div>
                                        </div>

                                        <div id="infoVtrOm" style="display: none">
                                            <div class="  float-l col-md-6">
                                                <strong>Ficha</strong>

                                                <p id="joinedarmy_mil" class="text-muted">-</p>

                                                <hr>

                                                <strong>Nome do motorista</strong>

                                                <p id="fullname" class="text-muted">-</p>

                                                <hr>

                                                <strong>Nome do segurança</strong>

                                                <p id="phone_mil" class="text-muted">-</p>

                                                <hr>

                                                <strong>Modelo veículo</strong>

                                                <p id="phone_mil" class="text-muted">-</p>

                                                <hr>

                                                <strong>Placa/EB</strong>

                                                <p id="cpf" class="text-muted">-</p>

                                            </div>
                                            <div class=" float-r col-md-6">
                                                <strong>Destino</strong>

                                                <p id="situation_mil" class="text-muted">-</p>

                                                <hr>

                                                <strong>Horário de entrada</strong>

                                                <p id="phone2_mil" class="text-muted">-</p>

                                                <hr>

                                                <strong>Horário de saída</strong>

                                                <p id="prec_mil" class="text-muted">-</p>

                                                <hr>

                                                <strong>Obs</strong>

                                                <p id="godfather_mil" class="text-muted">-</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-body" id="panelEditInfo" style="display: none">
                                        {{-- FORM CIVIL --}}
                                        <div id="f-civil" style="display:none">

                                            <form id="form-civil">
                                                <div class="row">
                                                    <div class="form-group col">
                                                        <label for="name">Nome do motorista <span
                                                                style="color:red">*</span></label>
                                                        <input id="name" name="name" type="text"
                                                            class="form-control" placeholder="Nome do motorista">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="name">CPF/RG/CNH <span
                                                                style="color:red">*</span></label>
                                                        <input id="name" name="name" type="text"
                                                            class="form-control" placeholder="CPF/RG/CNH">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-3">
                                                        <label for="name">Modelo veículo <span
                                                                style="color:red">*</span></label>
                                                        <input id="name" name="name" type="text"
                                                            class="form-control" placeholder="Modelo veículo">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="name">Placa <span
                                                                style="color:red">*</span></label>
                                                        <input id="name" name="name" type="text"
                                                            class="form-control" placeholder="Placa">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="name">Qtd de passageiros <span
                                                                style="color:red">*</span></label>
                                                        <input id="name" name="name" type="number"
                                                            class="form-control" placeholder="Qtd de passageiros">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="name">Destino <span
                                                                style="color:red">*</span></label>
                                                        <input id="name" name="name" type="text"
                                                            class="form-control" placeholder="Destino">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col">
                                                        <label for="name">Observações</label>
                                                        <textarea name="" id="" rows="8" placeholder="Ex: Carro com impressoras."
                                                            class="form-control"></textarea>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        {{-- FORM OUTRA OM --}}
                                        <div id="f-oom" style="display:none">
                                            <form id="form-oom">
                                                <div class="row">
                                                    <div class="form-group col-md-2">
                                                        <label for="pg">Posto/Grad <span
                                                                style="color:red">*</span></label>
                                                        <select class="form-control" name="rank_id" id="rank_id">
                                                            <option value="">Selecione</option>
                                                            <option value="Gen">Gen</option>
                                                            <option value="Cel">Cel</option>
                                                            <option value="TC">TC</option>
                                                            <option value="Maj">Maj</option>
                                                            <option value="Cap">Cap</option>
                                                            <option value="1º Ten">1º Ten</option>
                                                            <option value="2º Ten">2º Ten</option>
                                                            <option value="Asp">Asp</option>
                                                            <option value="ST">ST</option>
                                                            <option value="1º Sgt">1º Sgt</option>
                                                            <option value="2º Sgt">2º Sgt</option>
                                                            <option value="3º Sgt">3º Sgt</option>
                                                            <option value="Cb">Cb</option>
                                                            <option value="Sd">Sd</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col">
                                                        <label for="name">Nome do motorista <span
                                                                style="color:red">*</span></label>
                                                        <input id="name" name="name" typphp e="text"
                                                            class="form-control" placeholder="Nome do motorista">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="pg">Posto/Grad <span
                                                                style="color:red">*</span></label>
                                                        <select class="form-control" name="rank_id" id="rank_id">
                                                            <option value="">Selecione</option>
                                                            <option value="Gen">Gen</option>
                                                            <option value="Cel">Cel</option>
                                                            <option value="TC">TC</option>
                                                            <option value="Maj">Maj</option>
                                                            <option value="Cap">Cap</option>
                                                            <option value="1º Ten">1º Ten</option>
                                                            <option value="2º Ten">2º Ten</option>
                                                            <option value="Asp">Asp</option>
                                                            <option value="ST">ST</option>
                                                            <option value="1º Sgt">1º Sgt</option>
                                                            <option value="2º Sgt">2º Sgt</option>
                                                            <option value="3º Sgt">3º Sgt</option>
                                                            <option value="Cb">Cb</option>
                                                            <option value="Sd">Sd</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col">
                                                        <label for="name">Nome do segurança <span
                                                                style="color:red">*</span></label>
                                                        <input id="name" name="name" type="text"
                                                            class="form-control" placeholder="Nome do segurança">
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-4">
                                                        <label for="name">Idt mil <span style="color:red">*</span>
                                                        </label> (do mais
                                                        antigo)
                                                        <input id="name" name="name" type="text"
                                                            class="form-control" placeholder="Idt mil">
                                                    </div>
                                                    <div class="form-group col">
                                                        <label for="name">Modelo veículo <span
                                                                style="color:red">*</span></label>
                                                        <input id="name" name="name" type="text"
                                                            class="form-control" placeholder="Modelo veículo">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="name">Placa / EB <span
                                                                style="color:red">*</span></label>
                                                        <input id="name" name="name" type="text"
                                                            class="form-control" placeholder="Placa / EB">
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-3">
                                                        <label for="name">OM <span
                                                                style="color:red">*</span></label>
                                                        <input id="name" name="name" type="text"
                                                            class="form-control" placeholder="OM">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="name">Destino / Missão <span
                                                                style="color:red">*</span></label>
                                                        <input id="name" name="name" type="text"
                                                            class="form-control" placeholder="Destino / Missão">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col">
                                                        <label for="name">Observações</label>
                                                        <textarea name="" id="" rows="8" placeholder="Ex: Autorizado sair sem segurança pelo CMT."
                                                            class="form-control"></textarea>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        {{-- FORM ADM/OP --}}
                                        <div id="f-adm-op" style="display:none">
                                            <form id="form-adm-op">
                                                <div class="row">
                                                    <div class="form-group col-md-4">
                                                        <label for="pg">Número da ficha <span
                                                                style="color:red">*</span></label>
                                                        <select class="form-control" name="rank_id" id="rank_id">
                                                            <option value="">Selecione</option>
                                                            <option value="1580">1580 / Cb Jesse</option>
                                                            <option value="1581">1581 / Sd De Carvalho</option>
                                                            <option value="1582">1582 / Sgt Criss</option>
                                                            <option value="1583">1583 / Ten Melzin</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-2">
                                                        <label for="pg">Posto/Grad <span
                                                                style="color:red">*</span></label>
                                                        <select class="form-control" name="rank_id" id="rank_id">
                                                            <option value="">Selecione</option>
                                                            <option value="Gen">Gen</option>
                                                            <option value="Cel">Cel</option>
                                                            <option value="TC">TC</option>
                                                            <option value="Maj">Maj</option>
                                                            <option value="Cap">Cap</option>
                                                            <option value="1º Ten">1º Ten</option>
                                                            <option value="2º Ten">2º Ten</option>
                                                            <option value="Asp">Asp</option>
                                                            <option value="ST">ST</option>
                                                            <option value="1º Sgt">1º Sgt</option>
                                                            <option value="2º Sgt">2º Sgt</option>
                                                            <option value="3º Sgt">3º Sgt</option>
                                                            <option value="Cb">Cb</option>
                                                            <option value="Sd">Sd</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col">
                                                        <label for="name">Nome do motorista <span
                                                                style="color:red">*</span></label>
                                                        <input id="name" name="name" type="text"
                                                            class="form-control" placeholder="Nome do motorista">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="pg">Posto/Grad <span
                                                                style="color:red">*</span></label>
                                                        <select class="form-control" name="rank_id" id="rank_id">
                                                            <option value="">Selecione</option>
                                                            <option value="Gen">Gen</option>
                                                            <option value="Cel">Cel</option>
                                                            <option value="TC">TC</option>
                                                            <option value="Maj">Maj</option>
                                                            <option value="Cap">Cap</option>
                                                            <option value="1º Ten">1º Ten</option>
                                                            <option value="2º Ten">2º Ten</option>
                                                            <option value="Asp">Asp</option>
                                                            <option value="ST">ST</option>
                                                            <option value="1º Sgt">1º Sgt</option>
                                                            <option value="2º Sgt">2º Sgt</option>
                                                            <option value="3º Sgt">3º Sgt</option>
                                                            <option value="Cb">Cb</option>
                                                            <option value="Sd">Sd</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col">
                                                        <label for="name">Nome do segurança <span
                                                                style="color:red">*</span></label>
                                                        <input id="name" name="name" type="text"
                                                            class="form-control" placeholder="Nome do segurança">
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-3">
                                                        <label for="name">Modelo veículo <span
                                                                style="color:red">*</span></label>
                                                        <input id="name" name="name" type="text"
                                                            class="form-control" placeholder="Modelo veículo">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="name">Placa / EB <span
                                                                style="color:red">*</span></label>
                                                        <input id="name" name="name" type="text"
                                                            class="form-control" placeholder="Placa / EB">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="name">Odômetro <span
                                                                style="color:red">*</span></label>
                                                        <input id="name" name="name" type="text"
                                                            class="form-control" placeholder="Odômetro">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="name">Destino / Missão <span
                                                                style="color:red">*</span></label>
                                                        <input id="name" name="name" type="text"
                                                            class="form-control" placeholder="Destino / Missão">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col">
                                                        <label for="name">Observações</label>
                                                        <textarea name="" id="" rows="8" placeholder="Ex: Autorizado sair sem segurança pelo CMT."
                                                            class="form-control"></textarea>
                                                    </div>
                                                </div>
                                            </form>
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
    var showEdit = true;

    function activeEdit() {
        if (showEdit == false) {
            $("#panelInfo").css("display", "block")
            $("#panelEditInfo").css("display", "none")
            $("#btnEdit").addClass('btn-primary')
            $("#btnEdit").removeClass('btn-success')
            $("#icoEdit").removeClass('fa-check')
            $("#icoEdit").addClass('fa-edit')

            showEdit = true
        } else {
            $("#panelInfo").css("display", "none")
            $("#panelEditInfo").css("display", "block")
            $("#btnEdit").addClass('btn-success')
            $("#btnEdit").removeClass('btn-primary')
            $("#icoEdit").removeClass('fa-edit')
            $("#icoEdit").addClass('fa-check')
            showEdit = false
        }
    }
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

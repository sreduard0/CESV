 @section('meta')
     <meta name="csrf-token" content="{{ csrf_token() }}">
 @endsection
 <!-- Perfil usuario -->
 <div class="modal fade" id="info-mission" tabindex="-1" role="dialog" aria-labelledby="info-missionLabel"
     aria-hidden="true">
     <div class="modal-dialog modal-xl" role="document">
         <div class="modal-content ">
             <div class="modal-header">
                 <h5 class="modal-title" id="info-missionLabel">Informações do registro de entrada/saida</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <div class="card">
                     <div class="card-header">
                         <h3 class="card-title card-title-background "> <i class="fas fa-info-circle mr-1"></i>
                             Informações da missão</h3>
                         <button id="btnEdit" onclick="return activeEdit()" class="btn btn-primary float-r"><i
                                 id="icoEdit" class="fa fa-edit"></i></button>
                     </div>
                     <div class="card-body" id="panelInfo" style="display: block">
                         <div id="infoVtrOm">
                             <div class="  float-l col-md-6">
                                 <strong>Missão</strong>

                                 <p id="nameMission" class="text-muted">-</p>

                                 <hr>

                                 <strong>Tipo</strong>

                                 <p id="typeMission" class="text-muted">-</p>

                                 <hr>

                                 <strong>Status</strong>

                                 <p id="statusMission" class="text-muted">-</p>

                                 <hr>

                                 <strong>Destino</strong>

                                 <p id="destinyMission" class="text-muted">-</p>

                                 <hr>


                                 <strong>Classe</strong>

                                 <p id="classMission" class="text-muted">-</p>

                                 <hr>
                                 <strong>Domumento</strong>

                                 <p id="docMission" class="text-muted">-</p>

                                 <hr>


                                 <strong>Contato</strong>

                                 <p id="contactCmtMission" class="text-muted">-</p>



                             </div>
                             <div class=" float-r col-md-6">
                                 <strong>Viatura</strong>

                                 <p id="vtrMission" class="text-muted">-</p>

                                 <hr>

                                 <strong>Nome do motorista</strong>

                                 <p id="nameMotMission" class="text-muted">-</p>

                                 <hr>

                                 <strong>Nome do segurança</strong>

                                 <p id="nameSegMission" class="text-muted">-</p>


                                 <hr>

                                 <strong>Prev. de partida</strong>

                                 <p id="datePrevPart" class="text-muted">-</p>

                                 <hr>

                                 <strong>Prev. de chegada</strong>

                                 <p id="datePrevChgd" class="text-muted">-</p>

                                 <hr>


                                 <strong>Observações </strong>

                                 <p id="obsMission" class="text-muted">-</p>
                             </div>
                         </div>
                     </div>

                     <div class="card-body" id="panelEditInfo" style="display: none">
                         <form id="form-edit-mission">
                             <div class="row">
                                 <div class="form-group col-md-3">
                                     <label for="pg">Tipo de missão <span style="color:red">*</span></label>
                                     <select class="form-control" name="rank_id" id="rank_id">
                                         <option value="">Selecione</option>
                                         <option value="OP">OP</option>
                                         <option value="OM">OM</option>
                                     </select>
                                 </div>
                             </div>
                             <div class="row">
                                 <div class="form-group col">
                                     <label for="name">Missão <span style="color:red">*</span></label>
                                     <input id="name" name="name" typphp e="text" class="form-control"
                                         placeholder="Ex: Feno e Aveia">
                                 </div>
                                 <div class="form-group col">
                                     <label for="name">Destino <span style="color:red">*</span></label>
                                     <input id="name" name="name" type="text" class="form-control"
                                         placeholder="Destino da missão (OM ou local).">
                                 </div>
                                 <div class="form-group col-md-2">
                                     <label for="pg">Classe <span style="color:red">*</span></label>
                                     <select class="form-control" name="rank_id" id="rank_id">
                                         <option selected value="">Selecione</option>
                                         <option value="1">I</option>
                                         <option value="2">II</option>
                                         <option value="3">III</option>
                                         <option value="4">IV</option>
                                         <option value="51">V (A)</option>
                                         <option value="52">V (M)</option>
                                         <option value="6">VI</option>
                                         <option value="7">VII</option>
                                         <option value="8">VIII</option>
                                         <option value="9">IX</option>
                                         <option value="10">X</option>
                                     </select>
                                 </div>
                             </div>
                             <div class="row">
                                 <div class="form-group col-md-3">
                                     <label for="pg">Viatura<span style="color:red">*</span></label>
                                     <select class="form-control" name="rank_id" id="rank_id">
                                         <option selected value="">Selecione</option>
                                         <option value="1">I</option>
                                         <option value="2">II</option>
                                     </select>
                                 </div>
                                 <div class="form-group col">
                                     <label for="name">Documento <span style="color:red">*</span> </label>
                                     <input id="name" name="name" type="text" class="form-control"
                                         placeholder="documento que deu ordem para a realizar a missão.">
                                 </div>
                                 <div class="form-group colmd-3">
                                     <label for="name">Origem <span style="color:red">*</span></label>
                                     <input id="name" name="name" type="text" class="form-control"
                                         placeholder="De onde parte a missão.">
                                 </div>
                             </div>

                             <div class="row">
                                 <div class="form-group col-md-2">
                                     <label for="pg">Posto/Grad <span style="color:red">*</span></label>
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
                                     <label for="name">Nome do motorista <span style="color:red">*</span></label>
                                     <input id="name" name="name" typphp e="text" class="form-control"
                                         placeholder="Nome do motorista">
                                 </div>
                                 <div class="form-group col-md-2">
                                     <label for="pg">Posto/Grad <span style="color:red">*</span></label>
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
                                     <label for="name">Nome do cmt da missão <span
                                             style="color:red">*</span></label>
                                     <input id="name" name="name" type="text" class="form-control"
                                         placeholder="Nome do cmt da missão">
                                 </div>

                             </div>
                             <div class="row">

                                 <div class="form-group col">
                                     <label>Prev. do dia e horário da partida</label>
                                     <div class="input-group date" id="prev_part" data-target-input="nearest">
                                         <input type="text" class="form-control datetimepicker-input"
                                             data-target="#prev_part" id="prev_part" name="prev_part"
                                             value="">
                                         <div class="input-group-append" data-target="#prev_part"
                                             data-toggle="datetimepicker">
                                             <div class="input-group-text"><i class="fa fa-calendar"></i>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="form-group col">
                                     <label>Prev. do dia e horário da chegada</label>
                                     <div class="input-group date" id="prev_chgd" data-target-input="nearest">
                                         <input type="text" class="form-control datetimepicker-input"
                                             data-target="#prev_chgd" id="prev_chgd" name="prev_chgd"
                                             value="">
                                         <div class="input-group-append" data-target="#prev_chgd"
                                             data-toggle="datetimepicker">
                                             <div class="input-group-text"><i class="fa fa-calendar"></i>
                                             </div>
                                         </div>
                                     </div>
                                 </div>

                                 <div class="form-group col-md-3">
                                     <label for="name">Telefone de contato <span style="color:red">*</span>
                                     </label>
                                     <input id="name" name="name" type="text" class="form-control"
                                         placeholder="Ex: (51) 980514188">
                                 </div>
                                 {{-- <span class="form-group  fs-12">(Inserir o
                                telefone celular do Cmt da Missão (COM DDD), visando contato de coordenação)</span> --}}
                             </div>
                             <div class="row">
                                 <div class="form-group col">
                                     <label for="name">Observações</label>
                                     <textarea name="" id="" rows="8"
                                         placeholder="Detalhes importantes da missão. Exemplo: Para Eixo Sul PGT" class="form-control"></textarea>
                                 </div>
                             </div>
                         </form>
                     </div>
                 </div>
                 <div class="card" id="panelInfoCon" style="display: none">
                     <div class="card-header">
                         <h3 class="card-title card-title-background "> <i class="fas fa-info-circle mr-1"></i>
                             Informações de
                             conclusão</h3>
                     </div>
                     <div class="card-body">
                         <div class=" float-l col-md-6">
                             <strong>Data de fim da missão</strong>

                             <p id="" class="text-muted">-</p>

                             <hr>

                             <strong>Peso</strong>

                             <p id="" class="text-muted">-</p>

                             <hr>
                             <strong>M <sup>3</sup></strong>

                             <p id="" class="text-muted">-</p>

                             <hr>



                             <strong>Consumo gasolina</strong>

                             <p id="" class="text-muted">-</p>

                             <hr>

                             <strong>Consumo diesel</strong>

                             <p id="" class="text-muted">-</p>
                         </div>
                         <div class=" float-r col-md-6">
                             <strong>Odômetro inícial</strong>

                             <p id="" class="text-muted">-</p>

                             <hr>

                             <strong>Odômetro final</strong>

                             <p id="" class="text-muted">-</p>

                             <hr>

                             <strong>Alteração</strong>

                             <p id="" class="text-muted">-</p>

                             <hr>

                             <strong>Observações </strong>

                             <p id="" class="text-muted">-</p>
                         </div>
                     </div>
                 </div>

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

     $('#info-mission').on('show.bs.modal', function(event) {
         var button = $(event.relatedTarget);
         var id = button.data('id');
         var modal = $(this);
         var url = "{{ url('info_mission') }}/" + id;
         $.get(url, function(result) {
             modal.find('#nameMission').text(result.mission_name)
             modal.find('#typeMission').text(result.type_mission)
             modal.find('#destinyMission').text(result.destiny)
             modal.find('#classMission').text(result.class)
             modal.find('#docMission').text(result.doc)
             modal.find('#contactCmtMission').html(result.contact +
                 '<a href="https://api.whatsapp.com/send?phone=' +
                 result.contact +
                 '" target="_blank" class="float-r m-r-30 btn btn-success"><i class="fs-20 fab fa-whatsapp"></i></a>'
             )
             modal.find('#vtrMission').text(result.vtr_info.mod_vtr + ' | EB/Placa: ' + result.vtr_info
                 .ebplaca)
             modal.find('#nameMotMission').text(result.pg_mot + ' ' + result.name_mot)
             modal.find('#nameSegMission').text(result.pg_seg + ' ' + result.name_seg)
             modal.find('#datePrevPart').text(result.prev_date_part)
             modal.find('#datePrevChgd').text(result.prev_date_chgd)
             modal.find('#obsMission').html(result.obs)
             if (result.status == 0) {
                 modal.find('#statusMission').text('Aguardando')
             } else {
                 modal.find('#statusMission').text('Em execução')
             }
         })


     });
 </script>

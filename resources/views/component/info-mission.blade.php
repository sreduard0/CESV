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
                                     <label for="typeMission">Tipo de missão <span style="color:red">*</span></label>
                                     <select class="form-control" name="typeMission" id="typeMission">
                                         <option value="">Selecione</option>
                                         <option value="OP">OP</option>
                                         <option value="OM">OM</option>
                                     </select>
                                 </div>
                             </div>
                             <div class="row">
                                 <div class="form-group col">
                                     <label for="nameMission">Missão <span style="color:red">*</span></label>
                                     <input id="nameMission" name="nameMission" typphp e="text"
                                         class="form-control" placeholder="Ex: Feno e Aveia">
                                 </div>
                                 <div class="form-group col">
                                     <label for="destinyMission">Destino <span style="color:red">*</span></label>
                                     <input id="destinyMission" name="destinyMission" type="text"
                                         class="form-control" placeholder="Destino da missão (OM ou local).">
                                 </div>
                                 <div class="form-group col-md-2">
                                     <label for="classMission">Classe <span style="color:red">*</span></label>
                                     <select class="form-control" name="classMission" id="classMission">
                                         <option selected value="">Selecione</option>
                                         <option value="I">I</option>
                                         <option value="II">II</option>
                                         <option value="III">III</option>
                                         <option value="IV">IV</option>
                                         <option value="V-arm">V-arm</option>
                                         <option value="V-mun">V-mun</option>
                                         <option value="VI">VI</option>
                                         <option value="VII">VII</option>
                                         <option value="VIII">VIII</option>
                                         <option value="IX">IX</option>
                                         <option value="X">X</option>
                                     </select>
                                 </div>
                             </div>
                             <div class="row">
                                 <div class="form-group col-md-3">
                                     <label for="vtrMission">Viatura<span style="color:red">*</span></label>
                                     <select class="form-control" name="vtrMission" id="vtrMission">
                                         <option selected value="">Selecione</option>
                                         @foreach ($viaturas as $viatura)
                                             <option value="{{ $viatura->id }}">{{ $viatura->mod_vtr }}</option>
                                         @endforeach
                                     </select>
                                 </div>
                                 <div class="form-group col">
                                     <label for="docMission">Documento <span style="color:red">*</span> </label>
                                     <input id="docMission" name="docMission" type="text" class="form-control"
                                         placeholder="documento que deu ordem para a realizar a missão.">
                                 </div>
                                 <div class="form-group colmd-3">
                                     <label for="originMission">Origem <span style="color:red">*</span></label>
                                     <input id="originMission" name="originMission" type="text"
                                         class="form-control" placeholder="De onde parte a missão.">
                                 </div>
                             </div>

                             <div class="row">
                                 <div class="form-group col-md-2">
                                     <label for="pgMotMission">Posto/Grad <span style="color:red">*</span></label>
                                     <select class="form-control" name="pgMotMission" id="pgMotMission">
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
                                     <label for="nameMotMission">Nome do motorista <span
                                             style="color:red">*</span></label>
                                     <input id="nameMotMission" name="nameMotMission" typphp e="text"
                                         class="form-control" placeholder="Nome do motorista">
                                 </div>
                                 <div class="form-group col-md-2">
                                     <label for="pgSegMission">Posto/Grad <span style="color:red">*</span></label>
                                     <select class="form-control" name="pgSegMission" id="pgSegMission">
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
                                     <label for="nameSegMission">Nome do cmt da missão <span
                                             style="color:red">*</span></label>
                                     <input id="nameSegMission" name="nameSegMission" type="text"
                                         class="form-control" placeholder="Nome do cmt da missão">
                                 </div>

                             </div>
                             <div class="row">

                                 <div class="form-group col">
                                     <label>Prev. do dia e horário da partida</label>
                                     <div class="input-group date" id="prev_part" data-target-input="nearest">
                                         <input type="text" class="form-control datetimepicker-input"
                                             data-target="#prev_part" id="datePrevPartMission"
                                             name="datePrevPartMission" value="">
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
                                             data-target="#prev_chgd" id="datePrevChgdMission"
                                             name="datePrevChgdMission" value="">
                                         <div class="input-group-append" data-target="#prev_chgd"
                                             data-toggle="datetimepicker">
                                             <div class="input-group-text"><i class="fa fa-calendar"></i>
                                             </div>
                                         </div>
                                     </div>
                                 </div>

                                 <div class="form-group col-md-3">
                                     <label for="contactCmtMission">Telefone de contato <span
                                             style="color:red">*</span>
                                     </label>
                                     <input id="contactCmtMission" name="contactCmtMission" type="text"
                                         class="form-control" placeholder="Ex: (51) 980514188">
                                 </div>
                             </div>
                             <div class="row">
                                 <div class="form-group col">
                                     <label for="obsMission">Observações</label>
                                     <textarea name="obsMission" id="obsMission" rows="8"
                                         placeholder="Detalhes importantes da missão. Exemplo: Para Eixo Sul PGT" class="text form-control"></textarea>
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

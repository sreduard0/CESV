 @section('meta')
     <meta name="csrf-token" content="{{ csrf_token() }}">
 @endsection
 <!-- Perfil usuario -->
 <div class="modal fade" id="info-mission" tabindex="-1" role="dialog" aria-labelledby="info-missionLabel"
     aria-hidden="true">
     <div class="modal-dialog modal-xl" role="document">
         <div class="modal-content ">
             <div class="modal-header">
                 <h5 class="modal-title" id="info-missionLabel">Informações da missão</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <div class="card">
                     <div class="card-header">
                         <h3 class="card-title card-title-background "> <i class="fas fa-info-circle mr-1"></i>
                             Informações da missão</h3>
                         <div class=" float-r" id="btnEdit">
                         </div>

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
                             <input type="hidden" id="idMission" name="idMission">
                             <div class="row">
                                 <div class="form-group col-md-3">
                                     <label for="e_typeMission">Tipo de missão <span style="color:red">*</span></label>
                                     <select class="form-control" name="e_typeMission" id="e_typeMission">
                                         <option value="">Selecione</option>
                                         <option value="OP">OP</option>
                                         <option value="OM">OM</option>
                                     </select>
                                 </div>
                             </div>
                             <div class="row">
                                 <div class="form-group col">
                                     <label for="e_nameMission">Missão <span style="color:red">*</span></label>
                                     <input minlength="2" maxlength="200" id="e_nameMission" name="e_nameMission"
                                         type="text" class="form-control" placeholder="Ex: Feno e Aveia">
                                 </div>
                                 <div class="form-group col">
                                     <label for="e_destinyMission">Destino <span style="color:red">*</span></label>
                                     <input minlength="2" maxlength="200" id="e_destinyMission" name="e_destinyMission"
                                         type="text" class="form-control"
                                         placeholder="Destino da missão (OM ou local).">
                                 </div>
                                 <div class="form-group col-md-2">
                                     <label for="e_classMission">Classe <span style="color:red">*</span></label>
                                     <select class="form-control" name="e_classMission" id="e_classMission">
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
                                     <label for="e_vtrMission">Viatura<span style="color:red">*</span></label>
                                     <select class="form-control" name="e_vtrMission" id="e_vtrMission">
                                         <option selected value="">Selecione</option>
                                         @foreach ($viaturas as $viatura)
                                             <option value="{{ $viatura->id }}">{{ $viatura->mod_vtr }}</option>
                                         @endforeach
                                     </select>
                                 </div>
                                 <div class="form-group col">
                                     <label for="e_docMission">Documento <span style="color:red">*</span> </label>
                                     <input minlength="2" maxlength="200" id="e_docMission" name="e_docMission"
                                         type="text" class="form-control"
                                         placeholder="documento que deu ordem para a realizar a missão.">
                                 </div>
                                 <div class="form-group colmd-3">
                                     <label for="e_originMission">Origem <span style="color:red">*</span></label>
                                     <input minlength="2" maxlength="200" id="e_originMission"
                                         name="e_originMission" type="text" class="form-control"
                                         placeholder="De onde parte a missão.">
                                 </div>
                             </div>

                             <div class="row">
                                 <div class="form-group col-md-2">
                                     <label for="e_pgMotMission">Posto/Grad <span style="color:red">*</span></label>
                                     <select class="form-control" name="e_pgMotMission" id="e_pgMotMission">
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
                                     <label for="e_nameMotMission">Nome do motorista <span
                                             style="color:red">*</span></label>
                                     <input minlength="2" maxlength="200" id="e_nameMotMission"
                                         name="e_nameMotMission" typphp e="text" class="form-control"
                                         placeholder="Nome do motorista">
                                 </div>
                                 <div class="form-group col-md-2">
                                     <label for="e_pgSegMission">Posto/Grad <span style="color:red">*</span></label>
                                     <select class="form-control" name="e_pgSegMission" id="e_pgSegMission">
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
                                     <label for="e_nameSegMission">Nome do cmt da missão <span
                                             style="color:red">*</span></label>
                                     <input minlength="2" maxlength="200" id="e_nameSegMission"
                                         name="e_nameSegMission" type="text" class="form-control"
                                         placeholder="Nome do cmt da missão">
                                 </div>

                             </div>
                             <div class="row">

                                 <div class="form-group col">
                                     <label>Prev. do dia e horário da partida</label>
                                     <div class="input-group date" id="e_prev_part" data-target-input="nearest">
                                         <input type="text" class="form-control datetimepicker-input"
                                             data-target="#e_prev_part" id="e_datePrevPartMission"
                                             name="e_datePrevPartMission" value="">
                                         <div class="input-group-append" data-target="#e_prev_part"
                                             data-toggle="datetimepicker">
                                             <div class="input-group-text"><i class="fa fa-calendar"></i>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="form-group col">
                                     <label>Prev. do dia e horário da chegada</label>
                                     <div class="input-group date" id="e_prev_chgd" data-target-input="nearest">
                                         <input type="text" class="form-control datetimepicker-input"
                                             data-target="#e_prev_chgd" id="e_datePrevChgdMission"
                                             name="e_datePrevChgdMission" value="">
                                         <div class="input-group-append" data-target="#e_prev_chgd"
                                             data-toggle="datetimepicker">
                                             <div class="input-group-text"><i class="fa fa-calendar"></i>
                                             </div>
                                         </div>
                                     </div>
                                 </div>

                                 <div class="form-group col-md-4">
                                     <label for="e_contactCmtMission">Telefone de contato <span
                                             style="color:red">*</span></label>
                                     <div class="input-group">
                                         <div class="input-group-prepend">
                                             <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                         </div>
                                         <input type="text" class="form-control" id="e_contactCmtMission"
                                             name="e_contactCmtMission" data-inputmask="'mask':'(99) 9 9999-9999'"
                                             data-mask="" inputmode="text" placeholder="EX: (51) 9 8020-4426">
                                     </div>

                                 </div>
                             </div>
                             <div class="row">
                                 <div class="form-group col">
                                     <label for="e_obsMission">Observações</label>
                                     <textarea name="e_obsMission" id="e_obsMission" rows="8"
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
             $("#btnEdit").html(
                 '<button onclick="return activeEdit()" class="btn btn-primary float-r"><i id="icoEdit" class="fa fa-edit"></i></button>'
             )
             showEdit = true
         } else {
             $("#panelInfo").css("display", "none")
             $("#panelEditInfo").css("display", "block")
             $("#btnEdit").html(
                 '<button onclick="return activeEdit()" class="btn btn-danger"><i class="fs-20 fa fa-times"></i></button> <button onclick="return editMission()" class="btn btn-success"><i class="fa fa-check"></i></button>'
             )
             showEdit = false
         }
     }

     $('#info-mission').on('show.bs.modal', function(event) {
         var button = $(event.relatedTarget);
         var id = button.data('id');
         var modal = $(this);
         var url = "{{ url('info_mission') }}/" + id;
         $('#contactCmtMission').mask('+00 (00) 0 0000-0000')
         $("#panelInfo").css("display", "block")
         $("#panelEditInfo").css("display", "none")
         $("#btnEdit").html(
             '<button onclick="return activeEdit()" class="btn btn-primary float-r"><i id="icoEdit" class="fa fa-edit"></i></button>'
         )
         showEdit = true
         $.get(url, function(result) {

             // Exibição
             modal.find('#nameMission').text(result.mission_name)
             modal.find('#typeMission').text(result.type_mission)
             modal.find('#destinyMission').text(result.origin + '  >>  ' + result.destiny)
             modal.find('#classMission').text(result.class)
             modal.find('#docMission').text(result.doc)
             modal.find('#contactCmtMission').html($('#contactCmtMission').masked(result.contact) +
                 '<a href="https://api.whatsapp.com/send?phone=' +
                 result.contact +
                 '" target="_blank" class="float-r m-r-30 btn btn-success"><i class="fs-20 fab fa-whatsapp"></i></a>'
             )
             modal.find('#vtrMission').text(result.vtr_info.mod_vtr + ' | EB/Placa: ' + result.vtr_info
                 .ebplaca)
             modal.find('#nameMotMission').text(result.pg_mot + ' ' + result.name_mot)
             modal.find('#nameSegMission').text(result.pg_seg + ' ' + result.name_seg)
             modal.find('#datePrevPart').text(moment(result.prev_date_part).format('DD-MM-YYYY H:m'))
             modal.find('#datePrevChgd').text(moment(result.prev_date_chgd).format('DD-MM-YYYY H:m'))
             if (result.obs == null) {
                 modal.find('#obsMission').html('<p>Sem observações</p>')
             } else {
                 modal.find('#obsMission').html(result.obs)
             }
             if (result.status == 0) {
                 modal.find('#statusMission').text('Aguardando')
             } else {
                 modal.find('#statusMission').text('Em execução')
             }

             //  Form edição
             modal.find('#idMission').val(result.id)
             modal.find('#e_nameMission').val(result.mission_name)
             modal.find('#e_typeMission').val(result.type_mission)
             modal.find('#e_destinyMission').val(result.destiny)
             modal.find('#e_classMission').val(result.class)
             modal.find('#e_docMission').val(result.doc)
             modal.find('#e_originMission').val(result.origin)
             modal.find('#e_contactCmtMission').val(result.contact)
             modal.find('#e_vtrMission').val(result.vtr)
             modal.find('#e_pgMotMission').val(result.pg_mot)
             modal.find('#e_nameMotMission').val(result.name_mot)
             modal.find('#e_pgSegMission').val(result.pg_seg)
             modal.find('#e_nameSegMission').val(result.name_seg)
             modal.find('#e_datePrevPartMission').val(moment(result.prev_date_part).format(
                 'DD-MM-YYYY H:m'))
             modal.find('#e_datePrevChgdMission').val(moment(result.prev_date_chgd).format(
                 'DD-MM-YYYY H:m'))
             modal.find('#e_obsMission').summernote('code', result.obs)
         })


     });
 </script>

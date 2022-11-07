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
                     </div>
                     <div class="card-body">
                         <div class="  float-l col-md-6">
                             <strong>Missão</strong>

                             <p id="nameMission" class="text-muted">-</p>

                             <hr>

                             <strong>Tipo</strong>

                             <p id="typeMission" class="text-muted">-</p>

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

                             <strong>Nome do cmt da missão</strong>
                             <p id="nameSegMission" class="text-muted">-</p>


                             <hr>

                             <strong>Contato</strong>

                             <p id="contactCmtMission" class="text-muted">-</p>


                         </div>
                         <div class=" float-r col-md-6">
                             <strong>Viatura</strong>

                             <p id="vtrMission" class="text-muted">-</p>

                             <hr>

                             <strong>Status</strong>

                             <p id="statusMission" class="text-muted">-</p>

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
                 <div id="finish"></div>
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
             </div>
         </div>
     </div>
 </div>
 {{-- SCRIPTS --}}
 <script>
     $('#info-mission').on('show.bs.modal', function(event) {
         var button = $(event.relatedTarget);
         var id = button.data('id');
         var modal = $(this);
         var url = "{{ url('info_mission') }}/" + id;
         $('#contactCmtMission').mask('+00 (00) 0 0000-0000')

         $.get(url, function(result) {
             const Vtrs = result.vtr_info.map(vtr => {
                 if (vtr.pg_seg) {
                     var segName = vtr.pg_seg + ' ' + vtr.name_seg
                 } else {
                     var segName = 'Não informado'
                 }
                 var data = 'Ficha: ' + vtr.nr_ficha + ' | Vtr: ' + vtr.vtrinfo.mod_vtr +
                     ' <br> Mot: ' + vtr.pg_mot + ' ' + vtr.name_mot + ' | Seg: ' + segName +
                     '<br><br>'

                 return data
             })
             if (result.obs == null) {
                 modal.find('#obsMission').html('<p>Sem observações</p>')
             } else {
                 modal.find('#obsMission').html(result.obs)
             }
             switch (result.status) {
                 case 1:
                     modal.find('#statusMission').text('Aguardando')

                     break;
                 case 2:
                     modal.find('#statusMission').text('Em andamento')

                     break;
                 case 3:
                     modal.find('#statusMission').text('Encerrada')

                     break;
             }
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
             modal.find('#vtrMission').html(Vtrs == '' ? 'Não há viaturas' : Vtrs)
             modal.find('#nameSegMission').text(result.pg_seg + ' ' + result.name_seg)
             modal.find('#datePrevPart').text(moment(result.prev_date_part).format('DD-MM-YYYY HH:mm'))
             modal.find('#datePrevChgd').text(moment(result.prev_date_chgd).format('DD-MM-YYYY HH:mm'))

             if (result.status > 2) {
                 $("#panelInfoCon").css("display", "block")
                 $('#finish').html('')
             } else {
                 $("#panelInfoCon").css("display", "none")
                 @if (session('CESV')['profileType'] == 1)
                     $('#finish').html(
                         "<button type='button' class='btn btn-success' data-dismiss='modal' onclick='return finishMission(" +
                         result.id + ")'>Encerrar missão</button>")
                 @endif
             }
         })


     });
 </script>

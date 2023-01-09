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
                         <div class="row">
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

                                 <strong>Nome do cmt da missão</strong>
                                 <p id="nameSegMission" class="text-muted">-</p>


                                 <hr>

                                 <strong>Contato</strong>

                                 <p id="contactCmtMission" class="text-muted">-</p>
                                 <hr>

                             </div>
                             <div class=" float-r col-md-6">
                                 <strong>Domumento</strong>

                                 <p id="docMission" class="text-muted">-</p>
                                 <hr>
                                 <strong>Viaturas</strong>
                                 <table class="table table-hover">
                                     <tbody id="vtrMission">
                                         <tr data-widget="expandable-table" aria-expanded="true">
                                             <td>Não há viaturas</td>
                                         </tr>
                                     </tbody>
                                 </table>

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
                             </div>
                         </div>
                         <div class="row">
                             <div class="col">

                                 <strong>Observações para execução </strong>

                                 <p id="obsMission" class="text-muted">-</p>
                             </div>

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
                         <div class="row">
                             <div class=" float-l col-md-6">
                                 <strong>Data de fim da missão</strong>

                                 <p id="dateFinMission" class="text-muted">-</p>

                                 <hr>

                                 <strong>Peso</strong>

                                 <p id="kg" class="text-muted">-</p>

                                 <hr>
                                 <strong>M <sup>3</sup> da carga</strong>

                                 <p id="m3" class="text-muted">-</p>

                                 <hr>



                             </div>
                             <div class=" float-r col-md-6">
                                 <strong>Consumo gasolina</strong>

                                 <p id="conGas" class="text-muted">-</p>
                                 <hr>

                                 <strong>Consumo diesel</strong>

                                 <p id="conDiesel" class="text-muted">-</p>
                                 <hr>
                                 <strong>Alteração</strong>

                                 <p id="alt" class="text-muted">-</p>

                                 <hr>


                             </div>
                         </div>

                         <div class="row">
                             <div class="col">
                                 <strong>Observações de conclusão</strong>

                                 <p id="obs" class="text-muted">-</p>
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
     $('#info-mission').on('show.bs.modal', function(event) {
         var button = $(event.relatedTarget);
         var id = button.data('id');
         var modal = $(this);
         var url = "{{ url('info_mission') }}/" + id;
         $('#contactCmtMission').mask('+00 (00) 0 0000-0000')
         $(".link").html('')
         $.get(url, function(result) {
             var i = 1
             const Vtrs = result.vtr_info.map(vtr => {
                 var count = i++
                 if (vtr.pg_seg) {
                     var segName = vtr.pg_seg + ' ' + vtr.name_seg
                 } else {
                     var segName = 'Não informado'
                 }
                 var od = vtr.od_total ? '<p class="m-l-30 text-muted">Km(s) rodados: ' + vtr
                     .od_total +
                     '</p>' : ''
                 var data = '<tr data-widget="expandable-table" aria-expanded="false"><td>' +
                     count + ' - ' + vtr.vtrinfo.mod_vtr +
                     ' <i class="text-success float-r fa fa-eye"></i></td></tr><tr class="expandable-body d-none"><td><p class="m-l-30 text-muted">Ficha: ' +
                     vtr.nr_ficha + '</p><p class="m-l-30 text-muted">Motorista:' + vtr.motinfo
                     .pg + ' ' + vtr.motinfo.name +
                     '</p><p class=" m-l-30 text-muted">Segurança:   ' +
                     segName + '</p>' + od + '</td></tr>'
                 return data
             })
             if (result.obs == null) {
                 modal.find('#obsMission').html('<p>Sem observações</p>')
             } else {
                 modal.find('#obsMission').html(result.obs)
             }
             switch (result.status) {
                 case 1:
                     modal.find('#statusMission').text('Na fila')

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
             modal.find('#vtrMission').html(Vtrs == '' ?
                 '<tr data-widget="expandable-table" aria-expanded="true"><td>Não há viaturas</td></tr>' :
                 Vtrs)
             modal.find('#nameSegMission').text(result.pg_seg + ' ' + result.name_seg)
             modal.find('#datePrevPart').text(moment(result.prev_date_part).format('DD-MM-YYYY HH:mm'))
             modal.find('#datePrevChgd').text(moment(result.prev_date_chgd).format('DD-MM-YYYY HH:mm'))

             if (result.finish_mission) {
                 $('#dateFinMission').text(result.finish_mission)
                 $('#kg').text(result.peso + ' Kg')
                 $('#m3').text(result.vol + ' m')
                 $('#conGas').text(result.cons_gas + ' L')
                 $('#conDiesel').text(result.cons_diesel + ' L')
                 $('#alt').text(result.alteration == 1 ? "Sim " : "Não")
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

 @section('meta')
     <meta name="csrf-token" content="{{ csrf_token() }}">
 @endsection
 <!-- Perfil usuario -->
 <div class="modal fade" id="info-ficha" tabindex="-1" role="dialog" aria-labelledby="info-fichaLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content ">
             <div class="modal-header">
                 <h5 class="modal-title" id="info-fichaLabel">Informações da ficha</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <div class="card">
                     <div class="card-body">
                         <div class="  float-l col-md-6">
                             <strong>Nº</strong>

                             <p id="nrFichaInfo" class="text-muted">-</p>

                             <hr>

                             <strong>Viatura</strong>

                             <p id="vtrInfo" class="text-muted">-</p>

                             <hr>

                             <strong>Missão</strong>

                             <p id="missionInfo" class="text-muted">-</p>

                             <hr>
                             <strong>Por ordem</strong>

                             <p id="inOrderInfo" class="text-muted">-</p>


                         </div>
                         <div class=" float-r col-md-6">
                             <strong>Motorista</strong>

                             <p id="motInfo" class="text-muted">-</p>
                             <p id="contactMotInfo" class="text-muted">-</p>
                             <hr>
                             <strong>Segurança</strong>

                             <p id="segInfo" class="text-muted">-</p>
                             <hr>

                             <strong>Natureza do serviço</strong>
                             <p id="natOfServInfo" class="text-muted">-</p>
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
     $('#info-ficha').on('show.bs.modal', function(event) {
         $('.modal').modal('hide')
         var button = $(event.relatedTarget);
         var id = button.data('id');
         var modal = $(this);
         var url = "{{ url('get_info_ficha') }}/" + id;
         $('#contactMotInfo').mask('(00) 0 0000-0000')
         $.get(url, function(result) {
             modal.find('#nrFichaInfo').html(result.nr_ficha)
             modal.find('#vtrInfo').text(result.vtrinfo.mod_vtr)
             modal.find('#missionInfo').text(result.missioninfo ? result.missioninfo.mission_name :
                 'Missão interna')
             modal.find('#inOrderInfo').text(result.in_order)
             modal.find('#motInfo').text(result.motinfo.pg + ' ' + result.motinfo.name)
             modal.find('#segInfo').text(result.name_seg ? result.pg_seg + ' ' + result.name_seg :
                 'Não informado')
             modal.find('#natOfServInfo').text(result.nat_of_serv)
             modal.find('#contactMotInfo').html('+55 ' + $('#contactMotInfo').masked(result.motinfo
                     .contact) +
                 ' <a href="https://api.whatsapp.com/send?phone=55' +
                 result.motinfo.contact +
                 '" target="_blank" class="float-r m-r-30 btn btn-sm btn-success"><i class="fab fa-whatsapp"></i></a>'
             )

         })




     });
 </script>

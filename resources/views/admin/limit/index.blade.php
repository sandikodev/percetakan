@include('layouts/header')
@include('layouts/sidebar')


<div class="contents">
  <div class="crm mb-25">
     <div class="container-fluid">
        <div class="row ">
           <div class="col-xxl-6">

                        
                          <div class="col-lg-12 mb-30">
                            <div class="card mt-30">
                               <div class="card-body">
                                <div class="col-12">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                                <div class="table-responsive">
                                  <div class="adv-table-table__header">
                                     <b>
                                     <h4 style="font-size: 18px">Limit Orders</h4>
                                     </b>
                                  </div><br>
                    
                                  <table  id="datatables4" class="display" data-order='[[ 0, "asc" ]]'>
                                     <thead>
                                        <tr class="userDatatable-header">
                                           <th>
                                              <span class="userDatatable-title">No</span>
                                           </th>
                                           <th>
                                              <span class="userDatatable-title">Roles</span>
                                           </th>
                                           <th>
                                             <span class="userDatatable-title">Maksimal Order Pembayaran pending</span>
                                          </th>
                                           <th class="actions" style="text-align: right">
                                         
                                               <span class="userDatatable-title">Actions</span>
                                           
                                           </th>
                                        </tr>
                                     </thead>
                                     <tbody>
                                       @php $i = 1 @endphp

                                       @foreach ($limit as $limit)
                                        <tr>
                                           <td>
                                              <div class="userDatatable-content">{{ $i++ }}</div>
                                           </td>
                                           <td>
                                              <div class="userDatatable-content">{{$limit->roles }}</div>
                                           </td>
                                           <td>
                                             <div class="userDatatable-content">{{ $limit->maksimal_pending_pembayaran }}</div>
                                           </td>
                                           <td style="text-align: center">
                                         
                                             <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">
                                                <li>
                                                   <a  data-bs-toggle="modal" data-bs-target="#editlimit{{$limit->id}}" class="view">
                                                   <i class="uil uil-edit"></i>
                                                   </a>
                                                </li>
                                                <li>
                                                   
                                      
                                                </li>
                                             </ul>
                                            
                                          </td>
                                        </tr>

                                        <div class="modal fade" id="editlimit{{$limit->id}}" tabindex="-1" style="display: none;" aria-hidden="true">
                                         <div class="modal-dialog modal-dialog-centered" role="document">
                                           <div class="modal-content">
                                             <div class="modal-header">
                                               <h5 class="modal-title" id="modalCenterTitle">Edit Limit Maksimal Orders Pembayaran Pending / Belum Lunas</h5>
                                               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                             </div>
                                             <form action="{{ route('limit_order.limit_order_update',$limit->id) }}" method="POST">
                                               @csrf
                                               @method('PUT')
                                     
                                             <div class="modal-body">
                                               <div class="row">
                                                 <div class="col-12 mb-3">
                                                   <label for="nameWithTitle" class="form-label">Roles</label>
                                                   <input class="form-control" type="text" value="{{$limit->roles}}" readonly>
                                                 </div>
                                                 <div class="col-12 mb-3">
                                                   <label for="nameWithTitle" class="form-label">Maksimal</label>
                                                   <input name="maksimal_pending_pembayaran" value="{{$limit->maksimal_pending_pembayaran}}" class="form-control" type="number" required>
                                                 </div>
                                               </div>
                                             </div>
                                             <div class="modal-footer">
                                               <button type="button" class="btn btn-label-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                                               <button type="submit" class="btn btn-label-primary waves-effect" style="background-color:#7367f0;"><font color="white">Save changes</font></button>
                                             </div>
                                             </form>
                                           </div>
                                         </div>
                                       </div>

                                        @endforeach
                                     </tbody>
                                  </table>
                               </div>

                               </div>
                            </div>
                          </div>

            </div>
        </div>
    </div>

  </div>
</div>


@include('layouts.footer')
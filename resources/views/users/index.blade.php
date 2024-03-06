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
                                      <h4 style="font-size: 18px">Users</h4>
                                      </b>
                                      <div class="d-flex justify-content-md-end align-items-center gap-3 flex-wrap">
                                        <a class="app-academy-md-50 d-flex align-items-right"  style="justify-content: center;"  href="{{route('users.create')}}">
                                         <button class=" btn btn-primary d-grid w-100 mb-2 waves-effect waves-light">
                                             <span class="d-flex align-items-center justify-content-center text-nowrap">
                                                 <i class="uil uil-plus"></i>
                                                 Tambah User
                                             </span>
                                           </button>
                                       </a>
                                   </div>
                                   </div><br>
                     
                                   <table  id="datatables" class="display" data-order='[[ 0, "desc" ]]'>
                                      <thead>
                                         <tr class="userDatatable-header">
                                            <th>
                                               <span class="userDatatable-title">ID</span>
                                            </th>
                                            <th>
                                               <span class="userDatatable-title">Nama Lengkap</span>
                                            </th>
                                            <th>
                                               <span class="userDatatable-title">Email</span>
                                            </th>
                                            <th>
                                               <span class="userDatatable-title">Nomor Whatsapp</span>
                                            </th>
                                            <th>
                                              <span class="userDatatable-title">Roles</span>
                                           </th>
                                            <th>
                                               <span class="userDatatable-title">Status</span>
                                            </th>
                                            <th class="actions" style="text-align: right">
                                          
                                                <span class="userDatatable-title">Actions</span>
                                            
                                            </th>
                                         </tr>
                                      </thead>
                                      <tbody>
                                        @foreach ($data as $key => $user)
                                         <tr>
                                            <td>
                                               <div class="userDatatable-content">{{$user->id }}</div>
                                            </td>
                                            <td>
                                               <div class="userDatatable-content">{{$user->name }}</div>
                                            </td>
                                            <td>
                                              <div class="userDatatable-content">{{$user->email }}</div>
                                            </td>
                                            <td>
                                              <div class="userDatatable-content">{{$user->nomor_whatsapp }}</div>
                                            </td>
                                            <td>
                                              <div class="userDatatable-content">

                                                @if(!empty($user->getRoleNames()))

                                                  @foreach($user->getRoleNames() as $v)
                                          
                                                    {{ $v }}
                                          
                                                  @endforeach
                                        
                                                @endif

                                              </div>
                                            </td>
                                            <td>
                                               <div class="userDatatable-content d-inline-block">

                                                  @if($user->is_active == '1')
                                                    <span class="bg-opacity-success  color-success rounded-pill userDatatable-content-status active">ACTIVE</span>
                                                  @elseif($user->is_active == '0')
                                                    <span class="bg-opacity-danger  color-danger rounded-pill userDatatable-content-status active">NON-ACTIVE</span>
                                                  @else
                                          
                                                  @endif

                                               </div>
                                            </td>
                                            <td style="text-align: center">
                                          
                                              <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">
                                            @if($user->id == '1')

                                            @else

                                                 <li>
                                                    <a  data-bs-toggle="modal" data-bs-target="#editUser{{$user->id}}" class="view">
                                                    <i class="uil uil-setting"></i>
                                                    </a>
                                                 </li>
                                                 <li>
                                                    <a href="{{route('users.edit',$user->id)}}" class="edit">
                                                    <i class="uil uil-edit"></i>
                                                    </a>
                                                 </li>
                                                 <li>
                                                    

                                                    <form id="delete-post-form{{$user->id}}" action="{{ route('users.destroy', $user->id) }}" method="POST">
                                                      @csrf
                                                      @method('DELETE')
                                                      <a id="confirm-delete{{$user->id}}" class="remove">
                                                        <i class="uil uil-trash-alt"></i>
                                                        </a>
                                                    </form>
                                                    </div></div>
                                                    <script>
                                                      "use strict";
                                                    !(function () {
                                                        var buttondelete = document.querySelector("#confirm-delete{{$user->id}}");
                                                            buttondelete &&
                                                                (buttondelete.onclick = function () {
                                                                    Swal.fire({
                                                                        title: "Yakin ingin hapus?",
                                                                        text: "Data akan terhapus selamanya!",
                                                                        icon: "warning",
                                                                        showCancelButton: !0,
                                                                        confirmButtonText: "Yes, delete it!",
                                                                        customClass: {
                                                                            confirmButton: "btn btn-primary me-3",
                                                                            cancelButton: "btn btn-label-secondary me-3",
                                                                        },
                                                                        buttonsStyling: !1,
                                                                    }).then(function (t) {
                                                                        t.value
                                                                            ? Swal.fire({
                                                                                  icon: "success",
                                                                                  title: "Deleted!",
                                                                                  text: "Your file has been deleted.",
                                                                                  customClass: { confirmButton: "btn btn-success" },
                                                                              }).then((result) => {
                                                                                  if (result.isConfirmed) {
                                                                                      $('#delete-post-form{{$user->id}}').submit();
                                                                                  }
                                                                              })
                                                                            : t.dismiss === Swal.DismissReason.cancel &&
                                                                              Swal.fire({
                                                                                  title: "Cancelled",
                                                                                  text: "Your imaginary file is safe :)",
                                                                                  icon: "error",
                                                                                  customClass: { confirmButton: "btn btn-success" },
                                                                              });
                                                                    });
                                                                });
                                                    })();
                                                    </script>
                                                 </li>
                                                 @endif
                                              </ul>
                                             
                                           </td>
                                         </tr>

                                         <div class="modal fade" id="editUser{{$user->id}}" tabindex="-1" style="display: none;" aria-hidden="true">
                                          <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h5 class="modal-title" id="modalCenterTitle">Ubah Status Customer [ {{$user->name}} ]</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                              </div>
                                              <form action="{{ route('user_status.ubah_status_user',$user->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                      
                                              <div class="modal-body">
                                                <div class="row">
                                                  <div class="col mb-3">
                                                    <label for="nameWithTitle" class="form-label">Status</label>
                                                    <select name="is_active" class="form-control" required>
                                                      <option value="">- PILIH -</option>
                                                      <option value="1">ACTIVE</option>
                                                      <option value="0">NON-ACTIVE</option>
                                                    </select>
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
</div>

@include('layouts/footer')


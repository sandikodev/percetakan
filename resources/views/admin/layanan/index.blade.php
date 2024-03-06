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
                                      <h4 style="font-size: 18px">Layanan / Services</h4>
                                      </b>
                                      <div class="d-flex justify-content-md-end align-items-center gap-3 flex-wrap">
                                        <a class="app-academy-md-50 d-flex align-items-right"  style="justify-content: center;"  href="{{route('layanan.create')}}">
                                         <button class=" btn btn-primary d-grid w-100 mb-2 waves-effect waves-light">
                                             <span class="d-flex align-items-center justify-content-center text-nowrap">
                                                 <i class="uil uil-plus"></i>
                                                 Tambah Layanan
                                             </span>
                                           </button>
                                       </a>
                                   </div>
                                   </div><br>
                     
                                   <table  id="datatables" class="display" data-order='[[ 0, "desc" ]]'>
                                      <thead>
                                         <tr class="userDatatable-header">
                                            <th>
                                               <span class="userDatatable-title">No</span>
                                            </th>
                                            <th>
                                               <span class="userDatatable-title">Nama Layanan</span>
                                            </th>
                                            <th>
                                              <span class="userDatatable-title">Keterangan</span>
                                           </th>
                                           <th>
                                            <span class="userDatatable-title">Satuan</span>
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
                                        @php $i = 1 @endphp

                                        @foreach ($layanan as $layanan)
                                         <tr>
                                            <td>
                                               <div class="userDatatable-content">{{ $i++ }}</div>
                                            </td>
                                            <td>
                                               <div class="userDatatable-content">{{$layanan->nama_service }}</div>
                                            </td>
                                            <td>
                                              <div class="userDatatable-content">{{ Str::limit($layanan->keterangan, 30) }}</div>
                                            </td>
                                            <td>
                                              <div class="userDatatable-content">{{$layanan->satuan }}</div>
                                           </td>
                                           <td>
                                            <div class="userDatatable-content">{{$layanan->status }}</div>
                                         </td>
                                            <td style="text-align: center">
                                          
                                              <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">
                                                 <li>
                                                    <a  data-bs-toggle="modal" data-bs-target="#editLayanan{{$layanan->id}}" class="view">
                                                    <i class="uil uil-edit"></i>
                                                    </a>
                                                 </li>
                                                 <li>
                                                    

                                                    <form id="delete-post-form{{$layanan->id}}" action="{{ route('layanan.destroy', $layanan->id) }}" method="POST">
                                                      @csrf
                                                      @method('DELETE')
                                                      <a id="confirm-delete{{$layanan->id}}" class="remove">
                                                        <i class="uil uil-trash-alt"></i>
                                                        </a>
                                                    </form>
                                                    </div></div>
                                                    <script>
                                                      "use strict";
                                                    !(function () {
                                                        var buttondelete = document.querySelector("#confirm-delete{{$layanan->id}}");
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
                                                                                      $('#delete-post-form{{$layanan->id}}').submit();
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
                                              </ul>
                                             
                                           </td>
                                         </tr>

                                         <div class="modal fade" id="editLayanan{{$layanan->id}}" tabindex="-1" style="display: none;" aria-hidden="true">
                                          <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h5 class="modal-title" id="modalCenterTitle">Edit Layanan</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                              </div>
                                              <form action="{{ route('layanan.update',$layanan->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                      
                                              <div class="modal-body">
                                                <div class="row">
                                                  <div class="col-12 mb-3">
                                                    <label for="nameWithTitle" class="form-label">Nama Layanan</label>
                                                    <input name="nama_service" class="form-control" type="text" value="{{$layanan->nama_service}}" required>
                                                  </div>
                                                  <div class="col-12 mb-3">
                                                    <label for="nameWithTitle" class="form-label">Jenis Layanan / Satuan</label>
                                                    <select name="satuan" class="form-control" required>
                                                      @if ($layanan->satuan === 'Lebar')
                                                        <option value="Lebar">Lebar</option>
                                                        <option value="Pcs">Pcs</option>
                                                      @endif

                                                      @if ($layanan->satuan === 'Pcs')
                                                        <option value="Pcs">Pcs</option>
                                                        <option value="Lebar">Lebar</option>
                                                      @endif
                                                    </select>
                                                  </div>
                                                  <div class="col-12 mb-3">
                                                    <label for="nameWithTitle" class="form-label">Status</label>
                                                    <select name="status" class="form-control" required>
                                                      @if ($layanan->status === 'Active')
                                                        <option value="Active">Active</option>
                                                        <option value="Non-Active">Non-Active</option>
                                                      @endif

                                                      @if ($layanan->status === 'Non-Active')
                                                        <option value="Non-Active">Non-Active</option>
                                                        <option value="Active">Active</option>
                                                      @endif
                                                    </select>
                                                  </div>
                                                  <div class="col-12 mb-3">
                                                    <label for="nameWithTitle" class="form-label">Keterangan</label>
                                                    <textarea name="keterangan" class="form-control" type="text" rows="4">{{$layanan->keterangan}}</textarea>
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

                          <div class="col-lg-12 mb-30">
                            <div class="card mt-30">
                               <div class="card-body">

                                <div class="table-responsive">
                                  <div class="adv-table-table__header">
                                     <b>
                                     <h4 style="font-size: 18px">Jenis Bahan</h4>
                                     </b>
                                     <div class="d-flex justify-content-md-end align-items-center gap-3 flex-wrap">
                                       <a class="app-academy-md-50 d-flex align-items-right"  style="justify-content: center;"  href="{{route('layanan.create_bahan')}}">
                                        <button class=" btn btn-primary d-grid w-100 mb-2 waves-effect waves-light">
                                            <span class="d-flex align-items-center justify-content-center text-nowrap">
                                                <i class="uil uil-plus"></i>
                                                Tambah Bahan
                                            </span>
                                          </button>
                                      </a>
                                  </div>
                                  </div><br>
                    
                                  <table  id="datatables2" class="display" data-order='[[ 0, "desc" ]]'>
                                     <thead>
                                        <tr class="userDatatable-header">
                                           <th>
                                              <span class="userDatatable-title">No</span>
                                           </th>
                                           <th>
                                            <span class="userDatatable-title">Layanan</span>
                                         </th>
                                           <th>
                                              <span class="userDatatable-title">Nama Bahan</span>
                                           </th>
                                           <th>
                                            <span class="userDatatable-title">Panjang [ cm ]</span>
                                          </th>
                                          <th>
                                            <span class="userDatatable-title">Harga /cm²</span>
                                          </th>
                                          <th>
                                            <span class="userDatatable-title">Stok</span>
                                          </th>
                                           <th>
                                             <span class="userDatatable-title">Keterangan</span>
                                          </th>
                                           <th class="actions" style="text-align: right">
                                         
                                               <span class="userDatatable-title">Actions</span>
                                           
                                           </th>
                                        </tr>
                                     </thead>
                                     <tbody>
                                       @php $i = 1 @endphp

                                       @foreach ($bahan as $bahan)
                                        <tr>
                                           <td>
                                              <div class="userDatatable-content">{{ $i++ }}</div>
                                           </td>
                                           <td>
                                            <div class="userDatatable-content">{{$bahan->nama_service }}</div>
                                         </td>
                                           <td>
                                              <div class="userDatatable-content">{{$bahan->nama_bahan }}</div>
                                           </td>
                                           <td>
                                            <div class="userDatatable-content">{{$bahan->panjang }}</div>
                                           </td>
                                           <td>
                                             <div class="userDatatable-content">Rp {{ number_format($bahan->harga_cm2,0,',','.') }}</div>
                                           </td>
                                           <td>
                                            <div class="userDatatable-content">{{$bahan->stok }}</div>
                                           </td>
                                           <td>
                                             <div class="userDatatable-content">{{ Str::limit($bahan->keterangan, 30) }}</div>
                                           </td>
                                           <td style="text-align: center">
                                         
                                             <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">
                                                <li>
                                                   <a  data-bs-toggle="modal" data-bs-target="#editbahan{{$bahan->id}}" class="view">
                                                   <i class="uil uil-edit"></i>
                                                   </a>
                                                </li>
                                                <li>
                                                   

                                                   <form id="delete-post-form-bahan{{$bahan->id}}" action="{{ route('layanan.destroy_bahan', $bahan->id) }}" method="POST">
                                                     @csrf
                                                     @method('DELETE')
                                                     <a id="confirm-delete-bahan{{$bahan->id}}" class="remove">
                                                       <i class="uil uil-trash-alt"></i>
                                                       </a>
                                                   </form>
                                                   </div></div>
                                                   <script>
                                                     "use strict";
                                                   !(function () {
                                                       var buttondelete = document.querySelector("#confirm-delete-bahan{{$bahan->id}}");
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
                                                                                     $('#delete-post-form-bahan{{$bahan->id}}').submit();
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
                                             </ul>
                                            
                                          </td>
                                        </tr>

                                        <div class="modal fade" id="editbahan{{$bahan->id}}" tabindex="-1" style="display: none;" aria-hidden="true">
                                         <div class="modal-dialog modal-dialog-centered" role="document">
                                           <div class="modal-content">
                                             <div class="modal-header">
                                               <h5 class="modal-title" id="modalCenterTitle">Edit Jenis Bahan</h5>
                                               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                             </div>
                                             <form action="{{ route('layanan.update_bahan',$bahan->id) }}" method="POST">
                                               @csrf
                                               @method('PUT')
                                     
                                             <div class="modal-body">
                                               <div class="row">
                                                <div class="col-12 mb-3">
                                                  <label for="nameWithTitle" class="form-label">Layanan</label>
                                                  <select name="id_layanan" class="form-control" required>
                                                   
                                                    @forelse ($layanan_select as $layanan_select_data)


                                                          <option value="{{$layanan_select_data->id}}"

                                                            {{ ($layanan_select_data->id == $bahan->id_layanan) ? 'selected' : '' }}
                                                            >{{ $layanan_select_data->nama_service }}</option>
                                                        


                                                    @empty
                                                        <option value="">- Data Layanan Kosong -</option>
                                                    @endforelse
                                                  </select>
                                                </div>
                                                 <div class="col-12 mb-3">
                                                   <label for="nameWithTitle" class="form-label">Nama Bahan</label>
                                                   <input name="nama_bahan" class="form-control" type="text" value="{{$bahan->nama_bahan}}" required>
                                                 </div>
                                                 <div class="col-12 mb-3">
                                                  <label for="nameWithTitle" class="form-label">Panjang [ cm ]</label>
                                                  <input name="panjang" class="form-control" type="number" value="{{$bahan->panjang}}" required>
                                                </div>
                                                <div class="col-12 mb-3">
                                                  <label for="nameWithTitle" class="form-label">Harga [ /cm² ]</label>
                                                  <input name="harga_cm2" class="form-control" type="number" value="{{$bahan->harga_cm2}}" required>
                                                </div>
                                                <div class="col-12 mb-3">
                                                  <label for="nameWithTitle" class="form-label">Stok</label>
                                                  <select name="stok" class="select form-control" required>
                                                    @if($bahan->stok === 'READY')
                                                      <option value="READY" selected>READY</option>
                                                      <option value="OUT OF STOCK">OUT OF STOCK</option>
                                                    @else
                                                      <option value="OUT OF STOCK" selected>OUT OF STOCK</option>
                                                      <option value="READY">READY</option>
                                                    @endif
                                                  </select>
                                                </div>
                                                 <div class="col-12 mb-3">
                                                   <label for="nameWithTitle" class="form-label">Keterangan</label>
                                                   <textarea name="keterangan" class="form-control" type="text" rows="4">{{$bahan->keterangan}}</textarea>
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

                          <div class="col-lg-12 mb-30">
                            <div class="card mt-30">
                               <div class="card-body">

                                <div class="table-responsive">
                                  <div class="adv-table-table__header">
                                     <b>
                                     <h4 style="font-size: 18px">Jenis Laminasi</h4>
                                     </b>
                                     <div class="d-flex justify-content-md-end align-items-center gap-3 flex-wrap">
                                       <a class="app-academy-md-50 d-flex align-items-right"  style="justify-content: center;"  href="{{route('layanan.create_laminasi')}}">
                                        <button class=" btn btn-primary d-grid w-100 mb-2 waves-effect waves-light">
                                            <span class="d-flex align-items-center justify-content-center text-nowrap">
                                                <i class="uil uil-plus"></i>
                                                Tambah Laminasi
                                            </span>
                                          </button>
                                      </a>
                                  </div>
                                  </div><br>
                    
                                  <table  id="datatables3" class="display" data-order='[[ 0, "desc" ]]'>
                                     <thead>
                                        <tr class="userDatatable-header">
                                           <th>
                                              <span class="userDatatable-title">No</span>
                                           </th>
                                           <th>
                                            <span class="userDatatable-title">Layanan</span>
                                         </th>
                                           <th>
                                              <span class="userDatatable-title">Nama Laminasi</span>
                                           </th>
                                          <th>
                                            <span class="userDatatable-title">Harga /cm²</span>
                                          </th>
                                          <th>
                                            <span class="userDatatable-title">Stok</span>
                                          </th>
                                           <th>
                                             <span class="userDatatable-title">Keterangan</span>
                                          </th>
                                           <th class="actions" style="text-align: right">
                                         
                                               <span class="userDatatable-title">Actions</span>
                                           
                                           </th>
                                        </tr>
                                     </thead>
                                     <tbody>
                                       @php $i = 1 @endphp

                                       @foreach ($laminasi as $laminasi)
                                        <tr>
                                           <td>
                                              <div class="userDatatable-content">{{ $i++ }}</div>
                                           </td>
                                           <td>
                                            <div class="userDatatable-content">{{$laminasi->nama_service }}</div>
                                         </td>
                                           <td>
                                              <div class="userDatatable-content">{{$laminasi->nama_laminasi }}</div>
                                           </td>
                                           <td>
                                             <div class="userDatatable-content">Rp {{ number_format($laminasi->harga_cm2,0,',','.') }}</div>
                                           </td>
                                           <td>
                                            <div class="userDatatable-content">{{$laminasi->stok }}</div>
                                           </td>
                                           <td>
                                             <div class="userDatatable-content">{{ Str::limit($laminasi->keterangan, 30) }}</div>
                                           </td>
                                           <td style="text-align: center">
                                         
                                             <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">
                                                <li>
                                                   <a  data-bs-toggle="modal" data-bs-target="#editlaminasi{{$laminasi->id}}" class="view">
                                                   <i class="uil uil-edit"></i>
                                                   </a>
                                                </li>
                                                <li>
                                                   

                                                   <form id="delete-post-form-laminasi{{$laminasi->id}}" action="{{ route('layanan.destroy_laminasi', $laminasi->id) }}" method="POST">
                                                     @csrf
                                                     @method('DELETE')
                                                     <a id="confirm-delete-laminasi{{$laminasi->id}}" class="remove">
                                                       <i class="uil uil-trash-alt"></i>
                                                       </a>
                                                   </form>
                                                   </div></div>
                                                   <script>
                                                     "use strict";
                                                   !(function () {
                                                       var buttondelete = document.querySelector("#confirm-delete-laminasi{{$laminasi->id}}");
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
                                                                                     $('#delete-post-form-laminasi{{$laminasi->id}}').submit();
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
                                             </ul>
                                            
                                          </td>
                                        </tr>

                                        <div class="modal fade" id="editlaminasi{{$laminasi->id}}" tabindex="-1" style="display: none;" aria-hidden="true">
                                         <div class="modal-dialog modal-dialog-centered" role="document">
                                           <div class="modal-content">
                                             <div class="modal-header">
                                               <h5 class="modal-title" id="modalCenterTitle">Edit Jenis Laminasi</h5>
                                               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                             </div>
                                             <form action="{{ route('layanan.update_laminasi',$laminasi->id) }}" method="POST">
                                               @csrf
                                               @method('PUT')
                                     
                                             <div class="modal-body">
                                               <div class="row">
                                                <div class="col-12 mb-3">
                                                  <label for="nameWithTitle" class="form-label">Layanan</label>
                                                  <select name="id_layanan" class="form-control" required>
                                                   
                                                    @forelse ($layanan_select2 as $layanan_select_data2)


                                                          <option value="{{$layanan_select_data2->id}}"

                                                            {{ ($layanan_select_data2->id == $laminasi->id_layanan) ? 'selected' : '' }}
                                                            >{{ $layanan_select_data2->nama_service }}</option>
                                                        
                                                    @empty
                                                        <option value="">- Data Layanan Kosong -</option>
                                                    @endforelse
                                                  </select>
                                                </div>
                                                 <div class="col-12 mb-3">
                                                   <label for="nameWithTitle" class="form-label">Nama Laminasi</label>
                                                   <input name="nama_laminasi" class="form-control" type="text" value="{{$laminasi->nama_laminasi}}" required>
                                                 </div>
                                                <div class="col-12 mb-3">
                                                  <label for="nameWithTitle" class="form-label">Harga [ /cm² ]</label>
                                                  <input name="harga_cm2" class="form-control" type="number" value="{{$laminasi->harga_cm2}}" required>
                                                </div>
                                                <div class="col-12 mb-3">
                                                  <label for="nameWithTitle" class="form-label">Stok</label>
                                                  <select name="stok" class="select form-control" required>
                                                    @if($bahan->stok === 'READY')
                                                      <option value="READY" selected>READY</option>
                                                      <option value="OUT OF STOCK">OUT OF STOCK</option>
                                                    @else
                                                      <option value="OUT OF STOCK" selected>OUT OF STOCK</option>
                                                      <option value="READY">READY</option>
                                                    @endif
                                                  </select>
                                                </div>
                                                 <div class="col-12 mb-3">
                                                   <label for="nameWithTitle" class="form-label">Keterangan</label>
                                                   <textarea name="keterangan" class="form-control" type="text" rows="4">{{$laminasi->keterangan}}</textarea>
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

                          <div class="col-lg-12 mb-30">
                            <div class="card mt-30">
                               <div class="card-body">

                                <div class="table-responsive">
                                  <div class="adv-table-table__header">
                                     <b>
                                     <h4 style="font-size: 18px">Addons Service</h4>
                                     </b>
                                     <div class="d-flex justify-content-md-end align-items-center gap-3 flex-wrap">
                                       <a class="app-academy-md-50 d-flex align-items-right"  style="justify-content: center;"  href="{{route('layanan.create_addons')}}">
                                        <button class=" btn btn-primary d-grid w-100 mb-2 waves-effect waves-light">
                                            <span class="d-flex align-items-center justify-content-center text-nowrap">
                                                <i class="uil uil-plus"></i>
                                                Tambah Addons
                                            </span>
                                          </button>
                                      </a>
                                  </div>
                                  </div><br>
                    
                                  <table  id="datatables4" class="display" data-order='[[ 0, "desc" ]]'>
                                     <thead>
                                        <tr class="userDatatable-header">
                                           <th>
                                              <span class="userDatatable-title">No</span>
                                           </th>
                                           <th>
                                              <span class="userDatatable-title">Nama Addons</span>
                                           </th>
                                           <th>
                                             <span class="userDatatable-title">Keterangan</span>
                                          </th>
                                           <th class="actions" style="text-align: right">
                                         
                                               <span class="userDatatable-title">Actions</span>
                                           
                                           </th>
                                        </tr>
                                     </thead>
                                     <tbody>
                                       @php $i = 1 @endphp

                                       @foreach ($addons as $addons)
                                        <tr>
                                           <td>
                                              <div class="userDatatable-content">{{ $i++ }}</div>
                                           </td>
                                           <td>
                                              <div class="userDatatable-content">{{$addons->nama_addons }}</div>
                                           </td>
                                           <td>
                                             <div class="userDatatable-content">{{ Str::limit($addons->keterangan, 30) }}</div>
                                           </td>
                                           <td style="text-align: center">
                                         
                                             <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">
                                                <li>
                                                   <a  data-bs-toggle="modal" data-bs-target="#editaddons{{$addons->id}}" class="view">
                                                   <i class="uil uil-edit"></i>
                                                   </a>
                                                </li>
                                                <li>
                                                   

                                                   <form id="delete-post-form-addons{{$addons->id}}" action="{{ route('layanan.destroy_addons', $addons->id) }}" method="POST">
                                                     @csrf
                                                     @method('DELETE')
                                                     <a id="confirm-delete-addons{{$addons->id}}" class="remove">
                                                       <i class="uil uil-trash-alt"></i>
                                                       </a>
                                                   </form>
                                                   </div></div>
                                                   <script>
                                                     "use strict";
                                                   !(function () {
                                                       var buttondelete = document.querySelector("#confirm-delete-addons{{$addons->id}}");
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
                                                                                     $('#delete-post-form-addons{{$addons->id}}').submit();
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
                                             </ul>
                                            
                                          </td>
                                        </tr>

                                        <div class="modal fade" id="editaddons{{$addons->id}}" tabindex="-1" style="display: none;" aria-hidden="true">
                                         <div class="modal-dialog modal-dialog-centered" role="document">
                                           <div class="modal-content">
                                             <div class="modal-header">
                                               <h5 class="modal-title" id="modalCenterTitle">Edit addons</h5>
                                               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                             </div>
                                             <form action="{{ route('layanan.update_addons',$addons->id) }}" method="POST">
                                               @csrf
                                               @method('PUT')
                                     
                                             <div class="modal-body">
                                               <div class="row">
                                                 <div class="col-12 mb-3">
                                                   <label for="nameWithTitle" class="form-label">Nama Addons</label>
                                                   <input name="nama_addons" class="form-control" type="text" value="{{$addons->nama_addons}}" required>
                                                 </div>
                                                 <div class="col-12 mb-3">
                                                   <label for="nameWithTitle" class="form-label">Keterangan</label>
                                                   <textarea name="keterangan" class="form-control" type="text" rows="4">{{$addons->keterangan}}</textarea>
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
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
                                   </div><br>
                     
                                   <table  id="datatables" class="display" data-order='[[ 0, "asc" ]]'>
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
                                            <th class="actions" style="text-align: center">
                                          
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
                                            <td style="text-align: center">
                                          
                                             <center> 
                                                <a  data-bs-toggle="modal" data-bs-target="#detailLayanan{{$layanan->id}}" >
                                                <button class="btn btn-primary">Lihat Detail</button>
                                                </a>
                                             </center>
                                       
                                             
                                           </td>
                                         </tr>

                                         <div class="modal fade" id="detailLayanan{{$layanan->id}}" tabindex="-1" style="display: none;" aria-hidden="true">
                                          <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h5 class="modal-title" id="modalCenterTitle">Detail Layanan</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                              </div>
                                      
                                              <div class="modal-body">
                                                <div class="row">
                                                  <div class="col-12 mb-3">
                                                    <label for="nameWithTitle" class="form-label">Nama Layanan</label>
                                                    <input name="nama_service" class="form-control" type="text" value="{{$layanan->nama_service}}" readonly>
                                                  </div>
                                                  <div class="col-12 mb-3">
                                                    <label for="nameWithTitle" class="form-label">Biaya</label>
                                                    <input name="biaya" class="form-control" type="text" value="Rp {{ number_format($layanan->biaya,0,',','.') }}" readonly>
                                                  </div>
                                                  <div class="col-12 mb-3">
                                                    <label for="nameWithTitle" class="form-label">Keterangan</label>
                                                    <textarea name="keterangan" class="form-control" type="text" rows="4" readonly>{{$layanan->keterangan}}</textarea>
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-label-primary waves-effect" data-bs-dismiss="modal" style="background-color:#7367f0;"><font color="white">Close</font></button>
                                              </div>
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
                                    <h4 style="font-size: 18px">Jenis Bahan</h4>
                                    </b>
                                 </div><br>
                   
                                 <table  id="datatables2" class="display" data-order='[[ 0, "asc" ]]'>
                                    <thead>
                                       <tr class="userDatatable-header">
                                          <th>
                                             <span class="userDatatable-title">No</span>
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
                                             <center> 
                                                <a  data-bs-toggle="modal" data-bs-target="#viewbahan{{$bahan->id}}" >
                                                <button class="btn btn-primary">Lihat Detail</button>
                                                </a>
                                             </center>
                                           </td>
                                       </tr>

                                       <div class="modal fade" id="viewbahan{{$bahan->id}}" tabindex="-1" style="display: none;" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="modalCenterTitle">Detail Jenis Bahan</h5>
                                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                    
                                            <div class="modal-body">
                                              <div class="row">
                                                <div class="col-12 mb-3">
                                                  <label for="nameWithTitle" class="form-label">Nama Bahan</label>
                                                  <input class="form-control" type="text" value="{{$bahan->nama_bahan}}" readonly>
                                                </div>
                                                <div class="col-12 mb-3">
                                                  <label for="nameWithTitle" class="form-label">Panjang [ cm ]</label>
                                                  <input class="form-control" type="text" value="{{$bahan->panjang}}" readonly>
                                                </div>
                                                <div class="col-12 mb-3">
                                                   <label for="nameWithTitle" class="form-label">Harga /cm²</label>
                                                   <input class="form-control" type="text" value="Rp {{ number_format($bahan->harga_cm2,0,',','.') }}" readonly>
                                                </div>
                                                <div class="col-12 mb-3">
                                                   <label for="nameWithTitle" class="form-label">Stok</label>
                                                   <input class="form-control" type="text" value="{{$bahan->stok}}" readonly>
                                                 </div>
                                                <div class="col-12 mb-3">
                                                  <label for="nameWithTitle" class="form-label">Keterangan</label>
                                                  <textarea  class="form-control" type="text" rows="4" readonly>{{$bahan->keterangan}}</textarea>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-label-primary waves-effect" data-bs-dismiss="modal" style="background-color:#7367f0;"><font color="white">Close</font></button>
                                            </div>
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
                                 </div><br>
                   
                                 <table  id="datatables3" class="display" data-order='[[ 0, "asc" ]]'>
                                    <thead>
                                       <tr class="userDatatable-header">
                                          <th>
                                             <span class="userDatatable-title">No</span>
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
                                             <center> 
                                                <a  data-bs-toggle="modal" data-bs-target="#viewlaminasi{{$laminasi->id}}" >
                                                <button class="btn btn-primary">Lihat Detail</button>
                                                </a>
                                             </center>
                                           </td>
                                       </tr>

                                       <div class="modal fade" id="viewlaminasi{{$laminasi->id}}" tabindex="-1" style="display: none;" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="modalCenterTitle">Detail Jenis Laminasi</h5>
                                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                    
                                            <div class="modal-body">
                                              <div class="row">
                                                <div class="col-12 mb-3">
                                                  <label for="nameWithTitle" class="form-label">Nama Laminasi</label>
                                                  <input class="form-control" type="text" value="{{$laminasi->nama_laminasi}}" readonly>
                                                </div>
                                                <div class="col-12 mb-3">
                                                   <label for="nameWithTitle" class="form-label">Harga /cm²</label>
                                                   <input class="form-control" type="text" value="Rp {{ number_format($laminasi->harga_cm2,0,',','.') }}" readonly>
                                                </div>
                                                <div class="col-12 mb-3">
                                                   <label for="nameWithTitle" class="form-label">Stok</label>
                                                   <input class="form-control" type="text" value="{{$laminasi->stok}}" readonly>
                                                 </div>
                                                <div class="col-12 mb-3">
                                                  <label for="nameWithTitle" class="form-label">Keterangan</label>
                                                  <textarea  class="form-control" type="text" rows="4" readonly>{{$laminasi->keterangan}}</textarea>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-label-primary waves-effect" data-bs-dismiss="modal" style="background-color:#7367f0;"><font color="white">Close</font></button>
                                            </div>
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
                                    <h4 style="font-size: 18px">Addons Services</h4>
                                    </b>
                                 </div><br>
                   
                                 <table  id="datatables4" class="display" data-order='[[ 0, "asc" ]]'>
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
                                             <center> 
                                                <a  data-bs-toggle="modal" data-bs-target="#viewaddons{{$addons->id}}" >
                                                <button class="btn btn-primary">Lihat Detail</button>
                                                </a>
                                             </center>
                                           </td>
                                       </tr>

                                       <div class="modal fade" id="viewaddons{{$addons->id}}" tabindex="-1" style="display: none;" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="modalCenterTitle">Detail Addons</h5>
                                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                    
                                            <div class="modal-body">
                                              <div class="row">
                                                <div class="col-12 mb-3">
                                                  <label for="nameWithTitle" class="form-label">Nama Addons</label>
                                                  <input class="form-control" type="text" value="{{$addons->nama_addons}}" readonly>
                                                </div>
                                                <div class="col-12 mb-3">
                                                  <label for="nameWithTitle" class="form-label">Keterangan</label>
                                                  <textarea  class="form-control" type="text" rows="4" readonly>{{$addons->keterangan}}</textarea>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-label-primary waves-effect" data-bs-dismiss="modal" style="background-color:#7367f0;"><font color="white">Close</font></button>
                                            </div>
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


@include('layouts.footer')
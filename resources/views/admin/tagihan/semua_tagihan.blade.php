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
                                      <h4 style="font-size: 18px">Semua Tagihan</h4>
                                      </b>
                                      {{-- <div class="d-flex justify-content-md-end align-items-center gap-3 flex-wrap">
                                        <a class="app-academy-md-50 d-flex align-items-right"  style="justify-content: center;"  href="">
                                         <button class=" btn btn-primary d-grid w-100 mb-2 waves-effect waves-light">
                                             <span class="d-flex align-items-center justify-content-center text-nowrap">
                                                 <i class="uil uil-plus"></i>
                                                 Tambah transaksi
                                             </span>
                                           </button>
                                       </a>
                                   </div> --}}
                                   </div><br>
                     
                                   <table  id="datatables" class="display" data-order='[[ 0, "desc" ]]'>
                                      <thead>
                                         <tr class="userDatatable-header">
                                            <th>
                                               <span class="userDatatable-title">Invoice</span>
                                            </th>
                                            <th>
                                              <span class="userDatatable-title">Tanggal</span>
                                           </th>
                                            <th>
                                               <span class="userDatatable-title">Customer</span>
                                            </th>
                                            <th>
                                              <span class="userDatatable-title">Layanan</span>
                                           </th>
                                            <th>
                                               <span class="userDatatable-title">Total Tagihan</span>
                                            </th>
                                            <th>
                                                <span class="userDatatable-title">Status Pembayaran</span>
                                            </th>
                                            <th class="actions" style="text-align: right">
                                          
                                                <span class="userDatatable-title">Actions</span>
                                            
                                            </th>
                                         </tr>
                                      </thead>
                                      <tbody>

                                        @foreach ($transaksi as $transaksi)
                                         <tr>
                                            <td>
                                               <div class="userDatatable-content"><a  href="{{ URL::to('transaksi/data-invoice?d='.$transaksi->id_transaksi) }}" target="_blank" style="color:blue">#{{ $transaksi->id }} </a></div>
                                            </td>
                                            <td>
                                               <div class="userDatatable-content">{{$transaksi->created_at }}</div>
                                            </td>
                                            <td>
                                              <div class="userDatatable-content">{{$transaksi->nama_lengkap }}</div>
                                           </td>
                                           <td>
                                            <div class="userDatatable-content">{{$transaksi->nama_layanan }}</div>
                                         </td>
                                            <td>
                                              <div class="userDatatable-content">Rp {{ number_format($transaksi->total_tagihan,0,',','.') }}</div>
                                            </td>
                                           <td>
                                            <div class="userDatatable-content d-inline-block">
                                                @php 
                                                   if($transaksi->status_pembayaran === 'UNPAID'){
                                                     $label_so = 'warning';
                                                   }elseif($transaksi->status_pembayaran === 'MENUNGGU KONFIRMASI'){
                                                     $label_so = 'warning';
                                                   }elseif($transaksi->status_pembayaran === 'PAID'){
                                                     $label_so = 'success';
                                                   }else{
                                                     $label_so = 'danger';
                                                   }
                                                @endphp

                                                <span class="bg-opacity-{{$label_so}}  color-{{$label_so}} rounded-pill userDatatable-content-status active">{{ $transaksi->status_pembayaran }}</span>
                                             </div>
                                           </td>

                                            <td style="text-align: center">
                                          
                                              <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">

                                                <li>
                                                  <a data-bs-toggle="modal" data-bs-target="#detail{{$transaksi->id}}" class="view">
                                                  <i class="uil uil-invoice"></i>
                                                  </a>
                                               </li>

                                                 <li>
                                                    <a  data-bs-toggle="modal" data-bs-target="#edittransaksi{{$transaksi->id}}" class="view">
                                                    <i class="uil uil-edit"></i>
                                                    </a>
                                                 </li>
                                              </ul>
                                             
                                           </td>
                                         </tr>

                                    <!-- MODAL UBAH STATUS -->
                                         <div class="modal fade" id="edittransaksi{{$transaksi->id}}" tabindex="-1" style="display: none;" aria-hidden="true">
                                          <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h5 class="modal-title" id="modalCenterTitle">Ubah Status Pembayaran</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                              </div>
                                              <form action="{{ route('tagihan.ubah_status_pembayaran',$transaksi->id)}}" method="POST">
                                                @csrf
                                                @method('PUT')
                                      
                                              <div class="modal-body">
                                                <div class="row">
                                                  @if (!empty($transaksi->bukti_transfer))
                                                    <div class="col-12 mb-3">
                                                      <center>
                                                      <img src="{{asset('images/bukti_transfer/'.$transaksi->bukti_transfer)}}" width="250px">
                                                      </center>
                                                    </div>
                                                  @else
                                                  @endif

                                                  <div class="col-12 mb-3">
                                                    <label for="nameWithTitle" class="form-label">Status Pembayaran</label>
                                                    <select class="select form-control" name="status_pembayaran" required>
                                                      @if ($transaksi->status_pembayaran === 'UNPAID')
                                                          <option value="UNPAID">UNPAID</option>
                                                          <option value="PAID">PAID</option>
                                                      @endif

                                                      @if ($transaksi->status_pembayaran === 'PAID')
                                                          <option value="PAID">PAID</option>
                                                          <option value="UNPAID">UNPAID</option>
                                                      @endif
                                                      
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
                                <!-- MODAL UBAH STATUS -->

                                      

                                <!-- MODAL DETAIL -->
                                        <div class="modal fade" id="detail{{$transaksi->id}}" tabindex="-1" style="display: none;" aria-hidden="true">
                                          <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h5 class="modal-title" id="modalCenterTitle">Detail transaksi [ INVOICE #{{$transaksi->id}} ]</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                              </div>
                                              <form action="" method="POST">
                                                @csrf
                                                @method('PUT')
                                      
                                                <div class="modal-body">
                                                  <div class="row">
                                                    <div class="col-6 mb-3">
                                                      <label for="nameWithTitle" class="form-label">Tanggal Order</label>
                                                      <input class="form-control" type="text" value="{{$transaksi->created_at}}" readonly>
                                                    </div>
                                                    <div class="col-6 mb-3">
                                                      <label for="nameWithTitle" class="form-label">Nama Customer</label>
                                                      <input class="form-control" type="text" value="{{$transaksi->nama_lengkap}}" readonly>
                                                    </div>
                                                    <div class="col-6 mb-3">
                                                      <label for="nameWithTitle" class="form-label">Whatsapp Customer</label>
                                                      <input class="form-control" type="text" value="{{$transaksi->whatsapp}}" readonly>
                                                    </div>
                                                    <div class="col-6 mb-3">
                                                      <label for="nameWithTitle" class="form-label">Email Customer</label>
                                                      <input class="form-control" type="text" value="{{$transaksi->email}}" readonly>
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                      <label for="nameWithTitle" class="form-label">Layanan / Produk Order</label>
                                                      <input class="form-control" type="text" value="{{$transaksi->nama_layanan}}" readonly>
                                                    </div>
                                                    <div class="col-6 mb-3">
                                                      <label for="nameWithTitle" class="form-label">Jenis Bahan</label>
                                                      <input class="form-control" type="text" value="{{$transaksi->nama_bahan}} [ Panjang {{$transaksi->panjang_bahan}} ] [ Rp {{ number_format($transaksi->harga_bahan_cm2,0,',','.') }} /cm² ]" readonly>
                                                    </div>
                                                    <div class="col-6 mb-3">
                                                      <label for="nameWithTitle" class="form-label">Jenis Laminasi</label>
                                                      @php
                                                        if( !empty($transaksi->nama_laminasi) ){
                                                          $nama_laminasi = $transaksi->nama_laminasi.' [ Rp '.number_format($transaksi->harga_laminasi_cm2,0,',','.').' /cm² ]';
                                                        }else{
                                                          $nama_laminasi = '-';
                                                        }
                                                      @endphp
                                                      <input class="form-control" type="text" value="{{$nama_laminasi}}" readonly>
                                                    </div>
                                                    <div class="col-6 mb-3">
                                                      <label for="nameWithTitle" class="form-label">Addons Service</label>
                                                      @php
                                                      if( !empty($transaksi->addons) ){
                                                        $nama_addons = $transaksi->addons;
                                                      }else{
                                                        $nama_addons = '-';
                                                      }
                                                    @endphp
                                                      <input class="form-control" type="text" value="{{$nama_addons}}" readonly>
                                                    </div>
                                                    <div class="col-6 mb-3">
                                                      <label for="nameWithTitle" class="form-label">Harga Addons</label>
                                                      @php
                                                      if( !empty($transaksi->harga_addons_service) ){
                                                        $harga_addons = $transaksi->harga_addons_service;
                                                      }else{
                                                        $harga_addons = '-';
                                                      }
                                                    @endphp
                                                      <input class="form-control" type="text" value="{{$harga_addons}}" readonly>
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                      <label for="nameWithTitle" class="form-label">URL Berkas <small> <a href="{{$transaksi->url_berkas}}" target="_blank" style="color: blue">*KLIK DISINI</a> </small></label>
                                                      <input class="form-control" type="text" value="{{$transaksi->url_berkas}}" readonly>
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                      <label for="nameWithTitle" class="form-label">Catatan Customer</label>
                                                      <textarea class="form-control" type="text" rows="4" readonly>{{$transaksi->catatan_order}}</textarea>
                                                    </div>
                                                    <hr><br>
                                                    <div class="col-4 mb-3">
                                                      <label for="nameWithTitle" class="form-label">Biaya Addons</label>
                                                      <input class="form-control" type="text" value="Rp {{ number_format($transaksi->harga_addons_service,0,',','.') }}" readonly>
                                                    </div>
                                                    <div class="col-4 mb-3">
                                                      <label for="nameWithTitle" class="form-label">Estimasi Tagihan</label>
                                                      <input class="form-control" type="text" value="Rp {{ number_format($transaksi->total_tagihan,0,',','.') }}" readonly>
                                                    </div>
                                                    <div class="col-4 mb-3">
                                                      <label for="nameWithTitle" class="form-label">Tagihan Akhir</label>
                                                      <input class="form-control" type="text" value="Rp {{ number_format($transaksi->total_tagihan + $transaksi->harga_addons_service,0,',','.') }}" readonly>
                                                    </div>
  
                                                    <div class="col-4 mb-3">
                                                      <label for="nameWithTitle" class="form-label">Status Pembayaran</label>
                                                      <input class="form-control" type="text" value="{{ $transaksi->status_pembayaran }}" readonly>
                                                    </div>
                                                    <div class="col-4 mb-3">
                                                      <label for="nameWithTitle" class="form-label">Status Order</label>
                                                      <input class="form-control" type="text" value="{{ $transaksi->status_order }}" readonly>
                                                    </div>
                                                    <div class="col-4 mb-3">
                                                      <label for="nameWithTitle" class="form-label">Status Pengambilan</label>
                                                      <input class="form-control" type="text" value="{{ $transaksi->status_pengambilan }}" readonly>
                                                    </div>
                                                  </div>
                                                </div>
                                              <div class="modal-footer">
                                                <a href="{{ URL::to('transaksi/data-invoice?d='.$transaksi->id_transaksi) }}" target="_blank">
                                                <button type="button" class="btn border rounded-pill bg-normal text-gray px-25 print-btn">
                                                  <img src="{{asset('percetakan/img/svg/upload.svg')}}" alt="upload" class="svg"> Invoice </button></a>
                                                <button type="button" class="btn border btn-label-primary rounded-pill" data-bs-dismiss="modal" style="background-color:#7367f0;"><font color="white">Close</font></button>
                                              </div>
                                              </form>
                                            </div>
                                          </div>
                                        </div>
                                  <!-- MODAL DETAIL -->
                                        
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
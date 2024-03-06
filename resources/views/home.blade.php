@include('layouts.header')
@include('layouts.sidebar')

@php

$satu          = App\Models\Transaksi::where('status_pembayaran','=','PAID')->sum('total_tagihan');
$dua          = App\Models\Transaksi::where('status_pembayaran','=','PAID')->sum('harga_addons_service');
$total_pendapatan          = $satu + $dua;

$total_orders              = App\Models\Transaksi::count('id');
$total_layanan             = App\Models\Layanan::count('id');
$total_pending_orders      = App\Models\Transaksi::where('status_order','=','PENDING')->count();
$total_proses_orders       = App\Models\Transaksi::where('status_order','=','PROSES')->count();
$total_order_belum_diambil = App\Models\Transaksi::where('status_pengambilan','=','Belum Diambil')->count();
$total_pelanggan           = App\Models\User::where('id','<>','1')->count();


@endphp

         <div class="contents">
            <div class="crm mb-25">
               <div class="container-fluid">
                  <div class="row ">
                     <div class="col-lg-12">
                        <div class="breadcrumb-main">
                           <h4 class="text-capitalize breadcrumb-title">Dashboard</h4>
                        </div>
                     </div>
                     <div class="col-xxl-6">
                        <div class="row">
                           <div class="col-xxl-6 col-sm-6 mb-25">
                              <div class="ap-po-details ap-po-details--2 p-25 radius-xl d-flex justify-content-between">
                                 <div class="overview-content w-100">
                                    <div class=" ap-po-details-content d-flex flex-wrap justify-content-between">
                                       <div class="ap-po-details__titlebar">
                                          <b>
                                          <h1 style="font-size:30px">Rp {{ number_format($total_pendapatan,0,',','.') }}</h1>
                                          </b>
                                          <p>Total Pendapatan</p>
                                       </div>
                                       <div class="ap-po-details__icon-area">
                                          <div class="svg-icon order-bg-opacity-secondary color-secondary">
                                             <i class="uil uil-receipt"></i>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-xxl-6 col-sm-3 mb-25">
                              <div class="ap-po-details ap-po-details--2 p-25 radius-xl d-flex justify-content-between">
                                 <div class="overview-content w-100">
                                    <div class=" ap-po-details-content d-flex flex-wrap justify-content-between">
                                       <div class="ap-po-details__titlebar">
                                          <b>
                                          <h1 style="font-size:30px">{{$total_orders}}</h1>
                                          </b>
                                          <p>Total Orders</p>
                                       </div>
                                       <div class="ap-po-details__icon-area">
                                          <div class="svg-icon order-bg-opacity-info color-info">
                                             <i class="uil uil-shopping-cart-alt"></i>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-xxl-6 col-sm-3 mb-25">
                              <div class="ap-po-details ap-po-details--2 p-25 radius-xl d-flex justify-content-between">
                                 <div class="overview-content w-100">
                                    <div class=" ap-po-details-content d-flex flex-wrap justify-content-between">
                                       <div class="ap-po-details__titlebar">
                                          <b>
                                          <h1 style="font-size:30px">{{$total_layanan}}</h1>
                                          </b>
                                          <p>Total Layanan</p>
                                       </div>
                                       <div class="ap-po-details__icon-area">
                                          <div class="svg-icon order-bg-opacity-primary color-primary">
                                             <i class="uil uil-briefcase-alt"></i>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-xxl-6 col-sm-3 mb-25">
                              <div class="ap-po-details ap-po-details--2 p-25 radius-xl d-flex justify-content-between">
                                 <div class="overview-content w-100">
                                    <div class=" ap-po-details-content d-flex flex-wrap justify-content-between">
                                       <div class="ap-po-details__titlebar">
                                          <b>
                                          <h1 style="font-size:30px">{{$total_pending_orders}}</h1>
                                          </b>
                                          <p style="font-size: 14px">Pending Orders</p>
                                       </div>
                                       <div class="ap-po-details__icon-area">
                                          <div class="svg-icon order-bg-opacity-warning color-warning">
                                             <i class="uil uil-shopping-cart-alt"></i>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-xxl-6 col-sm-3 mb-25">
                              <div class="ap-po-details ap-po-details--2 p-25 radius-xl d-flex justify-content-between">
                                 <div class="overview-content w-100">
                                    <div class=" ap-po-details-content d-flex flex-wrap justify-content-between">
                                       <div class="ap-po-details__titlebar">
                                          <b>
                                          <h1 style="font-size:30px">{{$total_proses_orders }}</h1>
                                          </b>
                                          <p>Proses Orders</p>
                                       </div>
                                       <div class="ap-po-details__icon-area">
                                          <div class="svg-icon order-bg-opacity-primary color-primary">
                                             <i class="uil uil-redo"></i>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-xxl-6 col-sm-3 mb-25">
                              <div class="ap-po-details ap-po-details--2 p-25 radius-xl d-flex justify-content-between">
                                 <div class="overview-content w-100">
                                    <div class=" ap-po-details-content d-flex flex-wrap justify-content-between">
                                       <div class="ap-po-details__titlebar">
                                          <b>
                                          <h1 style="font-size:30px">{{$total_order_belum_diambil}}</h1>
                                          </b>
                                          <p>Belum Diambil</p>
                                       </div>
                                       <div class="ap-po-details__icon-area">
                                          <div class="svg-icon order-bg-opacity-warning color-warning">
                                             <i class="uil uil-box"></i>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-xxl-6 col-sm-3 mb-25">
                              <div class="ap-po-details ap-po-details--2 p-25 radius-xl d-flex justify-content-between">
                                 <div class="overview-content w-100">
                                    <div class=" ap-po-details-content d-flex flex-wrap justify-content-between">
                                       <div class="ap-po-details__titlebar">
                                          <b>
                                          <h1 style="font-size:30px">{{$total_pelanggan}}</h1>
                                          </b>
                                          <p>Total Pengguna</p>
                                       </div>
                                       <div class="ap-po-details__icon-area">
                                          <div class="svg-icon order-bg-opacity-secondary color-secondary">
                                             <i class="uil uil-users-alt"></i>
                                          </div>
                                       </div>
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
                                                <h4 style="font-size: 18px">Summary Orders</h4>
                                                </b>
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
                                                         <span class="userDatatable-title">Status Pembayaran</span>
                                                      </th>
                                                      <th>
                                                          <span class="userDatatable-title">Status Order</span>
                                                      </th>
                                                      <th>
                                                         <span class="userDatatable-title">Status Pengambilan</span>
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
                                                     <td>
                                                        <div class="userDatatable-content d-inline-block">
                                                           @php 
                                                              if($transaksi->status_order === 'PENDING'){
                                                                $label_so = 'warning';
                                                              }elseif($transaksi->status_order === 'PROSES'){
                                                                $label_so = 'info';
                                                              }elseif($transaksi->status_order === 'SELESAI'){
                                                                $label_so = 'success';
                                                              }else{
                                                                $label_so = 'danger';
                                                              }
                                                           @endphp
                                                           <span class="bg-opacity-{{$label_so}}  color-{{$label_so}} rounded-pill userDatatable-content-status active">{{ $transaksi->status_order }}</span>
                                                        </div>
                                                     </td>
                                                     <td>
                                                      <div class="userDatatable-content d-inline-block">
                                                      @php 
                                                          if($transaksi->status_pengambilan === 'Belum Diambil'){
                                                          $label_speng = 'warning';
                                                          }elseif($transaksi->status_pengambilan === 'Sudah Diambil'){
                                                          $label_speng = 'success';
                                                          }else{
                                                          $label_speng = 'danger';
                                                          }
                                                      @endphp
          
          
                                                          <span class="bg-opacity-{{$label_speng}}  color-{{$label_speng}} rounded-pill userDatatable-content-status active">{{ $transaksi->status_pengambilan }}</span>
                                                       </div>
                                                     </td>
          
                                                      <td style="text-align: center">
                                                    
                                                        <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">
          
                                                          <li>
                                                            <a data-bs-toggle="modal" data-bs-target="#detail{{$transaksi->id}}" class="view">
                                                            <i class="uil uil-invoice"></i>
                                                            </a>
                                                         </li>
          
                                                              
          

                                                              </div></div>
                                                              <script>
                                                                "use strict";
                                                              !(function () {
                                                                  var buttondelete = document.querySelector("#confirm-delete{{$transaksi->id}}");
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
                                                                                                $('#delete-post-form{{$transaksi->id}}').submit();
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
          
                                              <!-- MODAL UBAH STATUS -->
                                                   <div class="modal fade" id="edittransaksi{{$transaksi->id}}" tabindex="-1" style="display: none;" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                      <div class="modal-content">
                                                        <div class="modal-header">
                                                          <h5 class="modal-title" id="modalCenterTitle">Ubah Status Order</h5>
                                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="{{ route('orders.ubah_status_order',$transaksi->id)}}" method="POST">
                                                          @csrf
                                                          @method('PUT')
                                                
                                                        <div class="modal-body">
                                                          <div class="row">
                                                            <div class="col-12 mb-3">
                                                              <label for="nameWithTitle" class="form-label">Status Order</label>
                                                              <select class="select form-control" name="status_order" required>
                                                                @if ($transaksi->status_order === 'PENDING')
                                                                    <option value="PENDING">PENDING</option>
                                                                    <option value="PROSES">PROSES</option>
                                                                    <option value="SELESAI">SELESAI</option>
                                                                @endif
          
                                                                @if ($transaksi->status_order === 'PROSES')
                                                                    <option value="PROSES">PROSES</option>
                                                                    <option value="SELESAI">SELESAI</option>
                                                                    <option value="PENDING">PENDING</option>
                                                                @endif
          
                                                                @if ($transaksi->status_order === 'SELESAI')
                                                                    <option value="SELESAI">SELESAI</option>
                                                                    <option value="PENDING">PENDING</option>
                                                                    <option value="PROSES">PROSES</option>
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
                              
                              {{-- <div class="col-lg-12 mb-30">
                                 <div class="card mt-30">
                                    <div class="card-body">
                                     
                                          <div class="table-responsive">
                                             <div class="adv-table-table__header">
                                                <b>
                                                <h4 style="font-size: 18px">Log Activity Users</h4></b>
                                             </div><br>
                               
                                             <table  id="datatables2" class="display" data-order='[[ 0, "desc" ]]'>
                                                <thead>
                                                   <tr class="userDatatable-header">
                                                      <th>
                                                         <span class="userDatatable-title">Invoice</span>
                                                      </th>
                                                      <th>
                                                         <span class="userDatatable-title">Tanggal</span>
                                                      </th>
                                                      <th>
                                                         <span class="userDatatable-title">User</span>
                                                      </th>
                                                      <th>
                                                         <span class="userDatatable-title">Layanan</span>
                                                      </th>
                                                      <th data-type="html" data-name="position">
                                                         <span class="userDatatable-title">Status Pembayaran</span>
                                                      </th>
                                                      <th data-type="html" data-name="status">
                                                         <span class="userDatatable-title">Status Order</span>
                                                      </th>
                                                      <th data-type="html" data-name="status">
                                                         <span class="userDatatable-title">Status Pengambilan</span>
                                                      </th>
                                                   </tr>
                                                </thead>
                                                <tbody>
                                                   <tr>
                                                      <td>
                                                         <div class="userDatatable-content">01</div>
                                                      </td>
                                                      <td>
                                                         <div class="userDatatable-content">12/01/2024 15:04:00</div>
                                                      </td>
                                                      <td>
                                                         <div class="d-flex">
                                                            <div class="userDatatable-inline-title">
                                                               <a href="#" class="text-dark fw-500">
                                                                  <h6>Kellie Marquot </h6>
                                                               </a>
                                                            </div>
                                                         </div>
                                                      </td>
                                                      <td>
                                                         <div class="userDatatable-content">
                                                            Business Development
                                                         </div>
                                                      </td>
                                                      <td>
                                                         <div class="userDatatable-content d-inline-block">
                                                            <span class="bg-opacity-success  color-success rounded-pill userDatatable-content-status active">Lunas</span>
                                                         </div>
                                                      </td>
                                                      <td>
                                                         <div class="userDatatable-content d-inline-block">
                                                            <span class="bg-opacity-success  color-success rounded-pill userDatatable-content-status active">Selesai</span>
                                                         </div>
                                                      </td>
                                                      <td>
                                                         <div class="userDatatable-content d-inline-block">
                                                            <span class="bg-opacity-success  color-success rounded-pill userDatatable-content-status active">Sudah Diambil</span>
                                                         </div>
                                                      </td>
                                                   </tr>
                                                   <tr>
                                                      <td>
                                                         <div class="userDatatable-content">02</div>
                                                      </td>
                                                      <td>
                                                         <div class="userDatatable-content">12/01/2024 15:04:00</div>
                                                      </td>
                                                      <td>
                                                         <div class="d-flex">
                                                            <div class="userDatatable-inline-title">
                                                               <a href="#" class="text-dark fw-500">
                                                                  <h6>Robert Clinton</h6>
                                                               </a>
                                                            </div>
                                                         </div>
                                                      </td>
                                                      <td>
                                                         <div class="userDatatable-content">
                                                            Vehicle Master
                                                         </div>
                                                      </td>
                                                      <td>
                                                         <div class="userDatatable-content d-inline-block">
                                                            <span class="bg-opacity-success  color-success rounded-pill userDatatable-content-status active">Lunas</span>
                                                         </div>
                                                      </td>
                                                      <td>
                                                         <div class="userDatatable-content d-inline-block">
                                                            <span class="bg-opacity-success  color-success rounded-pill userDatatable-content-status active">Selesai</span>
                                                         </div>
                                                      </td>
                                                      <td>
                                                         <div class="userDatatable-content d-inline-block">
                                                            <span class="bg-opacity-warning  color-warning rounded-pill userDatatable-content-status active">Belum Diambil</span>
                                                         </div>
                                                      </td>
                                                   </tr>
                                                   <tr>
                                                      <td>
                                                         <div class="userDatatable-content">03</div>
                                                      </td>
                                                      <td>
                                                         <div class="userDatatable-content">12/01/2024 15:04:00</div>
                                                      </td>
                                                      <td>
                                                         <div class="d-flex">
                                                            <div class="userDatatable-inline-title">
                                                               <a href="#" class="text-dark fw-500">
                                                                  <h6>Chris Joe</h6>
                                                               </a>
                                                            </div>
                                                         </div>
                                                      </td>
                                                      <td>
                                                         <div class="userDatatable-content">
                                                            Smart Collection
                                                         </div>
                                                      </td>
                                                      <td>
                                                         <div class="userDatatable-content d-inline-block">
                                                            <span class="bg-opacity-warning  color-warning rounded-pill userDatatable-content-status active">Belum Lunas</span>
                                                         </div>
                                                      </td>
                                                      <td>
                                                         <div class="userDatatable-content d-inline-block">
                                                            <span class="bg-opacity-primary  color-primary rounded-pill userDatatable-content-status active">Proses</span>
                                                         </div>
                                                      </td>
                                                      <td>
                                                         <div class="userDatatable-content d-inline-block">
                                                            <span class="bg-opacity-warning  color-warning rounded-pill userDatatable-content-status active">Belum Diambil</span>
                                                         </div>
                                                      </td>
                                                   </tr>
                                                </tbody>
                                             </table>
                                          </div>
                                     
                                    </div>
                                 </div>
                              </div> --}}

                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>

@include('layouts.footer')
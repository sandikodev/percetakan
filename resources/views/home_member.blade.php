@include('layouts.header')
@include('layouts.sidebar')
@php

$satu   = App\Models\Transaksi::where([ ['id_user','=',Auth::user()->id],['status_pembayaran','=','PAID'] ])->sum('total_tagihan');
$dua   = App\Models\Transaksi::where([ ['id_user','=',Auth::user()->id],['status_pembayaran','=','PAID'] ])->sum('harga_addons_service');
$total_transaksi_selesai   = $satu+$dua;

$tiga = App\Models\Transaksi::where([ ['id_user','=',Auth::user()->id],['status_pembayaran','=','PAID'] ])->sum('total_tagihan');
$empat = App\Models\Transaksi::where([ ['id_user','=',Auth::user()->id],['status_pembayaran','=','PAID'] ])->sum('harga_addons_service');
$total_tagihan_belum_lunas = $tiga + $empat;


$total_pending_orders      = App\Models\Transaksi::where([ ['id_user','=',Auth::user()->id],['status_order','=','PENDING'] ])->count('id');
$total_proses_orders      = App\Models\Transaksi::where([ ['id_user','=',Auth::user()->id],['status_order','=','PROSES'] ])->count('id');
$total_order_belum_diambil = App\Models\Transaksi::where([ ['id_user','=',Auth::user()->id],['status_pengambilan','=','Belum Diambil'] ])->count('id');
$total_orders              = App\Models\Transaksi::where('id_user','=',Auth::user()->id)->count('id');


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
                                          <h1 style="font-size:30px">Rp {{ number_format($total_transaksi_selesai,0,',','.') }}</h1>
                                          </b>
                                          <p>Total Transaksi Selesai</p>
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
                           <div class="col-xxl-6 col-sm-6 mb-25">
                              <div class="ap-po-details ap-po-details--2 p-25 radius-xl d-flex justify-content-between">
                                 <div class="overview-content w-100">
                                    <div class=" ap-po-details-content d-flex flex-wrap justify-content-between">
                                       <div class="ap-po-details__titlebar">
                                          <b>
                                          <h1 style="font-size:30px">Rp {{ number_format($total_tagihan_belum_lunas,0,',','.') }}</h1>
                                          </b>
                                          <p>Total Tagihan Belum Lunas</p>
                                       </div>
                                       <div class="ap-po-details__icon-area">
                                          <div class="svg-icon order-bg-opacity-primary color-primary">
                                             <i class="uil uil-bill"></i>
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
                                          <p style="font-size: 14px">Pesanan Pending</p>
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
                                          <h1 style="font-size:30px">{{$total_proses_orders}}</h1>
                                          </b>
                                          <p>Pesanan Diproses</p>
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
                                        <h1 style="font-size:30px">{{$total_orders }}</h1>
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
                                                   <div class="userDatatable-content"><a  href="{{ URL::to('transaksi/invoice?d='.$transaksi->id_transaksi) }}" target="_blank" style="color:blue">#{{ $transaksi->id }} </a></div>
                                                </td>
                                                <td>
                                                   <div class="userDatatable-content">{{$transaksi->created_at }}</div>
                                                </td>
                                               <td>
                                                <div class="userDatatable-content">{{$transaksi->nama_layanan }}</div>
                                             </td>
                                             <td>
                                                <div class="userDatatable-content d-inline-block">
                                                   @php 
                                                      if($transaksi->status_pembayaran === 'PAID'){
                                                      $label_so = 'warning';
                                                      }elseif($transaksi->status_pembayaran === 'MENUNGGU KONFIRMASI'){
                                                      $label_so = 'warning';
                                                      }elseif($transaksi->status_pembayaran === 'SUCCESS'){
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
                                                        if($transaksi->status_order === 'PAID'){
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
    
                                                  </ul>
                                                 
                                               </td>
                                             </tr>
    
                                          
    
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
                                                          <label for="nameWithTitle" class="form-label">Layanan / Produk Order</label>
                                                          <input class="form-control" type="text" value="{{$transaksi->nama_layanan}}" readonly>
                                                        </div>
                                                        <div class="col-12 mb-3">
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
                                                        <div class="col-4 mb-3">
                                                          <label for="nameWithTitle" class="form-label">Biaya Addons</label>
                                                          @php
                                                          if( !empty($transaksi->harga_addons_service) ){
                                                            $harga_addons = $transaksi->harga_addons_service;
                                                          }else{
                                                            $harga_addons = '-';
                                                          }
                                                        @endphp
                                                          <input class="form-control" type="text" value="{{$harga_addons}}" readonly>
                                                        </div>
                                                        <div class="col-4 mb-3">
                                                          <label for="nameWithTitle" class="form-label">Estimati Tagihan</label>
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
                                                        <div class="col-12 mb-3">
                                                          <label for="nameWithTitle" class="form-label">URL Berkas <small> <a href="{{$transaksi->url_berkas}}" target="_blank" style="color: blue">*KLIK DISINI</a> </small></label>
                                                          <input class="form-control" type="text" value="{{$transaksi->url_berkas}}" readonly>
                                                        </div>
                                                        <div class="col-12 mb-3">
                                                          <label for="nameWithTitle" class="form-label">Catatan Anda</label>
                                                          <textarea class="form-control" type="text" rows="4" readonly>{{$transaksi->catatan_order}}</textarea>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  <div class="modal-footer">
                                                    <a href="{{ URL::to('transaksi/invoice?d='.$transaksi->id_transaksi) }}" target="_blank">
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
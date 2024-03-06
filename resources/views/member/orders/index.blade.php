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
                                      <h4 style="font-size: 18px">History Pemesanan</h4>
                                      </b>
                                  @if($total_unpaid > 1)
                                  <form action="{{ route('orders.bayar_semua',time()) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="d-flex justify-content-md-end align-items-center gap-3 flex-wrap">
                                        <a class="app-academy-md-50 d-flex align-items-right" style="justify-content: center;">
                                         <button type="submit" class="btn btn-primary d-grid w-100 mb-2" style="background-color:#8231d3">
                                             <span class="d-flex align-items-center justify-content-center text-nowrap">
                                                 <i class="uil uil-credit-card"></i>
                                                 Bayar Semua
                                             </span>
                                           </button>
                                       </a>
                                   </div>

                                  </form>
                                   @endif

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
                                               <span class="userDatatable-title">Biaya Addons</span>
                                            </th>
                                            <th>
                                              <span class="userDatatable-title">Estimasi Tagihan</span>
                                           </th>
                                           <th>
                                            <span class="userDatatable-title">Tagihan Akhir</span>
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
                                        @php $i = 1 @endphp

                                        @foreach ($history as $item)
                                         <tr>
                                            <td>
                                               <div class="userDatatable-content">{{ $i++ }}</div>
                                            </td>
                                            <td>
                                               <div class="userDatatable-content">{{$item->nama_layanan }}</div>
                                            </td>
                                            <td>
                                              <div class="userDatatable-content">Rp {{ number_format($item->harga_addons_service,0,',','.') }} 
                                              </div>
                                            </td>
                                           <td>
                                            <div class="userDatatable-content">Rp {{ number_format($item->total_tagihan,0,',','.') }}</div>
                                          </td>
                                          <td>
                                            <div class="userDatatable-content">Rp {{ number_format($item->total_tagihan + $item->harga_addons_service,0,',','.') }}</div>
                                          </td>
                                          <td>
                                            <div class="userDatatable-content d-inline-block">
                                               @php 
                                                  if($item->status_pembayaran === 'UNPAID'){
                                                    $label_sp = 'warning';
                                                  }elseif($item->status_pembayaran === 'PAID'){
                                                    $label_sp = 'success';
                                                  }else{
                                                    $label_sp = 'danger';
                                                  }
                                               @endphp
                                               <span class="bg-opacity-{{$label_sp}}  color-{{$label_sp}} rounded-pill userDatatable-content-status active">{{ $item->status_pembayaran }}</span>
                                            </div>
                                         </td>
                                         <td>
                                            <div class="userDatatable-content d-inline-block">
                                               @php 
                                                  if($item->status_order === 'PENDING'){
                                                    $label_so = 'warning';
                                                  }elseif($item->status_order === 'PROSES'){
                                                    $label_so = 'info';
                                                  }elseif($item->status_order === 'SELESAI'){
                                                    $label_so = 'success';
                                                  }else{
                                                    $label_so = 'danger';
                                                  }
                                               @endphp
                                               <span class="bg-opacity-{{$label_so}}  color-{{$label_so}} rounded-pill userDatatable-content-status active">{{ $item->status_order }}</span>
                                            </div>
                                         </td>
                                         <td>
                                            <div class="userDatatable-content d-inline-block">
                                              @php 
                                              if($item->status_pengambilan === 'Belum Diambil'){
                                                $label_speng = 'warning';
                                              }elseif($item->status_pengambilan === 'Sudah Diambil'){
                                                $label_speng = 'success';
                                              }else{
                                                $label_speng = 'danger';
                                              }
                                           @endphp
                                               <span class="bg-opacity-{{$label_speng}}  color-{{$label_speng}} rounded-pill userDatatable-content-status active">{{ $item->status_pengambilan }}</span>
                                            </div>
                                         </td>
                                            <td style="text-align: center">
                                              <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">
                                                     <li>
                                                        <a  href="{{ URL::to('transaksi/invoice?d='.$item->id_transaksi) }}" target="_blank" class="view">
                                                        <i class="uil uil-bill"></i>
                                                        </a>
                                                     </li>
                                                      <li>
                                                          <a  data-bs-toggle="modal" data-bs-target="#detail{{$item->id}}" class="view">
                                                          <i class="uil uil-info-circle"></i>
                                                          </a>
                                                      </li>

                                                      @if($item->status_pembayaran === 'UNPAID' && $item->status_order === 'UNPAID')

                                                      <li>
                                                        <form id="delete-post-form{{$item->id}}" action="{{ route('orders.destroy_transaksi_customer', $item->id) }}" method="POST">
                                                          @csrf
                                                          @method('DELETE')
                                                          <a id="confirm-delete{{$item->id}}" class="remove">
                                                            <i class="uil uil-trash-alt"></i>
                                                            </a>
                                                        </form>

                                                        <script>
                                                          "use strict";
                                                        !(function () {
                                                            var buttondelete = document.querySelector("#confirm-delete{{$item->id}}");
                                                                buttondelete &&
                                                                    (buttondelete.onclick = function () {
                                                                        Swal.fire({
                                                                            title: "Yakin ingin hapus?",
                                                                            text: "Data yang bisa dihapus hanyalah dengan status pembayaran dan status order 'PENDING' !",
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
                                                                                          $('#delete-post-form{{$item->id}}').submit();
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

                                                      @else

                                                      @endif

                                                   
                                                    
                                              </ul>
                                             {{-- <center> 
                                                <a  data-bs-toggle="modal" data-bs-target="#detailLayanan{{$item->id}}" >
                                                <button class="btn btn-primary">Lihat Detail</button>
                                                </a>
                                             </center> --}}
                                       
                                             
                                           </td>
                                         </tr>

                                <!-- MODAL DETAIL -->
                                <div class="modal fade" id="detail{{$item->id}}" tabindex="-1" style="display: none;" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="modalCenterTitle">Detail Transaksi [ INVOICE #{{$item->id}} ]</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                              
                                      <div class="modal-body">
                                        <div class="row">
                                          <div class="col-6 mb-3">
                                            <label for="nameWithTitle" class="form-label">Tanggal Order</label>
                                            <input class="form-control" type="text" value="{{$item->created_at}}" readonly>
                                          </div>
                                          <div class="col-6 mb-3">
                                            <label for="nameWithTitle" class="form-label">Layanan / Produk Order</label>
                                            <input class="form-control" type="text" value="{{$item->nama_layanan}}" readonly>
                                          </div>
                                          <div class="col-12 mb-3">
                                            <label for="nameWithTitle" class="form-label">Jenis Bahan</label>
                                            <input class="form-control" type="text" value="{{$item->nama_bahan}} [ Panjang {{$item->panjang_bahan}} ] [ Rp {{ number_format($item->harga_bahan_cm2,0,',','.') }} /cm² ]" readonly>
                                          </div>
                                          <div class="col-6 mb-3">
                                            <label for="nameWithTitle" class="form-label">Jenis Laminasi</label>
                                            @php
                                              if( !empty($item->nama_laminasi) ){
                                                $nama_laminasi = $item->nama_laminasi.' [ Rp '.number_format($item->harga_laminasi_cm2,0,',','.').' /cm² ]';
                                              }else{
                                                $nama_laminasi = '-';
                                              }
                                            @endphp
                                            <input class="form-control" type="text" value="{{$nama_laminasi}}" readonly>
                                          </div>
                                          <div class="col-6 mb-3">
                                            <label for="nameWithTitle" class="form-label">Addons Service</label>
                                            @php
                                            if( !empty($item->addons) ){
                                              $nama_addons = $item->addons;
                                            }else{
                                              $nama_addons = '-';
                                            }
                                          @endphp
                                            <input class="form-control" type="text" value="{{$nama_addons}}" readonly>
                                          </div>
                                          <div class="col-4 mb-3">
                                            <label for="nameWithTitle" class="form-label">Biaya Addons</label>
                                            @php
                                            if( !empty($item->harga_addons_service) ){
                                              $harga_addons = $item->harga_addons_service;
                                            }else{
                                              $harga_addons = '-';
                                            }
                                          @endphp
                                            <input class="form-control" type="text" value="{{$harga_addons}}" readonly>
                                          </div>
                                          <div class="col-4 mb-3">
                                            <label for="nameWithTitle" class="form-label">Estimasi Tagihan</label>
                                            <input class="form-control" type="text" value="Rp {{ number_format($item->total_tagihan,0,',','.') }}" readonly>
                                          </div>
                                          <div class="col-4 mb-3">
                                            <label for="nameWithTitle" class="form-label">Tagihan Akhir</label>
                                            <input class="form-control" type="text" value="Rp {{ number_format($item->total_tagihan + $item->harga_addons_service,0,',','.') }}" readonly>
                                          </div>

                                          <div class="col-4 mb-3">
                                            <label for="nameWithTitle" class="form-label">Status Pembayaran</label>
                                            <input class="form-control" type="text" value="{{ $item->status_pembayaran }}" readonly>
                                          </div>
                                          <div class="col-4 mb-3">
                                            <label for="nameWithTitle" class="form-label">Status Order</label>
                                            <input class="form-control" type="text" value="{{ $item->status_order }}" readonly>
                                          </div>
                                          <div class="col-4 mb-3">
                                            <label for="nameWithTitle" class="form-label">Status Pengambilan</label>
                                            <input class="form-control" type="text" value="{{ $item->status_pengambilan }}" readonly>
                                          </div>
                                          <div class="col-12 mb-3">
                                            <label for="nameWithTitle" class="form-label">URL Berkas <small> <a href="{{$item->url_berkas}}" target="_blank" style="color: blue">*KLIK DISINI</a> </small></label>
                                            <input class="form-control" type="text" value="{{$item->url_berkas}}" readonly>
                                          </div>
                                          <div class="col-12 mb-3">
                                            <label for="nameWithTitle" class="form-label">Catatan Anda</label>
                                            <textarea class="form-control" type="text" rows="4" readonly>{{$item->catatan_order}}</textarea>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                        <a href="{{ URL::to('transaksi/invoice?d='.$item->id_transaksi) }}" target="_blank">
                                        <button type="button" class="btn border rounded-pill bg-normal text-gray px-25 print-btn">
                                          <img src="{{asset('percetakan/img/svg/upload.svg')}}" alt="upload" class="svg"> Invoice </button></a>
                                        <button type="button" class="btn border btn-label-primary rounded-pill" data-bs-dismiss="modal" style="background-color:#7367f0;"><font color="white">Close</font></button>
                                      </div>
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
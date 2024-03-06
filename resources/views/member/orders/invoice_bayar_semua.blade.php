@include('layouts/header')
@include('layouts/sidebar')

<div class="contents">
<br>
    <div class="container-fluid">
       <div class="row">
          <div class="col-lg-12">
             <div class="payment-invoice global-shadow radius-xl w-100 mb-30">
                <div class="payment-invoice__body">
                   <div class="payment-invoice-qr d-flex justify-content-between mb-40 px-xl-50 px-30 py-sm-30 py-20 ">
                      <div class="d-flex justify-content-center mb-lg-0 mb-25">
                         <div class="payment-invoice-qr__number">
                            <div class="display-3">
                               Invoice
                            </div>
                            <p>Status Pembayaran : <span class="bg-opacity-warning rounded-pill userDatatable-content-status active">UNPAID</span></p>
                         </div>
                      </div>
                      <div class="d-flex justify-content-center mb-lg-0 mb-25">

                      </div>
                      <div class="d-flex justify-content-center">
                         <div class="payment-invoice-qr__address">
                            <br>
                            <p>Invoice To:</p>
                            <span>{{ Auth::user()->name }}</span><br>
                            <span>{{ Auth::user()->nomor_whatsapp }}</span><br>
                            <span>{{ Auth::user()->email }}</span>
                         </div>
                      </div>
                   </div>
                   <div class="payment-invoice-table">
                      <div class="table-responsive">
                         <table id="cart" class="table table-borderless">
                           <tbody>
                              @php
                                 $list_transaksi   = App\Models\Transaksi::where([ ['id_user','=',Auth::user()->id],['status_pembayaran','=','UNPAID'] ])->get();
                              @endphp

                              @foreach ($list_transaksi as $item)

                              @php
                                 $satuanlayanan   = App\Models\Layanan::where('id','=',$item->id_layanan)->first();
                              @endphp

                              <tr>
                                 <td colspan="5" class="Product-cart-title">
                                    <div class="media  align-items-center">
                                       <div class="media-body">
                                          <h5 class="mt-0"><b>Nama Layanan/Produk</b></h5>
                                       </div>
                                    </div>
                                 </td>
                                 <td class="invoice-quantity text-end">{{$item->nama_layanan}}</td>
                              </tr>
                              <tr>
                                 @if($satuanlayanan->satuan == 'Lebar')
                                <td  colspan="5" class="Product-cart-title">
                                   <div class="media  align-items-center">
                                      <div class="media-body">
                                         <h5 class="mt-0">Total Lebar</h5>
                                      </div>
                                   </div>
                                </td>
                                 <td class="invoice-quantity text-end">{{$item->lebar}} cm</td>
                                 @elseif($satuanlayanan->satuan == 'Pcs')
                                 <td  colspan="5" class="Product-cart-title">
                                    <div class="media  align-items-center">
                                       <div class="media-body">
                                          <h5 class="mt-0">Total Pcs</h5>
                                       </div>
                                    </div>
                                 </td>
                                  <td class="invoice-quantity text-end">{{$item->lebar}}</td>
                                 @endif
                              </tr>
                              <tr>
                                <td colspan="5" class="Product-cart-title">
                                   <div class="media  align-items-center">
                                      <div class="media-body">
                                         <h5 class="mt-0">Jenis Bahan</h5>
                                      </div>
                                   </div>
                                </td>
                                <td class="invoice-quantity text-end">{{$item->nama_bahan}} [ Panjang {{ $item->panjang_bahan }} ] [ Rp {{ number_format($item->harga_bahan_cm2,0,',','.') }} /cm² ] </td>
                              </tr>
                              <tr>
                                <td colspan="5" class="Product-cart-title">
                                   <div class="media  align-items-center">
                                      <div class="media-body">
                                         <h5 class="mt-0">Jenis Laminasi</h5>
                                      </div>
                                   </div>
                                </td>
                                <td  class="invoice-quantity text-end">
                                   @if(!empty($item->id_laminasi))

                                         {{$item->nama_laminasi}} [ Rp {{ number_format($item->harga_laminasi_cm2,0,',','.') }} /cm² ]

                                   @else
                                         - 
                                   @endif
                                  </td>
                                </tr>
                                <tr>
                                   <td colspan="5" class="Product-cart-title">
                                      <div class="media  align-items-center">
                                         <div class="media-body">
                                            <h5 class="mt-0">Addons Service</h5>
                                         </div>
                                      </div>
                                   </td>
                                   <td  class="invoice-quantity text-end">
                                      @if(!empty($item->addons_service))
  
                                            {{$item->addons_service}}
  
                                      @else
                                            - 
                                      @endif
                                     </td>
                                   </tr>
                                   <tr>
                                      <td colspan="5" class="Product-cart-title">
                                         <div class="media  align-items-center">
                                            <div class="media-body">
                                               <h5 class="mt-0">Estimasi Harga</h5>
                                            </div>
                                         </div>
                                      </td>
                                      <td  class="invoice-quantity text-end">
                                     <b> Rp {{ number_format($item->total_tagihan,0,',','.') }} </b>
                                     </td>
                                     
                                      </tr>
                                      @endforeach
                           </tbody>
                           <tfoot>
                              <tr>
                                 <td colspan="5" class="order-summery float-right border-0">
                                    <div class="total-money mt-3 text-end">
                                    </div>
                                 </td>
                                 <td>
                                   <br>
                                    <div class="total-order float-right text-end fs-16 fw-500">
                                      <h5 class="text-end">Total Estimasi : <b> Rp {{ number_format($total_tagihan,0,',','.') }} </b></h5>
                                    </div>
                                 </td>
                              </tr>
                           </tfoot>
                         </table>
                      </div>

                      @php
                      $web_payment        = App\Models\Website::first();
                      @endphp

                      @if ($web_payment->payment === 'MANUAL') 
                          @if (Auth::user()->id <> 1)
                              <center>
                                  <button id="button1" data-bs-toggle="modal" data-bs-target="#manualpayment" class="btn btn-primary">BAYAR</button>
                              </center>
                          @endif
                      @else
                          @if (Auth::user()->id <> 1)
                          <center>
                              <button id="pay-button" class="btn btn-primary">BAYAR</button>
                          </center>
                          @endif
                      @endif
   

                      <div class="payment-invoice__btn mt-xxl-50 pt-xxl-30">


                        <br><br><br>
                         <button id="button2" type="button" class="btn border rounded-pill bg-normal text-gray px-25 print-btn">
                         <img src="{{asset('percetakan/img/svg/upload.svg')}}" alt="upload" class="svg" style="background-color: white">download</button>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>


 <script type="text/javascript">
    // For example trigger on button clicked, or any time you need
    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function () {
      // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
      window.snap.pay('{{$snapToken}}', {
        onSuccess: function(result){
          /* You may add your own implementation here */
          alert("payment success!"); console.log(result);
        },
        onPending: function(result){
          /* You may add your own implementation here */
          alert("wating your payment!"); console.log(result);
        },
        onError: function(result){
          /* You may add your own implementation here */
          alert("payment failed!"); console.log(result);
        },
        onClose: function(){
          /* You may add your own implementation here */
          alert('you closed the popup without finishing the payment');
        }
      })
    });
  </script>


@include('layouts/footer')
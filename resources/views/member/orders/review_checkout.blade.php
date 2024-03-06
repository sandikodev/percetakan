@include('layouts/header')
@include('layouts/sidebar')

<div class="contents">
<br>
    <div class="container-fluid">
       <div class="row">
          <div class="col-lg-12">

             <div class="payment-invoice global-shadow radius-xl w-100 mb-30">
                <div class="payment-invoice__body">

                  <div class="row">
                     <div class="col-lg-12 margin-tb">
                         <div class="pull-right">
                             <br>
                             <a class="btn btn-secondary" href="{{ route('orders.buat_pesanan') }}"><i class="uil uil-arrow-left"></i> Back</a>
                             <br>
                         </div>
                     </div>
                 </div>


                   <div class="payment-invoice-qr d-flex justify-content-center mb-40 px-xl-50 px-30 py-sm-30 py-20 ">
                      <div class="d-flex justify-content-center mb-lg-0 mb-25">
                         <div class="payment-invoice-qr__number">
                           <center>
                            <div class="display-3">
                               Review Checkout
                            </div>
                            <p>Date : <span>{{ $transaksi->created_at }}</span></p>
                           </center>
                         </div>
                      </div>
                      <div class="d-flex justify-content-center mb-lg-0 mb-25">

                      </div>
                   </div>
           
                   <div class="payment-invoice-table">
                      <div class="table-responsive">
                         <table id="cart" class="table table-borderless">

                            <tbody>
                               <tr>
                                  <td colspan="5" class="Product-cart-title">
                                     <div class="media  align-items-center">
                                        <div class="media-body">
                                           <h5 class="mt-0">Nama Layanan/Produk</h5>
                                        </div>
                                     </div>
                                  </td>
                                  <td class="invoice-quantity text-end">{{$transaksi->nama_layanan}}</td>
                               </tr>
                               <tr>
                                 <td  colspan="5" class="Product-cart-title">
                                    <div class="media  align-items-center">
                                       <div class="media-body">
                                          <h5 class="mt-0">Total Lebar</h5>
                                       </div>
                                    </div>
                                 </td>
                                  <td class="invoice-quantity text-end">{{$transaksi->lebar}} cm</td>
                               </tr>
                               <tr>
                                 <td colspan="5" class="Product-cart-title">
                                    <div class="media  align-items-center">
                                       <div class="media-body">
                                          <h5 class="mt-0">Jenis Bahan</h5>
                                       </div>
                                    </div>
                                 </td>
                                 <td class="invoice-quantity text-end">{{$transaksi->nama_bahan}} [ Panjang {{ $transaksi->panjang_bahan }} ] [ Rp {{ number_format($transaksi->harga_bahan_cm2,0,',','.') }} /cm² ] </td>
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
                                    @if(!empty($transaksi->id_laminasi))

                                          {{$transaksi->nama_laminasi}} [ Rp {{ number_format($transaksi->harga_laminasi_cm2,0,',','.') }} /cm² ]

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
                                       @if(!empty($transaksi->addons_service))
   
                                             {{$transaksi->addons_service}}
   
                                       @else
                                             - 
                                       @endif
                                      </td>
                                    </tr>
                                    <tr>
                                       <td colspan="5" class="Product-cart-title">
                                          <div class="media  align-items-center">
                                             <div class="media-body">
                                                <h5 class="mt-0">Catatan</h5>
                                             </div>
                                          </div>
                                       </td>
                                       <td  class="invoice-quantity text-end">
                                          @if(!empty($transaksi->catatan))
      
                                                {{$transaksi->catatan}}
      
                                          @else
                                                - 
                                          @endif
                                         </td>
                                       </tr>
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
                                       <h5 class="text-end">Total Estimasi :  Rp {{ number_format($transaksi->total_tagihan,0,',','.') }}</h5>
                                     </div>
                                  </td>
                               </tr>
                            </tfoot>
                         </table>
                      </div>

                      <form action="{{ route('orders.checkout',$_GET['d']) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <input name="id_transaksi" value="{{$_GET['d']}}" hidden>

                        <center>
                           <button type="submit" class="btn btn-primary" style="background-color:#8231d3">Checkout Sekarang</button>
                        </center>
                      </form>


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
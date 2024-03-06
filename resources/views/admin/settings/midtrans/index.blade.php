@include('layouts/header')
@include('layouts/sidebar')


<div class="contents">
  <div class="crm mb-25">
     <div class="container-fluid">


<br>
        <div class="row">
            <div class="col-xl">
              <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                  <h5 class="mb-0">Payment Gateway Midtrans Settings
                  </h5>
                  <br>
                 <font style="font-family: Arial, Helvetica, sans-serif;text-transform: lowercase"> * Payment Notification URL : {{ url('api/midtrans-callback')}} </font>
                </div>
                <div class="card-body">
        <form action="{{ route('midtrans.ubah_midtrans',1) }}" method="POST">
            @csrf
            @method('PUT')

                    <div class="mb-3">
                      <label class="form-label">MERCHANT ID </label>
                      <input type="text" name="merchant_id" value="{{$midtrans->merchant_id}}" class="form-control" >
                    </div>
                    <div class="mb-3">
                      <label class="form-label">CLIENT KEY</label>
                      <input type="text" name="client_key" value="{{$midtrans->client_key}}"  class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">SERVER KEY</label>
                        <input type="text" name="server_key" value="{{$midtrans->server_key}}"  class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">IS PRODUCTION</label>
                        <select class="form-control" name="is_production">
                            @if ($midtrans->is_production == 'false')
                                <option value="false" selected>FALSE</option>
                                <option value="true">TRUE</option>
                            @else
                                <option value="true" selected>TRUE</option>
                                <option value="false">FALSE</option>
                            @endif

                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">SNAP URL</label>
                        <select class="form-control" name="snap_url">
                            @if ($midtrans->snap_url == 'https://app.sandbox.midtrans.com/snap/snap.js')
                                <option value="https://app.sandbox.midtrans.com/snap/snap.js" selected>DEVELOPMENT</option>
                                <option value="https://app.midtrans.com/snap/snap.js">PRODUCTION</option>
                            @else
                                <option value="https://app.midtrans.com/snap/snap.js" selected>PRODUCTION</option>
                                <option value="https://app.sandbox.midtrans.com/snap/snap.js">DEVELOPMENT</option>
                            @endif

                        </select>
                    </div>
                    <center>
                    <button type="submit" class="btn btn-primary me-sm-3 me-1 waves-effect waves-light " style="background-color: #7367f0;">UBAH</button>
                    </center>
                </form>
                </div>
              </div>
            </div>
          </div>
     </div>
  </div>
 
</div>

</div>
<!-- / Content -->



@include('layouts/footer')
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
                  <h5 class="mb-0">Whatsapp Gateway Settings
                  </h5>
                </div>
                <div class="card-body">
        <form action="{{ route('websettings.ubah_whatsapp_settings',1) }}" method="POST">
            @csrf
            @method('PUT')

                    <div class="mb-3">
                      <label class="form-label">INPUT CODE API WHATSAPP SENDER [ PHP CODE ] </label><br>
                      &lt;?php
                      <textarea type="text" name="whatsapp_gateway" value="{{$website->whatsapp_gateway}}" class="form-control" rows="12">{{$website->whatsapp_gateway}}</textarea>
                      ?&gt;
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
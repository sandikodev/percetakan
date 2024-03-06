@include('layouts/header')
@include('layouts/sidebar')


<div class="contents">
  <div class="crm mb-25">
     <div class="container-fluid">


<br>
            
    
<div class="app-academy">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif


        <div class="row">
            <div class="col-xl">
              <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                  <h5 class="mb-0">Website Settings</h5> 
                </div>
                <div class="card-body">
        <form action="{{ route('websettings.ubah_web_settings',1) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">

            <div class="col-sm-12 col-lg-3 mb-3">
                <div class="fv-plugins-icon-container">
                <label class="form-label">Logo Website</label>
            <style>
                .dropzone:not(.dz-clickable) {
                    opacity: 1;
                    cursor: not-allowed;
                }
            </style>
            <div class="dropzone"  style="border: 2px dashed #b7b0b0;" >
           <center>
            <img id="blah" src="{{asset('percetakan/img/'.$website->icon)}}" style="max-height:400px;"/>
            <br>
            
            <input  name="icon" type='file' class="form-control" style="padding:5px;width: 180px;" onchange="readURL(this);"  accept="image/jpeg, image/png, image/jpg" size="4"/><br>
            <small>*Gambar logo yang disarankan yaitu dengan ukuran 45x45 Pixel</small>
          </center>
            </div>
                </div>

            </div>
               
   
            <div class="col-sm-12 col-lg-9 mb-3">
                <div class="mb-3">
                    <label class="form-label">Nama Website</label>
                    <input type="text" name="nama_web" value="{{$website->nama_web}}"  class="form-control">
                </div>
                    <div class="mb-3">
                        <label class="form-label">Pembayaran ( Manual / Otomatis )</label>
                        <select class="form-control" name="payment">
                            @if($website->payment == 'MANUAL')
                            <option value="MANUAL" selected>MANUAL</option>
                            <option value="OTOMATIS">OTOMATIS [ Midtrans ]</option>
                            @endif
                            
                            @if($website->payment == 'OTOMATIS')
                              <option value="OTOMATIS" selected>OTOMATIS [ Midtrans ]</option>
                              <option value="MANUAL">MANUAL</option>
                            @endif
                        </select>
                    </div>
            </div>


            </div>
                    <center>
                    <button type="submit" class="btn btn-primary me-sm-3 me-1 waves-effect waves-light " style="background-color: #7367f0;">UBAH</button>
                    </center>
                </form>
                </div>
              </div>
            </div>
          </div>



          <div class="row">
            <div class="col-12">
              <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                  <h5 class="mb-0">Pembayaran Manual Settings</h5> 
                </div>
                <div class="card-body">
        <form action="{{ route('websettings.ubah_web_settings_rekening',1) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="mb-3">
                    @php
                    $databank        = App\Models\Bank::all();
                    @endphp
                    <label class="form-label">Nama Bank</label>
                    <select id="select2" name="nama_bank" class="select2 form-select form-select-md" data-allow-clear="true">
                        @if ($website->nama_bank == NULL)
                          <option value="" disabled hidden selected>- PILIH -</option>
                        @else
                          <option value="{{$website->nama_bank}}" disabled hidden selected>{{$website->nama_bank}}</option>
                        @endif
                
                        @foreach ($databank as $item)
                        <option value="{{$item->nama_bank}}">{{$item->nama_bank}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nomor Rekening</label>
                    <input type="number" name="norek_bank" value="{{$website->norek_bank}}"  class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama Pemilik Rekening / Atas Nama</label>
                    <input type="text" name="nama_pemilik_bank" value="{{$website->nama_pemilik_bank}}"  class="form-control">
                </div>
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
     </div></div></div>

</div>
<!-- / Content -->



@include('layouts/footer')

<script>
    function readURL(input) {
           if (input.files && input.files[0]) {
               var reader = new FileReader();

               reader.onload = function (e) {
                   $('#blah')
                       .attr('src', e.target.result);
               };

               reader.readAsDataURL(input.files[0]);
           }
       }
  </script>


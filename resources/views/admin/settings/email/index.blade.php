@include('layouts/header')
@include('layouts/navigation')


<!-- Content wrapper -->
<div class="content-wrapper">

<!-- Content -->       
<div class="container-xxl flex-grow-1 container-p-y">
            
    
<div class="app-academy">



        <div class="row">
            <div class="col-xl">
              <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                  <h5 class="mb-0">Mail Settings</h5> 
                </div>
                <div class="card-body">
        <form action="{{ route('settings.edit_email',1) }}" method="POST">
            @csrf
            @method('PUT')

                    <div class="mb-3">
                      <label class="form-label">Mail Transport</label>
                      <input type="text" name="mail_transport" value="{{$email->mail_transport}}" class="form-control" >
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Mail Host</label>
                      <input type="text" name="mail_host" value="{{$email->mail_host}}"  class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mail Port</label>
                        <input type="text" name="mail_port" value="{{$email->mail_port}}"  class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mail Username</label>
                        <input type="text" name="mail_username" value="{{$email->mail_username}}"  class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mail Password</label>
                        <input type="text" name="mail_password" value="{{$email->mail_password}}"  class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mail Encryption</label>
                        <input type="text" name="mail_encryption" value="{{$email->mail_encryption}}"  class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mail From</label>
                        <input type="text" name="mail_from" value="{{$email->mail_from}}"  class="form-control">
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
<!-- / Content -->



@include('layouts/footer')
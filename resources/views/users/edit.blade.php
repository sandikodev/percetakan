@include('layouts/header')
@include('layouts/sidebar')


<div class="contents">
    <div class="crm mb-25">
       <div class="container-fluid">
          <div class="row justify-content-center">
             <div class="col-lg-6">
<br>
    <div class="row">
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
    
    
      <div class="card mb-4">

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <br>
            <a class="btn btn-secondary" href="{{ route('users.index') }}"><i class="uil uil-arrow-left"></i> Back</a>
            <br>
        </div>
    </div>
</div>



{!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <center>
            <b>
          <h4 style="font-size: 18px">Edit User</h4>
            </b>
        </center>
    </div>


    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Role:</strong>
            <select name="role" class="select form-control" required>
                <option value="">- PILIH -</option>
                @foreach($roles as $role)
                <option value="{{ $role }}" >{{ $role }}</option>
                @endforeach
            </select>
        </div>
    </div>
  

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nama Lengkap:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email:</strong>
            {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Whatsapp:</strong>
            {!! Form::number('nomor_whatsapp', null, array('placeholder' => 'Nomor whatsapp','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Id Telegram:</strong>
            {!! Form::text('id_telegram', null, array('placeholder' => 'Id Telegram','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Password:</strong>
            {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
            <small>* Tidak perlu diisi jika tidak ingin dirubah/ganti</small>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Confirm Password:</strong>
            {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
            <small>* Tidak perlu diisi jika tidak ingin dirubah/ganti</small>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 text-center"> <br><br>
        <center>
        <button type="submit" class="btn btn-primary" style="background-color:#7367f0;"><font color="white">Submit</font></button>
        </center>
        <br><br>
    </div>
    <br><br><br>

</div>

{!! Form::close() !!}

</div></div></div></div></div></div></div>
@include('layouts/footer')
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
                    <a class="btn btn-secondary" href="{{ route('layanan.index') }}"><i class="uil uil-arrow-left"></i> Back</a>
                    <br>
                </div>
            </div>
        </div>

{!! Form::open(array('route' => 'layanan.post_laminasi','method'=>'POST')) !!}

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <center>
            <b>
          <h4 style="font-size: 18px">Tambah Jenis Laminasi</h4>
            </b>
        </center>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Layanan:</strong>
            <select name="id_layanan" class="form-control" required>
                <option value="">- PILIH -</option>
                @forelse ($layanan as $item)
                 <option value="{{$item->id}}">{{ $item->nama_service }}</option>
                @empty
                    <option value="">- Data Layanan Kosong -</option>
                @endforelse
               
            </select>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nama Laminasi:</strong>
            {!! Form::text('nama_laminasi', null, array('placeholder' => 'Nama Laminasi','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Harga [ /cm² ] :</strong>
            {!! Form::number('harga_cm2', null, array('placeholder' => 'Harga per cm²','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Stok :</strong>
            <select name="stok" class="select form-control" required>
                <option value="">- PILIH -</option>
                <option value="READY">READY</option>
                <option value="OUT OF STOCK">OUT OF STOCK</option>
            </select>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Keterangan:</strong>
            {!! Form::textarea('keterangan', null, array('placeholder' => 'Keterangan Tentang Layanan','class' => 'form-control')) !!}
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
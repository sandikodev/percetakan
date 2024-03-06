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


{!! Form::open(array('route' => 'orders.post_review','method'=>'POST')) !!}
@csrf


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <center><br>
            <b>
          <h4 style="font-size: 18px">Buat Pesanan</h4>
            </b><br>
        </center>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>URL Berkas ( Link Google drive ):</strong>
            <input type="text" name="url_berkas" class="form-control" placeholder="Masukan URL Berkas Media Untuk Dicetak" autofocus required>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Pilih Layanan:</strong>
            <select id="layanan" class="select form-control" name="layanan" required>
                <option value="">- PILIH -</option>
                @forelse ($layanan as $item)
                   <option value="{{$item->id}}">{{$item->nama_service}}</option>
                @empty
                  <option value="">- Belum ada layanan -</option>
                @endforelse
                
            </select>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Pilih Bahan:</strong>
                {{-- @forelse ($bahan as $item_bahan)
                   <option value="{{$item_bahan->id}}">{{$item_bahan->nama_bahan}} [ Panjang {{ $item_bahan->panjang }} ] [ Rp {{ number_format($item_bahan->harga_cm2,0,',','.') }} /cm² ] </option>
                @empty
                  <option value="">- Belum ada layanan -</option>
                @endforelse --}}
                <select class="form-control" name="bahan" id="bahan"></select>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Pilih Laminasi:</strong>
                {{-- @forelse ($laminasi as $item_laminasi)
                   <option value="{{$item_laminasi->id}}">{{$item_laminasi->nama_laminasi}} [ Rp {{ number_format($item_laminasi->harga_cm2,0,',','.') }} /cm² ] </option>
                @empty
                  <option value="">- Belum ada layanan -</option>
                @endforelse --}}
                <select class="form-control" name="laminasi" id="laminasi"></select>
        </div>
    </div>


    <div class="col-xs-12 col-sm-12 col-md-12" id="lebar" style="display: none">
        <div class="form-group">
            <strong>Total Lebar ( cm ):</strong>
            <input  type="number" name="lebar1" class="form-control" placeholder="Masukan Total Lebar Cetakan dalam Centimeter" min="1" max="100">
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12" id="Pcs" style="display: none">
        <div class="form-group">
            <strong>Total Pcs :</strong>
            <input  type="number" name="lebar2" class="form-control" placeholder="Masukan Total Pcs" min="1" max="1000">
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Addons Service:</strong>
            <select id="select5" class="select form-control" name="addons_service">
                <option hidden disabled selected>- PILIH -</option>
                <option value="">Tidak ada</option>
                @forelse ($addons as $item_addons)
                   <option value="{{$item_addons->nama_addons}}">{{$item_addons->nama_addons}} </option>
                @empty
                  <option value="">- Belum ada layanan -</option>
                @endforelse
                
            </select>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Catatan:</strong>
            <textarea rows="4" type="text" name="catatan" class="form-control"></textarea>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
    $('#layanan').on('change', function() {
       var layananID = $(this).val();


       if(layananID) {
           $.ajax({
               url: '/getBahan/'+layananID,
               type: "GET",
               data : {"_token":"{{ csrf_token() }}"},
               dataType: "json",
               success:function(data)
               {
                 if(data){
                    $('#bahan').empty();
                    $('#bahan').append('<option value="">- PILIH -</option>'); 
                    $.each(data, function(key, bahan){
                        $('select[name="bahan"]').append('<option value="'+ bahan.id +'">' + bahan.nama_bahan+ ' [ Panjang ' +bahan.panjang+ '] [ Rp '+bahan.harga_cm2+' /cm² ]</option>');
                    });
                }else{
                    $('#bahan').empty();
                }
             }
           });

           $.ajax({
               url: '/getLaminasi/'+layananID,
               type: "GET",
               data : {"_token":"{{ csrf_token() }}"},
               dataType: "json",
               success:function(data)
               {
                 if(data){
                    $('#laminasi').empty();
                    $('#laminasi').append('<option value="">- PILIH -</option>'); 
                    $.each(data, function(key, laminasi){
                        $('select[name="laminasi"]').append('<option value="'+ laminasi.id +'">' + laminasi.nama_laminasi+ ' [ Rp '+laminasi.harga_cm2+' /cm² ]</option>');
                    });
                }else{
                    $('#laminasi').empty();
                }
             }
           });

           $.ajax({
               url: '/getLebarandPcs/'+layananID,
               type: "GET",
               data : {"_token":"{{ csrf_token() }}"},
               dataType: "json",
               success:function(data)
               {
                 if(data){
                    // console.log(data.satuan);
                    // $('#lebar').empty();
                     
                    $.each(data, function(key, layanansatuan){
                        if(layanansatuan.satuan == 'Lebar'){
                            document.getElementById('Pcs').style.display = 'none';
                            document.getElementById('lebar').style.display = 'block';
                        }
                        if(layanansatuan.satuan == 'Pcs'){
                            document.getElementById('lebar').style.display = 'none';
                            document.getElementById('Pcs').style.display = 'block';
                           
                        }

                    });
                }else{
                    $('#satuan').empty();
                }
             }
           });

       }else{
         $('#bahan').empty();
         $('#laminasi').empty();
       }
    });
    });
</script>
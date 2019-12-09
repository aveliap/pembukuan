@extends ('layout.master')

@section('content')
<div class="box box-primary">
  <div class="box-header with-border">

    <h3 class="box-title">Edit Data Laundry</h3>

  </div>
  <!-- /.box-header -->
  <!-- form start -->

  <form role="form" method="post" action="{{route ('Laundry.update', ['Laundry' => $data->id_detLaundry]) }}">
  @method('PUT')

    @csrf

  <form role="form">
    <div class="box-body">
      <!-- <div class="form-group">
        <label for="exampleInputPassword1">Kode Paket</label>
        <input type="text" class="form-control" id="kode_laundry" name="kode_laundry" placeholder="Kode Paket" value="{{ $data->kode_laundry }}" required>
      </div> -->
      <div class="form-group">
        <label for="exampleInputPassword1">Nama</label>
        <input type="text" class="form-control" id="nama_laundry" name="nama_laundry" placeholder="Nama Laundry" value="{{ $data->nama_laundry }}" required>
      </div>
      <!-- <div class="form-group">
        <label for="exampleInputPassword1">Jumlah Kilo</label>
        <input type="text" class="form-control" id="jumlah_kilo" name="jumlah_kilo" placeholder="Jumlah Kilo" value="{{ $data->jumlah_kilo }}" required>
      </div> -->
      <div class="form-group">
        <label for="id_tipe">Tipe Laundry</label>
        <select class="form-control" id="id_tipe_laundry" name="id_tipe_laundry">
            <option value="">--Pilih Tipe--</option>
              @foreach ($tipe as $tipelaundry)
              <option {{ ($data->id_tipe_laundry==$tipelaundry->id_tipe ? 'selected' : '')}} value="{{$tipelaundry->id_tipe}}">{{$tipelaundry->tipe_laundry}}
            </option>
          @endforeach
        </select>
        <!-- <input type="text" class="form-control" id="id_tipe_laundry" name="id_tipe_laundry"placeholder="Tipe" required> -->

      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Harga</label>
        <input type="text" class="form-control" id="harga" name="harga" placeholder="Harga" value="{{ $data->harga }}" required>
      </div>
    </div>
    <!-- /.box-body -->

    <div class="box-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
      <a href="{{route ('Laundry.index')}}"  class="btn btn-default">Kembali</a>

    </div>
  </form>
</div>
<!-- /.box -->

@endsection

@extends ('layout.master')

@section ('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Data Transaksi</h3>
            <div class="box-tools pull-right">
              <a href="{{route('Transaksi.create')}}" class="btn btn-box-tool"><i class="fa fa-plus-circle"></i>Tambah Baru</a>
</div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">

            <table id="example2" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th>Invoice No.</th>
                <th>Jumlah Kilo</th>
                <th>Paket Laundry</th>
                <th>Tanggal Masuk</th>
                <th>Tanggal Selesai</th>
                <th>Status</th>
                <th>Pelanggan</th>
                <th>Total</th>
                <th>Aksi</th>
              </tr>
              </thead>
              <tbody>
              @foreach ($transaksi as $value)
            <tr>
              <td>{{ $value->invoice}}</td>
              <td>{{ $value->total_kilo}}kg</td>
              <td>{{ $value->laundry->nama_laundry}}</td>
              <td>{{ $value->start_date}}</td>
              <td>{{ $value->end_date}}</td>
              <td>{{ $value->status}}</td>
              <td>{{ $value->customer->nama_cust}}</td>
              <td>{{ $value->total}}</td>
              <td>
                <a href="{{ route('Transaksi.edit', ['Transaksi' => $value->id_transaksi]) }}"><button type="button" class="btn btn-primary">Update</button></a>
              <!-- <a href="" onclick="event.preventDefault(); if(confirm('Apakah anda yakin?')){$('form#hapus').attr('action', '{{ route ('Transaksi.destroy', ['Transaksi' => $value->id_transaksi]) }}').submit(); }"> -->
                <!-- <button type="button" class="btn  btn-danger">Delete</button></a> -->
              </td>
            </tr>
              @endforeach
            </tbody>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

</section>
<!-- /.content -->
@endsection

<!DOCTYPE html>
<html>
<head>
	<title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Laporan Pemasukan Hello Laundry</h4>

	</center>

	<table class='table table-bordered'>
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
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
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
		</tr>
			@endforeach
		</tbody>
	</table>

</body>
</html>

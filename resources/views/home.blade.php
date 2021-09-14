@extends('layout')

@section('title', 'Home')

@section('content')
<div class="container">
	<div class="title-container">
		<h2>Daftar Inventaris</h2>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<table id="list-table" class="display db-custom">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>Tanggal Pembelian</th>
						<th>Harga</th>
						<th>No Bukti</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					@for($i = 0; $i < count($inventory); $i++) <tr>
						<td class="td-align-center">{{ $i+1 }}</td>
						<td class="td-align-center">{{$inventory[$i]['nama']}}</td>
						<td class="td-align-center">{{$inventory[$i]['tgl_pembelian']}}</td>
						<td class="td-align-center">Rp. {{$inventory[$i]['harga']}}</td>
						<td class="td-align-center">{{$inventory[$i]['no_bukti']}}</td>
						<td style="text-align: center;">
							<a class="aksi-edit" href=""><i class="fas fa-edit"></i></a>
							<a class="aksi-hapus"><i class="fas fa-trash"></i></a>
						</td>
						</tr>
						@endfor
				</tbody>
			</table>
		</div>
	</div>
	<div style="margin-top: 30px;" class="row">
		<div class="col-lg-6" style="text-align: left">
		</div>
		<div class="col-lg-6" style="text-align: right;">
			<a style="color: white; width: 200px;" href="/add" class="btn btn-primary btn-lg btn-download">Tambah</a>
		</div>
	</div>
</div>
<script>
	$(document).ready( function () {
        	var table = $('#list-table').DataTable()
	 });
</script>
@endsection
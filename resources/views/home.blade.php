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
							<a class="aksi-edit" href="/detail/{{ $inventory[$i]['id'] }}"><i
									class="fas fa-edit"></i></a>
							<a class="aksi-hapus" onclick="openModalDelete({{ $inventory[$i]['id'] }})"><i
									class="fas fa-trash"></i></a>
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

<!-- Modal Loading -->
<div class="modal fade" id="modalLoading" tabindex="-1" role="dialog" aria-labelledby="modalLoadingLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<div class="d-flex align-items-center">
					<strong>Loading...</strong>
					<div class="spinner-border ml-auto" role="status" aria-hidden="true"></div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal Delete -->
<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="modalDeleteLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<div style="text-align: center; margin-top: 20px;">
					<input type="hidden" id="modal_id_inventory">
					<h5>Apakah anda yakin ingin menghapus inventaris ini?</h5>
					<div style="padding: 15px;" class="row">
						<div class="col-3"></div>
						<div class="col-3 inventory-confirmation">
							<h5 data-dismiss="modal" class="text-ajukan">Tidak</h5>
						</div>
						<div class="col-3 inventory-confirmation">
							<h5 onclick="deleteProduk()" class="text-ajukan">Ya</h5>
						</div>
						<div class="col-3"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal Delete Berhasil-->
<div class="modal fade" id="modalDeleteBerhasil" tabindex="-1" role="dialog" aria-labelledby="modalDeleteBerhasilLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<div style="text-align: center; margin-top: 20px;">
					<h4>Inventaris Berhasil Dihapus</h4>
					<i style="font-size: 40px; margin-top: 15px;" class="fas fa-check-circle fa-lg icon-valid"></i>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" data-dismiss="modal" class="btn btn-danger">Tutup</button>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready( function () {
        var table = $('#list-table').DataTable()

		if(window.sessionStorage.getItem("delete") == 1){
            window.sessionStorage.clear();
            $('#modalDeleteBerhasil').modal('toggle');
        }
	 });

    function openModalDelete(id){
        $('#modal_id_inventory').val(id);
        $('#modalDelete').modal('show');
    }

    function deleteProduk(){
        $('#modalDelete').modal('hide');
        $('#modalLoading').modal('show');
        $.ajax({
            url: "/delete/"+$('#modal_id_inventory').val(),
            type: "GET",
            success: function(data) {
                $("#modalLoading").modal('hide');
				window.sessionStorage.setItem("delete", 1);
                location.reload(true);
            },
            error: function(xhr, status, error) {
                var err = eval("(" + xhr.responseText + ")");
                console.log('error = '+err.message);
            }
        });
    }
</script>
@endsection
@extends('layout')

@section('title', 'Tambah Inventaris')

@section('content')
<div>
	<div class="title-container">
		<h2>Tambah Inventaris</h2>
	</div>
	<div class="add-container">
		<form action="add" enctype="multipart/form-data" method="post">
			{{ csrf_field() }}
			<div class="row">
				<div class="col-lg-2 col-md-2 col-2">
					<h6>Foto Inventaris</h6>
				</div>
				<div class="col-lg-10 col-md-10 col-10">
					<div class="row">
						<div class="col-sm-3 col-3">
							<div class="img-preview">
								<img id="img-pv-1" src="" alt="Foto Inventaris">
							</div>
							<div class="input-group mb-3">
								<input id="input-img-1" onchange="previewFile('input-img-1', 1);" type="file"
									class="form-control" aria-label="Foto Produk" aria-describedby="basic-addon1"
									accept="image/*" name="foto">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-2 col-md-2 col-2">
					<h6>Nama Inventaris</h6>
				</div>
				<div class="col-lg-4 col-md-4 col-4">
					<div class="input-group mb-3">
						<input type="text" class="form-control" aria-label="Nama Produk" aria-describedby="basic-addon1"
							name="nama" required>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-2 col-md-2 col-2">
					<h6>Tanggal Pembelian</h6>
				</div>
				<div class="col-lg-4 col-md-4 col-4">
					<div class="input-group mb-3">
						<input type="date" class="form-control" aria-label="Nama Produk" aria-describedby="basic-addon1"
							name="tanggal" required>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-2 col-md-2 col-2">
					<h6>Harga Inventaris</h6>
				</div>
				<div class="col-lg-4 col-md-4 col-4">
					<div class="input-group mb-3">
						<input type="number" class="form-control" aria-label="Nama Produk"
							aria-describedby="basic-addon1" name="harga" required>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-2 col-md-2 col-2">
					<h6>No Bukti</h6>
				</div>
				<div class="col-lg-4 col-md-4 col-4">
					<div class="input-group mb-3">
						<input type="text" class="form-control" aria-label="Nama Produk" aria-describedby="basic-addon1"
							name="no_bukti" required>
					</div>
				</div>
			</div>
			<div style="margin-top: 30px;" class="row">
				<div class="col-6" style="text-align: right;">
					<button type="submit" class="btn btn-primary btn-lg">Simpan</button>
				</div>
			</div>
		</form>
	</div>
</div>
<script>
	function previewFile(input, id){
        var file = $("#"+input).get(0).files[0];

        if(file){
            var reader = new FileReader();

            reader.onload = function(){
                $("#img-pv-"+id).attr("src", reader.result);
            }

            reader.readAsDataURL(file);
        }
    }

</script>
@endsection
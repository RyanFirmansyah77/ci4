<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
	<div class="row">
		<div class="col">
			<br>
			
			<form action="/komik/update/<?=$komik['id'] ;?>" method="post">
				<?= csrf_field();?>
				<input type="hidden"name="slug" value="<?=$komik['slug'] ;?>">
				<div class="form-group row">
					<label for="judul" class="col-sm-2 col-form-label">Judul</label>
					<div class="col-sm-10">
						<input type="text" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid':'';?>" id="judul" name="judul" placeholder="Judul" autofocus value="<?= (old('judul')) ? old('judul') : $komik['judul'] ;?>">
						<div class="invalid-feedback"><?=($validation)->getError('judul'); ?></div>
					</div>
				</div>
				<div class="form-group row">
					<label for="penulis" class="col-sm-2 col-form-label">Penulis</label>
					<div class="col-sm-10">
						<input type="text" class="form-control <?= ($validation->hasError('penulis')) ? 'is-invalid':'';?>" id="penulis" name="penulis" placeholder="Penulis" value="<?=$komik['penulis'] ;?>">
						<div class="invalid-feedback"><?=($validation)->getError('penulis'); ?></div>
					</div>
				</div>
				<div class="form-group row">
					<label for="penerbit" class="col-sm-2 col-form-label">penerbit</label>
					<div class="col-sm-10">
						<input type="text" class="form-control <?= ($validation->hasError('penerbit')) ? 'is-invalid':'';?>" id="penerbit"value="<?=$komik['penerbit'] ;?>" name="penerbit" placeholder="penerbit">
						<div class="invalid-feedback"><?=($validation)->getError('penerbit'); ?></div>
					</div>
				</div>
				<div class="form-group row">
					<label for="sampul" class="col-sm-2 col-form-label">sampul</label>
					<div class="col-sm-10">
						<input type="text" class="form-control <?= ($validation->hasError('sampul')) ? 'is-invalid':'';?>" id="sampul"value="<?=$komik['sampul'] ;?>" name="sampul" placeholder="sampul">
						<div class="invalid-feedback"><?=($validation)->getError('sampul'); ?></div>
					</div>
				</div>
				<button type="submit" class="btn btn-primary">Ubah data</button>
			</form>
		</div>
	</div>
</div>


<?= $this->endSection(); ?>
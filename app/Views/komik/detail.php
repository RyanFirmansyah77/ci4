<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
	<div class="row">
		<div class="col">
			<br>
			<div class="card" style="width: 18rem;">

				<img class="card-img-top sampul" src="/img/<?= $komik['sampul'];?>" alt="Card image cap">
				<div class="card-body">
					<h5 class="card-title"><?= $komik['judul'];?></h5>
					<p class="card-text"><?= $komik['penerbit'];?></p>
					<p class="card-text"><?= $komik['penulis'];?></p>

					<a href="/komik/edit/<?=$komik['slug']; ?>" class="btn btn-primary">Edit</a>

					<form class="d-inline"action="/komik/<?=$komik['id']; ?>" method="post">
						<?=csrf_field(); ?>
						<input type="hidden" name="_method" value="DELETE">
						<button type="submit" class="btn btn-danger " onclick="return confirm('apakah anda yakin?')">Delete</button>
					</form>


					<br>
					<a href="/komik">Kembali</a>
				</div>
			</div>
		</div>
	</div>
</div>
<?= $this->endSection(); ?>
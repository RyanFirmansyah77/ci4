<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
	<div class="row">
		<div class="col">
			<h1>Daftar Komik</h1>
			<br>
			<?php if(session() -> getFlashdata('pesan')):?>
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
				<?= session() ->getFlashdata('pesan'); ?>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

		<?php endif; ?>

		<a href="/komik/create" class="btn btn-primary">Tambah Data Komik</a>
		<table class="table">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Sampul</th>
					<th scope="col">Judul</th>
					<th scope="col">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $i = 1; ?>
				<?php foreach($komik as $k): ?>
					<tr>
						<th scope="row"><?= $i++; ?></th>
						<td><img src="img/<?= $k['sampul']; ?>" class="sampul" ></td>
						<td><?= $k['judul'];?></td>
						<td>
							<a href="/komik/<?= $k['slug']; ?>"class='btn btn-primary'>Detail</a>


						</td>
					</tr>
				<?php endforeach; ?>

			</tbody>
		</table>

	</div>

</div>

</div>
<?= $this->endSection(); ?>
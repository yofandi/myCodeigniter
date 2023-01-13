<!-- Post Content-->
<article class="mb-4">
	<div class="container px-4 px-lg-5">
		<div class="row gx-4 gx-lg-5 justify-content-center">
			<div class="col-md-10 col-lg-8 col-xl-7">
				<p><?= $data->description?></p>
				<p>
					
					<a href="<?= site_url('BlogController/edit/'.$data->id) ?>" class="btn btn-primary">Edit</a>
					&middot;
					<a href="<?= site_url('BlogController/index') ?>" class="btn btn-warning">Kembali</a>
					&middot; 
					<a href="<?= site_url('BlogController/delete/'.$data->id) ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')" class="btn btn-danger">Hapus</a>
				</p>
				<p class="post-meta">
					Posted on <?php echo date_format(date_create($data->date),'Y-m-d'); ?>
				</p>
			</div>
		</div>
	</div>
</article>
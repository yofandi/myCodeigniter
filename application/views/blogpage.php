<div class="container px-4 px-lg-5">
	<div class="row gx-4 gx-lg-5 justify-content-center">
		<div class="col-md-10 col-lg-8 col-xl-7">
			<?php echo $this->session->flashdata('flashmesseage'); ?>
			<form>
				<div class="form-floating">
					<input class="form-control" name="search" type="text" placeholder="Find your articel..." data-sb-validations="required" />
					<label for="name">Name</label>
					<div class="invalid-feedback" data-sb-feedback="name:required">An articel is required.</div>

				</div>
				<button class="btn btn-primary btn-lg btn-rounded" id="submitButton" type="submit">Submit</button>
			</form>
			<?php foreach ($data as $blog) : ?>
				<!-- Post preview-->
				<div class="post-preview">
					<a href="<?= site_url('BlogController/detail/'.$blog->id); ?>">
						<h2 class="post-title"><?php echo $blog->title; ?></h2>
						<h3 class="post-subtitle">.............</h3>
					</a>
					<p class="post-meta">
						Posted by
						<a href="#!">Start Bootstrap</a>
						on <?php echo $blog->date ?>
					</p>
				</div>
				<!-- Divider-->
				<hr class="my-4" />
			<?php endforeach ?>
			<!-- Pager-->
			<div class="d-flex justify-content-end mb-4">
				<?php echo $pagination; ?>
				<!-- <a class="btn btn-primary text-uppercase" href="#!">Older Posts →</a> -->
			</div>
		</div>
	</div>
</div>
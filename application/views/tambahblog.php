<div class="container px-4 px-lg-5">
	<div class="row gx-4 gx-lg-5 justify-content-center">
		<div class="alert alert-warning">
			<?php echo validation_errors(); ?>
		</div>
		<?php echo form_open_multipart(site_url('BlogController/insert')) ?>
		<!-- <form method="post" action="<?= site_url('BlogController/insert') ?>"> -->
			<h1>Insert Blog</h1>
			<label>Title</label><br>
			<!-- <input  class="form-control" type="text" name="title" placeholder="insert your title"><br> -->
			<?php $attribute = array(
	        'name'          => 'title',
	        'value' 		=> set_value('title'),
	        'placeholder'	=> 'Insert your title',
	        'class'     => 'form-control');
			echo form_input($attribute); ?>

			<label>Description</label><br>
			<!-- <textarea  class="form-control" name="description" ></textarea> -->
			<?php $attribute1 = array(
	        'name'          => 'description',
	        'value' 		=> set_value('description'),
	        'placeholder'	=> 'Insert your description',
	        'class'     => 'form-control');
			echo form_textarea($attribute1); ?>
			<br>

			<label>Image</label><br>
			<?php 
			echo form_upload('image', set_value('image'), 'form-control'); ?>
			<br><br>

			<button type="submit" class="btn btn-primary">Save</button>
			<a href="<?= site_url('BlogController/') ?>" class="btn btn-danger">kembali</a>
		<!-- </form> -->
		<?php form_close(); ?>
	</div>
</div>
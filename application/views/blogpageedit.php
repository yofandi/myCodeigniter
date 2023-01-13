<div class="container px-4 px-lg-5">
	<div class="row gx-4 gx-lg-5 justify-content-center">
		<div class="alert alert-warning">
			<?php echo validation_errors(); ?>
		</div>
		<?php echo form_open_multipart(site_url('BlogController/update/'.$data->id)); ?>
		<!-- <form method="post" action="<?= site_url('BlogController/update/'.$data->id) ?>"> -->
			<h1>Update Blog - <?= $data->title ?></h1>
			<label>Title</label><br>
			<!-- <input  class="form-control" type="text" name="title" placeholder="insert your title" value="<?= $data->title ?>"> -->
			<?php $attribute = array(
	        'name'          => 'title',
	        'value' => set_value('title', $data->title),
	        'placeholder'	=> 'Insert your title',
	        'class'     => 'form-control');
			echo form_input($attribute); ?>
			<br>

			<label>Description</label>
			<br>
			<!-- <textarea  class="form-control" name="description" >	<?= $data->description ?></textarea> -->
			<?php $attribute1 = array(
	        'name'          => 'description',
	        'value' => set_value('description', $data->description),
	        'placeholder'	=> 'Insert your description',
	        'class'     => 'form-control');
			echo form_textarea($attribute1); ?>
			<br>

			<label>Image</label><br>
			<?php 
			echo form_upload('image', set_value('image'), 'form-control'); ?>
			<br><br>

			<button type="submit" class="btn btn-primary">Save</button>
			<a href="<?= site_url('BlogController/detail/'.$data->id) ?>" class="btn btn-danger">kembali</a>
		<?php form_close(); ?>

	</div>
</div>
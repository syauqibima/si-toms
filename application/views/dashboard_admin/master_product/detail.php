
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php echo $judul_lengkap; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="<?php echo base_url(); ?>asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>asset/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>asset/css/docs.css" rel="stylesheet">
	<style>
		body{
			margin:20px;
			}
	</style>
	
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/application.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/bootstrap-tooltip.js"></script>
  </head>

  <body>
	<div class="well">
		<?php echo form_open('master_product/simpan','class="form-horizontal"'); ?>
		  <div class="control-group">
		  	<legend>Master Product</legend>
			<label class="control-label" for="Product">Product</label>
			<div class="controls">
			  <input type="text" class="span" name="Product" id="Product" value="<?php echo $Product; ?>" placeholder="Product" disabled>
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" for="Kind">Kind</label>
			<div class="controls">
			  <input type="text" class="span" name="Kind" id="Kind" value="<?php echo $Kind; ?>" placeholder="Kind" disabled>
			</div>
		  </div>
		<?php echo form_close(); ?>
	</div>    
	
  </body>
</html>


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
		<?php echo form_open('master_status/simpan','class="form-horizontal"'); ?>
		  <div class="control-group">
		  	<legend>Master Status Customer</legend>
			<label class="control-label" for="Status">Status</label>
			<div class="controls">
			  <input type="text" class="span" name="Status" id="Status" value="<?php echo $Status; ?>" placeholder="Status" disabled>
			</div>
				<label class="control-label" for="Keterangan">Keterangan</label>
			<div class="controls">
			  <input type="text" class="span" name="Keterangan" id="Keterangan" value="<?php echo $Keterangan; ?>" placeholder="Keterangan" disabled>
			</div>
		  </div>
		<?php echo form_close(); ?>
	</div>    
	
  </body>
</html>

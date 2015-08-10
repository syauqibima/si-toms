
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
		<?php echo form_open('master_data_am/simpan','class="form-horizontal"'); ?>
		<div class="control-group">
		 <legend>Master Account Manager</legend>
			<label class="control-label" for="AM_Name">AM Name</label>
			<div class="controls">
			  <input type="text" class="span" name="AM_Name" id="AM_Name" value="<?php echo $AM_Name; ?>" placeholder="AM_Name" disabled>
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" for="AM_Phone">AM Phone</label>
			<div class="controls">
			  <input type="text" class="span" name="AM_Phone" id="AM_Phone" value="<?php echo $AM_Phone; ?>" placeholder="AM_Phone" disabled>
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" for="email">Email</label>
			<div class="controls">
			  <input type="text" class="span" name="Email" id="email" value="<?php echo $Email; ?>" placeholder="Email" disabled>
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" for="email">Address</label>
			<div class="controls">
			  <textarea  class="span" name="Address" id="Address" style="resize:none; outline:none; height:100px;" placeholder="Address" disabled><?php echo $Address; ?></textarea>
			</div>
		  </div>
		<?php echo form_close(); ?>
	</div>    
	
  </body>
</html>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?php echo $judul_lengkap; ?></title>
    <meta charset="utf-8">
    <title><?php echo $judul_lengkap; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="<?php echo base_url(); ?>asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>asset/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>asset/css/docs.css" rel="stylesheet">
	
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/application.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/bootstrap-tooltip.js"></script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/colorbox/colorbox.css" />
	<script src="<?php echo base_url(); ?>asset/colorbox/jquery.colorbox.js"></script>
	<script>
		  $(document).ready(function(){
			  //Examples of how to assign the ColorBox event to elements
			  $(".medium-box").colorbox({rel:'group', iframe:true, width:"90%", height:"90%"});
	
		  });
	</script>
	
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="<?php echo base_url(); ?>"><?php echo $judul_pendek; ?></a>
          <div class="nav-collapse collapse">
            <div class="btn-group pull-right">
			  <button class="btn btn-primary"><i class="icon-user icon-white"></i> <?php echo $this->session->userdata('nama'); ?></button>
			  <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
				<span class="caret"></span>
			  </button>
			  <ul class="dropdown-menu">
				<li><a href="<?php echo base_url(); ?>app/change_password"><i class="icon-wrench"></i> Pengaturan Akun</a></li>
				<li><a href="<?php echo base_url(); ?>manage_user"><i class="icon-tasks"></i> Manajemen User</a></li>
				<li><a href="<?php echo base_url(); ?>app/logout"><i class="icon-off"></i> Log Out</a></li>
			  </ul>
			</div>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
	
	 <div class="container">
	
	<div class="well">
	  <div class="row">
		<div class="span">
		  <h3><?php echo $judul_pendek; ?></h3>
		</div>
	  </div>
	</div>
<section id="data-customer">
  <div class="well">
	<div class="page-header">
    	<h1>Data Customer</h1>
  	</div>
	
  	<?php
		foreach($data_customer->result_array() as $dp)
		{
	?>
		<div class="row">
			<div class="span3"><strong>Customer Name</strong></div>
			<div class="span">:</div>
			<div class="span6"><?php echo $dp['Cust_Name']; ?></div>
		</div>
		<div class="row">
			<div class="span3"><strong>Address</strong></div>
			<div class="span">:</div>
			<div class="span6"><?php echo $dp['Address']; ?></div>
		</div>
		<div class="row">
			<div class="span3"><strong>City</strong></div>
			<div class="span">:</div>
			<div class="span6"><?php echo $dp['City']; ?></div>
		</div>
		<div class="row">
			<div class="span3"><strong>Product</strong></div>
			<div class="span">:</div>
			<div class="span6"><?php echo $dp['Product']; ?></div>
		</div>
		<div class="row">
			<div class="span3"><strong>Status</strong></div>
			<div class="span">:</div>
			<div class="span6"><?php echo $dp['Status']; ?></div>
		</div>
		<div class="row">
			<div class="span3"><strong>Bandiwt Packet</strong></div>
			<div class="span">:</div>
			<div class="span6"><?php echo $dp['BW_Packet']; ?></div>
		</div>
		<div class="row">
			<div class="span3"><strong>One Time Charge</strong></div>
			<div class="span">:</div>
			<div class="span6"><?php echo $dp['One_Time_Charge']; ?></div>
		</div>
		<div class="row">
			<div class="span3"><strong>Abonemen</strong></div>
			<div class="span">:</div>
			<div class="span6"><?php echo $dp['Abonemen']; ?></div>
		</div>
		<div class="row">
			<div class="span3"><strong>Account Manager</strong></div>
			<div class="span">:</div>
			<div class="span6"><?php echo $dp['AM_Name']; ?></div>
		</div>
		<div class="row">
			<div class="span3"><strong>Personal Name</strong></div>
			<div class="span">:</div>
			<div class="span6"><?php echo $dp['Personal_Name']; ?></div>
		</div>
		<div class="row">
			<div class="span3"><strong>Due Date Live</strong></div>
			<div class="span">:</div>
			<div class="span6"><?php echo $dp['Due_Date_Live']; ?></div>
		</div>
		<div class="row">
			<div class="span3"><strong>Input Date</strong></div>
			<div class="span">:</div>
			<div class="span6"><?php echo $dp['Input_Date']; ?></div>
		</div>
		<div class="row">
			<div class="span3"><strong>Direct Number</strong></div>
			<div class="span">:</div>
			<div class="span6"><?php echo $dp['Direct_Number']; ?></div>
		</div>
		<div class="row">
			<div class="span3"><strong>Date Of Progress</strong></div>
			<div class="span">:</div>
			<div class="span6"><?php echo $dp['Date_Of_Progress']; ?></div>
		</div>
		<div class="row">
			<div class="span3"><strong>PIC Name</strong></div>
			<div class="span">:</div>
			<div class="span6"><?php echo $dp['PIC_Name']; ?></div>
		</div>
		<div class="row">
			<div class="span3"><strong>PIC Number</strong></div>
			<div class="span">:</div>
			<div class="span6"><?php echo $dp['PIC_Number']; ?></div>
		</div>
		<div class="row">
			<div class="span3"><strong>Additional Information</strong></div>
			<div class="span">:</div>
			<div class="span6"><?php echo $dp['Additional_Information']; ?></div>
		</div>
		<div class="row">
			<div class="span3"><strong>Put In Service Date</strong></div>
			<div class="span">:</div>
			<div class="span6"><?php echo $dp['Put_In_Service_Date']; ?></div>
		</div>
	<?php
		}
	?>
  </div>
</section>
<footer class="well">
         <center><p><?php echo $credit; ?></p></center>
      </footer>

    </div> <!-- /container -->

  </body>
</html>
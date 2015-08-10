
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
	
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/application.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/bootstrap-tooltip.js"></script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/colorbox/colorbox.css" />
	<script src="<?php echo base_url(); ?>asset/colorbox/jquery.colorbox.js"></script>
	<script>
		  $(document).ready(function(){
			  //Examples of how to assign the ColorBox event to elements
			  $(".medium-box").colorbox({rel:'group', iframe:true, width:"900px", height:"90%"});
	
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
            <ul class="nav">
              <li class="active"><a href="<?php echo base_url(); ?>"><i class="icon-home icon-white"></i> Beranda</a></li>
			    <li class="dropdown">
			  	<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-book icon-white"></i> Master <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo base_url(); ?>master_am"><i class="icon-eye-open"></i> Account Manager</a></li>
                  <li><a href="<?php echo base_url(); ?>master_product"><i class="icon-briefcase"></i> Product</a></li>
				  <li><a href="<?php echo base_url(); ?>master_status"><i class="icon-tasks"></i> Status</a></li>
                </ul>
              </li>
			  <li class="dropdown">
			  	<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-tasks icon-white"></i> Laporan <b class="caret"></b></a>
                <ul class="dropdown-menu">
                 
                </ul>
				</li>
            </ul>
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
	
	<ul id="myTab" class="nav nav-tabs">
        <li class="active"><a href="#dtcustomer" data-toggle="tab">Data Customer</a></li>
        <li><a href="#dtprogress" data-toggle="tab">Progress Customer</a></li>
    </ul>
    <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade in active" id="dtcustomer">
                
        <div class="control-group">
			<div class="span3"><strong>Cust_Name</strong></div>
			<div class="span">:</div>
			<div class="span6">
			  <input type="text" disabled="disabled" class="span6" name="Cust_Name" id="Cust_Name" value="<?php echo $Cust_Name; ?>" placeholder="Cust_Name">
			</div>
		  </div>
		  <div class="control-group">
			<div class="span3"><strong>Account Manager</strong></div>
			<div class="span">:</div>
			<div class="span6">
				<select disabled="disabled" data-placeholder="Account Manager" class="chzn-select" style="width:500px;" tabindex="2" name="id_am" id="id_am">
          			<option value=""></option>
					<?php
						foreach($mst_am->result_array() as $am)
						{
							if($am['id_am']==$id_am)
							{
					?>
						<option value="<?php echo $am['id_am']; ?>" selected="selected"><?php echo $am['AM_Name']; ?></option>
					<?php
							}
							else
							{
					?>
						<option value="<?php echo $am['id_am']; ?>"><?php echo $am['AM_Name']; ?></option>
					<?php
							}
						}
					?>
				</select>
			</div>
		  </div>
		  <div class="control-group">
			<div class="span3"><strong>Product</strong></div>
			<div class="span">:</div>
			<div class="span6">
				<select disabled="disabled" data-placeholder="Product" class="chzn-select" style="width:500px;" tabindex="2" name="id_product" id="id_product">
          			<option value=""></option>
					<?php
						foreach($mst_product->result_array() as $p)
						{
							if($p['id_product']==$id_product)
							{
					?>
						<option value="<?php echo $p['id_product']; ?>" selected="selected"><?php echo $p['Product']; ?></option>
					<?php
							}
							else
							{
					?>
						<option value="<?php echo $p['id_product']; ?>"><?php echo $p['Product']; ?></option>
					<?php
							}
						}
					?>
				</select>
			</div>
		  </div>
		  <div class="control-group">
			<div class="span3"><strong>Bandwith Packet</strong></div>
			<div class="span">:</div>
			<div class="span6">
			  <input type="text" disabled="disabled" class="span6" name="BW_Packet" id="BW_Packet" value="<?php echo $BW_Packet; ?>" placeholder="Nama customer">
			</div>
		  </div>
		  <div class="control-group">
			<div class="span3"><strong>One Time Charge</strong></div>
			<div class="span">:</div>
			<div class="span6">
			  <input type="text" disabled="disabled" class="span6" name="One_Time_Charge" id="One_Time_Charge" value="<?php echo $One_Time_Charge; ?>" placeholder="One Time Charge">
			</div>
		  </div>
		  <div class="control-group">
			<div class="span3"><strong>Abonemen</strong></div>
			<div class="span">:</div>
			<div class="span6">
			  <input type="text" disabled="disabled" class="span6" name="Abonemen" id="Abonemen" value="<?php echo $Abonemen; ?>" placeholder="Nomor NPWP">
			</div>
		  </div>
		  <div class="control-group">
			<div class="span3"><strong>Status</strong></div>
			<div class="span">:</div>
			<div class="span6">
				<select disabled="disabled" data-placeholder="Status" class="chzn-select" style="width:500px;" tabindex="2" name="id_status" id="id_status">
          			<option value=""></option>
					<?php
						foreach($mst_status->result_array() as $mt)
						{
							if($mt['id_status']==$id_status)
							{
					?>
						<option value="<?php echo $mt['id_status']; ?>" selected="selected"><?php echo $mt['Keterangan']; ?></option>
					<?php
							}
							else
							{
					?>
						<option value="<?php echo $mt['id_status']; ?>"><?php echo $mt['Keterangan']; ?></option>
					<?php
							}
						}
					?>
				</select>
			</div>
		  </div>
		  <div class="control-group">
			<div class="span3"><strong>Address</strong></div>
			<div class="span">:</div>
			<div class="span6">
				<textarea disabled="disabled" class="span6" style="outline:none; resize:none;" name="Address" id="Address" placeholder=
			  "Address"><?php echo $Address; ?></textarea>
			</div>
		  </div>
    	</div>
		  <div class="control-group">
			<div class="span3"><strong>City</strong></div>
			<div class="span">:</div>
			<div class="span6">
			  <input type="text" disabled="disabled" class="span6" name="City" id="City" value="<?php echo $City; ?>" placeholder=
			  "City">
			</div>
		  </div>
		  
        <div class="tab-pane fade" id="dtprogress">
          <div class="control-group">
			<div class="span3"><strong>Due Date Live</strong></div>
			<div class="span">:</div>
			<div class="span6">
			  <input type="text" disabled="disabled" class="span6" name="Due_Date_Live" id="Due_Date_Live" value="<?php echo $Due_Date_Live; ?>" placeholder=
			  "Due Date Live">
			</div>
		  </div>
          <div class="control-group">
			<div class="span3"><strong>Input Date</strong></div>
			<div class="span">:</div>
			<div class="span6">
			  <input type="text" disabled="disabled" class="span6" name="Input_Date" id="Input_Date" value="<?php echo $Input_Date; ?>" placeholder=
			  "Input Date">
			</div>
		  </div>
          <div class="control-group">
			<div class="span3"><strong>Direct Number</strong></div>
			<div class="span">:</div>
			<div class="span6">
			  <input type="text" disabled="disabled" class="span6" name="Direct_Number" id="Direct_Number" value="<?php echo $Direct_Number; ?>" placeholder=
			  "Direct Number">
			</div>
		  </div>
          <div class="control-group">
			<div class="span3"><strong>Date Of Progress</strong></div>
			<div class="span">:</div>
			<div class="span6">
			  <input type="text" disabled="disabled" class="span6" name="Date_Of_Progress" id="Date_Of_Progress" value="<?php echo $Date_Of_Progress; ?>" placeholder=
			  "Date Of Progress">
			</div>
		  </div>
		  <div class="control-group">
			<div class="span3"><strong>Date Of Progress</strong></div>
			<div class="span">:</div>
			<div class="span6">
			  <input type="text" disabled="disabled" class="span6" name="Date_Of_Progress" id="Date_Of_Progress" value="<?php echo $Date_Of_Progress; ?>" placeholder=
			  "Date Of Progress">
			</div>
		  </div>
		  <div class="control-group">
			<div class="span3"><strong>PIC Name</strong></div>
			<div class="span">:</div>
			<div class="span6">
			  <input type="text" disabled="disabled" class="span6" name="PIC_Name" id="PIC_Name" value="<?php echo $PIC_Name; ?>" placeholder=
			  "PIC Name">
			</div>
		  </div>
		  <div class="control-group">
			<div class="span3"><strong>PIC Number</strong></div>
			<div class="span">:</div>
			<div class="span6">
			  <input type="text" disabled="disabled" class="span6" name="PIC_Number" id="PIC_Number" value="<?php echo $PIC_Number; ?>" placeholder=
			  "PIC Number">
			</div>
		  </div>
		  <div class="control-group">
			<div class="span3"><strong>Additional Information</strong></div>
			<div class="span">:</div>
			<div class="span6">
			  <input type="text" disabled="disabled" class="span6" name="Additional_Information" id="Additional_Information" value="<?php echo $Additional_Information; ?>" placeholder=
			  "Additional Information">
			</div>
		  </div>
		  <div class="control-group">
			<div class="span3"><strong>Put In Service Date</strong></div>
			<div class="span">:</div>
			<div class="span6">
			  <input type="text" disabled="disabled" class="span6" name="Put_In_Service_Date" id="Put_In_Service_Date" value="<?php echo $Put_In_Service_Date; ?>" placeholder=
			  "Put In Service Date">
			</div>
		  </div>
        </div>
	</section>


      <footer class="well">
         <center><p><?php echo $credit; ?></p></center>
      </footer>

    </div> <!-- /container -->

  </body>
</html>

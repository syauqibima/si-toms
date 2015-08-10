
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="<?php echo base_url(); ?>asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>asset/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>asset/css/docs.css" rel="stylesheet">
	<style>
		body{
			margin:20px;
			padding:0px;
			}
	</style>
	
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/application.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/bootstrap-tooltip.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/bootstrap-tab.js"></script>
	<link href="<?php echo base_url(); ?>asset/css/chosen.css" rel="stylesheet" type="text/css">
	<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/sunny/jquery-ui.css" type="text/css" rel="stylesheet"/>	
	<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/jquery-ui-1.7.2.custom.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/jquery.ui.i18n.all.min.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
	$("#Input_Date").datepicker({dateFormat:'dd-mm-yy'});
	$("#Date_Of_Progress").datepicker({dateFormat:'dd-mm-yy'});
	$("#Put_In_Service_Date").datepicker({dateFormat:'dd-mm-yy'});
	});
	</script>
  </head>

  <body>
	<div class="well">
	
	<?php echo form_open_multipart('customer/simpan','class="form-horizontal"'); ?>
	<ul id="myTab" class="nav nav-tabs">
        <li class="active"><a href="#dtcustomer" data-toggle="tab">Data Customer</a></li>
		<li><a href="#dtprogress" data-toggle="tab">Progress Customer</a></li>
    </ul>
    <?php if(validation_errors()) { ?>
	<div class="alert alert-block">
	  <button type="button" class="close" data-dismiss="alert">×</button>
	  	<h4>Terjadi Kesalahan!</h4>
		<?php echo validation_errors(); ?>
	</div>
	<?php } ?>
    <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade in active" id="dtcustomer">
                
        <div class="control-group">
			<label class="control-label" for="Cust_Name">Customer Name</label>
			<div class="controls">
			<?php
			if($st=="tambah")
			{
			?>
			  <input type="text" class="span6" name="Cust_Name" id="Cust_Name" value="<?php echo set_value('Cust_Name'); ?>" placeholder="Cust_Name">
			<?php
			}
			else
			{
			?>
			  <input type="text" class="span6" name="Cust_Name" id="Cust_Name" value="<?php echo $Cust_Name; ?>" placeholder="Cust_Name">
			<?php
			}
			?>
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" for="Address">Address</label>
			<div class="controls">
			<?php
			if($st=="tambah")
			{
			?>
				<textarea class="span6" style="outline:none; resize:none;" name="Address" id="Address" placeholder=
			  "Address"><?php echo set_value('Adress'); ?></textarea>
			<?php
			}
			else
			{
			?>
				<textarea class="span6" style="outline:none; resize:none;" name="Address" id="Address" placeholder=
			  "Adress"><?php echo $Address; ?></textarea>
			<?php
			}
			?>
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" for="City">City</label>
			<div class="controls">
			<?php
			if($st=="tambah")
			{
			?>
			  <input type="text" class="span6" name="City" id="City" value="<?php echo set_value('City'); ?>" placeholder="Nomor Kartu customer">
			<?php
			}
			else
			{
			?>
			  <input type="text" class="span6" name="City" id="City" value="<?php echo $City; ?>" placeholder="Nomor Kartu customer">
			<?php
			}
			?>
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" for="Status">Account Manager</label>
			<div class="controls">
				<select data-placeholder="Account Manager" class="chzn-select" style="width:500px;" tabindex="2" name="id_am" id="id_am">
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
			<label class="control-label" for="Status">Product</label>
			<div class="controls">
				<select data-placeholder="Product" class="chzn-select" style="width:500px;" tabindex="2" name="id_product" id="id_product">
          			<option value=""></option>
					<?php
						foreach($mst_product->result_array() as $p)
						{
							if($p['id_product']==$id_roduct)
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
			<label class="control-label" for="BW_Packet">Bandwith Packet</label>
			<div class="controls">
			<?php
			if($st=="tambah")
			{
			?>
			  <input type="text" class="span6" name="BW_Packet" id="BW_Packet" value="<?php echo set_value('BW_Packet'); ?>" placeholder="Bandwith Packet">
			<?php
			}
			else
			{
			?>
			  <input type="text" class="span6" name="BW_Packet" id="BW_Packet" value="<?php echo $BW_Packet; ?>" placeholder="Bandwith Packet">
			<?php
			}
			?>
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" for="One_Time_Charge">One Time Charge</label>
			<div class="controls">
			<?php
			if($st=="tambah")
			{
			?>
			  <input type="text" class="span6" name="One_Time_Charge" id="One_Time_Charge" value="<?php echo set_value('One_Time_Charge'); ?>" placeholder="OTG">
			<?php
			}
			else
			{
			?>
			  <input type="text" class="span6" name="One_Time_Charge" id="One_Time_Charge" value="<?php echo $One_Time_Charge; ?>" placeholder="OTG">
			<?php
			}
			?>
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" for="Abonemen">Abonemen</label>
			<div class="controls">
			<?php
			if($st=="tambah")
			{
			?>
			  <input type="text" class="span6" name="Abonemen" id="Abonemen" value="<?php echo set_value('Abonemen'); ?>" placeholder="Abonemen">
			<?php
			}
			else
			{
			?>
			  <input type="text" class="span6" name="Abonemen" id="Abonemen" value="<?php echo $Abonemen; ?>" placeholder="Abonemen">
			<?php
			}
			?>
			</div>
		  </div>
		   <div class="control-group">
			<label class="control-label" for="nip">Status</label>
			<div class="controls">
			<select data-placeholder="Status" class="chzn-select" style="width:500px;" tabindex="2" name="id_status" id="id_status">
			<option value=""></option>
			  	<?php
			  		foreach($mst_status->result_array() as $mt)
			  		{
			  			if($id_status==$mt['id_status'])
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
		  </div>
		  
		<div class="tab-pane fade" id="dtprogress">
		  <div class="control-group">
			<label class="control-label" for="Due_Date_Live">Due Date Live</label>
			<div class="controls">
			<?php
			if($st=="tambah")
			{
			?>
			  <input type="text" class="span6" name="Due_Date_Live" id="Due_Date_Live" value="<?php echo set_value('Due_Date_Live'); ?>" placeholder="Due Date Live">
			<?php
			}
			else
			{
			?>
			  <input type="text" class="span6" name="Due_Date_Live" id="Due_Date_Live" value="<?php echo $Due_Date_Live; ?>" placeholder="Due Date Live">
			<?php
			}
			?>
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" for="Input_Date">Input Date</label>
			<div class="controls">
			<?php
			if($st=="tambah")
			{
			?>
			  <input type="text" class="span6" name="Input_Date" id="Input_Date" value="<?php echo set_value('Input_Date'); ?>" placeholder=
			  "Input Date">
			<?php
			}
			else
			{
			?>
			  <input type="text" class="span6" name="Input_Date" id="Input_Date" value="<?php echo $Input_Date; ?>" placeholder=
			  "Input Date">
			<?php
			}
			?>
			</div>
		  </div>

          <div class="control-group">
			<label class="control-label" for="Direct_Number">Direct Number</label>
			<div class="controls">
			<?php
			if($st=="tambah")
			{
			?>
			  <input type="text" class="span6" name="Direct_Number" id="Direct_Number" value="<?php echo set_value('Direct_Number'); ?>" placeholder=
			  "Direct Number">
			<?php
			}
			else
			{
			?>
			  <input type="text" class="span6" name="Direct_Number" id="Direct_Number" value="<?php echo $Direct_Number; ?>" placeholder=
			  "Direct Number">
			<?php
			}
			?>
			</div>
		  </div>
          <div class="control-group">
			<label class="control-label" for="Cust_Name">Date Of Progress</label>
			<div class="controls">
			<?php
			if($st=="tambah")
			{
			?>
			  <input type="text" class="span6" name="Date_Of_Progress" id="Date_Of_Progress" value="<?php echo set_value('Date_Of_Progress'); ?>" placeholder=
			  "Date Of Progress">
			<?php
			}
			else
			{
			?>
			  <input type="text" class="span6" name="Date_Of_Progress" id="Date_Of_Progress" value="<?php echo $Date_Of_Progress; ?>" placeholder=
			  "Date Of Progress">
			<?php
			}
			?>
			</div>
		  </div>
          <div class="control-group">
			<label class="control-label" for="Cust_Name">PIC Name</label>
			<div class="controls">
			<?php
			if($st=="tambah")
			{
			?>
			  <input type="text" class="span6" name="PIC_Name" id="PIC_Name" value="<?php echo set_value('PIC_Name'); ?>" placeholder=
			  "PIC Name">
			<?php
			}
			else
			{
			?>
			  <input type="text" class="span6" name="PIC_Name" id="PIC_Name" value="<?php echo $PIC_Name; ?>" placeholder=
			  "PIC Name">
			<?php
			}
			?>
			</div>
		  </div>
          <div class="control-group">
			<label class="control-label" for="Cust_Name">PIC Number</label>
			<div class="controls">
			<?php
			if($st=="tambah")
			{
			?>
			  <input type="text" class="span6" name="PIC_Number" id="PIC_Number" value="<?php echo set_value('PIC_Number'); ?>" placeholder=
			  "PIC Number">
			<?php
			}
			else
			{
			?>
			  <input type="text" class="span6" name="PIC_Number" id="PIC_Number" value="<?php echo $PIC_Number; ?>" placeholder=
			  "PIC Number">
			<?php
			}
			?>
			</div>
		  </div>
          <div class="control-group">
			<label class="control-label" for="Cust_Name">Additional Information</label>
			<div class="controls">
			<?php
			if($st=="tambah")
			{
			?>
			  <input type="text" class="span6" name="Additional_Information" id="Additional_Information" value="<?php echo set_value('Additional_Information'); ?>" placeholder=
			  "Additional Information">
			<?php
			}
			else
			{
			?>
			  <input type="text" class="span6" name="Additional_Information" id="Additional_Information" value="<?php echo $Additional_Information; ?>" placeholder=
			  "Additional Information">
			<?php
			}
			?>
			</div>
		  </div>

          <div class="control-group">
			<label class="control-label" for="Cust_Name">Put In Service Date</label>
			<div class="controls">
			<?php
			if($st=="tambah")
			{
			?>
			  <input type="text" class="span6" name="Put_In_Service_Date" id="Put_In_Service_Date" value="<?php echo set_value('Put_In_Service_Date'); ?>" placeholder=
			  "Put In Service Date">
			<?php
			}
			else
			{
			?>
			  <input type="text" class="span6" name="Put_In_Service_Date" id="Put_In_Service_Date" value="<?php echo $Put_In_Service_Date; ?>" placeholder=
			  "Put In Service Date">
			<?php
			}
			?>
			</div>
		  </div>
		 </div>
 
		  <div class="control-group">
			<div class="controls">
			  <button type="submit" class="btn btn-primary">Simpan Data</button>
			  <button type="reset" class="btn">Hapus Data</button>
			</div>
		  </div>
		  
		  
		  <input type="hidden" name="id_param" value="<?php echo $id_param; ?>">
		  <input type="hidden" name="st" value="<?php echo $st; ?>">
		  <input type="hidden" name="frame" value="frame">
		  <script src="http://localhost/sgmc/asset/js/chosen.jquery.js" type="text/javascript"></script>
			<script type="text/javascript"> 
				$(".chzn-select").chosen();
			</script>

		<?php echo form_close(); ?>

	</div>    
	
  </body>
</html>

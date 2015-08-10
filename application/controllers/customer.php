<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer extends CI_Controller {

	/*
		***	Controller : customer.php
		***	by Syauqi Bima P
		***	credit : gedelumbung.com
	*/

	public function index()
	{
		header('location:'.base_url().'');
	}

	public function detail()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('status')=="administrator")
		{
			$d['judul_pendek'] = $this->config->item('nama_aplikasi_pendek');
			$d['credit'] = $this->config->item('credit_aplikasi');
			
			$id['id_customer'] = $this->uri->segment(3);
			$this->session->set_userdata($id);
			$data_customer = $this->db->get_where("tbl_customer",$id);
			
			if($data_customer->num_rows()>0)
			{
				$q = $this->db->get_where("tbl_customer",$id);
				$set_detail = $q->row();
				$this->session->set_userdata("Cust_Name",$set_detail->Cust_Name);
				
				foreach($q->result() as $data)
				{
					$d['id_param'] = $data->id_customer;
					$d['Cust_Name'] = $data->Cust_Name;
					$d['Address'] = $data->Address;
					$d['City'] = $data->City;
					$d['id_product'] = $data->id_product;
					$d['id_status'] =  $data->id_status;
					$d['BW_Packet'] = $data->BW_Packet;
					$d['One_Time_Charge'] = $data->One_Time_Charge;
					$d['Abonemen'] = $data->Abonemen;
					$d['id_am'] =  $data->id_am;
					$d['Personal_Name'] = $data->Personal_Name;
					$d['Due_Date_Live'] = $data->Due_Date_Live;
					$d['Input_Date'] =  $data->Input_Date;
					$d['Direct_Number'] = $data->Direct_Number;
					$d['Date_Of_Progress'] = $data->Date_Of_Progress;
					$d['PIC_Name'] = $data->PIC_Name;
					$d['PIC_Number'] = $data->PIC_Number;
					$d['Additional_Information'] = $data->Additional_Information;
					$d['Put_In_Service_Date'] = $data->Put_In_Service_Date;
				}
				
				$d['st'] = "edit";
				$d['mst_product'] = $this->db->get('tbl_master_product');
				$d['mst_status'] = $this->db->get('tbl_master_status');
				$d['mst_am'] = $this->db->get('tbl_master_am');
				
				$this->load->view('dashboard_admin/customer/detail_customer',$d);
			}
			else
			{
				header('location:'.base_url().'');
			}
		}
		else
		{
			header('location:'.base_url().'');
		}
	}

	public function tambah()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('status')=="administrator")
		{
			$d['id_param'] = "";
			$d['Cust_Name'] = "";
			$d['Address'] = "";
			$d['City'] = "";
			$d['id_product'] = "";
			$d['id_status'] = "";
			$d['BW_Packet'] = "";
			$d['One_Time_Charge'] = "";
			$d['Abonemen'] = "";
			$d['id_am'] = "";
			$d['Personal_Name'] = "";
			$d['Due_Date_Live'] = "";
			$d['Input_Date'] = "";
			$d['Direct_Number'] = "";
			$d['Date_Of_Progress'] = "";
			$d['PIC_Name'] = "";
			$d['PIC_Number'] = "";
			$d['Additional_Information'] = "";
			$d['Put_In_Service_Date'] = "";
			
			
			$d['st'] = "tambah";
			$d['mst_am'] = $this->db->get('tbl_master_am');
			$d['mst_product'] = $this->db->get('tbl_master_product');
			$d['mst_status'] = $this->db->get('tbl_master_status');
			$this->load->view('dashboard_admin/customer/input',$d);
		}
		else
		{
			header('location:'.base_url().'');
		}
	}

	public function hapus()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('status')=="administrator")
		{
			$id['id_customer'] = $this->session->userdata('kode_customer');
			$this->db->delete("tbl_customer",$id);
			header('location:'.base_url().'');
		}
		else
		{
			header('location:'.base_url().'');
		}
	}

	public function edit()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('status')=="administrator")
		{
			$d['judul_pendek'] = $this->config->item('nama_aplikasi_pendek');
			$d['credit'] = $this->config->item('credit_aplikasi');
			
			$id['kode_customer'] = $this->uri->segment(3);
			$this->session->set_userdata($id);
			$kode['id_customer'] = $this->session->userdata('kode_customer');
			
			$q = $this->db->get_where("tbl_customer",$kode);
			$set_detail = $q->row();
			$this->session->set_userdata("Cust_Name",$set_detail->Cust_Name);
			
			foreach($q->result() as $data)
			{
				$d['id_param'] = $data->id_customer;
				$d['Cust_Name'] = $data->Cust_Name;
				$d['Address'] = $data->Address;
				$d['City'] = $data->City;
				$d['id_product'] = $data->id_product;
				$d['id_status'] =  $data->id_status;
				$d['BW_Packet'] = $data->BW_Packet;
				$d['One_Time_Charge'] = $data->One_Time_Charge;
				$d['Abonemen'] = $data->Abonemen;
				$d['id_am'] =  $data->id_am;
				$d['Personal_Name'] = $data->Personal_Name;
				$d['Due_Date_Live'] = $data->Due_Date_Live;
				$d['Input_Date'] =  $data->Input_Date;
				$d['Direct_Number'] = $data->Direct_Number;
				$d['Date_Of_Progress'] = $data->Date_Of_Progress;
				$d['PIC_Name'] = $data->PIC_Name;
				$d['PIC_Number'] = $data->PIC_Number;
				$d['Additional_Information'] = $data->Additional_Information;
				$d['Put_In_Service_Date'] = $data->Put_In_Service_Date;
			}
			
			$d['st'] = "edit";
			$d['mst_am'] = $this->db->get('tbl_master_am');
			$d['mst_product'] = $this->db->get('tbl_master_product');
			$d['mst_status'] = $this->db->get('tbl_master_status');
			$this->load->view('dashboard_admin/master/header',$d);
			$this->load->view('dashboard_admin/master/bg_customer');
		}
		else
		{
			header('location:'.base_url().'');
		}
	}
	
	public function simpan()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('status')=="administrator")
		{
			$d['judul_pendek'] = $this->config->item('nama_aplikasi_pendek');
			$d['credit'] = $this->config->item('credit_aplikasi');
			
			$this->form_validation->set_rules('Cust_Name', 'Customer Name', 'trim|required');
			$this->form_validation->set_rules('Address', 'Address', 'trim|required');
			$this->form_validation->set_rules('City', 'City', 'trim|required');
			$this->form_validation->set_rules('id_product', 'Product', 'trim|required');
			$this->form_validation->set_rules('id_status', 'Keterangan', 'trim|required');
			$this->form_validation->set_rules('BW_Packet', 'Bandiwth Packet', 'trim|required');
			$this->form_validation->set_rules('One_Time_Charge', 'One Time Charge', 'trim|required');
			$this->form_validation->set_rules('Abonemen', 'Abonemen', 'trim|required');
			$this->form_validation->set_rules('id_am', 'Account Manager', 'trim|required');
			$this->form_validation->set_rules('Due_Date_Live', 'Due Date Live', 'trim|required');
			$this->form_validation->set_rules('Input_Date', 'Input Date', 'trim|required');
			$this->form_validation->set_rules('Direct_Number', 'Direct Number', 'trim|required');
			$this->form_validation->set_rules('Date_Of_Progress', 'Date Of Progress', 'trim|required');
			$this->form_validation->set_rules('PIC_Name', 'PIC Name', 'trim|required');
			$this->form_validation->set_rules('PIC_Number', 'PIC Number', 'trim|required');
			$this->form_validation->set_rules('Additional_Information', 'Additional Information', 'trim|required');
			$this->form_validation->set_rules('Put_In_Service_Date', 'Put In Service Date', 'trim|required');
			
			$id['id_customer'] = $this->input->post("id_param");
			$st_frame = $this->input->post("frame");
			
			if ($this->form_validation->run() == FALSE)
			{
				$st = $this->input->post('st');
				if($st=="edit")
				{
					$q = $this->db->get_where("tbl_customer",$id);
					foreach($q->result() as $dt)
					{
						$d['id_param'] = $dt->id_pegawai;
						$d['Cust_Name'] = $dt->Cust_Name;
						$d['Address'] = $dt->Address;
						$d['City'] = $dt->City;
						$d['id_product'] = $dt->id_product;
						$d['id_status'] = $dt->id_status;
						$d['BW_Packet'] = $dt->BW_Packet;
						$d['One_Time_Charge'] = $dt->One_Time_Charge;
						$d['Abonemen'] = $dt->Abonemen;
						$d['id_am'] = $dt->id_am;
						$d['Personal_Name'] = $dt->Personal_Name;
						$d['Due_Date_Live'] = $dt->Due_Date_Live;
						$d['Input_Date'] = $dt->Input_Date;
						$d['Direct_Number'] = $dt->Direct_Number;
						$d['Date_Of_Progress'] = $dt->Date_Of_Progress;
						$d['PIC_Name'] = $dt->PIC_Name;
						$d['PIC_Number'] = $dt->PIC_Number;
						$d['Additional_Information'] = $dt->Additional_Information;
						$d['Put_In_Service_Date'] = $dt->Put_In_Service_Date;
						
						$d['mst_am'] = $this->db->get('tbl_master_am');
						$d['mst_product'] = $this->db->get('tbl_master_product');
						$d['mst_status'] = $this->db->get('tbl_master_status');
					}
					$d['st'] = $st;
					$this->load->view('dashboard_admin/master/header',$d);
					$this->load->view('dashboard_admin/master/bg_pegawai');
				}
				else if($st=="tambah")
				{
					$d['id_param'] = "";
					$d['nip'] = "";
					$d['Address'] = "";
					$d['City'] = "";
					$d['id_product'] = "";
					$d['id_status'] = "";
					$d['BW_Packet'] = "";
					$d['One_Time_Charge'] = "";
					$d['Abonemen'] = "";
					$d['id_am'] = "";
					$d['Personal_Name'] = "";
					$d['Due_Date_Live'] = "";
					$d['Input_Date'] = ""; 
					$d['Direct_Number'] = "";
					$d['Date_Of_Progress'] = "";
					$d['PIC_Name'] = "";
					$d['PIC_Number'] = "";
					$d['Additional_Information'] = "";
					$d['Put_In_Service_Date'] = "";
					
					$d['st'] = $st;
					$d['mst_am'] = $this->db->get('tbl_master_am');
					$d['mst_product'] = $this->db->get('tbl_master_product');
					$d['mst_status'] = $this->db->get('tbl_master_status');
				
					$this->load->view('dashboard_admin/customer/input',$d);
				}
			}
			else
			{
				$st = $this->input->post('st');
				if($st=="edit")
				{
					$upd['nip'] = $this->input->post('nip');
					$upd['Address'] = $this->input->post('Address');
					$upd['City'] = $this->input->post('City');
					$upd['id_product'] = $this->input->post('id_product');
					$upd['id_status'] = $this->input->post('id_status');
					$upd['BW_Packet'] = $this->input->post('BW_Packet');
					$upd['One_Time_Charge'] = $this->input->post('One_Time_Charge');
					$upd['Abonemen'] = $this->input->post('Abonemen');
					$upd['id_am'] = $this->input->post('id_am');
					$upd['Personal_Name'] = $this->input->post('Personal_Name');
					$upd['Due_Date_Live'] = $this->input->post('Due_Date_Live');
					$upd['Input_Date'] = $this->input->post('Input_Date');
					$upd['Direct_Number'] = $this->input->post('Direct_Number');
					$upd['Date_Of_Progress'] = $this->input->post('Date_Of_Progress');
					$upd['PIC_Name'] = $this->input->post('PIC_Name');
					$upd['PIC_Number'] = $this->input->post('PIC_Number');
					$upd['Additional_Information'] = $this->input->post('Additional_Information');
					$upd['Put_In_Service_Date'] = $this->input->post('Put_In_Service_Date');
					
					
					$this->db->update("tbl_data_pegawai",$upd,$id);
					
				
						header("location:".base_url()."pegawai/edit/".$this->session->userdata("kode_pegawai")."");
				}
				else if($st=="tambah")
				{
					$in['Cust_Name'] = $this->input->post('Cust_Name');
					$in['Address'] = $this->input->post('Address');
					$in['City'] = $this->input->post('City');
					$in['id_product'] = $this->input->post('id_product');
					$in['id_status'] = $this->input->post('id_status');
					$in['BW_Packet'] = $this->input->post('BW_Packet');
					$in['One_Time_Charge'] = $this->input->post('One_Time_Charge');
					$in['Abonemen'] = $this->input->post('Abonemen');
					$in['id_am'] = $this->input->post('id_am');
					$in['Personal_Name'] = $this->input->post('Personal_Name');
					$in['Due_Date_Live'] = $this->input->post('Due_Date_Live');
					$in['Input_Date'] = $this->input->post('Input_Date');
					$in['Direct_Number'] = $this->input->post('Direct_Number');
					$in['Date_Of_Progress'] = $this->input->post('Date_Of_Progress');
					$in['PIC_Name'] = $this->input->post('PIC_Name');
					$in['PIC_Number'] = $this->input->post('PIC_Number');
					$in['Additional_Information'] = $this->input->post('Additional_Information');
					$in['Put_In_Service_Date'] = $this->input->post('Put_In_Service_Date');
					
					
					$this->db->insert("tbl_customer",$in);
					?>
						<script>
							window.parent.location.reload(true);
						</script>
					<?php
				}
			
			}
		}
		else
		{
			header('location:'.base_url().'');
		}
	}
}

/* End of file pegawai.php */
/* Location: ./application/controllers/pegawai.php */
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Master_Am extends CI_Controller {

	/*
		***	Controller : master_am.php
		***	by Syauqi Bima P
		***	credit : gedelumbung.com
	*/

	public function index()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('status')=="administrator")
		{
			$d['judul_pendek'] = $this->config->item('nama_aplikasi_pendek');
			$d['credit'] = $this->config->item('credit_aplikasi');
		$d['judul_lengkap'] = $this->config->item('nama_aplikasi_full');
			
			$page=$this->uri->segment(3);
			$limit=$this->config->item('limit_data');
			if(!$page):
			$offset = 0;
			else:
			$offset = $page;
			endif;
			
			$d['tot'] = $offset;
			$tot_hal = $this->db->get("tbl_master_am");
			$config['base_url'] = base_url() . 'master_am/index/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$d["paginator"] =$this->pagination->create_links();
			
			$d['data_am'] = $this->db->get("tbl_master_am",$limit,$offset);
			
			$this->load->view('dashboard_admin/master_am/home',$d);
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
			$id['id_am'] = $this->uri->segment(3);
			$q = $this->db->get_where("tbl_master_am",$id);
			$d = array();
			foreach($q->result() as $dt)
			{
				$d['id_param'] = $dt->id_am;
				$d['AM_Name'] = $dt->AM_Name; 
				$d['AM_Phone'] = $dt->AM_Phone; 
				$d['Email'] = $dt->Email; 
				$d['Address'] = $dt->Address; 
			}
			$d['st'] = "edit";
			
			$this->load->view('dashboard_admin/master_am/input',$d);
		}
		else
		{
			header('location:'.base_url().'');
		}
	}

	public function detail()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('status')=="administrator")
		{
			$id['id_am'] = $this->uri->segment(3);
			$q = $this->db->get_where("tbl_master_am",$id);
			$d = array();
			foreach($q->result() as $dt)
			{
				$d['id_param'] = $dt->id_am;
				$d['AM_Name'] = $dt->AM_Name; 
				$d['AM_Phone'] = $dt->AM_Phone; 
				$d['Email'] = $dt->Email; 
				$d['Address'] = $dt->Address; 
			}
			$d['st'] = "edit";
			
			$this->load->view('dashboard_admin/master_am/detail',$d);
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
			$d['AM_Name'] = ""; 
			$d['AM_Phone'] = ""; 
			$d['Email'] = ""; 
			$d['Address'] = ""; 
			$d['st'] = "tambah";
			$this->load->view('dashboard_admin/master_am/input',$d);
		}
		else
		{
			header('location:'.base_url().'');
		}
	}

	public function cari()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('status')=="administrator")
		{
		
			$d['judul_pendek'] = $this->config->item('nama_aplikasi_pendek');
			$d['credit'] = $this->config->item('credit_aplikasi');
				$d['judul_lengkap'] = $this->config->item('nama_aplikasi_full');
			
			if($this->input->post("cari")=="")
			{
				$kata = $this->session->userdata('kata_cari');
			}
			else
			{
				$sess_data['kata'] = $this->input->post("cari");
				$this->session->set_userdata($sess_data);
				$kata = $this->session->userdata('kata');
			}
			
			$page=$this->uri->segment(3);
			$limit=$this->config->item('limit_data');
			if(!$page):
			$offset = 0;
			else:
			$offset = $page;
			endif;
			
			$d['tot'] = $page;
			$tot_hal = $this->db->query("select * from tbl_master_am where AM_Name like '%".$kata."%'");
			$config['base_url'] = base_url() . 'master_am/cari/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$d["paginator"] =$this->pagination->create_links();
			$d['data_am'] = $this->db->query("select * from tbl_master_am where AM_Name like '%".$kata."%' LIMIT ".$offset.",".$limit."");
			$this->load->view('dashboard_admin/master_am/home',$d);
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
			$id['id_am'] = $this->uri->segment(3);
			$this->db->delete("tbl_master_am",$id);
			header('location:'.base_url().'master_am');
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
			$this->form_validation->set_rules('AM_Name', 'AM_Name', 'trim|required');
			$this->form_validation->set_rules('AM_Phone', 'AM_Phone', 'trim|required');
			$this->form_validation->set_rules('Email', 'Email', 'trim|required');
			$this->form_validation->set_rules('Address', 'Address', 'trim|required');
			$id['id_am'] = $this->input->post("id_param");
			
			if ($this->form_validation->run() == FALSE)
			{
				$st = $this->input->post('st');
				if($st=="edit")
				{
					$q = $this->db->get_where("tbl_master_am",$id);
					$d = array();
					foreach($q->result() as $dt)
					{
					$d['id_param'] = $dt->id_am;
					$d['AM_Name'] = $dt->AM_Name; 
					$d['AM_Phone'] = $dt->AM_Phone; 
					$d['Email'] = $dt->Email; 
					$d['Address'] = $dt->Address; 
					}
					$d['st'] = $st;
					$this->load->view('dashboard_admin/master_am/input',$d);
				}
				else if($st=="tambah")
				{
					$d['id_param'] = "";
					$d['AM_Name'] = ""; 
					$d['AM_Phone'] = ""; 
					$d['Email'] = ""; 
					$d['Address'] = ""; 
					$d['st'] = $st;
					$this->load->view('dashboard_admin/master_golongan/input',$d);
				}
			}
			else
			{
				$st = $this->input->post('st');
				if($st=="edit")
				{
					$upd['AM_Name'] = $this->input->post("AM_Name");
					$upd['AM_Phone'] = $this->input->post("AM_Phone");
					$upd['Email'] = $this->input->post("Email");
					$upd['Address'] = $this->input->post("Address");
					$this->db->update("tbl_master_am",$upd,$id);
					?>
						<script>
							window.parent.location.reload(true);
						</script>
					<?php
				}
				else if($st=="tambah")
				{
					$in['AM_Name'] = $this->input->post("AM_Name");
					$in['AM_Phone'] = $this->input->post("AM_Phone");
					$in['Email'] = $this->input->post("Email");
					$in['Address'] = $this->input->post("Address");
					$this->db->insert("tbl_master_am",$in);
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

/* End of file master_golongan.php */
/* Location: ./application/controllers/master_golongan.php */
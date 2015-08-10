<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class master_status extends CI_Controller {

	/*
		***	Controller : master_status.php
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
			$tot_hal = $this->db->get("tbl_master_status");
			$config['base_url'] = base_url() . 'master_status/index/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$d["paginator"] =$this->pagination->create_links();
			
			$d['data_status'] = $this->db->get("tbl_master_status",$limit,$offset);
			
			$this->load->view('dashboard_admin/master_status/home',$d);
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
			$id['id_status'] = $this->uri->segment(3);
			$q = $this->db->get_where("tbl_master_status",$id);
			$d = array();
			foreach($q->result() as $dt)
			{
				$d['id_param'] = $dt->id_status;
				$d['Status'] = $dt->Status;
					$d['Keterangan'] = $dt->Keterangan;
			}
			$d['st'] = "edit";
			
			$this->load->view('dashboard_admin/master_status/input',$d);
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
			$id['id_status'] = $this->uri->segment(3);
			$q = $this->db->get_where("tbl_master_status",$id);
			$d = array();
			foreach($q->result() as $dt)
			{
				$d['id_param'] = $dt->id_status;
				$d['Status'] = $dt->Status;
				$d['Keterangan'] = $dt->Keterangan;
			}
			$d['st'] = "edit";
			
			$this->load->view('dashboard_admin/master_status/detail',$d);
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
			$d['Status'] = "";
			$d['Keterangan'] = "";
			$d['st'] = "tambah";
			$this->load->view('dashboard_admin/master_status/input',$d);
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
				$kata = $this->session->userdata('kata');
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
			$tot_hal = $this->db->query("select * from tbl_master_status where status like '%".$kata."%'");
			$config['base_url'] = base_url() . 'master_status/cari/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$d["paginator"] =$this->pagination->create_links();
			$d['status_pegawai'] = $this->db->query("select * from tbl_master_status where Status like '%".$kata."%' LIMIT ".$offset.",".$limit."");
			$this->load->view('dashboard_admin/master_status/home',$d);
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
			$id['id_status'] = $this->uri->segment(3);
			$this->db->delete("tbl_master_status",$id);
			header('location:'.base_url().'master_status');
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
			$this->form_validation->set_rules('status', 'Nama Lokasi Kerja', 'trim|required');
			$id['id_status'] = $this->input->post("id_param");
			
			if ($this->form_validation->run() == FALSE)
			{
				$st = $this->input->post('st');
				if($st=="edit")
				{
					$q = $this->db->get_where("tbl_master_status",$id);
					$d = array();
					foreach($q->result() as $dt)
					{
						$d['id_param'] = $dt->id_status;
						$d['Status'] = $dt->Status;
						$d['Keterangan'] = $dt->Keterangan;
					}
					$d['st'] = $st;
					$this->load->view('dashboard_admin/master_status/input',$d);
				}
				else if($st=="tambah")
				{
					$d['id_param'] = "";
					$d['Status'] = "";
					$d['Keterangan'] = "";
					$d['st'] = $st;
					$this->load->view('dashboard_admin/master_status/input',$d);
				}
			}
			else
			{
				$st = $this->input->post('st');
				if($st=="edit")
				{
					$upd['Status'] = $this->input->post("Status");
					$upd['Keterangan'] = $this->input->post("Keterangan");
					$this->db->update("tbl_master_status",$upd,$id);
					?>
						<script>
							window.parent.location.reload(true);
						</script>
					<?php
				}
				else if($st=="tambah")
				{
					$in['Status'] = $this->input->post("Status");
					$in['Keterangan'] = $this->input->post("Keterangan");

					$this->db->insert("tbl_master_status",$in);
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

/* End of file master_status.php */
/* Location: ./application/controllers/master_status.php */
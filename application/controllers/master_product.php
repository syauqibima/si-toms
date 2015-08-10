<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Master_Product extends CI_Controller {

	/*
		***	Controller : master_product.php
		***	by Syauqi Bima P
		***	credit : gedelumbung.com
	*/

	public function index()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('status')=="administrator")
		{
			$d['judul_lengkap'] = $this->config->item('nama_aplikasi_full');
			$d['judul_pendek'] = $this->config->item('nama_aplikasi_pendek');
			$d['credit'] = $this->config->item('credit_aplikasi');

			
			$page=$this->uri->segment(3);
			$limit=$this->config->item('limit_data');
			if(!$page):
			$offset = 0;
			else:
			$offset = $page;
			endif;
			
			$d['tot'] = $offset;
			$tot_hal = $this->db->get("tbl_master_product");
			$config['base_url'] = base_url() . 'master_product/index/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$d["paginator"] =$this->pagination->create_links();
			
			$d['data_product'] = $this->db->get("tbl_master_product",$limit,$offset);
			
			$this->load->view('dashboard_admin/master_product/home',$d);
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
			$id['id_product'] = $this->uri->segment(3);
			$q = $this->db->get_where("tbl_master_product",$id);
			$d = array();
			foreach($q->result() as $dt)
			{
				$d['id_param'] = $dt->id_product;
				$d['Product'] = $dt->Product;
				$d['Kind'] = $dt->Kind; 
			}
			$d['st'] = "edit";
			
			$this->load->view('dashboard_admin/master_product/input',$d);
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
			$id['id_product'] = $this->uri->segment(3);
			$q = $this->db->get_where("tbl_master_product",$id);
			$d = array();
			foreach($q->result() as $dt)
			{
				$d['id_param'] = $dt->id_product;
				$d['Product'] = $dt->Product;
				$d['Kind'] = $dt->Kind; 
			}
			$d['st'] = "edit";
			
			$this->load->view('dashboard_admin/master_product/detail',$d);
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
			$d['Product'] = ""; 
			$d['Kind'] = ""; 
			$d['st'] = "tambah";
			$this->load->view('dashboard_admin/master_product/input',$d);
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
			$tot_hal = $this->db->query("select * from tbl_master_product where Product like '%".$kata."%'");
			$config['base_url'] = base_url() . 'master_product/cari/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$d["paginator"] =$this->pagination->create_links();
			$d['data_product'] = $this->db->query("select * from tbl_master_product where Product like '%".$kata."%' LIMIT ".$offset.",".$limit."");
			$this->load->view('dashboard_admin/master_product/home',$d);
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
			$id['id_product'] = $this->uri->segment(3);
			$this->db->delete("tbl_master_product",$id);
			header('location:'.base_url().'master_product');
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
			$this->form_validation->set_rules('Product', 'Product', 'trim|required');
			$this->form_validation->set_rules('Kind', 'Kind', 'trim|required');
			$id['id_product'] = $this->input->post("id_param");
			
			if ($this->form_validation->run() == FALSE)
			{
				$st = $this->input->post('st');
				if($st=="edit")
				{
					$q = $this->db->get_where("tbl_master_product",$id);
					$d = array();
					foreach($q->result() as $dt)
					{
						$d['id_param'] = $dt->id_product;
						$d['Product'] = $dt->Product;
						$d['Kind'] = $dt->Kind; 
					}
					$d['st'] = $st;
					$this->load->view('dashboard_admin/master_product/input',$d);
				}
				else if($st=="tambah")
				{
					$d['id_param'] = "";
					$d['Product'] = "";
					$d['Kind'] = ""; 
					$d['st'] = $st;
					$this->load->view('dashboard_admin/master_product/input',$d);
				}
			}
			else
			{
				$st = $this->input->post('st');
				if($st=="edit")
				{
					$upd['Product'] = $this->input->post("Product");
					$upd['Kind'] = $this->input->post("Kind");
					$this->db->update("tbl_master_product",$upd,$id);
					?>
						<script>
							window.parent.location.reload(true);
						</script>
					<?php
				}
				else if($st=="tambah")
				{
					$in['Product'] = $this->input->post("Product");
					$in['Kind'] = $this->input->post("Kind");
					$this->db->insert("tbl_master_product",$in);
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

/* End of file master_eselon.php */
/* Location: ./application/controllers/master_eselon.php */
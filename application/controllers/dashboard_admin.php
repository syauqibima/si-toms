<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_Admin extends CI_Controller {

	/*
		***	Controller : dashboard_admin.php
		***	by Syauqi Bima P
		***	credit : gedelumbung.com
	*/

	public function index()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('status')=="administrator")
		{
			$d['judul_pendek'] = $this->config->item('nama_aplikasi_pendek');
			$d['judul_lengkap'] = $this->config->item('nama_aplikasi_full');
			$d['credit'] = $this->config->item('credit_aplikasi');
			
			
			$page=$this->uri->segment(3);
			$limit=$this->config->item('limit_data');
			if(!$page):
			$offset = 0;
			else:
			$offset = $page;
			endif;
			
			$d['tot'] = $offset;
			$tot_hal = $this->db->get("tbl_customer");
			$config['base_url'] = base_url() . 'dashboard_admin/index/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$d["paginator"] =$this->pagination->create_links();
			
			$d['data_customer'] = $this->db->query("select a.Cust_Name, b.Product, c.AM_Name, d.Keterangan, a.id_customer from tbl_customer a left join tbl_master_product b on a.id_product=b.id_product
			left join tbl_master_am c on a.id_am=c.id_am left join tbl_master_status d on a.id_status=d.id_status limit ".$offset.",".$limit."");
			
			$this->load->view('dashboard_admin/home/home',$d);
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
			
			$d['tot'] = $offset;
			$tot_hal = $this->db->query("select a.Cust_Name, b.Product, c.AM_Name, d.Keterangan, a.id_customer from tbl_customer a left join tbl_master_product b on a.id_product=b.id_product
			left join tbl_master_am c on a.id_am=c.id_am left join tbl_master_status d on a.id_status=d.id_status where a.Cust_Name like '%".$kata."%' ");
			$config['base_url'] = base_url() . 'dashboard_admin/index/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$d["paginator"] =$this->pagination->create_links();
			
			$d['data_customer'] = $this->db->query("select a.Cust_Name, b.Product, c.AM_Name, d.Keterangan, a.id_customer from tbl_customer a left join tbl_master_product b on a.id_product=b.id_product
			left join tbl_master_am c on a.id_am=c.id_am left join tbl_master_status d on a.id_status=d.id_status where a.Cust_Name like '%".$kata."%' limit ".$offset.",".$limit."");
			
			$this->load->view('dashboard_admin/home/home',$d);
		}
		else
		{
			header('location:'.base_url().'');
		}
	}
	
	function logout()
	{
		$this->session->sess_destroy();
		header('location:'.base_url().'');
	}
}

	

/* End of file dashboard_admin.php */
/* Location: ./application/controllers/dashboard_admin.php */
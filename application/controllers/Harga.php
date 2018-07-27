<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Harga extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('harga_model');
		$this->load->model('produk_model');
	}

	public function index()
	{
		$data['hargas'] = $this->harga_model->get_view();
		$this->load->view('global/header', $data);
		$this->load->view('harga/list');
		$this->load->view('global/footer');
	}

	public function tambah()
	{
		$data = [];
		$rules = $this->harga_model->get_rules();
		$this->form_validation->set_rules($rules);

		if($this->form_validation->run())
		{
			$produk = $this->input->post('produk');
			$harga = $this->input->post('harga');
			$start_date = $this->input->post('start_date');
			$end_date = $this->input->post('end_date');
			$inserted = $this->harga_model->save($produk, $harga, $start_date, $end_date);
			if($inserted > 0)
			{
				redirect('harga/?sort=desc');
			}
			else
			{
				$data['error_message'] = 'insert data gagal';
				$view = 'global/error';
			}
		}
		else 
		{
			$view = 'harga/form';
			$data['produks'] = $this->produk_model->get_list_dropdown();
		}

		$this->load->view('global/header', $data);
		$this->load->view($view);
		$this->load->view('global/footer');
	}

	public function ubah($id)
	{
		$this->form_validation->set_rules($this->harga_model->get_rules());

		if($this->form_validation->run())
		{
			$produk = $this->input->post('produk');
			$harga = $this->input->post('harga');
			$start_date = $this->input->post('start_date');
			$end_date = $this->input->post('end_date');
			$inserted = $this->harga_model->save($produk, $harga, $start_date, $end_date);
			if($inserted > 0)
			{
				redirect('harga/?sort=desc');
			}
			else
			{
				$data['error_message'] = 'update data gagal';
				$view = 'global/error';
			}
		}
		else
		{
			$data['harga'] = $this->harga_model->get_by_id($id);

			if(count($data['harga']) < 1)
			{
				$data['error_message'] = 'data tidak ditemukan';
				$view = 'global/error';
			}
			else
			{
				$data['produks'] = $this->produk_model->get_list_dropdown();
				$view = 'harga/form';
			}
		}
		
		$this->load->view('global/header', $data);
		$this->load->view($view);
		$this->load->view('global/footer');
	}

	public function hapus($id)
	{
		$deleted = $this->harga_model->delete($id);

		if($deleted > 0)
		{
			redirect('harga/?sort=desc');
		}
		else
		{
			$data['error_message'] = 'data tidak ditemukan';
			$this->load->view('global/header', $data);
			$this->load->view('global/error');
			$this->load->view('global/footer');
		}
	}
}

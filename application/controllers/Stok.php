<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stok extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('stok_model');
		$this->load->model('produk_model');
		$this->load->model('gudang_model');
	}

	public function index()
	{
		$data['stoks'] = $this->stok_model->get_view();
		$this->load->view('global/header', $data);
		$this->load->view('stok/list');
		$this->load->view('global/footer');
	}

	public function tambah()
	{
		$data = [];
		$rules = $this->stok_model->get_rules();
		$this->form_validation->set_rules($rules);

		if($this->form_validation->run())
		{
			$produk = $this->input->post('produk');
			$gudang = $this->input->post('gudang');
			$jumlah = $this->input->post('jumlah');
			$inserted = $this->stok_model->save($produk, $gudang, $jumlah);
			if($inserted > 0)
			{
				redirect('stok/?sort=desc');
			}
			else
			{
				$data['error_message'] = 'insert data gagal';
				$view = 'global/error';
			}
		}
		else 
		{
			$view = 'stok/form';
			$data['produks'] = $this->produk_model->get_list_dropdown();
			$data['gudangs'] = $this->gudang_model->get_list_dropdown();
		}

		$this->load->view('global/header', $data);
		$this->load->view($view);
		$this->load->view('global/footer');
	}

	public function ubah_jumlah($id)
	{
		$jumlah = $this->input->post('jumlah');
		$jumlah = intval($jumlah);
		$updated = $this->stok_model->update_jumlah($id, $jumlah);

		$data['success'] = $updated > 0;

		header('Content-Type: application/json');
		echo json_encode($data);
	}

	public function hapus($id)
	{
		$deleted = $this->stok_model->delete($id);

		if($deleted > 0)
		{
			redirect('stok/?sort=desc');
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

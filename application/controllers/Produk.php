<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {
	const PREFIX_BARCODE = 'PRD';

	public function __construct()
	{
		parent::__construct();
		$this->load->model('produk_model');
		$this->load->model('barang_model');
		$this->load->model('merk_model');
		$this->load->model('unit_model');
	}

	/**
	 * [index description]
	 * @return [type] [description]
	 */
	public function index()
	{
		$sort = strtolower($this->input->get('sort')) == 'desc' ? 'desc' : 'asc';
		$data['produks'] = $this->produk_model->get_view();
		$this->load->view('global/header', $data);
		$this->load->view('produk/list');
		$this->load->view('global/footer');
	}

	/**
	 * [tambah description]
	 * @return [type] [description]
	 */
	public function tambah()
	{
		$data = [];
		$rules = $this->produk_model->get_rules();
		$this->form_validation->set_rules($rules);

		if($this->form_validation->run())
		{
			$barang = $this->input->post('barang');
			$merk = $this->input->post('merk');
			$unit = $this->input->post('unit');
			$barcode = $this->input->post('barcode');
			$inserted = $this->produk_model->save($barang, $merk, $unit, $barcode);
			if($inserted > 0)
			{
				redirect('produk/?sort=desc');
			}
			else
			{
				$data['error_message'] = 'insert data gagal';
				$view = 'global/error';
			}
		}
		else 
		{
			$view = 'produk/form';
			$data['barangs'] = $this->barang_model->get_list_dropdown();
			$data['merks'] = $this->merk_model->get_list_dropdown();
			$data['units'] = $this->unit_model->get_list_dropdown();
			$data['PREFIX_BARCODE'] = self::PREFIX_BARCODE;
		}

		$this->load->view('global/header', $data);
		$this->load->view($view);
		$this->load->view('global/footer');
	}

	/**
	 * [edit description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function ubah($id)
	{
		$this->form_validation->set_rules($this->produk_model->get_rules());

		if($this->form_validation->run())
		{
			$barang = $this->input->post('barang');
			$merk = $this->input->post('merk');
			$unit = $this->input->post('unit');
			$barcode = $this->input->post('barcode');
			$updated = $this->produk_model->save($barang, $merk, $unit, $barcode);
			
			if($updated > 0)
			{
				redirect('produk/?sort=desc');
			}
			else
			{
				$data['error_message'] = 'data gagal diupdate';
				$view = 'global/error';
			}
		}
		else
		{
			$data['id'] = $id;
			$data['PREFIX_BARCODE'] = self::PREFIX_BARCODE;
			$data['produk'] = $this->produk_model->get_by_id($id);
			$data['barangs'] = $this->barang_model->get_list_dropdown();
			$data['merks'] = $this->merk_model->get_list_dropdown();
			$data['units'] = $this->unit_model->get_list_dropdown();

			if(count($data['produk']) < 1)
			{
				$data['error_message'] = 'data tidak ditemukan';
				$view = 'global/error';
			}
			else
			{
				$view = 'produk/form';
			}
		}
		
		$this->load->view('global/header', $data);
		$this->load->view($view);
		$this->load->view('global/footer');
	}

	/**
	 * [delete description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function hapus($id)
	{
		$deleted = $this->produk_model->delete($id);

		if($deleted > 0)
		{
			redirect('produk/?sort=desc');
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

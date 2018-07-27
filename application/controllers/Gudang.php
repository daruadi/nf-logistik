<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gudang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('gudang_model');
	}

	/**
	 * [index description]
	 * @return [type] [description]
	 */
	public function index()
	{
		$sort = strtolower($this->input->get('sort')) == 'desc' ? 'desc' : 'asc';
		$data['gudangs'] = $this->gudang_model->get_all($sort);
		$this->load->view('global/header', $data);
		$this->load->view('gudang/list');
		$this->load->view('global/footer');
	}

	/**
	 * [tambah description]
	 * @return [type] [description]
	 */
	public function tambah()
	{
		$data['max_name_length'] = gudang_model::MAX_NAME_LENGTH;
		$data['max_address_length'] = gudang_model::MAX_ADDRESS_LENGTH;

		$this->form_validation->set_rules($this->gudang_model->get_rules());

		if($this->form_validation->run())
		{
			$nama = $this->input->post('nama');
			$address = $this->input->post('alamat');
			$inserted = $this->gudang_model->insert($nama, $address);
			if($inserted > 0)
			{
				redirect('gudang/?sort=desc');
			}
			else
			{
				$data['error_message'] = 'insert data gagal';
				$view = 'global/error';
			}
		}
		else 
		{
			$view = 'gudang/form';
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
		$this->form_validation->set_rules($this->gudang_model->get_rules());

		if($this->form_validation->run())
		{
			$id = intval($this->input->post('id'));
			$nama = $this->input->post('nama');
			$address = $this->input->post('alamat');
			$updated = $this->gudang_model->update($id, $nama, $address);

			if($updated > 0)
			{
				redirect('gudang/?sort=desc');
			}
			else
			{
				$data['error_message'] = 'data gagal diupdate';
				$view = 'global/error';
			}
		}
		else
		{
			$data['gudang'] = $this->gudang_model->get_by_id($id);

			if(count($data['gudang']) < 1)
			{
				$data['error_message'] = 'data tidak ditemukan';
				$view = 'global/error';
			}
			else
			{
				$data['max_name_length'] = gudang_model::MAX_NAME_LENGTH;
				$data['max_address_length'] = gudang_model::MAX_ADDRESS_LENGTH;
				$view = 'gudang/form';
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
		$deleted = $this->gudang_model->delete($id);

		if($deleted > 0)
		{
			redirect('gudang/?sort=desc');
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

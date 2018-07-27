<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unit extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('unit_model');
	}

	/**
	 * [index description]
	 * @return [type] [description]
	 */
	public function index()
	{
		$sort = strtolower($this->input->get('sort')) == 'desc' ? 'desc' : 'asc';
		$data['units'] = $this->unit_model->get_all($sort);
		$this->load->view('global/header', $data);
		$this->load->view('unit/list');
		$this->load->view('global/footer');
	}

	/**
	 * [tambah description]
	 * @return [type] [description]
	 */
	public function tambah()
	{
		$data['max_name_length'] = unit_model::MAX_NAME_LENGTH;

		$this->form_validation->set_rules($this->unit_model->get_rules());

		if($this->form_validation->run())
		{
			$nama = $this->input->post('nama');
			$inserted = $this->unit_model->insert($nama);
			if($inserted > 0)
			{
				redirect('unit/?sort=desc');
			}
			else
			{
				$data['error_message'] = 'insert data gagal';
				$view = 'global/error';
			}
		}
		else 
		{
			$view = 'unit/form';
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
		$this->form_validation->set_rules($this->unit_model->get_rules());

		if($this->form_validation->run())
		{
			$id = intval($this->input->post('id'));
			$nama = $this->input->post('nama');
			$updated = $this->unit_model->update($id, $nama);
			
			if($updated > 0)
			{
				redirect('unit/?sort=desc');
			}
			else
			{
				$data['error_message'] = 'data gagal diupdate';
				$view = 'global/error';
			}
		}
		else
		{
			$data['unit'] = $this->unit_model->get_by_id($id);

			if(count($data['unit']) < 1)
			{
				$data['error_message'] = 'data tidak ditemukan';
				$view = 'global/error';
			}
			else
			{
				$data['max_name_length'] = unit_model::MAX_NAME_LENGTH;
				$view = 'unit/form';
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
		$deleted = $this->unit_model->delete($id);

		if($deleted > 0)
		{
			redirect('unit/?sort=desc');
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

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('barang_model');
	}

	private function render_breadcrumb($page_name = '', $href = '')
	{
		$this->mybreadcrumb->add('Home', base_url());
		$this->mybreadcrumb->add('Barang', base_url('/barang'));
		if(!empty($page_name) && !empty($href)){
			$this->mybreadcrumb->add($page_name, $href);
		}

		return $this->mybreadcrumb->render();
	}

	/**
	 * [index description]
	 * @return [type] [description]
	 */
	public function index()
	{
		$data['breadcrumb'] = $this->render_breadcrumb();
		$sort = strtolower($this->input->get('sort')) == 'desc' ? 'desc' : 'asc';
		$data['barangs'] = $this->barang_model->get_all($sort);
		$this->load->view('global/header', $data);
		$this->load->view('barang/list');
		$this->load->view('global/footer');
	}

	/**
	 * [tambah description]
	 * @return [type] [description]
	 */
	public function tambah()
	{
		$data['breadcrumb'] = $this->render_breadcrumb('Tambah Barang', base_url('/barang/tambah'));
		$this->form_validation->set_rules($this->barang_model->get_rules());

		if($this->form_validation->run())
		{
			$nama = $this->input->post('nama');
			$kode = $this->input->post('kode');
			$inserted = $this->barang_model->insert($nama, $kode);
			if($inserted > 0)
			{
				redirect('barang/?sort=desc');
			}
			else
			{
				$data['error_message'] = 'insert data gagal';
				$view = 'global/error';
			}
		}
		else 
		{
			$view = 'barang/form';
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
		$data['breadcrumb'] = $this->render_breadcrumb('Ubah Barang', base_url('/barang/ubah'));
		$this->form_validation->set_rules($this->barang_model->get_rules());

		if($this->form_validation->run())
		{
			$id = intval($this->input->post('id'));
			$nama = $this->input->post('nama');
			$kode = $this->input->post('kode');
			$updated = $this->barang_model->update($id, $nama, $kode);
			
			if($updated > 0)
			{
				redirect('barang/?sort=desc');
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
			$data['barang'] = $this->barang_model->get_by_id($id);

			if(count($data['barang']) < 1)
			{
				$data['error_message'] = 'data tidak ditemukan';
				$view = 'global/error';
			}
			else
			{
				$view = 'barang/form';
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
		$deleted = $this->barang_model->delete($id);

		if($deleted > 0)
		{
			redirect('barang/?sort=desc');
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

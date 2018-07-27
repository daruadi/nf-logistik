<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gudang_model extends CI_Model {
	const MAX_NAME_LENGTH = 100;
	const MAX_ADDRESS_LENGTH = 500;

	public function get_rules()
	{
		return [
			[
				'field' => 'nama',
				'label' => 'Nama',
				'rules' => 'required|min_length[3]|max_length['.self::MAX_NAME_LENGTH.']',
			],
			[
				'field' => 'alamat',
				'label' => 'Alamat',
				'rules' => 'required|min_length[3]|max_length['.self::MAX_ADDRESS_LENGTH.']',
			],
		];
	}

	public function get_by_id($id)
	{
		$query = $this->db->where('id', intval($id))->get('gudang');
		return $query->result();
	}

	public function get_all($sort)
	{
		$query = $this->db->order_by('id', $sort)->get('gudang');
		return $query->result();
	}

	public function insert($name, $address)
	{
		$data = [
			'nama' => $name,
			'alamat' => $address,
		];

		$this->db->insert('gudang', $data);

		return $this->db->affected_rows();
	}

	public function delete($id='')
	{
		$data = [
			'id' => intval($id),
		];
		
		$this->db->delete('gudang', $data);

		return $this->db->affected_rows();
	}

	public function update($id, $name, $address)
	{
		$this->db->set('nama', $name);
		$this->db->set('alamat', $address);
		$this->db->where('id', intval($id));
		$this->db->update('gudang');

		return $this->db->affected_rows();
	}

	public function get_list_dropdown()
	{
		$this->db->select('id, nama');
		$result = $this->db->get('gudang')->result();
		$data = [];
		foreach($result as $key => $value)
		{
			$data[$value->id] = $value->nama;
		}

		return $data;
	}
}
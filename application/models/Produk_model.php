<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_model extends CI_Model {
	public function get_rules()
	{
		$id_barang = $this->db->select("group_concat(id separator ',') as id")->get('barang')->row_array();
		$id_merk = $this->db->select("group_concat(id separator ',') as id")->get('merk')->row_array();
		$id_unit = $this->db->select("group_concat(id separator ',') as id")->get('unit')->row_array();

		return [
			[
				'field' => 'barang',
				'label' => 'Barang',
				'rules' => 'required|integer|in_list_mixed['.$id_barang['id'].']',
			],
			[
				'field' => 'merk',
				'label' => 'Merk',
				'rules' => 'required|integer|in_list_mixed['.$id_merk['id'].']',
			],
			[
				'field' => 'unit',
				'label' => 'Unit',
				'rules' => 'required|integer|in_list_mixed['.$id_unit['id'].']',
			],
			[
				'field' => 'barcode',
				'label' => 'Barcode',
				'rules' => 'required',
			],
		];
	}

	public function get_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->join('barang', 'barang.id = produk.id_barang');
		$this->db->join('merk', 'merk.id = produk.id_merk');
		$this->db->join('unit', 'unit.id = produk.id_unit');
		$query = $this->db->where('produk.id', intval($id))->get();
		return $query->row();
	}

	public function get_all($sort)
	{
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->join('barang', 'barang.id = produk.id_barang');
		$this->db->join('merk', 'merk.id = produk.id_merk');
		$this->db->join('unit', 'unit.id = produk.id_unit');
		$query = $this->db->order_by('id', $sort)->get();
		return $query->result();
	}

	public function save($barang, $merk, $unit, $barcode)
	{
		$data['id_barang'] = $barang;
		$data['id_merk'] = $merk;
		$data['id_unit'] = $unit;
		
		$this->db->select('id');
		$query = $this->db->get_where('produk', $data);
		$row = $query->row();

		if($row->id > 0)
		{
			return $this->update($row->id, $barcode);
		}
		else
		{
			return $this->insert($barang, $merk, $unit, $barcode);
		}
	}

	public function insert($barang, $merk, $unit, $barcode)
	{
		$data = [
			'id_barang' => $barang,
			'id_merk' => $merk,
			'id_unit' => $unit,
			'barcode' => $barcode,
		];

		$this->db->insert('produk', $data);
		return $this->db->insert_id();
	}

	public function delete($id='')
	{
		$data = [
			'id' => intval($id),
		];
		
		$this->db->delete('produk', $data);

		return $this->db->affected_rows();
	}

	public function update($id, $barcode)
	{
		$this->db->set('barcode', $barcode);
		$this->db->where('id', intval($id));
		$this->db->update('produk');

		return $this->db->affected_rows();
	}

	public function get_view()
	{
		$this->db->select('
			p.id,
			b.nama as barang_name,
			m.nama as merk_name,
			u.nama as unit_name,
			barcode
		');
		$this->db->from('produk p');
		$this->db->join('barang b', 'b.id = p.id_barang');
		$this->db->join('merk m', 'm.id = p.id_merk');
		$this->db->join('unit u', 'u.id = p.id_unit');
		$this->db->order_by('p.id', 'asc');
		$query = $this->db->get();

        return $query->result();
	}

	public function get_list_dropdown()
	{
		$this->db->select('id, barcode');
		$result = $this->db->get('produk')->result();
		$data = [];
		foreach($result as $key => $value)
		{
			$data[$value->id] = $value->barcode;
		}

		return $data;
	}
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Harga_model extends CI_Model {
	public function get_rules()
	{
		$id_produk = $this->db->select("group_concat(id separator ',') as id")->get('produk')->row_array();

		return [
			[
				'field' => 'produk',
				'label' => 'Produk',
				'rules' => 'required|integer|in_list_mixed['.$id_produk['id'].']',
			],
			[
				'field' => 'harga',
				'label' => 'Harga',
				'rules' => 'required|integer',
			],
			[
				'field' => 'start_date',
				'label' => 'Start Date',
				'rules' => 'required',
			]
		];
	}

	public function get_view()
	{
		$this->db->select('
			h.id,
			p.barcode,
			id_produk,
			harga,
			h.start_date,
			h.end_date
		');
		$this->db->from('harga h');
		$this->db->join('produk p', 'h.id_produk = p.id');
		$this->db->order_by('p.barcode', 'asc');
		$query = $this->db->get();

        return $query->result();
	}

	public function save($produk, $harga, $start_date, $end_date)
	{
		$data['id_produk'] = $produk;
		$data['harga'] = intval($harga);
		$data['start_date'] = $start_date;
		$data['end_date'] = empty($end_date) ? NULL : $end_date;

		$query = $this->db->query('select id from harga where id_produk = ? and end_date is null', [$produk]);
		$row = $query->row();

		if(count($row) > 0)
		{
			$this->db->where('id', intval($row->id));
			$this->db->update('harga', $data);
		}
		else
		{
			$this->db->insert('harga', $data);
		}
		
		return $this->db->affected_rows();
	}

	public function get_by_id($id)
	{
		$this->db->select('
			h.id,
			h.id_produk,
			p.barcode,
			harga,
			h.start_date,
			h.end_date
		');
		$this->db->from('harga h');
		$this->db->join('produk p', 'p.id = h.id_produk');
		$query = $this->db->where('h.id', intval($id))->get();
		return $query->row();
	}

	public function delete($id='')
	{
		$data = [
			'id' => intval($id),
		];
		
		$this->db->delete('harga', $data);

		return $this->db->affected_rows();
	}
}

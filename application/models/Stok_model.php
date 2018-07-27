<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stok_model extends CI_Model {
	public function get_rules()
	{
		$id_produk = $this->db->select("group_concat(id separator ',') as id")->get('produk')->row_array();
		$id_gudang = $this->db->select("group_concat(id separator ',') as id")->get('gudang')->row_array();

		return [
			[
				'field' => 'produk',
				'label' => 'Produk',
				'rules' => 'required|integer|in_list_mixed['.$id_produk['id'].']',
			],
			[
				'field' => 'gudang',
				'label' => 'Gudang',
				'rules' => 'required|integer|in_list_mixed['.$id_gudang['id'].']',
			],
			[
				'field' => 'jumlah',
				'label' => 'Jumlah',
				'rules' => 'required|integer',
			],
		];
	}

	public function get_view()
	{
		$this->db->select('
			s.id,
			s.id_produk,
			s.id_gudang,
			p.barcode,
			g.nama as nama_gudang,
			s.jumlah
		');
		$this->db->from('stok s');
		$this->db->join('produk p', 'p.id = s.id_produk');
		$this->db->join('gudang g', 'g.id = s.id_gudang');
		$this->db->order_by('s.id_produk', 'asc');
		$query = $this->db->get();

        return $query->result();
	}

	public function save($produk, $gudang, $jumlah)
	{
		$data['id_produk'] = $produk;
		$data['id_gudang'] = $gudang;
		$data['jumlah'] = (int)$jumlah;
		$sql = $this->db->insert_string('stok', $data) . ' ON DUPLICATE KEY UPDATE jumlah = jumlah + ' . $jumlah;
		$this->db->query($sql);
		$id = $this->db->insert_id();

		return $id;
	}

	public function update_jumlah($id, $jumlah)
	{
		$this->db->set('jumlah', $jumlah);
		$this->db->where('id', intval($id));
		$this->db->update('stok');

		return $this->db->affected_rows();
	}

	public function delete($id='')
	{
		$data = [
			'id' => intval($id),
		];
		
		$this->db->delete('stok', $data);

		return $this->db->affected_rows();
	}
}
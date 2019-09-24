<?php
	$content_header['page_name'] = 'Form Input Barang';
	$content_header['page_description'] = 'Pengkodean barang sesuai jenisnya';
	$this->load->view('global/content_header', $content_header);
	$gudang = isset($gudang) ? array_pop($gudang) : null;
	$action = isset($gudang) ? 'ubah' : 'tambah';
?>
<section class="content">
	<?php echo form_open('barang/'.$action.(isset($id) ? '/'.$id : ''));?>
		<?php
		if(isset($barang))
		{
			$barang = array_pop($barang);
			echo form_hidden('id', $barang->id);
		}
		$nama = set_value('nama');
		$kode = set_value('kode');
		$nama = !empty($barang->nama) ? $barang->nama : $nama;
		$kode = !empty($barang->kode) ? $barang->kode : $kode;
		?>
		<div class="form-group">
			<?php echo form_label('Nama', 'nama');?>
			<?php echo form_input('nama', $nama, ['class'=>'form-control', 'id'=>'nama', 'placeholder'=>'Nama barang', 'maxlength'=> barang_model::MAX_NAMA_LENGTH]);?>
			<?php echo form_error('nama', '<span class="alert-danger col-md-3">', '</span>'); ?>
		</div>
		<div class="form-group">
			<?php echo form_label('Kode', 'kode');?>
			<?php echo form_input('kode', $kode, ['class'=>'form-control', 'id'=>'kode', 'placeholder'=>'Kode barang', 'maxlength'=>barang_model::MAX_KODE_LENGTH]);?>
			<?php echo form_error('kode', '<span class="alert-danger col-md-3">', '</span>'); ?>
		</div>
		<?php echo form_submit('simpan', 'Simpan', ['class'=>'btn btn-primary']);?>
	<?php echo form_close();?>
</section>

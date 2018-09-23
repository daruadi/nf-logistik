<a href="<?php echo base_url('/barang');?>">Kembali ke daftar</a>
<div class="card-header">
	<i class="fa fa-table"></i>
	<?php
	$barang = isset($barang) ? array_pop($barang) : null;
	$action = isset($barang) ? 'ubah' : 'tambah';
	?>
	<?php echo ucfirst($action); ?> Barang
</div>
<div class="card-body">
	<?php echo form_open('barang/'.$action.(isset($id) ? '/'.$id : ''));?>
		<?php
		if(isset($barang))
		{
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
</div>

<?php echo $breadcrumb; ?>
<div class="card-header">
	<i class="fa fa-table"></i>
	<?php
	$gudang = isset($gudang) ? array_pop($gudang) : null;
	$action = isset($gudang) ? 'ubah' : 'tambah';
	?>
	<?php echo ucfirst($action); ?> Gudang
</div>
<div class="card-body">
	<?php echo form_open('gudang/'.$action.(isset($gudang) ? '/'.$gudang->id : ''));?>
		<?php
		if(isset($gudang))
		{
			echo form_hidden('id', $gudang->id);
		}
		$nama = set_value('nama');
		$alamat = set_value('alamat');
		$kode = set_value('kode');
		$nama = isset($gudang->nama) ? $gudang->nama : $nama;
		$alamat = isset($gudang->alamat) ? $gudang->alamat : $alamat;
		$kode = isset($gudang->kode) ? $gudang->kode : $kode;
		?>
		<div class="form-group">
			<?php echo form_label('Nama', 'nama');?>
			<?php echo form_input('nama', $nama, ['class'=>'form-control', 'id'=>'nama', 'placeholder'=>'Nama Gudang', 'maxlength'=>gudang_model::MAX_NAMA_LENGTH]);?>
			<?php echo form_error('nama', '<span class="alert-danger col-md-3">', '</span>'); ?>
		</div>
		<div class="form-group">
			<?php echo form_label('Alamat', 'alamat');?>
			<?php echo form_textarea('alamat', $alamat, ['class'=>'form-control', 'id'=>'alamat', 'placeholder'=>'Alamat Lengkap', 'maxlength'=>gudang_model::MAX_ADDRESS_LENGTH]);?>
			<?php echo form_error('alamat', '<span class="alert-danger col-md-3">', '</span>'); ?>
		</div>
		<div class="form-group">
			<?php echo form_label('Kode', 'kode');?>
			<?php echo form_input('kode', $kode, ['class'=>'form-control', 'id'=>'kode', 'placeholder'=>'Kode Gudang', 'maxlength'=>gudang_model::MAX_KODE_LENGTH]);?>
			<?php echo form_error('kode', '<span class="alert-danger col-md-3">', '</span>'); ?>
		</div>
		<?php echo form_submit('simpan', 'Simpan', ['class'=>'btn btn-primary']);?>
	<?php echo form_close();?>
</div>
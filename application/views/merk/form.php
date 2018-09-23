<?php echo $breadcrumb; ?>
<div class="card-header">
	<i class="fa fa-table"></i>
	<?php
	$merk = isset($merk) ? array_pop($merk) : null;
	$action = isset($merk) ? 'ubah' : 'tambah';
	?>
	<?php echo ucfirst($action); ?> Merk
</div>
<div class="card-body">
	<?php echo form_open('merk/'.$action.(isset($id) ? '/'.$id : ''));?>
		<?php
		if(isset($merk))
		{
			echo form_hidden('id', $merk->id);
		}
		$nama = set_value('nama');
		$kode = set_value('kode');
		$nama = !empty($merk->nama) ? $merk->nama : $nama;
		$kode = !empty($merk->kode) ? $merk->kode : $kode;
		?>
		<div class="form-group">
			<?php echo form_label('Nama', 'nama');?>
			<?php echo form_input('nama', $nama, ['class'=>'form-control', 'id'=>'nama', 'placeholder'=>'Nama merk', 'maxlength'=>merk_model::MAX_NAMA_LENGTH]);?>
			<?php echo form_error('nama', '<span class="alert-danger col-md-3">', '</span>'); ?>
		</div>
		<div class="form-group">
			<?php echo form_label('Kode', 'kode');?>
			<?php echo form_input('kode', $kode, ['class'=>'form-control', 'id'=>'kode', 'placeholder'=>'Kode merk', 'maxlength'=>merk_model::MAX_KODE_LENGTH]);?>
			<?php echo form_error('kode', '<span class="alert-danger col-md-3">', '</span>'); ?>
		</div>
		<?php echo form_submit('simpan', 'Simpan', ['class'=>'btn btn-primary']);?>
	<?php echo form_close();?>
</div>
<?php echo $breadcrumb; ?>
<div class="card-header">
	<i class="fa fa-table"></i>
	<?php
	$unit = isset($unit) ? array_pop($unit) : null;
	$action = isset($unit) ? 'ubah' : 'tambah';
	?>
	<?php echo ucfirst($action); ?> Unit
</div>
<div class="card-body">
	<?php echo form_open('unit/'.$action.(isset($id) ? '/'.$id : ''));?>
		<?php
		if(isset($unit))
		{
			echo form_hidden('id', $unit->id);
		}
		$nama = set_value('nama');
		$kode = set_value('kode');
		$nama = !empty($unit->nama) ? $unit->nama : $nama;
		$kode = !empty($unit->kode) ? $unit->kode : $kode;
		?>
		<div class="form-group">
			<?php echo form_label('Nama', 'nama');?>
			<?php echo form_input('nama', $nama, ['class'=>'form-control', 'id'=>'nama', 'placeholder'=>'Nama unit', 'maxlength'=>unit_model::MAX_NAMA_LENGTH]);?>
			<?php echo form_error('nama', '<span class="alert-danger col-md-3">', '</span>'); ?>
		</div>
		<div class="form-group">
			<?php echo form_label('Kode', 'kode');?>
			<?php echo form_input('kode', $kode, ['class'=>'form-control', 'id'=>'kode', 'placeholder'=>'Kode unit', 'maxlength'=>unit_model::MAX_KODE_LENGTH]);?>
			<?php echo form_error('kode', '<span class="alert-danger col-md-3">', '</span>'); ?>
		</div>
		<?php echo form_submit('simpan', 'Simpan', ['class'=>'btn btn-primary']);?>
	<?php echo form_close();?>
</div>
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
		?>
		<div class="form-group">
			<?php echo form_label('Nama', 'nama');?>
			<?php echo form_input('nama', (set_value('nama') ? : !isset($unit) ? '' : $unit->nama), ['class'=>'form-control', 'id'=>'nama', 'placeholder'=>'Nama unit', 'maxlength'=>$max_name_length]);?>
			<?php echo form_error('nama', '<span class="alert-danger col-md-3">', '</span>'); ?>
		</div>
		<?php echo form_submit('simpan', 'Simpan', ['class'=>'btn btn-primary']);?>
	<?php echo form_close();?>
</div>
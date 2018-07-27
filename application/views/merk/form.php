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
		?>
		<div class="form-group">
			<?php echo form_label('Nama', 'nama');?>
			<?php echo form_input('nama', (set_value('nama') ? : !isset($merk) ? '' : $merk->nama), ['class'=>'form-control', 'id'=>'nama', 'placeholder'=>'Nama merk', 'maxlength'=>$max_name_length]);?>
			<?php echo form_error('nama', '<span class="alert-danger col-md-3">', '</span>'); ?>
		</div>
		<?php echo form_submit('simpan', 'Simpan', ['class'=>'btn btn-primary']);?>
	<?php echo form_close();?>
</div>
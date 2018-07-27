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
		?>
		<div class="form-group">
			<?php echo form_label('Nama', 'nama');?>
			<?php echo form_input('nama', (set_value('nama') ? : !isset($barang) ? '' : $barang->nama), ['class'=>'form-control', 'id'=>'nama', 'placeholder'=>'Nama barang', 'maxlength'=>$max_name_length]);?>
			<?php echo form_error('nama', '<span class="alert-danger col-md-3">', '</span>'); ?>
		</div>
		<?php echo form_submit('simpan', 'Simpan', ['class'=>'btn btn-primary']);?>
	<?php echo form_close();?>
</div>

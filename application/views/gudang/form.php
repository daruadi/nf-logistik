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
		$nama = isset($gudang) ? $gudang->nama : $nama;

		$alamat = set_value('alamat');
		$alamat = isset($gudang) ? $gudang->alamat : $alamat;
		?>
		<div class="form-group">
			<?php echo form_label('Nama', 'nama');?>
			<?php echo form_input('nama', $nama, ['class'=>'form-control', 'id'=>'nama', 'placeholder'=>'Nama gudang', 'maxlength'=>$max_name_length]);?>
			<?php echo form_error('nama', '<span class="alert-danger col-md-3">', '</span>'); ?>
		</div>
		<div class="form-group">
			<?php echo form_label('Alamat', 'alamat');?>
			<?php echo form_textarea('alamat', $alamat, ['class'=>'form-control', 'id'=>'alamat', 'placeholder'=>'Alamat lengkap', 'maxlength'=>$max_address_length]);?>
			<?php echo form_error('alamat', '<span class="alert-danger col-md-3">', '</span>'); ?>
		</div>
		<?php echo form_submit('simpan', 'Simpan', ['class'=>'btn btn-primary']);?>
	<?php echo form_close();?>
</div>
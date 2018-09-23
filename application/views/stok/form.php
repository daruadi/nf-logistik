<?php echo $breadcrumb; ?>
<div class="card-header">
	<i class="fa fa-table"></i>
	<?php
	$action = isset($produk) ? 'ubah' : 'tambah';
	?>
	<?php echo ucfirst($action); ?> stok
</div>
<div class="card-body">
	<?php echo form_open('stok/'.$action.(isset($produk) ? '/'.$produk->id : ''));?>
		<?php
		if(isset($produk))
		{
			echo form_hidden('id', $produk->id);
		}
		?>
		<div class="form-group">
			<?php echo form_label('Produk', 'produk');?>
			<?php echo form_dropdown('produk', $produks, set_value('produk'), 
				[
					'id' => 'produk',
					'class' => 'form-control selectpicker show-tick',
					'data-live-search' => 'true',
				]
			);?>
			<?php echo form_error('produk', '<span class="alert-danger col-md-3">', '</span>'); ?>
		</div>
		<div class="form-group">
			<?php echo form_label('Gudang', 'gudang');?>
			<?php echo form_dropdown('gudang', $gudangs, set_value('gudang'), 
				[
					'id' => 'gudang',
					'class' => 'form-control selectpicker show-tick',
					'data-live-search' => 'true',
					'onchange' => 'generateBarcode()'
				]
			);?>
			<?php echo form_error('gudang', '<span class="alert-danger col-md-3">', '</span>'); ?>
		</div>
		<div class="form-group">
			<?php echo form_label('Jumlah', 'jumlah');?>
			<?php echo form_input('jumlah', set_value('jumlah'), [
					'class'=>'form-control',
					'id'=>'jumlah',
					'placeholder'=>'Masukkan angka',
				]);?>
			<?php echo form_error('jumlah', '<span class="alert-danger col-md-3">', '</span>'); ?>
		</div>
		<?php echo form_submit('simpan', 'Simpan', ['class'=>'btn btn-primary']);?>
	<?php echo form_close();?>
</div>

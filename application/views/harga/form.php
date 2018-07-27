<div class="card-header">
	<i class="fa fa-table"></i>
	<?php
	$action = isset($harga) ? 'ubah' : 'tambah';
	?>
	<?php echo ucfirst($action); ?> harga
</div>
<div class="card-body">
	<?php echo form_open('harga/'.$action.(isset($harga) ? '/'.$harga->id : ''));?>
		<?php
		if(isset($harga))
		{
			echo form_hidden('id', $harga->id);
		}
		?>
		<div class="form-group">
			<?php echo form_label('Produk', 'produk');?>
			<?php echo form_dropdown('produk', $produks, set_value('produk') ? : isset($harga) ? $harga->id_produk : '', 
				[
					'id' => 'produk',
					'class' => 'form-control selectpicker show-tick',
					'data-live-search' => 'true',
				]
			);?>
			<?php echo form_error('produk', '<span class="alert-danger col-md-3">', '</span>'); ?>
		</div>
		<div class="form-group">
			<?php echo form_label('Harga', 'harga');?>
			<?php echo form_input('harga', set_value('harga') ? : isset($harga) ? $harga->harga : '', [
					'class'=>'form-control',
					'id'=>'harga',
					'placeholder'=>'Masukkan angka',
				]);?>
			<?php echo form_error('harga', '<span class="alert-danger col-md-3">', '</span>'); ?>
		</div>
		<div class="form-group">
			<?php echo form_label('Start Date', 'start_date');?>
			<?php echo form_input('start_date', set_value('start_date') ? : isset($harga) ? $harga->start_date : '', [
					'class'=>'form-control',
					'id'=>'start_date',
					'placeholder'=>'Masukkan tanggal',
					'data-date-format'=>'yyyy-mm-dd'
				]);?>
			<?php echo form_error('start_date', '<span class="alert-danger col-md-3">', '</span>'); ?>
		</div>
		<div class="form-group">
			<?php echo form_label('End Date', 'end_date');?>
			<?php echo form_input('end_date', set_value('end_date') ? : isset($harga) ? $harga->end_date : '', [
					'class'=>'form-control',
					'id'=>'end_date',
					'placeholder'=>'Masukkan tanggal',
					'data-date-format'=>'yyyy-mm-dd'
				]);?>
			<?php echo form_error('end_date', '<span class="alert-danger col-md-3">', '</span>'); ?>
		</div>
		<?php echo form_submit('simpan', 'Simpan', ['class'=>'btn btn-primary']);?>
	<?php echo form_close();?>
</div>
<script type="text/javascript" src="<?php echo base_url();?>assets/datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript">
	$(function(){
		var start_date = $('#start_date').datepicker();
		// $('#end_date').datepicker().on('onRender', function(ev){
		// 	console.log('aaa');
		// 	if(ev.date.valueOf() < start_date.valueOf()) {
		// 		alert('End Date tidak boleh lebih kecil dari Start Date');
		// 		return '';
		// 	}
		// });
		$('#end_date').datepicker();
	});
</script>

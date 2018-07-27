<div class="card-header">
	<i class="fa fa-table"></i>
	<?php
	$action = isset($produk) ? 'ubah' : 'tambah';
	?>
	<?php echo ucfirst($action); ?> produk
</div>
<div class="card-body">
	<?php echo form_open('produk/'.$action.(isset($produk) ? '/'.$produk->id : ''));?>
		<?php
		if(isset($produk))
		{
			echo form_hidden('id', $produk->id);
		}
		?>
		<div class="form-group">
			<?php echo form_label('Barang', 'barang');?>
			<?php echo form_dropdown('barang', $barangs, isset($produk) ? $produk->id_barang : '', 
				[
					'id' => 'barang',
					'class' => 'form-control selectpicker show-tick',
					'data-live-search' => 'true',
					'onchange' => 'generateBarcode()'
				]
			);?>
			<?php echo form_error('barang', '<span class="alert-danger col-md-3">', '</span>'); ?>
		</div>
		<div class="form-group">
			<?php echo form_label('Merk', 'merk');?>
			<?php echo form_dropdown('merk', $merks, isset($produk) ? $produk->id_merk : '', 
				[
					'id' => 'merk',
					'class' => 'form-control selectpicker show-tick',
					'data-live-search' => 'true',
					'onchange' => 'generateBarcode()'
				]
			);?>
			<?php echo form_error('merk', '<span class="alert-danger col-md-3">', '</span>'); ?>
		</div>
		<div class="form-group">
			<?php echo form_label('Unit', 'unit');?>
			<?php echo form_dropdown('unit', $units, isset($produk) ? $produk->id_unit : '', 
				[
					'id' => 'unit',
					'class' => 'form-control selectpicker show-tick',
					'data-live-search' => 'true',
					'onchange' => 'generateBarcode()'
				]
			);?>
			<?php echo form_error('unit', '<span class="alert-danger col-md-3">', '</span>'); ?>
		</div>
		<div class="form-group">
			<?php echo form_label('Barcode', 'barcode');?>
			<?php echo form_input('barcode', (set_value('barcode') ? : isset($produk) ? $produk->barcode : ''), [
					'class'=>'form-control',
					'id'=>'barcode',
					'placeholder'=>'Barcode',
					'oninput' => 'renderBarcode(this);'
				]);?>
			<?php echo form_error('barcode', '<span class="alert-danger col-md-3">', '</span>'); ?>
			<div>
				<a href="#" onclick="generateBarcode();">Generate Barcode</a>
				<canvas id="barcodeImg" jsbarcode-format="EAN8" jsbarcode-value="<?php echo isset($produk) ? $produk->barcode : '';?>"></canvas>
			</div>
		</div>
		<?php echo form_submit('simpan', 'Simpan', ['class'=>'btn btn-primary']);?>
	<?php echo form_close();?>
</div>
<script type="text/javascript" src="<?php echo base_url();?>assets/jsbarcode/JsBarcode.all.min.js"></script>
<script type="text/javascript">
	$(function(){
		JsBarcode('#barcodeImg').init();
	});
	function generateBarcode()
	{
		var barcode = '<?php echo $PREFIX_BARCODE;?>';
		barcode += '.' + $('#barang :selected').val();
		barcode += '.' + $('#merk :selected').val();
		barcode += '.' + $('#unit :selected').val();
		$('#barcode').val(barcode);
		$('#barcode').trigger('input');
		$('#barcodeImg').attr('download', barcode+'.png');

		return false;
	}

	function renderBarcode(input)
	{
		$('#barcodeImg').JsBarcode(input.value);
	}
</script>

<div class="card mb-3">
	<div class="card-header">
		<i class="fa fa-table"></i>
		Daftar stok
		&nbsp<a href="<?php echo base_url();?>stok/tambah" class="btn-sm btn-success"><i class="fa fa-fw fa-plus-square"></i>Tambah</a>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>ID</th>
						<th>Barcode</th>
						<th>Gudang</th>
						<th>Qty</th>
						<th>Action</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>ID</th>
						<th>Barcode</th>
						<th>Gudang</th>
						<th>Qty</th>
						<th>Action</th>
					</tr>
				</tfoot>
				<tbody>
					<?php foreach($stoks as $key => $value): ?>
					<tr>
						<td>
							<?php echo $value->id;?>
						</td>
						<td>
							<div><?php echo $value->barcode;?></div>
							<svg class="barcode" jsbarcode-format="CODE128" jsbarcode-value="<?php echo $value->barcode;?>"></svg>
						</td>
						<td><?php echo $value->nama_gudang;?></td>
						<td><?php echo $value->jumlah;?></td>
						<td>
							<a href="#ubah" class="btn-sm btn-warning" id="edit_btn<?php echo $value->id;?>" onclick="toggleInputJumlah(<?php echo $value->id;?>);return false;"><i class="fa fa-fw fa-pencil-square-o"></i></a>
							<?php
							echo form_input('jumlah', '', [
								'id' => 'jumlah'.$value->id,
								'placeholder' => 'Masukkan Angka',
								'style' => 'display:none;',
								'onkeydown' => 'update_jumlah(event, '.$value->id.')',
							]);
							?>
							<a href="<?php echo base_url().'stok/hapus/'.$value->id;?>" onclick="return confirm('Hapus stok <?php echo $value->barcode;?> ?');" class="btn-sm btn-danger"><i class="fa fa-fw fa-trash"></i></a>
						</td>
					</tr>
					<?php endforeach;?>
				</tbody>
			</table>
		</div>
	</div>
	<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>
<script type="text/javascript" src="<?php echo base_url();?>assets/jsbarcode/JsBarcode.all.min.js"></script>
<script type="text/javascript">
	JsBarcode('.barcode').init();

	function toggleInputJumlah(id)
	{
		$('#edit_btn'+id).toggle();
		$('#jumlah'+id).toggle();
	}

	function update_jumlah(e, id)
	{
		var value = null;
		var char = e.which || e.keyCode;
		if(char == 13)
		{
			value = $('#jumlah'+id).val();
			$.post('<?php echo base_url();?>stok/ubah_jumlah/'+id, {
				'jumlah': value,
			}, function(data){
				if(data.success)
				{
					alert('Update jumlah sukses');
					location.reload();
				}
				else
				{
					$('<span class="alert-danger col-md-3">Update jumlah gagal. errcode: 1').insertAfter('#jumlah'+id);
				}
			});
		}
	}
</script>

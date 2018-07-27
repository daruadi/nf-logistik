	<div class="card mb-3">
	<div class="card-header">
		<i class="fa fa-table"></i>
		Daftar harga
		&nbsp<a href="<?php echo base_url();?>harga/tambah" class="btn-sm btn-success"><i class="fa fa-fw fa-plus-square"></i>Tambah</a>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>ID</th>
						<th>Barcode</th>
						<th>Harga</th>
						<th>Start Date</th>
						<th>End Date</th>
						<th>Action</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>ID</th>
						<th>Barcode</th>
						<th>Harga</th>
						<th>Start Date</th>
						<th>End Date</th>
						<th>Action</th>
					</tr>
				</tfoot>
				<tbody>
					<?php foreach($hargas as $key => $value): ?>
					<tr>
						<td>
							<?php echo $value->id;?>
						</td>
						<td>
							<div><?php echo $value->barcode;?></div>
							<svg class="barcode" jsbarcode-format="CODE128" jsbarcode-value="<?php echo $value->barcode;?>"></svg>
						</td>
						<td><?php echo $value->harga;?></td>
						<td><?php echo $value->start_date;?></td>
						<td><?php echo $value->end_date;?></td>
						<td>
							<a href="<?php echo base_url().'harga/ubah/'.$value->id ?>" class="btn-sm btn-warning"><i class="fa fa-fw fa-pencil-square-o"></i></a>
							<a href="<?php echo base_url().'harga/hapus/'.$value->id;?>" onclick="return confirm('Hapus harga <?php echo $value->barcode;?> ?');" class="btn-sm btn-danger"><i class="fa fa-fw fa-trash"></i></a>
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
</script>

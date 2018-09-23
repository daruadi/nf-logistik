<?php echo $breadcrumb; ?>
<div class="card mb-3">
	<div class="card-header">
		<i class="fa fa-table"></i>
		Daftar Satuan Unit
		&nbsp<a href="<?php echo base_url();?>unit/tambah" class="btn-sm btn-success"><i class="fa fa-fw fa-plus-square"></i>Tambah</a>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nama</th>
						<th>Kode</th>
						<th>Action</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>ID</th>
						<th>Nama</th>
						<th>Kode</th>
						<th>Action</th>
					</tr>
				</tfoot>
				<tbody>
					<?php foreach($units as $key => $value): ?>
					<tr>
						<td><?php echo $value->id;?></td>
						<td><?php echo $value->nama;?></td>
						<td><?php echo !empty($value->kode) ? $value->kode : '<i>(not set)</i>';?></td>
						<td>
							<a href="<?php echo base_url().'unit/ubah/'.$value->id;?>" class="btn-sm btn-warning"><i class="fa fa-fw fa-pencil-square-o"></i></a>
							<a href="<?php echo base_url().'unit/hapus/'.$value->id;?>" onclick="return confirm('Hapus unit <?php echo $value->nama;?> ?');" class="btn-sm btn-danger"><i class="fa fa-fw fa-trash"></i></a>
						</td>
					</tr>
					<?php endforeach;?>
				</tbody>
			</table>
		</div>
	</div>
	<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>

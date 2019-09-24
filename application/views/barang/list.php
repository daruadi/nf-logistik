<?php
	$content_header['page_name'] = 'Daftar Barang';
	$content_header['page_description'] = 'Daftar barang beserta kodenya';
	$this->load->view('global/content_header', $content_header);
?>
	<section class="content">
		<div class="row">
			<div class="col-xs-2">
				<a href="<?php echo base_url();?>barang/tambah/" class="btn btn-block btn-primary">Tambah</a>
			</div>
		</div>
		<table class="table table-hover table-bordered">
			<thead>
				<tr>
					<th>Nama</th>
					<th>Kode</th>
					<th>Action</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th>Nama</th>
					<th>Kode</th>
					<th>Action</th>
				</tr>
			</tfoot>
			<tbody>
				<?php foreach($barangs as $key => $value): ?>
				<tr>
					<td><?php echo $value->nama;?></td>
					<td><?php echo !empty($value->kode) ? $value->kode : '<i>(not set)</i>';?></td>
					<td>
						<a href="<?php echo base_url().'barang/ubah/'.$value->id;?>" class="btn-sm btn-warning"><i class="fa fa-fw fa-pencil-square-o"></i></a>
						<a href="<?php echo base_url().'barang/hapus/'.$value->id;?>" onclick="return confirm('Hapus barang <?php echo $value->nama;?> ?');" class="btn-sm btn-danger"><i class="fa fa-fw fa-trash"></i></a>
					</td>
				</tr>
				<?php endforeach;?>
			</tbody>
		</table>
	</section>

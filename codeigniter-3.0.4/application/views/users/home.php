
<?php if ($this->session->flashdata('msg_success')) { ?>
<div class="alert alert-success"> <?= $this->session->flashdata('msg_success') ?> </div>
<?php } ?>
<?php if ($this->session->flashdata('msg_error')) { ?>
<div class="alert alert-danger"> <?= $this->session->flashdata('msg_error') ?> </div>
<?php } ?>
<div class="box">
	<div class="box-body">
		<a class="btn btn-primary" href="<?= base_url('users/add') ?>">Tambah User</a>
		<table id="table" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Name</th>
					<th>Username</th>
					<th>Email</th>
					<th>Status</th>
					<th>Is Active</th>
					<th style="width:40px;">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach($listData as $row){
					?>
					<tr>
						<td><?= $row->name ?></td>
						<td><?= $row->username ?></td>
						<td><?= $row->email ?></td>
						<td><?= $row->status ?></td>
						<td><?= $row->isActive ? 'Yes' : 'No' ?></td>
						<td>
							<a class="btn btn-fab btn-primary btn-xs" href="<?= base_url('users/edit/'.$row->uniqueId) ?>"><i class="fa fa-pencil"></i></a> 
							<a href="#" class="btn btn-fab btn-danger btn-xs" onClick="deleteRow(<?= $row->uniqueId ?>)"><i class="fa fa-trash-o"></i></a>
						</td>
					</tr>
					<?php
				}
				?>
			</tbody>
		</table>

		<!-- pagination -->
		<div style="text-align: right">
			<?php echo $this->pagination->create_links(); ?>
		</div>
		<!-- end of pagination -->
	</div>
</div>

<script>
	$(function () {
		$('#table').DataTable({
			'paging'      : false,
			'lengthChange': false,
			'searching'   : false,
			'ordering'    : true,
			'info'        : false,
			'autoWidth'   : false
		})
	})

	var base_url= '<?php echo base_url(); ?>';
	function deleteRow(id){
		if (confirm('Yakin hapus data ini ?')) {
			window.location= base_url + "users/delete/" + id;
		}
	}
</script>
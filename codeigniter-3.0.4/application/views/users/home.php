
<?php if ($this->session->flashdata('msg_success')) { ?>
<div class="alert alert-success"> <?= $this->session->flashdata('msg_success') ?> </div>
<?php } ?>
<?php if ($this->session->flashdata('msg_error')) { ?>
<div class="alert alert-danger"> <?= $this->session->flashdata('msg_error') ?> </div>
<?php } ?>

<div class="box">
	<div class="box-body">

		<!-- searchbox -->
		<div class="row">
			<div class="col-md-6" style="vertical-align:bottom">
				<a class="btn btn-primary" href="<?= base_url('users/add') ?>">Tambah User</a>
			</div>
			<div class="col-md-6">
				<label>Search Data</label>
				<label style="float:right">Total Record : <?= $totalData ?></label>

				<form id="formSearch" action="<?= base_url('users/home') ?>" method="post" style="display:none"></form>
				<form id="formSearchReset" action="<?= base_url('users/home') ?>" method="post" style="display:none"></form>

				<div class="input-group input-group-sm">
					<select form="formSearch" name="searchCategory" class="form-control" style="width:50%">
						<option><?= isset($search) && $search->searchCategory != NULL ? $search->searchCategory : 'Nama' ?></option>
						<option>Name</option>
						<option>Username</option>
						<option>Status</option>
					</select>
					<input form="formSearch" name="searchKeyword" type="text" class="form-control" placeholder="Kata kunci" value="<?= isset($search) ? $search->searchKeyword  : '' ?>" style="width:50%">
					<span class="input-group-btn">
						<input form="formSearch" type="submit" class="btn btn-info btn-float" value="Search">
						<input form="formSearchReset" name="searchReset" type="submit" class="btn btn-default btn-float" value="Reset">
					</span>
				</div>
			</div>
		</div>
		<!-- end of searchbox -->

		<table id="table" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Name</th>
					<th>Username</th>
					<th>Email</th>
					<th>Status</th>
					<th>Is Active</th>
					<th style="width:50px;">Action</th>
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
			'ordering'    : false,
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
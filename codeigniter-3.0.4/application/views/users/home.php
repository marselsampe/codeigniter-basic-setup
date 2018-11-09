<div class="box">
	<div class="box-body">
		<table id="table" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Rendering engine</th>
					<th>Browser</th>
					<th>Platform(s)</th>
					<th>Engine version</th>
					<th>CSS grade</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Trident</td>
					<td>Internet
						Explorer 4.0
					</td>
					<td>Win 95+</td>
					<td> 4</td>
					<td>X</td>
				</tr>
				<tr>
					<td>Trident</td>
					<td>Internet
						Explorer 5.0
					</td>
					<td>Win 95+</td>
					<td>5</td>
					<td>C</td>
				</tr>
			</tbody>
		</table>
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
</script>
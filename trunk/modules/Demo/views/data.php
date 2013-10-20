<table class="table table-striped  table-bordered table-condensed table-hover" id="myTable" >
		<thead>
			<tr align = "center">
				<th><i class="icon-plus-sign" id = "add"></i></th>
				<th>Name</th>
				<th>Employee </br>Status</th>
				<th>Email</th>
				<th>Badge</th>
				<th>Phone</th>
				<th>Position</th>
				<th>Division</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
		<?php for($i=1;$i<=10;$i++):?>
			<tr>
				<td><?php echo $i;?></td>
				<td>Ayu Sianturi</td>
				<td>Permanent</td>
				<td>anakpisces@gmail.com</td>
				<td>PA-00123</td>
				<td>082387873400</td>
				<td>One</td>
				<td>Finance</td>
				<td><i class="icon-edit" title = "update"></i> <i class="icon-trash" title = "delete"></i> </td>
			</tr>
		<?php endfor;?>
		</tbody>
</table>	
	<span id="example"></span>
	<script type='text/javascript'>
	var options = {
	currentPage: 3,
	totalPages: 10
	}
	$('#example').bootstrapPaginator(options);
	</script>
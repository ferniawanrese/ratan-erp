
Expenses Data : <span class="label label-info"><?php echo $countdata[0]['totdata'];?></span>
<div></br></div>
<table class="responsive table table-striped table-bordered table-hover" style = "padding-top:20px;" border="1">
	<thead>
		  <tr>  
				<th> Employee </th> 
				<th> Date </th> 
				<th> Description </th>   
				<th> Currency </th> 
				<th> Total Amount </th>
				<th>  State </th>  
				<th>  Product </th>  
				<th>  Expense Note </th>  
				<th>  Reference </th>  
				<th>  Unit Price </th>  
				<th>  Quantity </th>  
				<th>  UoM </th>
				<th>  Sub Total </th>
		  </tr>
	</thead> 
	<tbody>
	 
			<?php if($expends_data):?>
			 <?php foreach($expends_data as $dat):?>
				<tr>			
					<td>
					<?php echo $dat['employee_name'];?>	 
					</td>
					<td>
					<?php echo date('d M Y',strtotime($dat['date']));?>
					</td>
					<td>
					<?php echo $dat['description'];?>	 
					</td> 
					<td>
					<?php echo $dat['currency_code'];?>	 
					</td> 
					 <td> 
					  <?php echo $dat['total_amount'];?>	 
					</td>
					<td> 
					<?php echo $dat['state'];?>	 
					</td> 
					 
				</tr>
				 
			<?php endforeach;?>
			<?php else:?>
				 <tr>
					<td colspan='9'><center>no data</center></td>
				  </tr>
			<?php endif;?>
	</tbody>
	
</table>
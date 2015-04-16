 
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
			 
			 <?php $colnya =  count($expends_data_detail[$dat['expense_ID']]);?>
			 
			  <?php $col = $colnya;?> 
			  <?php $rol = "1";?> 
			 
				<tr>			
					<td rowspan="<?php echo $col;?>" colspan = "1">
					<?php echo $dat['employee_name'];?>	 
					</td>
					<td rowspan="<?php echo $col;?>" colspan = "1">
					<?php echo date('d M Y',strtotime($dat['date']));?>
					</td>
					<td rowspan="<?php echo $col;?>" colspan = "1">
					<?php echo $dat['description'];?>	 
					</td> 
					<td rowspan="<?php echo $col;?>" colspan = "1">
					<?php echo $dat['currency_code'];?>	 
					</td> 
					 <td rowspan="<?php echo $col;?>" colspan = "1"> 
					  <?php echo $dat['total_amount'];?>	 
					</td >
					<td rowspan="<?php echo $col;?>" colspan = "1"> 
					<?php echo $dat['state'];?>	 
					</td> 
				
				<?php $i = 0;?>
				<?php foreach($expends_data_detail[$dat['expense_ID']] as $key):?>
				
				<?php if($i != 0):?>
				</tr>
				<tr> 
				<?php endif;?>
				 
					<td rowspan="<?php echo $rol;?>">
					<?php echo $key['product_name'];?>	 
					</td>
					<td rowspan="<?php echo $rol;?>">
					<?php echo $key['expense_note'];?>
					</td>
					<td rowspan="<?php echo $rol;?>">
					<?php echo $key['reference'];?>	 
					</td> 
					<td rowspan="<?php echo $rol;?>">
					<?php echo $key['unit_price'];?> 
					</td> 
					 <td rowspan="<?php echo $rol;?>"> 
					<?php echo $key['quantity'];?>	 
					</td >
					<td rowspan="<?php echo $rol;?>"> 
					<?php echo $key['uom'];?>
					</td> 
					<td rowspan="<?php echo $rol;?>"> 
					<?php echo $key['sub_total'];?> 
					</td>
					 
				</tr>
				<?php $i++;?>
				<?php endforeach;?>
				 
			<?php endforeach;?>
			<?php else:?>
				 <tr>
					<td rowspan='9'><center>no data</center></td>
				  </tr>
			<?php endif;?>
	</tbody>
	
</table>
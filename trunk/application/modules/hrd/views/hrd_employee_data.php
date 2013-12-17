<table class="table data-grid table-bordered paper-table tbl-serach responsive">
				                <thead>
				                  <tr>
				                    <th> No </th>
				                    <th> Full Name </th>
				                    <th> Address </th>
				                    <th> Email </th>
				                    <th> Phone </th>
				                    <th> Start Working </th>
				                    <th> Thumb </th>
				                    <th> Status </th>
				                    <th> Action </th>
				                  </tr>
				                </thead>
				                <tbody>

				                <?php $i=1;foreach($employee_data as $keys):?>
				                  <tr>
				                    <td><a href="#"><?php echo $i;?></a></td>
				                    <td><a href="#"><?php echo $keys['employee_name'];?></a></td>
				                    <td> <?php echo $keys['employee_address'];?> </td>
				                    <td class="center"> <?php echo $keys['employee_email'];?> </td>
				                    <td class="center"> <?php echo $keys['employee_phone'];?> </td>
				                    <td class="center"> <?php echo date("d M Y", strtotime($keys['employee_startworking']));?> </td>
				                    <td class="center"><div class="user-thumb"> <a href="#">
				                    	<img height="40" width="40" alt="User" src="<?php echo $keys['employee_photo'];?>"></a> </div></td>
				                    <td class="center"><span class="label label-success">New</span> <span class="label label-info">Pending</span></td>
				                    <td class="center"><div class="btn-toolbar row-action">
				                        <div class="btn-group">
				                          <button class="btn btn-info" title="Edit"><i class="icon-edit"></i></button>
				                          <button class="btn btn-danger" title="Delete"><i class="icon-remove"></i></button>
				                          <button class="btn btn-inverse" title="Suspend"><i class=" icon-remove-sign"></i></button>
				                          <button class="btn btn-success" title="Approve"><i class=" icon-ok"></i></button>
				                        </div>
				                      </div></td>
				                  </tr>
				                <?php $i++;endforeach;?>
				                </tbody>
				                <tfoot>
				                </tfoot>
</table>
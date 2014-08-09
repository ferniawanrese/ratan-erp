
			
<div class="row-fluid">
				<div class="switch-board gray col-md-12">
					<div class="col-md-2">
					</div>
					<div class="col-md-8">
						<ul class="clearfix switch-item">
							
							<?php foreach($main_menu as $key):?>
							<li><a href="<?php echo $key['menu_url'];?>" class="<?php echo $key['menu_class'];?>"><i class="<?php echo $key['menu_icon'];?>"></i><span><?php echo $key['menu_name'];?></span></a></li>
							<?php endforeach;?>
							
						</ul>
					</div>
					<div class="col-md-2">
					</div>
				</div>
</div>
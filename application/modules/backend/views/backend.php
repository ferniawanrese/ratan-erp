
			
<div class="row-fluid">
				<div class="span12">
					<div class="switch-board gray">
						<ul class="clearfix switch-item">
							
							<?php foreach($main_menu as $key):?>
							<li><a href="<?php echo $key['menu_url'];?>" class="<?php echo $key['menu_class'];?>"><i class="<?php echo $key['menu_icon'];?>"></i><span><?php echo $key['menu_name'];?></span></a></li>
							<?php endforeach;?>
							
						</ul>
					</div>
				</div>
</div>
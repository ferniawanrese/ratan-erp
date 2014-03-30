
			
			<div class="row-fluid ">
				<div class="span12">
					<div class="primary-head">
						<h3 class="page-header">Dashboard</h3>
						<ul class="top-right-toolbar">
							<li><a data-toggle="dropdown" class="dropdown-toggle blue-violate" href="#" title="Users"><i class="icon-user"></i></a>
							</li>
							<li><a href="#" class="green" title="Upload"><i class=" icon-upload-alt"></i></a></li>
							<li><a href="#" class="bondi-blue" title="Settings"><i class="icon-cogs"></i></a></li>
						</ul>
					</div>
					<ul class="breadcrumb">
						<li><a href="#" class="icon-home"></a><span class="divider "><i class="icon-angle-right"></i></span></li>
						<li><a href="#">Library</a><span class="divider"><i class="icon-angle-right"></i></span></li>
						<li class="active">Data</li>
					</ul>
				</div>
			</div>

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

		<?php $this->load->view('header');?>

<div class="layout">

		<?php $this->load->view('top_navbar');?>
	
		<?php $this->load->view('left_side_menu');?>
		
	<div class="main-wrapper">
		<div class="container-fluid">
		
			<!-- ALERT -->
			<div class = "alert_message">
			<div class="alert alert-error">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<i class="icon-exclamation-sign"></i><strong>Warning!</strong> Best check yo self, you're not looking too good.
			</div>
			</div>
			
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
			
			<?php $this->load->view('mainmenu');?>
			
			<div class="row-fluid ">
				<div class="span3">
					<div class="board-widgets green">
						<div class="board-widgets-head clearfix">
							<h4 class="pull-left"><i class="icon-inbox"></i> Inbox </h4>
							<a href="#" class="widget-settings"><i class="icon-cog "></i></a>
						</div>
						<div class="board-widgets-content">
							<span class="n-counter">235</span><span class="n-sources">Unread Messages</span>
						</div>
						<div class="board-widgets-botttom">
							<a href="#">Go to Inbox <i class="icon-double-angle-right"></i></a>
						</div>
					</div>
				</div>
				<div class="span3">
					<div class="board-widgets blue-violate">
						<div class="board-widgets-head clearfix">
							<h4 class="pull-left"><i class=" icon-comment"></i> Comments </h4>
							<a href="#" class="widget-settings"><i class="icon-cog "></i></a>
						</div>
						<div class="board-widgets-content">
							<span class="n-counter">52</span><span class="n-sources">New Comments</span>
						</div>
						<div class="board-widgets-botttom">
							<a href="#">Go to Comments<i class="icon-double-angle-right"></i></a>
						</div>
					</div>
				</div>
				<div class="span3">
					<div class="board-widgets dark-yellow">
						<div class="board-widgets-head clearfix">
							<h4 class="pull-left"><i class=" icon-file-alt"></i> Post </h4>
							<a href="#" class="widget-settings"><i class="icon-cog "></i></a>
						</div>
						<div class="board-widgets-content">
							<span class="n-counter">85</span><span class="n-sources">New Post</span>
						</div>
						<div class="board-widgets-botttom">
							<a href="#">Go to Post<i class="icon-double-angle-right"></i></a>
						</div>
					</div>
				</div>
				<div class="span3">
					<div class="board-widgets magenta">
						<div class="board-widgets-head clearfix">
							<h4 class="pull-left"><i class="icon-user"></i> User </h4>
							<a href="#" class="widget-settings"><i class="icon-cog "></i></a>
						</div>
						<div class="board-widgets-content">
							<span class="n-counter">65</span><span class="n-sources">New User</span>
						</div>
						<div class="board-widgets-botttom">
							<a href="#">Go to User<i class="icon-double-angle-right"></i></a>
						</div>
					</div>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span12">
					<h3 class=" page-header"> Tab Desk</h3>
				</div>
			</div>
			
			
		</div>
	</div>
	
</div>

<?php $this->load->view('footer');?>
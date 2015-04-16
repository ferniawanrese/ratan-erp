<ul class="breadcrumb">
	<li><a href="<?php echo base_url('backend');?>" class="icon-home"></a><span class="divider "><i class="icon-angle-right"></i></span></li>
	<li><a href="<?php echo  base_url('hrd');?>">HRD</a><span class="divider"><i class="icon-angle-right"></i></span></li>
	<li class="active">File Manager</li> 
</ul>


<script src="<?php echo base_url('js/elfinder.min.js');?>"></script>

<link href="<?php echo base_url('css/elfinder.css');?>" rel="stylesheet">  
 
<script>
	$().ready(function () {
		var elf = $('#file-manager').elfinder({
			url: "<?php echo base_url('connector/connector.php?dir=upload');?>" // connector URL (REQUIRED) 
			// lang: 'ru',             // language (OPTIONAL)
		}).elfinder('instance');
	});
</script>

<div class="row-fluid">
	<div class="span12">
		<div class="content-widgets gray ">
			<div class="widget-head blue clearfix">
				<h3><i class=" icon-file-alt"></i>File Manager</h3>
			</div>
			<div>
				<div id="file-manager">
				</div>
			</div>
		</div>
	</div>
</div>
 

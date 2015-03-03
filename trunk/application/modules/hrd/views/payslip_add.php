	<label class = "pull-right"><font size = "3"><?php echo $dat[0]['employee_name'];?> <?php echo $dat[0]['employee_badge'];?>  </font></label>
 
	
	<span class = "col-md-12" >	
		<div id = "contentnya" nmae = "contentnya"></div>
	</span>
	
	<input type = "hidden" id = "validate_error" name = "validate_error" class = "validate_error" value = "0">
	
<script>
 
$('#date_end').datepicker({
  format:"dd-mm-yyyy"
});  

$('#date_start').datepicker({
  format:"dd-mm-yyyy"
});  

generate();
function generate(){

			var date_start = $('#date_start').val();
			var date_end = $('#date_end').val();
			
			NProgress.inc();	
			$.ajax({
				type: "GET",
				url: "<?php echo base_url('hrd/generate_payroll');?>/<?php echo $dat[0]['employee_ID'];?>/"   + date_start +  "/" + date_end +  "/" ,
				data: "",
				success: function(data)
				{
					 
					$("#contentnya").html(data); 		
					NProgress.done(true);
				}
			});
}
</script>
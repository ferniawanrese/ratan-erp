<ul class="breadcrumb">
	<li><a href="<?php echo base_url('backend');?>" class="icon-home"></a><span class="divider "><i class="icon-angle-right"></i></span></li>
	<li><a href="<?php echo  base_url('hrd');?>">HRD</a><span class="divider"><i class="icon-angle-right"></i></span></li>
	<li class="active">Configuration</li>
	<li class="active">Organization Resource</li>
	<li class="active">Auto Badge</li>
</ul> 
<div class="primary-head">
						<!--content-->
						<div class="row-fluid">
									<div class="content-widgets gray">
										<div class="widget-head blue clearfix">
										  <h3 class="pull-left" onclick="display_data()" style="cursor:pointer;">Auto Badge </h3>
										</div>
										<form id = "form_filter" action ="<?php echo base_url('hrd/autobadge/');?>" method="post">									
										<div class="well col-sm-12 col-md-12"> 
											<div class = "col-md-3 btn-create">
												<input type ="text" name ="badge" id="badge" class="form-control" placeholder="Badge Character" value = "<?php echo $autobadge_data[0]['badge'];?>">
											</div>
											<div class = "col-md-3 btn-create">
												<div class="input-group number-spinner">
													<span class="input-group-btn data-down ">
														<button type="button"  class="btn btn-default btn-info" data-dir="dwn" ><i class="glyphicon glyphicon-minus"></i></button>
													</span>
													<input type="text" id = "badge_inc" name = "badge_inc" class="form-control text-center"   min="0" max="100000" title="Initial Increment" value = "<?php echo $autobadge_data[0]['badge_inc'];?>">
													<span class="input-group-btn data-up ">
														<button type="button"  class="btn btn-default btn-info "  data-dir="up" ><i class="glyphicon glyphicon-plus"></i></button>
													</span>
												</div>
											</div>
											<div class = "btn-create form-group"> 
												<button class="btn btn-default btn-large  " type="submit" > Save</button> 
											</div>
										</form>
										</div> 
									</div>
						</div>
</div>
 

<style>
 

@media ( max-width: 585px ) {
    .input-group span.input-group-btn,.input-group input,.input-group button{
        display: block;
        width: 100%;
        border-radius: 0;
        margin: 0;
    }
    .input-group {
        position: relative;   
    }
    .input-group span.data-up{
        position: absolute;
        top: 0;
    }
    .input-group span.data-dwn{
        position: absolute;
        bottom: 0;
    }
    .form-control.text-center {
        margin: 34px 0;
    }
    .input-group-btn:last-child>.btn, .input-group-btn:last-child>.btn-group{
        margin-left:0;
    }

}

</style>	

<script>
$(function() {
    var action;
    $(".number-spinner button").mousedown(function () {
        btn = $(this);
        input = btn.closest('.number-spinner').find('input');
        btn.closest('.number-spinner').find('button').prop("disabled", false);

    	if (btn.attr('data-dir') == 'up') {
            action = setInterval(function(){
                if ( input.attr('max') == undefined || parseInt(input.val()) < parseInt(input.attr('max')) ) {
                    input.val(parseInt(input.val())+1);
                }else{
                    btn.prop("disabled", true);
                    clearInterval(action);
                }
            }, 50);
    	} else {
            action = setInterval(function(){
                if ( input.attr('min') == undefined || parseInt(input.val()) > parseInt(input.attr('min')) ) {
                    input.val(parseInt(input.val())-1);
                }else{
                    btn.prop("disabled", true);
                    clearInterval(action);
                }
            }, 50);
    	}
    }).mouseup(function(){
        clearInterval(action);
    });
});
</script>				
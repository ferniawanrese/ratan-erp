$(function(){
	alert('aaa');
	window.prettyPrint && prettyPrint();
	$('#dp1').datepicker({
		format: 'mm-dd-yyyy'
	});
	$('#dp12').datepicker({
		format: 'mm-dd-yyyy'
	});
	$('#dp13').datepicker({
		format: 'mm-dd-yyyy'
	});
	$('#dp14').datepicker({
		format: 'mm-dd-yyyy'
	});
	$('#dpYears').datepicker();
	$('#dpMonths').datepicker();
	
	var startDate = new Date(2012,1,20);
	var endDate = new Date(2012,1,25);
	
	$('#dp1').datepicker()
	.on('changeDate', function(ev){
		if (ev.date.valueOf() > endDate.valueOf()){
			$('#alert').show().find('strong').text('The start date can not be greater then the end date');
		} else {
			$('#alert').hide();
			startDate = new Date(ev.date);
			$('#startDate').text($('#dp4').data('date'));
		}
		$('#dp4').datepicker('hide');
	});
	
	$('#dp12').datepicker()
	.on('changeDate', function(ev){
		if (ev.date.valueOf() < startDate.valueOf()){
			$('#alert').show().find('strong').text('The end date can not be less then the start date');
		} else {
			$('#alert').hide();
			endDate = new Date(ev.date);
			$('#endDate').text($('#dp5').data('date'));
		}
		$('#dp5').datepicker('hide');
	});

    // disabling dates
    var nowTemp = new Date();
    var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

    var checkin = $('#dpd1').datepicker({
      onRender: function(date) {
        return date.valueOf() < now.valueOf() ? 'disabled' : '';
      }
    }).on('changeDate', function(ev) {
      if (ev.date.valueOf() > checkout.date.valueOf()) {
        var newDate = new Date(ev.date)
        newDate.setDate(newDate.getDate() + 1);
        checkout.setValue(newDate);
      }
      checkin.hide();
      $('#dpd2')[0].focus();
    }).data('datepicker');
    var checkout = $('#dpd2').datepicker({
      onRender: function(date) {
        return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
      }
    }).on('changeDate', function(ev) {
      checkout.hide();
    }).data('datepicker');
});	


/*
	Function Add Image Description
*/
var image_row = "<?php echo $image_row ?>";
function addImage() {
    html  = '<tbody id="image-row' + image_row + '">';
	html += '  <tr>';
	html += '    <td><div class="image"><img src="<?php echo $this->config->item('uploadsUrl') ?>/no_image.jpg" alt="" id="thumb' + image_row + '" /><input type="hidden" name="deals_image[' + image_row + '][image]" value="" id="image' + image_row + '" /><br /><a onclick="image_upload(\'image' + image_row + '\', \'thumb' + image_row + '\');">Browse Files</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a onclick="$(\'#thumb' + image_row + '\').attr(\'src\', \'<?php echo base_url('static/cache/uploads/no_image-100x100.jpg') ?>\'); $(\'#image' + image_row + '\').attr(\'value\', \'\');">Clear Image</a></div></td>';
	html += '    <td style="text-align:right"><a onclick="$(\'#image-row' + image_row  + '\').remove();" class="button">Remove</a></td>';
	html += '  </tr>';
	html += '</tbody>';
	
	$('#tblImage tfoot').before(html);
	
	image_row++;
}

$(document).ready(function(){
	var el1 = $(".bm option");
	var a = new Array();
	$(el1).each(function(i,v){
		// make array
		a.push($(this).val());
	});
	console.log(a);

	var el = $(".branchs-checkbox");
	$(el).each(function(index,value){
		var v = $(this).val();
		for (var p=0;p<a.length;p++) {
            if (v == a[p]) {
            	console.log(v);
            	//return true;
            	document.getElementsByName('branch[]')[p].checked = true;
            }
      	}					
	});

	$("#sel_all").click(function(){
		$(el).prop('checked',true);
		console.log('Select all');
	});

	$("#unsel_all").click(function(){
		$(el).prop('checked',false);
		console.log('Deselect All');
	});	
});
var modal_new_link = "#modal_new";


$(function() {	
	
	if($(location).attr('hash') == "#new"){
		$(modal_new_link).modal('show');
	}
	
	$("#radioFeedBlockUsersYes").click(function(){
		$('#selectMultipleUsers').show();
	});
	$("#radioFeedBlockUsersNo").click(function(){
		$('#selectMultipleUsers').hide();
	});
	
	
	
	$(".table-clickable tr").click(function(){
		$(location).attr('href', $(this).attr("data-url"));
	});
	
	$('.accordion-toggle').click(function() {
		$('.collapse').collapse("hide");
	});
	
	$('#chat_lobby').click(function(){
		$('.chat-list').slideToggle();
	});
	
	//$('.chat-list').jScrollPane();
	//$('.chat-messages').jScrollPane();
	
	$("#new-arrival-last-showing-date").datepicker({ 
		minDate: 0,
		beforeShow:function(input) {
			$(input).css({
				"position": "relative",
				"z-index": 999999
			});
		}
	});
	
	
	
	
	$('input[name="price-kind"]').click(function(){
        if($(this).attr("value")=="Fixed Price"){
            $(".box").not(".red").hide();
            $(".red").show();
        }
        if($(this).attr("value")=="Upcoming"){
            $(".box").not(".green").hide();
            $(".green").show();
        }
    });
	
	$("#display-image").fileinput({allowedFileExtensions : ['jpg', 'jpeg','png','gif']});
	$("#display-other-image").fileinput({allowedFileExtensions : ['jpg', 'jpeg','png','gif']});
	
	$("#add-more-attr").click(function(){
		var id = ($('.form-inline .control-group').length + 1).toString();
		
		$('.form-attr').append('<div class="control-group form-inline" id="control-group' + id + '"><input style="margin:5px 0px;" class="controls form-control" type="text" id="' + id + '" placeholder="Attribute Name"><input style="margin:5px 0px 5px 5px;" class="controls form-control" type="text" id="' + id + '" placeholder="Attr Value"> <span class="remove-attr">x</span></div>');
	}).css('cursor','pointer');
	
	$(".remove-attr").click(function () {
		if ($('.form-inline .control-group').length == 1) {
			alert("No more textbox to remove");
			return false;
		}

		$(".form-inline .control-group:last").remove();
		alert("hmm");
	});
	
	$(".datepicker").datepicker({ 
		minDate: 0,
		beforeShow:function(input) {
			$(input).css({
				"position": "relative",
				"z-index": 999999
			});
		}
	});
	$('.hour_min').timepicker({
		'minTime': '2:00pm',
		'maxTime': '11:30pm',
		'showDuration': true
	});
	
	$('.sss').datepicker( {
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'yy',
        onClose: function(dateText, inst) { 
            var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
            var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
            $(this).datepicker('setDate', new Date(year, month, 1));
        }
    });
	
	
	$("#event_start_date").datepicker({ 
		minDate: 0,
		beforeShow:function(input) {
			$(input).css({
				"position": "relative",
				"z-index": 999999
			});
		}
	});
	
	$("#event_end_date").datepicker({ 
		minDate: 0,
		beforeShow:function(input) {
			$(input).css({
				"position": "relative",
				"z-index": 999999
			});
		}
	});
	
	$('.reply').click(function(){
		$('.feedback-reply').show();
	});
	
	
	
	$('.reply').click(function(){
		$('.feedback-reply').show();
	});
	
	$('#push_message').click(function(){
		$('#send_duretion').hide();
	});
	
	$('#send_later').click(function(){
		$('#send_duretion').slideToggle();
	});
	
	
	$('#send_date').datepicker({ 
		minDate: 0,
		beforeShow:function(input) {
			$(input).css({
				"position": "relative",
				"z-index": 999999
			});
		}
	});
	
	$('#send_time').timepicker();
	
	
	$('#event_start_time').timeago();
	
	
});
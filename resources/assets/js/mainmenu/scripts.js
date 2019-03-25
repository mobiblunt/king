/*-----------------------------------------------------------------------------------*/
/*	SELECTNAV
/*-----------------------------------------------------------------------------------*/

$(document).ready(function() {
	selectnav('tiny', {
		label: '--- Navigation --- ',
		indent: '-'
	});
	
	
	
	 $("input[id*='weight']").keydown(function (event) {


            if (event.shiftKey == true) {
                event.preventDefault();
            }

            if ((event.keyCode >= 48 && event.keyCode <= 57) || (event.keyCode >= 96 && event.keyCode <= 105) || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 37 || event.keyCode == 39 || event.keyCode == 46 || event.keyCode == 190) {

            } else {
                event.preventDefault();
            }
            
            if($(this).val().indexOf('.') !== -1 && event.keyCode == 190)
                event.preventDefault();

        });
	
	
});

/*-----------------------------------------------------------------------------------*/
/*	MENU
/*-----------------------------------------------------------------------------------*/
ddsmoothmenu.init({
	mainmenuid: "menu",
	orientation: 'h',
	classname: 'menu',
	contentsource: "markup"
})

function validateFeedback(){
	var enquiry = $("#enquiry").val();
	if (enquiry == "") {
		$('#enquiry').closest('textarea').prevAll('div').html('Please enter your complaint and suggestions'); 
		$("#enquiry").focus();
		return false;
	}
	else
		$('#enquiry').closest('textarea').prev('div').html(''); 
	
	var name = $("#name").val();
	if (name == "") {
		$('#name').closest('input').prevAll('div').html('Please enter your name'); 
		$("#name").focus();
		return false;
	}
	else
		$('#name').closest('input').prev('div').html(''); 
	
	var email = $("#email").val();
	if (email == "") {
		$('#email').closest('input').prev('div').html('Please enter email address'); 
		$("#email").focus();
		return false;
	}
	else
		$('#email').closest('input').prev('div').html('');
	
	if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email))){
		$('#email').closest('input').prev('div').html('Invalid email address');  
		$("#email").focus();
		return false;
	}
	else
		$('#email').closest('input').prev('div').html('');
}



function validateContact(){
	var name = $("#name").val();
	if (name == "") {
		$('#name').closest('input').prevAll('div').html('Please enter your name'); 
		$("#name").focus();
		return false;
	}
	else
		$('#name').closest('input').prev('div').html(''); 
	
	var email = $("#email").val();
	if (email == "") {
		$('#email').closest('input').prev('div').html('Please enter email address'); 
		$("#email").focus();
		return false;
	}
	else
		$('#email').closest('input').prev('div').html('');
	
	if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email))){
		$('#email').closest('input').prev('div').html('Invalid email address');  
		$("#email").focus();
		return false;
	}
	else
		$('#email').closest('input').prev('div').html('');
	
	var phone = $("#phone").val();
	if (phone == "") {
		$('#phone').closest('input').prev('div').html('Please enter your phone number'); 
		$("#phone").focus();
		return false;
	}
	else
		$('#phone').closest('input').prev('div').html('');
	
}



$("#sr_mobile").keypress(function (e) {
	if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
		return false;
	}
});

function serviceRequest(){
	
	var pickup_date = $("#pickup_date").val();
	if (pickup_date == "") {
		$('#error_span').html('Please select service'); 
		$("#pickup_date").focus();
		return false;
	}
	else
		$('#error_span').html(''); 
	
	var courier = $("#courier").val();
	if (courier == "") {
		$('#courier').closest('select').prevAll('div').html('Please select courier '); 
		$("#courier").focus();
		return false;
	}
	else
		$('#courier').closest('select').prev('div').html('');
		
	var weight = $("#weight").val();
	if (weight == "") {
		$('#weight').closest('input').prevAll('div').html('Please enter your approximate weight.'); 
		$("#weight").focus();
		return false;
	}
	else
		$('#weight').closest('input').prev('div').html(''); 
		
		
	var sr_name = $("#sr_name").val();
	if (sr_name == "") {
		$('#sr_name').closest('input').prevAll('div').html('Please enter your name'); 
		$("#sr_name").focus();
		return false;
	}
	else
		$('#sr_name').closest('input').prev('div').html(''); 
	
	var sr_mobile = $("#sr_address").val();
	if (sr_mobile == "") {
		$('#sr_address').closest('input').prev('div').html('Please enter ciy / street / address'); 
		$("#sr_address").focus();
		return false;
	}
	else
		$('#sr_code').closest('input').prev('div').html('');
	
	
	var sr_mobile = $("#sr_mobile").val();
	if (sr_mobile == "") {
		$('#sr_code').closest('input').prev('div').html('Please enter your phone number'); 
		$("#sr_mobile").focus();
		return false;
	}
	else
		$('#sr_code').closest('input').prev('div').html('');
	
	
	var sr_email = $("#sr_email").val();
	if (sr_email == "") {
		$('#sr_email').closest('input').prev('div').html('Please enter email address'); 
		$("#sr_email").focus();
		return false;
	}
	else
		$('#sr_email').closest('input').prev('div').html('');
	
	if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(sr_email))){
		$('#sr_email').closest('input').prev('div').html('Invalid email address');  
		$("#sr_email").focus();
		return false;
	}
	else
		$('#sr_email').closest('input').prev('div').html('');
	

		
	
	var dataString ='sr_service='+$('#service').val()+'&sr_weight='+weight+'&sr_courier='+courier+'&sr_pdate='+$('#pickup_date').val()+'&sr_ddate='+$('#delivery_date').val()+'&sr_name='+sr_name+'&sr_email='+sr_email+'&sr_mobile='+sr_mobile+'&sr_address='+ $('#sr_address').val();
	
	$.ajax({
		  type: "POST",
		  url: "century-mail.php",
		  data: dataString,
		  beforeSend: function() {
			$('#service_request').html('<div align="center"><img src="images/loader.gif"/></div>');
		  },
		  success: function(info) {
			$('#service_request').html("<div class='message' align='center'></div>");
			$('.message').html('<div style="color:#066333;font-size:15px;padding:5px 5px">Your service request <b>#'+info+'</b> has been logged</div><div style="color:#066333;font-size:14px;padding:5px 5px">Our customer service would contact you shortly to confirm your PICKUP.<br/><br/>PICKUP confirmation subject to availability of courier(9:00 AM - 4:00 PM)</div><div style="padding:5px 5px"><a href="javascript:void(0)" onclick="location.reload()">New Request</a></div></div>');
			
      	  }
    });
    return false;
}



function freset(){ $('#service_request').fadeIn();}
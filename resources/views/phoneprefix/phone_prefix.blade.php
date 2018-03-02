<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
 <link rel="stylesheet" href="{{ asset('/intl-tel-input/build/css/intlTelInput.css') }}">
 <style>
 #error-msg {
  color: red;
}
#valid-msg {
  color: #00C900;
}
  .invalidmsg {
  color: red;
}
.validmsg {
  color: #00C900;
}
input.error {
  border: 1px solid #FF7C7C;
}
.allow-dropdown{ width:100%;}
</style>
</head>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="{{ asset('/intl-tel-input/build/js/intlTelInput.js') }}"></script>
<script>
var keys = [];
  
  if ($.inArray('ie', keys) > -1) {}else { keys.push('ie');}
  if ($.inArray('us', keys) > -1) {}else { keys.push('us');}
  if ($.inArray('gb', keys) > -1) {}else { keys.push('gb');}
  
  
var telInput = $("#phone"),
  errorMsg = $("#error-msg"),
  validMsg = $("#valid-msg");

// initialise plugin
telInput.intlTelInput({
  utilsScript: "{{ asset('/intl-tel-input/build/js/utils.js') }}",
  preferredCountries: keys,
});

var reset = function() {
  telInput.removeClass("error");
  errorMsg.addClass("hide");
  validMsg.addClass("hide");
  var pp=$(this).parent().parent().parent().parent().parent();
  if ($.trim(telInput.val())) {
    if (telInput.intlTelInput("isValidNumber")) {
      validMsg.removeClass("hide");
	  pp.find("#addvendors").removeAttr("disabled");
    } else {
      telInput.addClass("error");
      errorMsg.removeClass("hide");
	 pp.find("#addvendors").attr("disabled", "disabled");
    pp.find("#addvendors").css('background-color','#2f75bb');
	  
    }
  }
};


// on keyup / change flag: reset
telInput.on("keyup change", reset);

//Custom APP

 $('#phone').val($('.editphonenumber').html());  
var cus_telInput = $("#customer_phone"),
  cus_errorMsg = $("#customer_error-msg"),
  cus_validMsg = $("#customer_valid-msg");

// initialise plugin
cus_telInput.intlTelInput({
  utilsScript: "{{ asset('/intl-tel-input/build/js/utils.js') }}",
  preferredCountries: keys,
});

var reset = function() {
  
  cus_telInput.removeClass("error");
  cus_errorMsg.addClass("hide");
  cus_validMsg.addClass("hide");
  var pp=$(this).parent().parent().parent().parent();
  if ($.trim(cus_telInput.val())) {
    if (cus_telInput.intlTelInput("isValidNumber")) {
      cus_validMsg.removeClass("hide");
    pp.find(".phone-prefix-btn").removeAttr("disabled");
    } else {
      cus_telInput.addClass("error");
      cus_errorMsg.removeClass("hide");
    pp.find(".phone-prefix-btn").attr("disabled", "disabled");
    pp.find(".phone-prefix-btn").css('background-color','#2f75bb');
    
    }
  }
};


// on keyup / change flag: reset
cus_telInput.on("keyup change", reset);

    
  </script>
</html>

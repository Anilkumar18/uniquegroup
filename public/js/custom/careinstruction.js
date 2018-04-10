 $(document).ready(function() { 

$('#Careinstruction').change(function() {

var customerID=$('#customerID').val();
var Careinstruction=$(this).val();
var processurl=btoa(customerID+'#'+Careinstruction);
var fabrichref=$("#pageurl").val()+'/getcaredetails/'+processurl;

$.ajax({
                    url: fabrichref,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                    	debugger;
var messagedata=data;
var plen=messagedata[0].length;
var phtm='';
for (var i = 0; i <plen; i++) {
phtm+='<tr>';
for (var jj= 0; jj <messagedata[0][i].length; jj++) {
phtm+='<td>'+messagedata[0][i][jj]+'</td>';


	              	}
phtm+='<td><a data-href="" data-selecthref="" href="javascript:;" class="editSymbol" data-valueid="13" data-toggle="modal" data-target="#myModal5"><img src="'+$("#pageurl").val()+'/img/edit.png" border="0" title="Edit"></a><span class="activatecoo"><a data-href="javascript:;"><img src="'+$("#pageurl").val()+'/img/active.png" border="0" title="Activate"></a></span></td><td><img src="'+$("#pageurl").val()+'/img/active.gif" border="0" title="Deactive"></td></tr>';
	              	}
	              	$(".Careinstructiontable  tbody").html(phtm);
}
});


});


                });

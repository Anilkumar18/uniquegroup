<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
    <style>
        @media only screen and (max-width: 600px) {
            .inner-body {
                width: 100% !important;
            }

            .footer {
                width: 100% !important;
            }
        }

        @media only screen and (max-width: 500px) {
            .button {
                width: 100% !important;
            }
        }
    </style>
    
    <?php
	 $productdetails=App\ProductDetails::where('id','=',$Productid)->where('status','=',1)->first();
	 
	?>

    <table cellspacing="0" cellpadding="0" border="0" width="100%" style="background-color:#FFF;">
<tbody><tr>
    <td align="center" valign="top">
        <table cellspacing="0" cellpadding="10" border="0" width="800" style="color:#000; border-radius:15px;border:solid 2px #58d6f8;">
            
            <tbody><tr><td align="center" valign="middle"><a href="#" target="_blank" data-saferedirecturl="#"><img src="http://theuniquegroup.com/orders/logo_image_new.png" alt="theuniquegroup.com" style="padding-top:25px; margin-bottom:10px" border="0" class="CToWUd"></a></td></tr>
       <tr><td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0"><tbody><tr><td style="margin:0px auto;float:left;padding-top:4px;padding-left:2%;font-size:13px;font-family:Verdana;line-height:20px;">Hello <span style="font-size:13px;">{{$name}},</span></td><td align="right" style="font-family:Verdana;font-size:12px;color:#585858; padding-top: 8px;">&nbsp; </td></tr></tbody></table></td></tr>     


<tr>
	<table align="left" border="1" cellpadding="0" cellspacing="0" width="100%" style="font-family:Arial; font-size:12px;">
  		        <tbody><tr>
		      
		<th style="text-align: left;padding: 8px;background-color: #51ade1 ;color: white;">Product Code</th>
    	<th style="text-align: left;padding: 8px;background-color: #51ade1 ;color: white;">Product Type</th>
        <th style="text-align: left;padding: 8px;background-color: #51ade1 ;color: white;">Approval</th>
        <th style="text-align: left;padding: 8px;background-color: #51ade1 ;color: white;">Comments</th>
		<th style="text-align: left;padding: 8px;background-color: #51ade1 ;color: white;">Status</th>
				</tr> 
		       <tr>
				
		<td style="text-align: left;padding: 5px;">{{$productdetails->id}}</td>
		 <td style="text-align: left;padding: 5px;">@if($productdetails->BoxID!=0){{"Box"}}@endif<br />
                                                    @if($productdetails->HookID!=0){{"Hook"}}@endif<br />
                                                    @if($productdetails->TissuePaperID!=0){{"TissuePaper"}}@endif<br />
                                                    @if($productdetails->PackagingStickersID!=0){{"PackagingStickers"}}@endif<br /></td>
          <td style="text-align: left;padding: 5px;">{{$Productstatus}}</td>
          <td style="text-align: left;padding: 5px;">@if($comments!=""){{$comments}}@else {{"NULL"}}@endif</td>
              	<td style="text-align: left;">
				<table align="left" border="0" cellpadding="0" cellspacing="0" width="60%" style="font-family:Arial; font-size:12px;margin:9%;">
		<tbody><tr><td style="background-color: #1ab394;border-color: #1ab394;color: #FFFFFF; border-radius: 3px;float: left; width: 75px;text-align: center;"><a href="{{ url(route('accountmanager_approvalform',['id'=>$productdetails->id]))}}" target="_blank" style="color: #FFFFFF;border-radius: 3px;">Approve</a></td></tr></tbody></table><br/><br/><table align="left" border="0" cellpadding="0" cellspacing="0" width="60%" style="font-family:Arial; font-size:12px; margin:10%;">
		<tbody><tr><td style="background-color: #ed5565;border-color: #ed5565;color: #FFFFFF; border-radius: 3px;float: left; width: 75px;text-align: center;"><a href="{{ url(route('accountmanager_rejectbydirect',['id'=>$productdetails->id]))}}" target="_blank" style="color: #FFFFFF;border-radius: 3px;">Reject</a></td></tr></tbody></table>
				<br/><br/></td></tr></tbody></table>
</tr>
	<td colspan="3" width="100%">&nbsp;</td>
	
	
	<tr><td align="left" style="text-align:left; padding-left:2%;"><p style="font-size:11px;margin:0; font-family:Verdana; ;">Thank and regards,<br> <span style="font-weight:bold;font-size:12px;">The Unique Group Customer Service.</span><br><br><a href="http://www.theuniquegroup.com/" target="_blank" style="color:#0ba4ce;font-size:10px;text-decoration:none;">www.theuniquegroup.com</a></p></td></tr>
            <td colspan="3" width="100%">&nbsp;</td>
           
			<td colspan="3" width="100%">&nbsp;</td>
</tbody></table></td></tr> 

   </td>
</tr>
</tbody></table>
</body>
</html>

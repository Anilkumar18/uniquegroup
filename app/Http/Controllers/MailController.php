<?php
namespace App\Http\Controllers;

use Mail;
use Swift_Transport;
use Swift_Message;
use Swift_Mailer;
use App\Http\Controllers\Controller;
use Auth;
use App\UserType;
use Illuminate\Http\Request;
use App\Boxes;
use App\Hook;
use App\Tissuepaper;
use App\PackagingStickers;
use App\HangTags;
use App\Tapes;
use App\ProductDetails;
use App\UniqueOffices;
use PDF;
use App;



class MailController extends Controller
{

	public function __construct()
  	{

  	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($id)
	{
		
		
		 $user = Auth::user();
	  
	   $usertype = UserType::where('id', '=', $user->userTypeID)->first();
	   
	   $productdetails=ProductDetails::where('id','=',$id)->first();
	   
	   $boxesdetails=Boxes::where('ProductID','=',$productdetails->id)->where('status','=',1)->first();
	 
	  $hookdetails=Hook::where('ProductID','=',$productdetails->id)->where('status','=',1)->first();
	  
	  $tissuepaperdetails=Tissuepaper::where('ProductID','=',$productdetails->id)->where('status','=',1)->first();
	  
	  $packagingstickersdetails=PackagingStickers::where('ProductID','=',$productdetails->id)->where('status','=',1)->first();
	  
	  //echo $productdetails->id; exit;
	  
	  $hangtagsdetails=HangTags::where('ProductID','=',$productdetails->id)->where('status','=',1)->first();
	  
	  $tapesdetails=Tapes::where('ProductID','=',$productdetails->id)->where('status','=',1)->first();
	  
	 // echo $hangtagsdetails;exit;
	  
	   
	   
	   return view('users.email_template',compact('user','usertype','productdetails','boxesdetails','hookdetails','tissuepaperdetails','packagingstickersdetails','hangtagsdetails','tapesdetails'));

	}
	
	public function seperateproducts_editItemlist($id,$typeid)
	{
		
		
		
		 $user = Auth::user();
	  
	   $usertype = UserType::where('id', '=', $user->userTypeID)->first();
	   
	   $productdetails=ProductDetails::where('id','=',$id)->first();
	   
	   $typeiddetails=$typeid; 
	   
	   if($typeiddetails==0)
	   {
	   
	   $boxesdetails=Boxes::where('ProductID','=',$productdetails->id)->where('status','=',1)->first();
	   }
	    elseif($typeiddetails==1)
	   {
	   
	  $hookdetails=Hook::where('ProductID','=',$productdetails->id)->where('status','=',1)->first();
	   }
	    elseif($typeiddetails==2)
	   {
	 $tissuepaperdetails=Tissuepaper::where('ProductID','=',$productdetails->id)->where('status','=',1)->first();
	   }
	  elseif($typeiddetails==3)
	   {
		   
	   $packagingstickersdetails=PackagingStickers::where('ProductID','=',$productdetails->id)->where('status','=',1)->first();
	   //print_r($packagingstickersdetails);exit;
	   }
	   elseif($typeiddetails==4)
	   {
		$hangtagsdetails=HangTags::where('ProductID','=',$productdetails->id)->where('status','=',1)->first();
	   }
	    elseif($typeiddetails==5)
	   {
		$tapesdetails=Tapes::where('ProductID','=',$productdetails->id)->where('status','=',1)->first();
	   }
	  
	   return view('users.email_template_seperateproducts',compact('user','usertype','productdetails','boxesdetails','typeiddetails','hookdetails','tissuepaperdetails','packagingstickersdetails','hangtagsdetails','tapesdetails'));
	   
		
		
	}
	
	
	
	

   public function html_email(Request $request,$id){
	   
	  
	
	//send full products artwork to customerservice email
	
	
	 $productdetails=ProductDetails::where('id','=',$id)->where('status','=',1)->first();
	
	   

	     //echo "file has moved";exit;
		 $pdfimage="";

        $data = array('name'=>"Customer Service",'Productid'=>$id,'boxid'=>$productdetails->BoxID,'hangtagsid'=>$productdetails->HangTagsID,'tapesid'=>$productdetails->TapesID);
        Mail::send('mail', $data, function($message) use ($id,$pdfimage,$productdetails) {
         $message->to('vidhyae.ait@gmail.com', 'customer service')->cc('bala.aitech@gmail.com')->subject
          ('New quote/sample request');
         $message->from('order@theuniquegroup.com','TheUniqueGroup');
		 
		 
		  $path=storage_path();
		 
 
			if($productdetails->BoxID!=0)
		  {
			 $boxid=$productdetails->BoxID;
			 $boxesdetails=Boxes::where('id','=',$boxid)->where('status','=',1)->first();
			 $pdf = PDF::loadView('users.productmailattachment');
		     $pdf->setPaper('a4', 'portrait');
		     $pdfimage=PDF::loadView('users.productmailattachment',compact('id','boxid'));
		     $pdfimage->save($path.'/app/data/product/'.'boxes.pdf');  
		     $message->attach($path.'/app/data/product/'.'boxes.pdf');
			 $message->attach($path.'/app/'.$boxesdetails->Artwork);
			 
		  }
		  if($productdetails->HookID!=0)
		  {
			  $hookid=$productdetails->HookID;
			  $hooksdetails=Hook::where('id','=',$hookid)->where('status','=',1)->first();
			 $pdf = PDF::loadView('users.productmailattachment');
		     $pdf->setPaper('a4', 'portrait');
		     $pdfimage=PDF::loadView('users.productmailattachment',compact('id','hookid'));
		     $pdfimage->save($path.'/app/data/product/'.'hook.pdf');  
		     $message->attach($path.'/app/data/product/'.'hook.pdf');
			 $message->attach($path.'/app/'.$hooksdetails->Artwork);
			 
		  }
		   if($productdetails->TissuePaperID!=0)
		  {
			  $tissuepaperid=$productdetails->TissuePaperID;
			  $tissuedetails=Tissuepaper::where('id','=',$tissuepaperid)->where('status','=',1)->first();
			  $pdf = PDF::loadView('users.productmailattachment');
		      $pdf->setPaper('a4', 'portrait');
		      $pdfimage=PDF::loadView('users.productmailattachment',compact('id','tissuepaperid'));
		      $pdfimage->save($path.'/app/data/product/'.'tissuepaper.pdf');  
		      $message->attach($path.'/app/data/product/'.'tissuepaper.pdf');
			  $message->attach($path.'/app/'.$tissuedetails->Artwork);
		  }
		  if($productdetails->PackagingStickersID!=0)
		  {
			  $packagingstickersid=$productdetails->PackagingStickersID;
			  $packagedetails=PackagingStickers::where('id','=',$packagingstickersid)->where('status','=',1)->first();
			 $pdf = PDF::loadView('users.productmailattachment');
		     $pdf->setPaper('a4', 'portrait');
		     $pdfimage=PDF::loadView('users.productmailattachment',compact('id','packagingstickersid'));
		     $pdfimage->save($path.'/app/data/product/'.'packagingstickers.pdf');  
		     $message->attach($path.'/app/data/product/'.'packagingstickers.pdf');
			 $message->attach($path.'/app/'.$packagedetails->Artwork);
		  }
		   if($productdetails->HangTagsID!=0)
		  {
			  $hangtagsid=$productdetails->HangTagsID;
			  $hangtagsdetails=HangTags::where('id','=',$hangtagsid)->where('status','=',1)->first();
			 $pdf = PDF::loadView('users.productmailattachment');
		     $pdf->setPaper('a4', 'portrait');
		     $pdfimage=PDF::loadView('users.productmailattachment',compact('id','hangtagsid'));
		     $pdfimage->save($path.'/app/data/product/'.'hangtags.pdf');  
		     $message->attach($path.'/app/data/product/'.'hangtags.pdf');
			 $message->attach($path.'/app/'.$hangtagsdetails->Artwork);
		  }
		   if($productdetails->TapesID!=0)
		  {
			  $tapesid=$productdetails->TapesID;
			  //echo $tapesid;exit;
			  $tapesdetails=Tapes::where('id','=',$tapesid)->where('status','=',1)->first();
			 $pdf = PDF::loadView('users.productmailattachment');
		     $pdf->setPaper('a4', 'portrait');
		     $pdfimage=PDF::loadView('users.productmailattachment',compact('id','tapesid'));
		     $pdfimage->save($path.'/app/data/product/'.'tapes.pdf');  
		     $message->attach($path.'/app/data/product/'.'tapes.pdf');
			 $message->attach($path.'/app/'.$tapesdetails->Artwork);
		  }
		 
		 $message->attach($path.'/app/'.$productdetails->Artworkupload);
		 
		  
      });
	  
	  //Approval for send email
	   $data = array('name'=>"Customer Service",'Productid'=>$id,'boxid'=>$productdetails->BoxID);
        Mail::send('customermangerconfirmation', $data, function($message) use ($id,$pdfimage,$productdetails) {
         $message->to('rajeshbaskarenait@gmail.com','Accounts Manager')->cc('manimaran.ait@gmail.com','Customer Service')->cc('bala.aitech@gmail.com')->subject
          ('New quote/sample request confirmation');
         $message->from('order@theuniquegroup.com','TheUniqueGroup');
		 
		 
		  $path=storage_path();
		 
		 
		 
		 
			if($productdetails->BoxID!=0)
		  {
			  $boxid=$productdetails->BoxID;
			  $boxesdetails=Boxes::where('id','=',$boxid)->where('status','=',1)->first();
			 $pdf = PDF::loadView('users.productmailattachment');
		     $pdf->setPaper('a4', 'portrait');
		     $pdfimage=PDF::loadView('users.productmailattachment',compact('id','boxid'));
		     $pdfimage->save($path.'/app/data/product/'.'boxes.pdf');  
		     $message->attach($path.'/app/data/product/'.'boxes.pdf');
			 $message->attach($path.'/app/'.$boxesdetails->Artwork);
		  }
		  if($productdetails->HookID!=0)
		  {
			  $hookid=$productdetails->HookID;
			  $hooksdetails=Hook::where('id','=',$hookid)->where('status','=',1)->first();
			  $pdf = PDF::loadView('users.productmailattachment');
		      $pdf->setPaper('a4', 'portrait');
		      $pdfimage=PDF::loadView('users.productmailattachment',compact('id','hookid'));
		      $pdfimage->save($path.'/app/data/product/'.'hook.pdf');  
		      $message->attach($path.'/app/data/product/'.'hook.pdf');
			  $message->attach($path.'/app/'.$hooksdetails->Artwork);
			
		  }
		   if($productdetails->TissuePaperID!=0)
		  {
			  $tissuepaperid=$productdetails->TissuePaperID;
			  $tissuedetails=Tissuepaper::where('id','=',$tissuepaperid)->where('status','=',1)->first();
			 $pdf = PDF::loadView('users.productmailattachment');
		     $pdf->setPaper('a4', 'portrait');
		     $pdfimage=PDF::loadView('users.productmailattachment',compact('id','tissuepaperid'));
		     $pdfimage->save($path.'/app/data/product/'.'tissuepaper.pdf');  
		    $message->attach($path.'/app/data/product/'.'tissuepaper.pdf');
			 $message->attach($path.'/app/'.$tissuedetails->Artwork);
		  }
		  if($productdetails->PackagingStickersID!=0)
		  {
			 $packagingstickersid=$productdetails->PackagingStickersID;
			 $packagedetails=PackagingStickers::where('id','=',$packagingstickersid)->where('status','=',1)->first();
			 $pdf = PDF::loadView('users.productmailattachment');
		     $pdf->setPaper('a4', 'portrait');
		     $pdfimage=PDF::loadView('users.productmailattachment',compact('id','packagingstickersid'));
		     $pdfimage->save($path.'/app/data/product/'.'packagingstickers.pdf');  
		     $message->attach($path.'/app/data/product/'.'packagingstickers.pdf');
			 $message->attach($path.'/app/'.$packagedetails->Artwork);
		  }
		  if($productdetails->HangTagsID!=0)
		  {
			  $hangtagsid=$productdetails->HangTagsID;
			  $hangtagsdetails=HangTags::where('id','=',$hangtagsid)->where('status','=',1)->first();
			 $pdf = PDF::loadView('users.productmailattachment');
		     $pdf->setPaper('a4', 'portrait');
		     $pdfimage=PDF::loadView('users.productmailattachment',compact('id','hangtagsid'));
		     $pdfimage->save($path.'/app/data/product/'.'hangtags.pdf');  
		     $message->attach($path.'/app/data/product/'.'hangtags.pdf');
			 $message->attach($path.'/app/'.$hangtagsdetails->Artwork);
		  }
		  if($productdetails->TapesID!=0)
		  {
			 $tapesid=$productdetails->TapesID;
			 $tapesdetails=Tapes::where('id','=',$tapesid)->where('status','=',1)->first();
			 $pdf = PDF::loadView('users.productmailattachment');
		     $pdf->setPaper('a4', 'portrait');
		     $pdfimage=PDF::loadView('users.productmailattachment',compact('id','tapesid'));
		     $pdfimage->save($path.'/app/data/product/'.'tapes.pdf');  
		     $message->attach($path.'/app/data/product/'.'tapes.pdf');
			 $message->attach($path.'/app/'.$tapesdetails->Artwork);
		  }
		 
		 $message->attach($path.'/app/'.$productdetails->Artworkupload);
		 
		  
		
      });
	  
	  
	  $producthookstissuepackagedetails=ProductDetails::where('id','=',$id)->where('status','=',1)->first();
	  
	   if($producthookstissuepackagedetails->BoxID!="")
	 {
	  
	  //echo "boxes"; exit;
	  //boxes-uniquefacory1
	   $boxesdetails=Boxes::where('ProductID','=',$id)->where('status','=',1)->first();
	   
	   if($boxesdetails->UniqueFactory1!="" && $boxesdetails->UniqueFactory1 != NULL)
	  {
	 
	   //echo "Boxes details-uniquefactory1"; exit;
	  
	  $data = array('boxesdetails'=>$boxesdetails,'productdetails'=>$producthookstissuepackagedetails,'id'=>$id);
      Mail::send('box', $data, function($message) use ($id) {
		  
		   $productdetails=Boxes::where('ProductID','=',$id)->where('status','=',1)->first();
		   
		  
		   
		    $uniquefactoryexplodedetails=explode(",",$productdetails->UniqueFactory1);
			
		    foreach($uniquefactoryexplodedetails as $uniquefactorydet)
				 {
					
					if($uniquefactorydet!='')
					{
					 
		            $productionregiondetails=UniqueOffices::where('id','=',$uniquefactorydet)->first();
					$uniquefactoryemailids=$productionregiondetails->Email;
		      
         $message->to($uniquefactoryemailids, 'Unique factory1')->cc('bala.aitech@gmail.com')->subject
            ('Resent Order Summary Artwork(Box) for approval');
         $message->from('order@theuniquegroup.com','TheUniqueGroup');
					}
		 
				 }
				
		  
				 
		  $productdetails=ProductDetails::where('id','=',$id)->where('status','=',1)->first();
		   $path=storage_path();
		  if($productdetails->BoxID!=0)
		  {
			 
		    $boxesdetails=Boxes::where('id','=',$productdetails->BoxID)->where('status','=',1)->first();
		     $boxid=$productdetails->BoxID;
			 $pdf = PDF::loadView('users.productmailattachment');
		     $pdf->setPaper('a4', 'portrait');
		     $pdfimage=PDF::loadView('users.productmailattachment',compact('id','boxid'));
		     $pdfimage->save($path.'/app/data/product/'.'boxes.pdf');  
		    $message->attach($path.'/app/data/product/'.'boxes.pdf');
			 $message->attach($path.'/app/'.$boxesdetails->Artwork); 
			  $message->attach($path.'/app/'.$productdetails->Artworkupload);
		  }
		  
				 
		  
		   
		
      });
	  
	  
	  }
	  
	   //boxes-uniquefacory2
	   
	    if($boxesdetails->UniqueFactory2!="" && $boxesdetails->UniqueFactory2 != NULL)
	  {
	 
	  
	  $data = array('boxesdetails'=>$boxesdetails,'productdetails'=>$producthookstissuepackagedetails,'id'=>$id);
      Mail::send('box', $data, function($message) use ($id) {
		  
		   $uniquefactory2details=Boxes::where('ProductID','=',$id)->where('status','=',1)->first();
		   
		  
		    $uniquefactory2explodedetails=explode(",",$uniquefactory2details->UniqueFactory2);
			
			
		    foreach($uniquefactory2explodedetails as $uniquefactory2det)
				 {
					 if($uniquefactory2det!='')
					{
					 
		            $uniquefactory2emaildetails=UniqueOffices::where('id','=',$uniquefactory2det)->first();
					$uniquefactory2emailids=$uniquefactory2emaildetails->Email;
					
		   
         $message->to($uniquefactory2emailids, 'Unique factory2')->cc('bala.aitech@gmail.com')->subject
            ('Resent Order Summary Artwork(Box)for approval');
         $message->from('order@theuniquegroup.com','TheUniqueGroup');
		 
				   }
				 }
			
		 
				 
		  $productdetails=ProductDetails::where('id','=',$id)->where('status','=',1)->first();
		   $path=storage_path();
		  if($productdetails->BoxID!=0)
		  {
			 
		     $boxesdetails=Boxes::where('id','=',$productdetails->BoxID)->where('status','=',1)->first();
		     $boxid=$productdetails->BoxID;
			 $pdf = PDF::loadView('users.productmailattachment');
		     $pdf->setPaper('a4', 'portrait');
		     $pdfimage=PDF::loadView('users.productmailattachment',compact('id','boxid'));
		     $pdfimage->save($path.'/app/data/product/'.'boxes.pdf');  
		     $message->attach($path.'/app/data/product/'.'boxes.pdf');
			 $message->attach($path.'/app/'.$boxesdetails->Artwork);
			 $message->attach($path.'/app/'.$productdetails->Artworkupload);
		  }
		  
				 
		  
		   
		
      });
	  
	  }
	  
	  
	   //boxes-uniquefacory3
	  if($boxesdetails->UniqueFactory3!="" && $boxesdetails->UniqueFactory3 != NULL)
	  {
	  
	 $data = array('boxesdetails'=>$boxesdetails,'productdetails'=>$producthookstissuepackagedetails,'id'=>$id);
      Mail::send('box', $data, function($message) use ($id) {
		  
		   $uniquefactory3details=Boxes::where('ProductID','=',$id)->where('status','=',1)->first();
		   
		 
		    $uniquefactory3explodedetails=explode(",",$uniquefactory3details->UniqueFactory3);
			
		    foreach($uniquefactory3explodedetails as $uniquefactory3det)
				 {
					 if($uniquefactory3det!='')
					{
					 
		            $uniquefactory3emaildetails=UniqueOffices::where('id','=',$uniquefactory3det)->first();
					$uniquefactory3emailids=$uniquefactory3emaildetails->Email;
		   
         $message->to($uniquefactory3emailids, 'Unique factory3')->cc('bala.aitech@gmail.com')->subject
            ('Resent Order Summary Artwork(Box)for approval');
         $message->from('order@theuniquegroup.com','TheUniqueGroup');
		 
					}
		 
				 }
		  
		  $productdetails=ProductDetails::where('id','=',$id)->where('status','=',1)->first();
		   $path=storage_path();
		  if($productdetails->BoxID!=0)
		  {
			 
		   $boxesdetails=Boxes::where('id','=',$productdetails->BoxID)->where('status','=',1)->first();
		     $boxid=$productdetails->BoxID;
			 $pdf = PDF::loadView('users.productmailattachment');
		     $pdf->setPaper('a4', 'portrait');
		     $pdfimage=PDF::loadView('users.productmailattachment',compact('id','boxid'));
		     $pdfimage->save($path.'/app/data/product/'.'boxes.pdf');  
		    $message->attach($path.'/app/data/product/'.'boxes.pdf');
			 $message->attach($path.'/app/'.$boxesdetails->Artwork);
			  $message->attach($path.'/app/'.$productdetails->Artworkupload);
			
		  }
		  
				 
		  
		   
		
      });
	  
	  }
	 
	  
	 }
	 
	 if($producthookstissuepackagedetails->HookID!=0)
	 {
	  
	  //hooks
	  
	   $hooksdetails=Hook::where('ProductID','=',$id)->where('status','=',1)->first();
	   
	  
	    if($hooksdetails->UniqueFactory1!="" && $hooksdetails->UniqueFactory1 != NULL)
	  {
	    $user = Auth::user();
        $usertype = UserType::where('id', '=', $user->userTypeID)->first();
	   
	  
	   $data = array('hooksdetails'=>$hooksdetails,'productdetails'=>$producthookstissuepackagedetails,'id'=>$id,'usertype'=>$usertype);
      Mail::send('hooks', $data, function($message) use ($id) {
		  
		   $hookfactory1details=Hook::where('ProductID','=',$id)->where('status','=',1)->first();
		   
		  
		   
		    $hookuniquefactory1explodedetails=explode(",",$hookfactory1details->UniqueFactory1);
			
		    foreach($hookuniquefactory1explodedetails as $hookuniquefactory1det)
				 {
					 if($hookuniquefactory1det!='')
					 {
					 
		            $hookuniquefactory1emaildetails=UniqueOffices::where('id','=',$hookuniquefactory1det)->first();
					$hookuniquefactory1emailids=$hookuniquefactory1emaildetails->Email;
		   
         $message->to($hookuniquefactory1emailids, 'Hooks-Unique factory1')->cc('bala.aitech@gmail.com')->subject
            ('Resent Order Summary Artwork(Hooks) for approval');
         $message->from('order@theuniquegroup.com','TheUniqueGroup');
		 
				 }
			}
		  
				 
		  $productdetails=ProductDetails::where('id','=',$id)->where('status','=',1)->first();
		   $path=storage_path();
		  if($productdetails->HookID!=0)
		  {
			 
		 $hooksdetails=Hook::where('id','=',$productdetails->HookID)->where('status','=',1)->first();
		  $hookid=$productdetails->HookID;
			 $pdf = PDF::loadView('users.productmailattachment');
		     $pdf->setPaper('a4', 'portrait');
		     $pdfimage=PDF::loadView('users.productmailattachment',compact('id','hookid'));
		     $pdfimage->save($path.'/app/data/product/'.'hook.pdf');  
		    $message->attach($path.'/app/data/product/'.'hook.pdf');
			$message->attach($path.'/app/'.$hooksdetails->Artwork);
			$message->attach($path.'/app/'.$productdetails->Artworkupload);
		  }
		  
				 
		  
		   
		
      });
	  
	  
	  }
	  
	   //hooks-uniquefacory2
	   
	    if($hooksdetails->UniqueFactory2!="" && $hooksdetails->UniqueFactory2 != NULL)
	  {
	 
	   
	  
	  $data = array('hooksdetails'=>$hooksdetails,'productdetails'=>$producthookstissuepackagedetails,'id'=>$id);
      Mail::send('hooks', $data, function($message) use ($id) {
		  
		   $hookfactory2details=Hook::where('ProductID','=',$id)->where('status','=',1)->first();
		   
		  
		   
		    $hookuniquefactory2explodedetails=explode(",",$hookfactory2details->UniqueFactory2);
			
		    foreach($hookuniquefactory2explodedetails as $hookuniquefactory2det)
				 {
					 if($hookuniquefactory2det!='')
					 {
		            $hookuniquefactory2emaildetails=UniqueOffices::where('id','=',$hookuniquefactory2det)->first();
					$hookuniquefactory2emailids=$hookuniquefactory2emaildetails->Email;
		   
         $message->to($hookuniquefactory2emailids, 'Hooks-Unique factory2')->cc('bala.aitech@gmail.com')->subject
            ('Resent Order Summary Artwork(Hooks) for approval');
         $message->from('order@theuniquegroup.com','TheUniqueGroup');
		 
					 }
		 
				 }
				 
		  
				 
		  $productdetails=ProductDetails::where('id','=',$id)->where('status','=',1)->first();
		   $path=storage_path();
		  if($productdetails->HookID!=0)
		  {
			 
		 $hooksdetails=Hook::where('id','=',$productdetails->HookID)->where('status','=',1)->first();
		  $hookid=$productdetails->HookID;
			 $pdf = PDF::loadView('users.productmailattachment');
		     $pdf->setPaper('a4', 'portrait');
		     $pdfimage=PDF::loadView('users.productmailattachment',compact('id','hookid'));
		     $pdfimage->save($path.'/app/data/product/'.'hook.pdf');  
		    $message->attach($path.'/app/data/product/'.'hook.pdf');
			 $message->attach($path.'/app/'.$hooksdetails->Artwork);
			  $message->attach($path.'/app/'.$productdetails->Artworkupload);
		 
		  }
		  
				 
		  
		   
		
      });
	  
	  
	  }
	  
	  
	  //hooks-uniquefacory3
	   
	    if($hooksdetails->UniqueFactory3!="" && $hooksdetails->UniqueFactory3 != NULL)
	  {
	 
	   
	  
	  $data = array('hooksdetails'=>$hooksdetails,'productdetails'=>$producthookstissuepackagedetails,'id'=>$id);
      Mail::send('hooks', $data, function($message) use ($id) {
		  
		   $hookfactory3details=Hook::where('ProductID','=',$id)->where('status','=',1)->first();
		   
		  
		   
		    $hookuniquefactory3explodedetails=explode(",",$hookfactory3details->UniqueFactory3);
			
		    foreach($hookuniquefactory3explodedetails as $hookuniquefactory3det)
				 {
					 if($hookuniquefactory3det!='')
					 {
					 
		            $hookuniquefactory3emaildetails=UniqueOffices::where('id','=',$hookuniquefactory3det)->first();
					$hookuniquefactory3emailids=$hookuniquefactory3emaildetails->Email;
		   
         $message->to($hookuniquefactory3emailids, 'Hooks-Unique factory3')->cc('bala.aitech@gmail.com')->subject
            ('Resent Order Summary Artwork(Hooks) for approval');
         $message->from('order@theuniquegroup.com','TheUniqueGroup');
		 
				 }
				}
				 
		  
				 
		  $productdetails=ProductDetails::where('id','=',$id)->where('status','=',1)->first();
		   $path=storage_path();
		  if($productdetails->HookID!=0)
		  {
			 
		 $hooksdetails=Hook::where('id','=',$productdetails->HookID)->where('status','=',1)->first();
		  $hookid=$productdetails->HookID;
			 $pdf = PDF::loadView('users.productmailattachment');
		     $pdf->setPaper('a4', 'portrait');
		     $pdfimage=PDF::loadView('users.productmailattachment',compact('id','hookid'));
		     $pdfimage->save($path.'/app/data/product/'.'hook.pdf');  
		    $message->attach($path.'/app/data/product/'.'hook.pdf');
			 $message->attach($path.'/app/'.$hooksdetails->Artwork);
			  $message->attach($path.'/app/'.$productdetails->Artworkupload);
		  }
		  
				 
		  
		   
		
      });
	  
	  
	  }
	  
	  
	 }
	  
	  if($producthookstissuepackagedetails->TissuePaperID!=0)
	 {
	  
	  
	  //tissuepaper
	     
	   $tissuedetails=Tissuepaper::where('ProductID','=',$id)->where('status','=',1)->first();
	   
	   //tissuepaper-uniquefactory1
	   
	    if($tissuedetails->UniqueFactory1!="" && $tissuedetails->UniqueFactory1 != NULL)
	  {
	 
	   
	  
	  $data = array('tissuedetails'=>$tissuedetails,'productdetails'=>$producthookstissuepackagedetails,'id'=>$id);
      Mail::send('tissuepaper', $data, function($message) use ($id) {
		  
		   $tissuefactory1details=Tissuepaper::where('ProductID','=',$id)->where('status','=',1)->first();
		   
		  
		   
		    $tissueuniquefactory1explodedetails=explode(",",$tissuefactory1details->UniqueFactory1);
			
		    foreach($tissueuniquefactory1explodedetails as $tissueuniquefactory1det)
				 {
					 if($tissueuniquefactory1det!='')
					 {
		            $tissueuniquefactory1emaildetails=UniqueOffices::where('id','=',$tissueuniquefactory1det)->first();
					$tissueuniquefactory1emailids=$tissueuniquefactory1emaildetails->Email;
		   
         $message->to($tissueuniquefactory1emailids, 'Tissuepaper-Unique factory1')->cc('bala.aitech@gmail.com')->subject
            ('Resent Order Summary Artwork(TissuePaper) for approval');
         $message->from('order@theuniquegroup.com','TheUniqueGroup');
		 
					 }
		 
				 }
				 
		  
				 
		  $productdetails=ProductDetails::where('id','=',$id)->where('status','=',1)->first();
		   $path=storage_path();
		  if($productdetails->TissuePaperID!=0)
		  {
			 
		 $tissuedetails=Tissuepaper::where('id','=',$productdetails->TissuePaperID)->where('status','=',1)->first();
		 $tissuepaperid=$productdetails->TissuePaperID;
			 $pdf = PDF::loadView('users.productmailattachment');
		     $pdf->setPaper('a4', 'portrait');
		     $pdfimage=PDF::loadView('users.productmailattachment',compact('id','tissuepaperid'));
		     $pdfimage->save($path.'/app/data/product/'.'tissuepaper.pdf');  
		     $message->attach($path.'/app/data/product/'.'tissuepaper.pdf');
			 $message->attach($path.'/app/'.$tissuedetails->Artwork);
			 $message->attach($path.'/app/'.$productdetails->Artworkupload);
		  }
		  
				 
		  
		   
		
      });
	  
	  
	  }
	  
	   //tissuepaper-uniquefactory2
	  
	    if($tissuedetails->UniqueFactory2!="" && $tissuedetails->UniqueFactory2 != NULL)
	  {
	 
	   
	  
	   $data = array('tissuedetails'=>$tissuedetails,'productdetails'=>$producthookstissuepackagedetails,'id'=>$id);
      Mail::send('tissuepaper', $data, function($message) use ($id) {
		  
		   $tissuefactory2details=Tissuepaper::where('ProductID','=',$id)->where('status','=',1)->first();
		   
		  
		   
		    $tissueuniquefactory2explodedetails=explode(",",$tissuefactory2details->UniqueFactory2);
			
		    foreach($tissueuniquefactory2explodedetails as $tissueuniquefactory2det)
				 {
					 if($tissueuniquefactory2det!=''){
		            $tissueuniquefactory2emaildetails=UniqueOffices::where('id','=',$tissueuniquefactory2det)->first();
					$tissueuniquefactory2emailids=$tissueuniquefactory2emaildetails->Email;
		   
         $message->to($tissueuniquefactory2emailids, 'Tissuepaper-Unique factory2')->cc('bala.aitech@gmail.com')->subject
            ('Resent Order Summary Artwork(TissuePaper) for approval');
         $message->from('order@theuniquegroup.com','TheUniqueGroup');
		 
					 }
		 
				 }
				 
		  
				 
		  $productdetails=ProductDetails::where('id','=',$id)->where('status','=',1)->first();
		   $path=storage_path();
		  if($productdetails->TissuePaperID!=0)
		  {
			 
		 $tissuedetails=Tissuepaper::where('id','=',$productdetails->TissuePaperID)->where('status','=',1)->first();
		  $tissuepaperid=$productdetails->TissuePaperID;
			 $pdf = PDF::loadView('users.productmailattachment');
		     $pdf->setPaper('a4', 'portrait');
		     $pdfimage=PDF::loadView('users.productmailattachment',compact('id','tissuepaperid'));
		     $pdfimage->save($path.'/app/data/product/'.'tissuepaper.pdf');  
		    $message->attach($path.'/app/data/product/'.'tissuepaper.pdf');
			 $message->attach($path.'/app/'.$tissuedetails->Artwork);
			  $message->attach($path.'/app/'.$productdetails->Artworkupload);
		  }
		  
				 
		  
		   
		
      });
	  
	  
	  }
	  
	   //tissuepaper-uniquefactory3
	  
	    if($tissuedetails->UniqueFactory3!="" && $tissuedetails->UniqueFactory3 != NULL)
	  {
	 
	   
	  
	  $data = array('tissuedetails'=>$tissuedetails,'productdetails'=>$producthookstissuepackagedetails,'id'=>$id);
      Mail::send('tissuepaper', $data, function($message) use ($id) {
		  
		   $tissuefactory3details=Tissuepaper::where('ProductID','=',$id)->where('status','=',1)->first();
		   
		  
		   
		    $tissueuniquefactory3explodedetails=explode(",",$tissuefactory3details->UniqueFactory3);
			
		    foreach($tissueuniquefactory3explodedetails as $tissueuniquefactory3det)
				 {
					 if($tissueuniquefactory3det!='')
					 {
					 
		            $tissueuniquefactory3emaildetails=UniqueOffices::where('id','=',$tissueuniquefactory3det)->first();
					$tissueuniquefactory3emailids=$tissueuniquefactory3emaildetails->Email;
		   
         $message->to($tissueuniquefactory3emailids, 'Tissuepaper-Unique factory3')->cc('bala.aitech@gmail.com')->subject
            ('Resent Order Summary Artwork(TissuePaper) for approval');
         $message->from('order@theuniquegroup.com','TheUniqueGroup');
		 
				 }
				 
				 }
				 
		  
				 
		  $productdetails=ProductDetails::where('id','=',$id)->where('status','=',1)->first();
		   $path=storage_path();
		  if($productdetails->TissuePaperID!=0)
		  {
			 
		 $tissuedetails=Tissuepaper::where('id','=',$productdetails->TissuePaperID)->where('status','=',1)->first();
		  $tissuepaperid=$productdetails->TissuePaperID;
			 $pdf = PDF::loadView('users.productmailattachment');
		     $pdf->setPaper('a4', 'portrait');
		     $pdfimage=PDF::loadView('users.productmailattachment',compact('id','tissuepaperid'));
		     $pdfimage->save($path.'/app/data/product/'.'tissuepaper.pdf');  
		    $message->attach($path.'/app/data/product/'.'tissuepaper.pdf');
			 $message->attach($path.'/app/'.$tissuedetails->Artwork);
			  $message->attach($path.'/app/'.$productdetails->Artworkupload);
		  }
		  
				 
		  
		   
		
      });
	  
	  
	  }
	  
	  
	   
	   
	}
	
	 if($producthookstissuepackagedetails->PackagingStickersID!=0)
	 {
	  
	  
	  //packagestikcers
	     
	   $packagedetails=PackagingStickers::where('ProductID','=',$id)->where('status','=',1)->first();
	   
	   //packagestikcers-uniquefactory1
	   
	    if($packagedetails->UniqueFactory1!="" && $packagedetails->UniqueFactory1 != NULL)
	  {
	 
	   
	  
	  $data = array('packagedetails'=>$packagedetails,'productdetails'=>$producthookstissuepackagedetails,'id'=>$id);
      Mail::send('packagingstikers', $data, function($message) use ($id) {
		  
		   $packagefactory1details=PackagingStickers::where('ProductID','=',$id)->where('status','=',1)->first();
		   
		  
		   
		    $packageuniquefactory1explodedetails=explode(",",$packagefactory1details->UniqueFactory1);
			
		    foreach($packageuniquefactory1explodedetails as $packageuniquefactory1det)
				 {
					 
					 if($packageuniquefactory1det!=''){
		            $packageuniquefactory1emaildetails=UniqueOffices::where('id','=',$packageuniquefactory1det)->first();
					$packageuniquefactory1emailids=$packageuniquefactory1emaildetails->Email;
					
		   
         $message->to($packageuniquefactory1emailids, 'Package Stickers-Unique factory1')->cc('bala.aitech@gmail.com')->subject
            ('Resent Order Summary Artwork(Package Stickers) for approval');
         $message->from('order@theuniquegroup.com','TheUniqueGroup');
		 
				 }
				 }
		  
				 
		  $productdetails=ProductDetails::where('id','=',$id)->where('status','=',1)->first();
		   $path=storage_path();
		  if($productdetails->PackagingStickersID!=0)
		  {
			 
		$packagedetails=PackagingStickers::where('id','=',$productdetails->PackagingStickersID)->where('status','=',1)->first();
		    $packagingstickersid=$productdetails->PackagingStickersID;
			 $pdf = PDF::loadView('users.productmailattachment');
		     $pdf->setPaper('a4', 'portrait');
		     $pdfimage=PDF::loadView('users.productmailattachment',compact('id','packagingstickersid'));
		     $pdfimage->save($path.'/app/data/product/'.'packagingstickers.pdf');  
		    $message->attach($path.'/app/data/product/'.'packagingstickers.pdf');
			 $message->attach($path.'/app/'.$packagedetails->Artwork);
			  $message->attach($path.'/app/'.$productdetails->Artworkupload);
		  }
		  
				 
		  
		   
		
      });
	  
	  
	  }
	  
	  //packagestikcers-uniquefactory2
	   
	    if($packagedetails->UniqueFactory2!="" && $packagedetails->UniqueFactory2 != NULL)
	  {
	 
	   
	  
	  $data = array('packagedetails'=>$packagedetails,'productdetails'=>$producthookstissuepackagedetails,'id'=>$id);
      Mail::send('packagingstikers', $data, function($message) use ($id) {
		  
		   $packagefactory2details=PackagingStickers::where('ProductID','=',$id)->where('status','=',1)->first();
		   
		  
		   
		    $packageuniquefactory2explodedetails=explode(",",$packagefactory2details->UniqueFactory2);
			
		    foreach($packageuniquefactory2explodedetails as $packageuniquefactory2det)
				 {
					 if($packageuniquefactory2det!='')
					 {
		            $packageuniquefactory2emaildetails=UniqueOffices::where('id','=',$packageuniquefactory2det)->first();
					$packageuniquefactory2emailids=$packageuniquefactory2emaildetails->Email;
		   
         $message->to($packageuniquefactory2emailids, 'Package Stickers-Unique factory2')->cc('bala.aitech@gmail.com')->subject
            ('Resent Order Summary Artwork(Package Stickers) for approval');
         $message->from('order@theuniquegroup.com','TheUniqueGroup');
		 
					 }
		 
				 }
				 
		  
				 
		  $productdetails=ProductDetails::where('id','=',$id)->where('status','=',1)->first();
		   $path=storage_path();
		  if($productdetails->PackagingStickersID!=0)
		  {
			 
		$packagedetails=PackagingStickers::where('id','=',$productdetails->PackagingStickersID)->where('status','=',1)->first();
		  $packagingstickersid=$productdetails->PackagingStickersID;
			 $pdf = PDF::loadView('users.productmailattachment');
		     $pdf->setPaper('a4', 'portrait');
		     $pdfimage=PDF::loadView('users.productmailattachment',compact('id','packagingstickersid'));
		     $pdfimage->save($path.'/app/data/product/'.'packagingstickers.pdf');  
		    $message->attach($path.'/app/data/product/'.'packagingstickers.pdf');
			 $message->attach($path.'/app/'.$packagedetails->Artwork);
			  $message->attach($path.'/app/'.$productdetails->Artworkupload);
		  }
		  
				 
		  
		   
		
      });
	  
	  
	  }
	  
	  
	   //packagestikcers-uniquefactory3
	   
	    if($packagedetails->UniqueFactory3!="" && $packagedetails->UniqueFactory3 != NULL)
	  {
	 
	   
	  
	  $data = array('packagedetails'=>$packagedetails,'productdetails'=>$producthookstissuepackagedetails,'id'=>$id);
      Mail::send('packagingstikers', $data, function($message) use ($id) {
		  
		   $packagefactory3details=PackagingStickers::where('ProductID','=',$id)->where('status','=',1)->first();
		   
		  
		   
		    $packageuniquefactory3explodedetails=explode(",",$packagefactory3details->UniqueFactory3);
			
		    foreach($packageuniquefactory3explodedetails as $packageuniquefactory3det)
				 {
					 if($packageuniquefactory3det!=''){
		            $packageuniquefactory3emaildetails=UniqueOffices::where('id','=',$packageuniquefactory3det)->first();
					$packageuniquefactory3emailids=$packageuniquefactory3emaildetails->Email;
		   
         $message->to($packageuniquefactory3emailids, 'Package Stickers-Unique factory3')->cc('bala.aitech@gmail.com')->subject
            ('Resent Order Summary Artwork(Package Stickers) for approval');
         $message->from('order@theuniquegroup.com','TheUniqueGroup');
					 }
		 
				 }
				 
		  
				 
		  $productdetails=ProductDetails::where('id','=',$id)->where('status','=',1)->first();
		   $path=storage_path();
		  if($productdetails->PackagingStickersID!=0)
		  {
			 
		$packagedetails=PackagingStickers::where('id','=',$productdetails->PackagingStickersID)->where('status','=',1)->first();
		  $packagingstickersid=$productdetails->PackagingStickersID;
			 $pdf = PDF::loadView('users.productmailattachment');
		     $pdf->setPaper('a4', 'portrait');
		     $pdfimage=PDF::loadView('users.productmailattachment',compact('id','packagingstickersid'));
		     $pdfimage->save($path.'/app/data/product/'.'packagingstickers.pdf');  
		    $message->attach($path.'/app/data/product/'.'packagingstickers.pdf');
			 $message->attach($path.'/app/'.$packagedetails->Artwork);
			  $message->attach($path.'/app/'.$productdetails->Artworkupload);
		  }
		  
				 
		  
		   
		
      });
	  
	  
	  }
	  
	  
	  
	   
	   
	}
	   
	  
	  
	  
	  
      //echo "HTML Email Sent. Check your inbox.";
	     //$request->session()->flash('success', 'Email Has Sent Successfully.');     
	     return redirect(url(route('dashboard')));
   }
   
    public function sendseperateproductsdetails(Request $request,$id,$typeid){
		
		
		
	   
	  //echo $typeid;exit;
	
	//send full products artwork to customerservice email
	
	
	
	 $productdetails=ProductDetails::where('id','=',$id)->where('status','=',1)->first();
	  $pdfimage="";
	 
	  if($typeid==0)
		  {
	
	  $boxesdetails=Boxes::where('ProductID','=',$id)->where('status','=',1)->first();

	     //echo "file has moved";exit;
		 
		 
		
         
       // $data = array('name'=>"Customer Service",'Productid'=>$id,'boxid'=>$productdetails->BoxID);
	   $data = array('boxesdetails'=>$boxesdetails,'productdetails'=>$productdetails,'id'=>$id);
        Mail::send('box', $data, function($message) use ($id,$pdfimage,$productdetails,$typeid) {
         $message->to('vidhyae.ait@gmail.com', 'customer service')->cc('bala.aitech@gmail.com')->subject
          ('New quote/sample request(Boxes)');
		  
		 
         $message->from('order@theuniquegroup.com','TheUniqueGroup');
		 
		 
		  $path=storage_path();
		 
		
		 
		 
			
			  //boxes details
			  $boxid=$productdetails->BoxID;
			  $boxesdetails=Boxes::where('id','=',$boxid)->where('status','=',1)->first();
			 $pdf = PDF::loadView('users.productmailattachment');
		     $pdf->setPaper('a4', 'portrait');
		     $pdfimage=PDF::loadView('users.productmailattachment',compact('id','boxid'));
		     $pdfimage->save($path.'/app/data/product/'.'boxes.pdf');  
		    $message->attach($path.'/app/data/product/'.'boxes.pdf');
			$message->attach($path.'/app/'.$boxesdetails->Artwork);
			 $message->attach($path.'/app/'.$productdetails->Artworkupload);
		  
		  
		 
		 
		
		 
		  
		
      });
	 
		  }
		   elseif($typeid==1)
		  {
			    $hooksdetails=Hook::where('ProductID','=',$id)->where('status','=',1)->first();
       // $data = array('name'=>"Customer Service",'Productid'=>$id,'boxid'=>$productdetails->BoxID);
	  $data = array('hooksdetails'=>$hooksdetails,'productdetails'=>$productdetails,'id'=>$id);
        Mail::send('hooks', $data, function($message) use ($id,$pdfimage,$productdetails,$typeid) {
         $message->to('vidhyae.ait@gmail.com', 'customer service')->cc('bala.aitech@gmail.com')->subject
          ('New quote/sample request(Hooks)');
         $message->from('order@theuniquegroup.com','TheUniqueGroup');

		  $path=storage_path();
	  //hooks details
			$hookid=$productdetails->HookID;
			 $hooksdetails=Hook::where('id','=',$hookid)->where('status','=',1)->first();
			 $pdf = PDF::loadView('users.productmailattachment');
		     $pdf->setPaper('a4', 'portrait');
		     $pdfimage=PDF::loadView('users.productmailattachment',compact('id','hookid'));
		     $pdfimage->save($path.'/app/data/product/'.'hook.pdf');  
		    $message->attach($path.'/app/data/product/'.'hook.pdf');
			$message->attach($path.'/app/'.$hooksdetails->Artwork);
		   $message->attach($path.'/app/'.$productdetails->Artworkupload);
  
		
      });
			  
		  }
	  
	      elseif($typeid==2)
		  {
			  //tissuepaper
			  
       // $data = array('name'=>"Customer Service",'Productid'=>$id,'boxid'=>$productdetails->BoxID);
	    $tissuedetails=Tissuepaper::where('ProductID','=',$id)->where('status','=',1)->first();
	  $data = array('tissuedetails'=>$tissuedetails,'productdetails'=>$productdetails,'id'=>$id);
        Mail::send('tissuepaper', $data, function($message) use ($id,$pdfimage,$productdetails,$typeid) {
         $message->to('vidhyae.ait@gmail.com', 'customer service')->cc('bala.aitech@gmail.com')->subject
          ('New quote/sample request(TissuePaper)');
         $message->from('order@theuniquegroup.com','TheUniqueGroup');

		  $path=storage_path();
	  //tissuepaper details
			$tissuepaperid=$productdetails->TissuePaperID;
			$tissuedetails=Tissuepaper::where('id','=',$tissuepaperid)->where('status','=',1)->first();
			 $pdf = PDF::loadView('users.productmailattachment');
		     $pdf->setPaper('a4', 'portrait');
		     $pdfimage=PDF::loadView('users.productmailattachment',compact('id','tissuepaperid'));
		     $pdfimage->save($path.'/app/data/product/'.'tissuepaper.pdf');  
		    $message->attach($path.'/app/data/product/'.'tissuepaper.pdf');
		     $message->attach($path.'/app/'.$tissuedetails->Artwork);
              $message->attach($path.'/app/'.$productdetails->Artworkupload);
		
      });
			  
		  
		  }
		  
		   elseif($typeid==3)
		  {
			  //Packagingstickers
			  
       // $data = array('name'=>"Customer Service",'Productid'=>$id,'boxid'=>$productdetails->BoxID);
	     $packagedetails=PackagingStickers::where('ProductID','=',$id)->where('status','=',1)->first();
	  $data = array('packagedetails'=>$packagedetails,'productdetails'=>$productdetails,'id'=>$id);
        Mail::send('packagingstikers', $data, function($message) use ($id,$pdfimage,$productdetails,$typeid) {
         $message->to('vidhyae.ait@gmail.com', 'customer service')->cc('bala.aitech@gmail.com')->subject
          ('New quote/sample request(PackagingStickers)');
         $message->from('order@theuniquegroup.com','TheUniqueGroup');

		  $path=storage_path();
	  //tissuepaper details
			 $packagingstickersid=$productdetails->PackagingStickersID;
			 $packagedetails=PackagingStickers::where('id','=',$packagingstickersid)->where('status','=',1)->first();
			 $pdf = PDF::loadView('users.productmailattachment');
		     $pdf->setPaper('a4', 'portrait');
		     $pdfimage=PDF::loadView('users.productmailattachment',compact('id','packagingstickersid'));
		     $pdfimage->save($path.'/app/data/product/'.'packagingstickers.pdf');  
		    $message->attach($path.'/app/data/product/'.'packagingstickers.pdf');
			 $message->attach($path.'/app/'.$packagedetails->Artwork);
		     $message->attach($path.'/app/'.$productdetails->Artworkupload);
  
		
      });
			  
		  
		  }
		 
		   elseif($typeid==4)
		  {
			  //HangTags
			 
       // $data = array('name'=>"Customer Service",'Productid'=>$id,'boxid'=>$productdetails->BoxID);
	      $hangtagsdetails=HangTags::where('ProductID','=',$id)->where('status','=',1)->first();
		 // echo $hangtagsdetails; exit;
	  $data = array('hangtagsdetails'=>$hangtagsdetails,'productdetails'=>$productdetails,'id'=>$id);
        Mail::send('hangtags', $data, function($message) use ($id,$pdfimage,$productdetails,$typeid) {
         $message->to('vidhyae.ait@gmail.com', 'customer service')->cc('bala.aitech@gmail.com')->subject
          ('New quote/sample request(HangTags)');
         $message->from('order@theuniquegroup.com','TheUniqueGroup');

		  $path=storage_path();
	  //tissuepaper details
			 $hangtagsid=$productdetails->HangTagsID;
			 $hangtagsdetails=HangTags::where('id','=',$hangtagsid)->where('status','=',1)->first();
			 $pdf = PDF::loadView('users.productmailattachment');
		     $pdf->setPaper('a4', 'portrait');
		     $pdfimage=PDF::loadView('users.productmailattachment',compact('id','hangtagsid'));
		     $pdfimage->save($path.'/app/data/product/'.'hangtags.pdf');  
		    $message->attach($path.'/app/data/product/'.'hangtags.pdf');
			 $message->attach($path.'/app/'.$hangtagsdetails->Artwork);
		     $message->attach($path.'/app/'.$productdetails->Artworkupload);
  
		
      });
			  
		  
		  }
		  
		  elseif($typeid==5)
		  {
			  //Tapes
		 $tapesdetails=Tapes::where('ProductID','=',$id)->where('status','=',1)->first();
	  $data = array('tapesdetails'=>$tapesdetails,'productdetails'=>$productdetails,'id'=>$id);
        Mail::send('tapes', $data, function($message) use ($id,$pdfimage,$productdetails,$typeid) {
         $message->to('vidhyae.ait@gmail.com', 'customer service')->cc('bala.aitech@gmail.com')->subject
          ('New quote/sample request(Tapes)');
         $message->from('order@theuniquegroup.com','TheUniqueGroup');

		  $path=storage_path();
	  //tissuepaper details
			 $tapesid=$productdetails->TapesID;
			 $tapesdetails=Tapes::where('id','=',$tapesid)->where('status','=',1)->first();
			 $pdf = PDF::loadView('users.productmailattachment');
		     $pdf->setPaper('a4', 'portrait');
		     $pdfimage=PDF::loadView('users.productmailattachment',compact('id','tapesid'));
		     $pdfimage->save($path.'/app/data/product/'.'tapes.pdf');  
		    $message->attach($path.'/app/data/product/'.'tapes.pdf');
			 $message->attach($path.'/app/'.$tapesdetails->Artwork);
		     $message->attach($path.'/app/'.$productdetails->Artworkupload);
  
		
      });
			  
		  
		  }
	  
	    
	     return redirect(url(route('dashboard')));
   
		
		
		}
 
	public function send_customerserviceconfirmtoac(Request $request,$id)
	{
		
		$productdetails=ProductDetails::where('id','=',$id)->where('status','=',1)->first();
		$pdfimage="";
		 //Confirm and  send email
	   $data = array('name'=>"Customer Service",'Productid'=>$id,'boxid'=>$productdetails->BoxID);
        Mail::send('quotecastingconfirmationbycs', $data, function($message) use ($id,$pdfimage,$productdetails) {
         $message->to('rajeshbaskarenait@gmail.com','Accounts Manager')->cc('bala.aitech@gmail.com')->subject
          ('Confirmation of Quote and Costing Requirements by Customerservice');
         $message->from('order@theuniquegroup.com','TheUniqueGroup');
		 
		 
		  $path=storage_path();
		 
		 
		 
		 
			if($productdetails->BoxID!=0)
		  {
			  $boxid=$productdetails->BoxID;
			  $boxesdetails=Boxes::where('id','=',$boxid)->where('status','=',1)->first();
			 $pdf = PDF::loadView('users.productmailattachment');
		     $pdf->setPaper('a4', 'portrait');
		     $pdfimage=PDF::loadView('users.productmailattachment',compact('id','boxid'));
		     $pdfimage->save($path.'/app/data/product/'.'boxes.pdf');  
		    $message->attach($path.'/app/data/product/'.'boxes.pdf');
			 $message->attach($path.'/app/'.$boxesdetails->Artwork);
		  }
		  if($productdetails->HookID!=0)
		  {
			  $hookid=$productdetails->HookID;
			  $hooksdetails=Hook::where('id','=',$hookid)->where('status','=',1)->first();
			 $pdf = PDF::loadView('users.productmailattachment');
		     $pdf->setPaper('a4', 'portrait');
		     $pdfimage=PDF::loadView('users.productmailattachment',compact('id','hookid'));
		     $pdfimage->save($path.'/app/data/product/'.'hook.pdf');  
		    $message->attach($path.'/app/data/product/'.'hook.pdf');
			 $message->attach($path.'/app/'.$hooksdetails->Artwork);
		  }
		   if($productdetails->TissuePaperID!=0)
		  {
			  $tissuepaperid=$productdetails->TissuePaperID;
			  $tissuedetails=Tissuepaper::where('id','=',$tissuepaperid)->where('status','=',1)->first();
			  $pdf = PDF::loadView('users.productmailattachment');
		      $pdf->setPaper('a4', 'portrait');
		      $pdfimage=PDF::loadView('users.productmailattachment',compact('id','tissuepaperid'));
		      $pdfimage->save($path.'/app/data/product/'.'tissuepaper.pdf');  
		      $message->attach($path.'/app/data/product/'.'tissuepaper.pdf');
			  $message->attach($path.'/app/'.$tissuedetails->Artwork);
		  }
		  if($productdetails->PackagingStickersID!=0)
		  {
			  $packagingstickersid=$productdetails->PackagingStickersID;
			  
		$packagedetails=PackagingStickers::where('id','=',$packagingstickersid)->where('status','=',1)->first();
			 $pdf = PDF::loadView('users.productmailattachment');
		     $pdf->setPaper('a4', 'portrait');
		     $pdfimage=PDF::loadView('users.productmailattachment',compact('id','packagingstickersid'));
		     $pdfimage->save($path.'/app/data/product/'.'packagingstickers.pdf');  
		    $message->attach($path.'/app/data/product/'.'packagingstickers.pdf');
			 $message->attach($path.'/app/'.$packagedetails->Artwork);
		  }
		  
		   $message->attach($path.'/app/'.$productdetails->Artworkupload);
		 
		
		 
		  
		
      });
	  
	  
	  $producthookstissuepackagedetails=ProductDetails::where('id','=',$id)->where('status','=',1)->first();
	  
	   if($producthookstissuepackagedetails->BoxID!="")
	 {
	  
	  //echo "boxes"; exit;
	  //boxes-uniquefacory1
	   $boxesdetails=Boxes::where('ProductID','=',$id)->where('status','=',1)->first();
	   
	   if($boxesdetails->UniqueFactory1!="" && $boxesdetails->UniqueFactory1 != NULL)
	  {
	 
	   //echo "Boxes details-uniquefactory1"; exit;
	  
	  $data = array('boxesdetails'=>$boxesdetails,'productdetails'=>$producthookstissuepackagedetails,'id'=>$id);
      Mail::send('box', $data, function($message) use ($id) {
		  
		   $productdetails=Boxes::where('ProductID','=',$id)->where('status','=',1)->first();
		   
		  
		   
		    $uniquefactoryexplodedetails=explode(",",$productdetails->UniqueFactory1);
			
		    foreach($uniquefactoryexplodedetails as $uniquefactorydet)
				 {
					
					if($uniquefactorydet!='')
					{
					 
		            $productionregiondetails=UniqueOffices::where('id','=',$uniquefactorydet)->first();
					$uniquefactoryemailids=$productionregiondetails->Email;
		      
         $message->to($uniquefactoryemailids, 'Unique factory1')->cc('bala.aitech@gmail.com')->subject
            ('Resent Order Summary Artwork(Box) for approval');
         $message->from('order@theuniquegroup.com','TheUniqueGroup');
					}
		 
				 }
				
		  
				 
		  $productdetails=ProductDetails::where('id','=',$id)->where('status','=',1)->first();
		   $path=storage_path();
		  if($productdetails->BoxID!=0)
		  {
			 
		 $boxesdetails=Boxes::where('id','=',$productdetails->BoxID)->where('status','=',1)->first();
		     $boxid=$productdetails->BoxID;
			 $pdf = PDF::loadView('users.productmailattachment');
		     $pdf->setPaper('a4', 'portrait');
		     $pdfimage=PDF::loadView('users.productmailattachment',compact('id','boxid'));
		     $pdfimage->save($path.'/app/data/product/'.'boxes.pdf');  
		    $message->attach($path.'/app/data/product/'.'boxes.pdf');
			 $message->attach($path.'/app/'.$boxesdetails->Artwork);
			 $message->attach($path.'/app/'.$productdetails->Artworkupload);
		  }
		  
				 
		  
		   
		
      });
	  
	  
	  }
	  
	   //boxes-uniquefacory2
	   
	    if($boxesdetails->UniqueFactory2!="" && $boxesdetails->UniqueFactory2 != NULL)
	  {
	 
	  
	  $data = array('boxesdetails'=>$boxesdetails,'productdetails'=>$producthookstissuepackagedetails,'id'=>$id);
      Mail::send('box', $data, function($message) use ($id) {
		  
		   $uniquefactory2details=Boxes::where('ProductID','=',$id)->where('status','=',1)->first();
		   
		  
		    $uniquefactory2explodedetails=explode(",",$uniquefactory2details->UniqueFactory2);
			
			
		    foreach($uniquefactory2explodedetails as $uniquefactory2det)
				 {
					 if($uniquefactory2det!='')
					{
					 
		            $uniquefactory2emaildetails=UniqueOffices::where('id','=',$uniquefactory2det)->first();
					$uniquefactory2emailids=$uniquefactory2emaildetails->Email;
					
		   
         $message->to($uniquefactory2emailids, 'Unique factory2')->cc('bala.aitech@gmail.com')->subject
            ('Resent Order Summary Artwork(Box)for approval');
         $message->from('order@theuniquegroup.com','TheUniqueGroup');
		 
				   }
				 }
			
		 
				 
		  $productdetails=ProductDetails::where('id','=',$id)->where('status','=',1)->first();
		   $path=storage_path();
		  if($productdetails->BoxID!=0)
		  {
			 
		 $boxesdetails=Boxes::where('id','=',$productdetails->BoxID)->where('status','=',1)->first();
		 $boxid=$productdetails->BoxID;
			 $pdf = PDF::loadView('users.productmailattachment');
		     $pdf->setPaper('a4', 'portrait');
		     $pdfimage=PDF::loadView('users.productmailattachment',compact('id','boxid'));
		     $pdfimage->save($path.'/app/data/product/'.'boxes.pdf');  
		    $message->attach($path.'/app/data/product/'.'boxes.pdf');
			 $message->attach($path.'/app/'.$boxesdetails->Artwork);
			  $message->attach($path.'/app/'.$productdetails->Artworkupload);
		  }
		  
				 
		  
		   
		
      });
	  
	  }
	  
	  
	   //boxes-uniquefacory3
	  if($boxesdetails->UniqueFactory3!="" && $boxesdetails->UniqueFactory3 != NULL)
	  {
	  
	 $data = array('boxesdetails'=>$boxesdetails,'productdetails'=>$producthookstissuepackagedetails,'id'=>$id);
      Mail::send('box', $data, function($message) use ($id) {
		  
		   $uniquefactory3details=Boxes::where('ProductID','=',$id)->where('status','=',1)->first();
		   
		 
		    $uniquefactory3explodedetails=explode(",",$uniquefactory3details->UniqueFactory3);
			
		    foreach($uniquefactory3explodedetails as $uniquefactory3det)
				 {
					 if($uniquefactory3det!='')
					{
					 
		            $uniquefactory3emaildetails=UniqueOffices::where('id','=',$uniquefactory3det)->first();
					$uniquefactory3emailids=$uniquefactory3emaildetails->Email;
		   
         $message->to($uniquefactory3emailids, 'Unique factory3')->cc('bala.aitech@gmail.com')->subject
            ('Resent Order Summary Artwork(Box)for approval');
         $message->from('order@theuniquegroup.com','TheUniqueGroup');
		 
					}
		 
				 }
		  
		  $productdetails=ProductDetails::where('id','=',$id)->where('status','=',1)->first();
		   $path=storage_path();
		  if($productdetails->BoxID!=0)
		  {
			 
		 $boxesdetails=Boxes::where('id','=',$productdetails->BoxID)->where('status','=',1)->first();
		     $boxid=$productdetails->BoxID;
			 $pdf = PDF::loadView('users.productmailattachment');
		     $pdf->setPaper('a4', 'portrait');
		     $pdfimage=PDF::loadView('users.productmailattachment',compact('id','boxid'));
		     $pdfimage->save($path.'/app/data/product/'.'boxes.pdf');  
		    $message->attach($path.'/app/data/product/'.'boxes.pdf');
			 $message->attach($path.'/app/'.$boxesdetails->Artwork);
			  $message->attach($path.'/app/'.$productdetails->Artworkupload);
			
		  }
		  
				 
		  
		   
		
      });
	  
	  }
	 
	  
	 }
	 
	 if($producthookstissuepackagedetails->HookID!=0)
	 {
	  
	  //hooks
	  
	   $hooksdetails=Hook::where('ProductID','=',$id)->where('status','=',1)->first();
	   
	  
	    if($hooksdetails->UniqueFactory1!="" && $hooksdetails->UniqueFactory1 != NULL)
	  {
	    $user = Auth::user();
        $usertype = UserType::where('id', '=', $user->userTypeID)->first();
	   
	  
	   $data = array('hooksdetails'=>$hooksdetails,'productdetails'=>$producthookstissuepackagedetails,'id'=>$id,'usertype'=>$usertype);
      Mail::send('hooks', $data, function($message) use ($id) {
		  
		   $hookfactory1details=Hook::where('ProductID','=',$id)->where('status','=',1)->first();
		   
		  
		   
		    $hookuniquefactory1explodedetails=explode(",",$hookfactory1details->UniqueFactory1);
			
		    foreach($hookuniquefactory1explodedetails as $hookuniquefactory1det)
				 {
					 if($hookuniquefactory1det!='')
					 {
					 
		            $hookuniquefactory1emaildetails=UniqueOffices::where('id','=',$hookuniquefactory1det)->first();
					$hookuniquefactory1emailids=$hookuniquefactory1emaildetails->Email;
		   
         $message->to($hookuniquefactory1emailids, 'Hooks-Unique factory1')->cc('bala.aitech@gmail.com')->subject
            ('Resent Order Summary Artwork(Hooks) for approval');
         $message->from('order@theuniquegroup.com','TheUniqueGroup');
		 
				 }
			}
		  
				 
		  $productdetails=ProductDetails::where('id','=',$id)->where('status','=',1)->first();
		   $path=storage_path();
		  if($productdetails->HookID!=0)
		  {
			 
		 $hooksdetails=Hook::where('id','=',$productdetails->HookID)->where('status','=',1)->first();
		  $hookid=$productdetails->HookID;
			 $pdf = PDF::loadView('users.productmailattachment');
		     $pdf->setPaper('a4', 'portrait');
		     $pdfimage=PDF::loadView('users.productmailattachment',compact('id','hookid'));
		     $pdfimage->save($path.'/app/data/product/'.'hook.pdf');  
		    $message->attach($path.'/app/data/product/'.'hook.pdf');
			 $message->attach($path.'/app/'.$hooksdetails->Artwork);
			  $message->attach($path.'/app/'.$productdetails->Artworkupload);
		  }
		  
				 
		  
		   
		
      });
	  
	  
	  }
	  
	   //hooks-uniquefacory2
	   
	    if($hooksdetails->UniqueFactory2!="" && $hooksdetails->UniqueFactory2 != NULL)
	  {
	 
	  $data = array('hooksdetails'=>$hooksdetails,'productdetails'=>$producthookstissuepackagedetails,'id'=>$id);
      Mail::send('hooks', $data, function($message) use ($id) {
		  
		   $hookfactory2details=Hook::where('ProductID','=',$id)->where('status','=',1)->first();
		   
		  
		   
		    $hookuniquefactory2explodedetails=explode(",",$hookfactory2details->UniqueFactory2);
			
		    foreach($hookuniquefactory2explodedetails as $hookuniquefactory2det)
				 {
					 if($hookuniquefactory2det!='')
					 {
		            $hookuniquefactory2emaildetails=UniqueOffices::where('id','=',$hookuniquefactory2det)->first();
					$hookuniquefactory2emailids=$hookuniquefactory2emaildetails->Email;
		   
         $message->to($hookuniquefactory2emailids, 'Hooks-Unique factory2')->cc('bala.aitech@gmail.com')->subject
            ('Resent Order Summary Artwork(Hooks) for approval');
         $message->from('order@theuniquegroup.com','TheUniqueGroup');
		 
					 }
		 
				 }
				 
		  
				 
		  $productdetails=ProductDetails::where('id','=',$id)->where('status','=',1)->first();
		   $path=storage_path();
		  if($productdetails->HookID!=0)
		  {
			 
		 $hooksdetails=Hook::where('id','=',$productdetails->HookID)->where('status','=',1)->first();
		  $hookid=$productdetails->HookID;
			 $pdf = PDF::loadView('users.productmailattachment');
		     $pdf->setPaper('a4', 'portrait');
		     $pdfimage=PDF::loadView('users.productmailattachment',compact('id','hookid'));
		     $pdfimage->save($path.'/app/data/product/'.'hook.pdf');  
		    $message->attach($path.'/app/data/product/'.'hook.pdf');
			 $message->attach($path.'/app/'.$hooksdetails->Artwork);
			  $message->attach($path.'/app/'.$productdetails->Artworkupload);
		 
		  }
		  
				 
		  
		   
		
      });
	  
	  
	  }
	  
	  
	  //hooks-uniquefacory3
	   
	    if($hooksdetails->UniqueFactory3!="" && $hooksdetails->UniqueFactory3 != NULL)
	  {
	 
	  $data = array('hooksdetails'=>$hooksdetails,'productdetails'=>$producthookstissuepackagedetails,'id'=>$id);
      Mail::send('hooks', $data, function($message) use ($id) {
		  
		   $hookfactory3details=Hook::where('ProductID','=',$id)->where('status','=',1)->first();
		   
		  
		   
		    $hookuniquefactory3explodedetails=explode(",",$hookfactory3details->UniqueFactory3);
			
		    foreach($hookuniquefactory3explodedetails as $hookuniquefactory3det)
				 {
					 if($hookuniquefactory3det!='')
					 {
					 
		            $hookuniquefactory3emaildetails=UniqueOffices::where('id','=',$hookuniquefactory3det)->first();
					$hookuniquefactory3emailids=$hookuniquefactory3emaildetails->Email;
		   
         $message->to($hookuniquefactory3emailids, 'Hooks-Unique factory3')->cc('bala.aitech@gmail.com')->subject
            ('Resent Order Summary Artwork(Hooks) for approval');
         $message->from('order@theuniquegroup.com','TheUniqueGroup');
		 
				 }
				}
				 
		  $productdetails=ProductDetails::where('id','=',$id)->where('status','=',1)->first();
		   $path=storage_path();
		  if($productdetails->HookID!=0)
		  {
			 
		 $hooksdetails=Hook::where('id','=',$productdetails->HookID)->where('status','=',1)->first();
		
		  $hookid=$productdetails->HookID;
			 $pdf = PDF::loadView('users.productmailattachment');
		     $pdf->setPaper('a4', 'portrait');
		     $pdfimage=PDF::loadView('users.productmailattachment',compact('id','hookid'));
		     $pdfimage->save($path.'/app/data/product/'.'hook.pdf');  
		    $message->attach($path.'/app/data/product/'.'hook.pdf');
			 $message->attach($path.'/app/'.$hooksdetails->Artwork);
			  $message->attach($path.'/app/'.$productdetails->Artworkupload);
		  }
		  
				 
		  
		   
		
      });
	  
	  
	  }
	  
	  
	 }
	  
	  if($producthookstissuepackagedetails->TissuePaperID!=0)
	 {
	  
	  
	  //tissuepaper
	     
	   $tissuedetails=Tissuepaper::where('ProductID','=',$id)->where('status','=',1)->first();
	   
	   //tissuepaper-uniquefactory1
	   
	    if($tissuedetails->UniqueFactory1!="" && $tissuedetails->UniqueFactory1 != NULL)
	  {
	 
	   
	  
	  $data = array('tissuedetails'=>$tissuedetails,'productdetails'=>$producthookstissuepackagedetails,'id'=>$id);
      Mail::send('tissuepaper', $data, function($message) use ($id) {
		  
		   $tissuefactory1details=Tissuepaper::where('ProductID','=',$id)->where('status','=',1)->first();
		   
		  
		   
		    $tissueuniquefactory1explodedetails=explode(",",$tissuefactory1details->UniqueFactory1);
			
		    foreach($tissueuniquefactory1explodedetails as $tissueuniquefactory1det)
				 {
					 if($tissueuniquefactory1det!='')
					 {
		            $tissueuniquefactory1emaildetails=UniqueOffices::where('id','=',$tissueuniquefactory1det)->first();
					$tissueuniquefactory1emailids=$tissueuniquefactory1emaildetails->Email;
		   
         $message->to($tissueuniquefactory1emailids, 'Tissuepaper-Unique factory1')->cc('bala.aitech@gmail.com')->subject
            ('Resent Order Summary Artwork(TissuePaper) for approval');
         $message->from('order@theuniquegroup.com','TheUniqueGroup');
		 
					 }
		 
				 }
				 
		  
				 
		  $productdetails=ProductDetails::where('id','=',$id)->where('status','=',1)->first();
		   $path=storage_path();
		  if($productdetails->TissuePaperID!=0)
		  {
			 
		 $tissuedetails=Tissuepaper::where('id','=',$productdetails->TissuePaperID)->where('status','=',1)->first();
		 $tissuepaperid=$productdetails->TissuePaperID;
			 $pdf = PDF::loadView('users.productmailattachment');
		     $pdf->setPaper('a4', 'portrait');
		     $pdfimage=PDF::loadView('users.productmailattachment',compact('id','tissuepaperid'));
		     $pdfimage->save($path.'/app/data/product/'.'tissuepaper.pdf');  
		     $message->attach($path.'/app/data/product/'.'tissuepaper.pdf');
			 $message->attach($path.'/app/'.$tissuedetails->Artwork);
			 $message->attach($path.'/app/'.$productdetails->Artworkupload);
		  }
		  
				 
		  
		   
		
      });
	  
	  
	  }
	  
	   //tissuepaper-uniquefactory2
	  
	    if($tissuedetails->UniqueFactory2!="" && $tissuedetails->UniqueFactory2 != NULL)
	  {
	 
	   
	  
	   $data = array('tissuedetails'=>$tissuedetails,'productdetails'=>$producthookstissuepackagedetails,'id'=>$id);
      Mail::send('tissuepaper', $data, function($message) use ($id) {
		  
		   $tissuefactory2details=Tissuepaper::where('ProductID','=',$id)->where('status','=',1)->first();
		   
		  
		   
		    $tissueuniquefactory2explodedetails=explode(",",$tissuefactory2details->UniqueFactory2);
			
		    foreach($tissueuniquefactory2explodedetails as $tissueuniquefactory2det)
				 {
					 if($tissueuniquefactory2det!=''){
		            $tissueuniquefactory2emaildetails=UniqueOffices::where('id','=',$tissueuniquefactory2det)->first();
					$tissueuniquefactory2emailids=$tissueuniquefactory2emaildetails->Email;
		   
         $message->to($tissueuniquefactory2emailids, 'Tissuepaper-Unique factory2')->cc('bala.aitech@gmail.com')->subject
            ('Resent Order Summary Artwork(TissuePaper) for approval');
         $message->from('order@theuniquegroup.com','TheUniqueGroup');
		 
					 }
		 
				 }
				 
		  
				 
		  $productdetails=ProductDetails::where('id','=',$id)->where('status','=',1)->first();
		   $path=storage_path();
		  if($productdetails->TissuePaperID!=0)
		  {
			 
		 $tissuedetails=Tissuepaper::where('id','=',$productdetails->TissuePaperID)->where('status','=',1)->first();
		  $tissuepaperid=$productdetails->TissuePaperID;
			 $pdf = PDF::loadView('users.productmailattachment');
		     $pdf->setPaper('a4', 'portrait');
		     $pdfimage=PDF::loadView('users.productmailattachment',compact('id','tissuepaperid'));
		     $pdfimage->save($path.'/app/data/product/'.'tissuepaper.pdf');  
		     $message->attach($path.'/app/data/product/'.'tissuepaper.pdf');
			 $message->attach($path.'/app/'.$tissuedetails->Artwork);
			 $message->attach($path.'/app/'.$productdetails->Artworkupload);
		  }
		  
				 
		  
		   
		
      });
	  
	  
	  }
	  
	   //tissuepaper-uniquefactory3
	  
	    if($tissuedetails->UniqueFactory3!="" && $tissuedetails->UniqueFactory3 != NULL)
	  {
	 
	   
	  
	  $data = array('tissuedetails'=>$tissuedetails,'productdetails'=>$producthookstissuepackagedetails,'id'=>$id);
      Mail::send('tissuepaper', $data, function($message) use ($id) {
		  
		   $tissuefactory3details=Tissuepaper::where('ProductID','=',$id)->where('status','=',1)->first();
		   
		  
		   
		    $tissueuniquefactory3explodedetails=explode(",",$tissuefactory3details->UniqueFactory3);
			
		    foreach($tissueuniquefactory3explodedetails as $tissueuniquefactory3det)
				 {
					 if($tissueuniquefactory3det!='')
					 {
					 
		            $tissueuniquefactory3emaildetails=UniqueOffices::where('id','=',$tissueuniquefactory3det)->first();
					$tissueuniquefactory3emailids=$tissueuniquefactory3emaildetails->Email;
		   
         $message->to($tissueuniquefactory3emailids, 'Tissuepaper-Unique factory3')->cc('bala.aitech@gmail.com')->subject
            ('Resent Order Summary Artwork(TissuePaper) for approval');
         $message->from('order@theuniquegroup.com','TheUniqueGroup');
		 
				 }
				 
				 }
				 
		  
				 
		  $productdetails=ProductDetails::where('id','=',$id)->where('status','=',1)->first();
		   $path=storage_path();
		  if($productdetails->TissuePaperID!=0)
		  {
			 
		 $tissuedetails=Tissuepaper::where('id','=',$productdetails->TissuePaperID)->where('status','=',1)->first();
		  $tissuepaperid=$productdetails->TissuePaperID;
			 $pdf = PDF::loadView('users.productmailattachment');
		     $pdf->setPaper('a4', 'portrait');
		     $pdfimage=PDF::loadView('users.productmailattachment',compact('id','tissuepaperid'));
		     $pdfimage->save($path.'/app/data/product/'.'tissuepaper.pdf');  
		    $message->attach($path.'/app/data/product/'.'tissuepaper.pdf');
			 $message->attach($path.'/app/'.$tissuedetails->Artwork);
			  $message->attach($path.'/app/'.$productdetails->Artworkupload);
		  }
		  
				 
		  
		   
		
      });
	  
	  
	  }
	  
	  
	   
	   
	}
	
	 if($producthookstissuepackagedetails->PackagingStickersID!=0)
	 {
	  
	  
	  //packagestikcers
	     
	   $packagedetails=PackagingStickers::where('ProductID','=',$id)->where('status','=',1)->first();
	   
	   //packagestikcers-uniquefactory1
	   
	    if($packagedetails->UniqueFactory1!="" && $packagedetails->UniqueFactory1 != NULL)
	  {
	 
	   
	  
	  $data = array('packagedetails'=>$packagedetails,'productdetails'=>$producthookstissuepackagedetails,'id'=>$id);
      Mail::send('packagingstikers', $data, function($message) use ($id) {
		  
		   $packagefactory1details=PackagingStickers::where('ProductID','=',$id)->where('status','=',1)->first();
		   
		  
		   
		    $packageuniquefactory1explodedetails=explode(",",$packagefactory1details->UniqueFactory1);
			
		    foreach($packageuniquefactory1explodedetails as $packageuniquefactory1det)
				 {
					 
					 if($packageuniquefactory1det!=''){
		            $packageuniquefactory1emaildetails=UniqueOffices::where('id','=',$packageuniquefactory1det)->first();
					$packageuniquefactory1emailids=$packageuniquefactory1emaildetails->Email;
					
		   
         $message->to($packageuniquefactory1emailids, 'Package Stickers-Unique factory1')->cc('bala.aitech@gmail.com')->subject
            ('Resent Order Summary Artwork(Package Stickers) for approval');
         $message->from('order@theuniquegroup.com','TheUniqueGroup');
		 
				 }
				 }
		  
				 
		  $productdetails=ProductDetails::where('id','=',$id)->where('status','=',1)->first();
		   $path=storage_path();
		  if($productdetails->PackagingStickersID!=0)
		  {
			 
	$packagedetails=PackagingStickers::where('id','=',$productdetails->PackagingStickersID)->where('status','=',1)->first();
		 $packagingstickersid=$productdetails->PackagingStickersID;
			 $pdf = PDF::loadView('users.productmailattachment');
		     $pdf->setPaper('a4', 'portrait');
		     $pdfimage=PDF::loadView('users.productmailattachment',compact('id','packagingstickersid'));
		     $pdfimage->save($path.'/app/data/product/'.'packagingstickers.pdf');  
		    $message->attach($path.'/app/data/product/'.'packagingstickers.pdf');
			 $message->attach($path.'/app/'.$packagedetails->Artwork);
			  $message->attach($path.'/app/'.$productdetails->Artworkupload);
		  }
		  
				 
		  
		   
		
      });
	  
	  
	  }
	  
	  //packagestikcers-uniquefactory2
	   
	    if($packagedetails->UniqueFactory2!="" && $packagedetails->UniqueFactory2 != NULL)
	  {
	 
	   
	  
	  $data = array('packagedetails'=>$packagedetails,'productdetails'=>$producthookstissuepackagedetails,'id'=>$id);
      Mail::send('packagingstikers', $data, function($message) use ($id) {
		  
		   $packagefactory2details=PackagingStickers::where('ProductID','=',$id)->where('status','=',1)->first();
		   
		  
		   
		    $packageuniquefactory2explodedetails=explode(",",$packagefactory2details->UniqueFactory2);
			
		    foreach($packageuniquefactory2explodedetails as $packageuniquefactory2det)
				 {
					 if($packageuniquefactory2det!='')
					 {
		            $packageuniquefactory2emaildetails=UniqueOffices::where('id','=',$packageuniquefactory2det)->first();
					$packageuniquefactory2emailids=$packageuniquefactory2emaildetails->Email;
		   
         $message->to($packageuniquefactory2emailids, 'Package Stickers-Unique factory2')->cc('bala.aitech@gmail.com')->subject
            ('Resent Order Summary Artwork(Package Stickers) for approval');
         $message->from('order@theuniquegroup.com','TheUniqueGroup');
		 
					 }
		 
				 }
				 
		  
				 
		  $productdetails=ProductDetails::where('id','=',$id)->where('status','=',1)->first();
		   $path=storage_path();
		  if($productdetails->PackagingStickersID!=0)
		  {
			 
		$packagedetails=PackagingStickers::where('id','=',$productdetails->PackagingStickersID)->where('status','=',1)->first();
		  $packagingstickersid=$productdetails->PackagingStickersID;
			 $pdf = PDF::loadView('users.productmailattachment');
		     $pdf->setPaper('a4', 'portrait');
		     $pdfimage=PDF::loadView('users.productmailattachment',compact('id','packagingstickersid'));
		     $pdfimage->save($path.'/app/data/product/'.'packagingstickers.pdf');  
		    $message->attach($path.'/app/data/product/'.'packagingstickers.pdf');
			$message->attach($path.'/app/'.$packagedetails->Artwork);
			 $message->attach($path.'/app/'.$productdetails->Artworkupload);
		  }
		  
				 
		  
		   
		
      });
	  
	  
	  }
	  
	  
	   //packagestikcers-uniquefactory3
	   
	    if($packagedetails->UniqueFactory3!="" && $packagedetails->UniqueFactory3 != NULL)
	  {
	 
	   
	  
	  $data = array('packagedetails'=>$packagedetails,'productdetails'=>$producthookstissuepackagedetails,'id'=>$id);
      Mail::send('packagingstikers', $data, function($message) use ($id) {
		  
		   $packagefactory3details=PackagingStickers::where('ProductID','=',$id)->where('status','=',1)->first();
		   
		  
		   
		    $packageuniquefactory3explodedetails=explode(",",$packagefactory3details->UniqueFactory3);
			
		    foreach($packageuniquefactory3explodedetails as $packageuniquefactory3det)
				 {
					 if($packageuniquefactory3det!=''){
		            $packageuniquefactory3emaildetails=UniqueOffices::where('id','=',$packageuniquefactory3det)->first();
					$packageuniquefactory3emailids=$packageuniquefactory3emaildetails->Email;
		   
         $message->to($packageuniquefactory3emailids, 'Package Stickers-Unique factory3')->cc('bala.aitech@gmail.com')->subject
            ('Resent Order Summary Artwork(Package Stickers) for approval');
         $message->from('order@theuniquegroup.com','TheUniqueGroup');
					 }
		 
				 }
				 
		  
				 
		  $productdetails=ProductDetails::where('id','=',$id)->where('status','=',1)->first();
		   $path=storage_path();
		  if($productdetails->PackagingStickersID!=0)
		  {
			 
		$packagedetails=PackagingStickers::where('id','=',$productdetails->PackagingStickersID)->where('status','=',1)->first();
		  $packagingstickersid=$productdetails->PackagingStickersID;
			 $pdf = PDF::loadView('users.productmailattachment');
		     $pdf->setPaper('a4', 'portrait');
		     $pdfimage=PDF::loadView('users.productmailattachment',compact('id','packagingstickersid'));
		     $pdfimage->save($path.'/app/data/product/'.'packagingstickers.pdf');  
		     $message->attach($path.'/app/data/product/'.'packagingstickers.pdf');
			 $message->attach($path.'/app/'.$packagedetails->Artwork);
			 $message->attach($path.'/app/'.$productdetails->Artworkupload);
		  }
		  
				 
		  
		   
		
      });
	  
	  
	  }
	  
	  
	  
	   
	   
	}
	
	    return redirect(url(route('dashboard')));
		
	}

	
	




}
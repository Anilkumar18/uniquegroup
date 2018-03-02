@extends('users.layouts.products')
<?php
error_reporting(0);
?>
@section('content')
<style>
.dashboard-mainimg {
    width: 100%;
    height: auto;
}
table#myTable {
    border-collapse:collapse;
}
th
{
font-size:12px;
font-stretch:expanded;
}
.proddispaly
{
font-size:9px;
color:#6e6e6e;
}
.column_headlink
{
 color:#000;
 font-family:Geneva, Arial, Helvetica, sans-serif;
 text-decoration:underline;
 border-left: 1px solid black;
}
.allcolumn
{
 color:#000;
 font-family:Geneva, Arial, Helvetica, sans-serif;
 text-decoration:underline;
 border-left: 1px solid black;
 padding-left: 210px;
 
}
.allcolumn1
{
 color:#000;
 font-family:Geneva, Arial, Helvetica, sans-serif;
 text-decoration:underline;
 border-left: 1px solid black;
padding-left: 425px;
 
}
.column_headlink1
{
 color:#000;
 font-family:Geneva, Arial, Helvetica, sans-serif;
 font-size:10px;
}
td
{
font-family:Verdana, Arial, Helvetica, sans-serif;
font-size:10px;
font-weight:100;
}
.gradeX1
{
background-color:#d3d3d3;
}
select
{
font-size:12px;
width: 50%;
}
.btn-style{
	border : solid 1px #00ADEF;
	border-radius : 3px;
	moz-border-radius : 3px;
	-webkit-box-shadow : 0px 0px 2px rgba(0,0,0,1.0);
	-moz-box-shadow : 0px 0px 2px rgba(0,0,0,1.0);
	box-shadow : 0px 0px 2px rgba(0,0,0,1.0);
	font-size : 13px;
	color : #00ADEF;
	padding : 1px 17px;
	background : #00ADEF;
	background : -webkit-gradient(linear, left top, left bottom, color-stop(0%,#5f6166), color-stop(100%,#00060a));
	background : -moz-linear-gradient(top, #5f6166 0%, #00060a 100%);
	background : -webkit-linear-gradient(top, #5f6166 0%, #00060a 100%);
	background : -o-linear-gradient(top, #5f6166 0%, #00060a 100%);
	background : -ms-linear-gradient(top, #5f6166 0%, #00060a 100%);
	background : linear-gradient(top, #5f6166 0%, #00060a 100%);
	filter : progid:DXImageTransform.Microsoft.gradient( startColorstr='#5f6166', endColorstr='#00060a',GradientType=0 );

}
h2
{
color:#6e6e6e;	
}
textarea
{
width:172px;
font-size:12px;
border: 1px solid #000;
}
.fa-color
{
color: #0033FF;
}
.label_font
{
font-size: 12px;
}
.close_form_popup
{
font-size:9px;
text-decoration:underline;
}
.close_form_popup1
{
font-size:9px;
text-decoration:underline;
margin-right:420px;
}
.close_form_popup2
{
font-size:11px;
text-decoration:underline;
}
.close_form_popup3
{
font-size:11px;
text-decoration:underline;
}
.search_upload
{
width:172px; 
height:30px;
font-size:12px;
border: 1px solid #e5e6e7;"
}
.required
{
color:#e00;
}
.selectItem
{
margin-left:970px;
}
.product_header
{
color:#6e6e6e;
}
.trfont_style
{
color:#FFFFFF;
}
.thead_style
{
background-color:#6e6e6e;
}
.test
{
padding-top:0px; padding-bottom:0px;border: none;	
}
.create_project_Item
{
color:#0033FF;padding-top: 10px;
}
.recordsperpage
{
margin-left:970px;
}
.headerimage
{
 width:100%;
 height:3px;
 border:thin;
}
.footer-alignment
{
  padding-right:665px;
}
/*.button {
    background-color: #00ADEF; 
    border: none;
    color: white;
    padding: 3px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
}*/
.button {
  display: inline-block;
  padding: 6px 25px;
  font-size: 12px;
  cursor: pointer;
  text-align: center;
  text-decoration: none;
  outline: none;
  color: #fff;
  background-color: #00ADEF;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px #999;
}

.button:hover {background-color: #00ADEF}

.button:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
.boxthickwidheightcls
{
width:35% !important;
}
.qty_refbtn
{
width:59% !important;
}
.qty_checkbox
{
width:20px !important;
top: 
10px;
float: left;
margin-top: 7px !important;
margin-left: 10px;
}
.aspersample
{
position: relative;
top: 4px;
border-color:#000000;
float:left;
}
.Thicknessdiv
{
width:21%;
}
.checkboxdiv
{
float:left;
position: relative;
top: 7px;
}
.thicknesschkbox
{
width:20px !important;
float:left;
}
.spanval
{
float:left;margin-top:-4px;
}
.cmykwidthdiv
{
width:10%;
}
.cmyk
{
width: 20px !important; 
font-size:12px;
}
.cmykyes
{
font-size:12px;position: absolute;top: -3px;
}
.cmyno
{
font-size:12px;position: absolute;top: -3px;
}
.chkselectionproducts
{

margin-top:10px !important;
margin-left: -79px !important;
 width:173px !important;
}
</style>

<div class="row border-bottom white-bg notificationdiv">

                    <div class="col-lg-12">
                        <img class="dashboard-mainimg"  src="{{ asset("/img/test2.png")}} " />
                        
                    </div>
                    <div class="col-lg-12">
                   <br />
                    <ol class="breadcrumb">
                     
                      <li>New Development<strong></strong></li>
                      <li>Product details</li>
                      <li>
                     
                      </li>
                       <li>
                      
                      </li>
                    </ol>
                  </div>
               
                  <div class="col-lg-12">
                     <br />
                  <h4 style="color:#00ADEF;"><strong>PRODUCT DETAILS</strong></h2>
                  </div>
                   <div class="col-lg-12">
					<div class="logoutSucc">

                     @if (session('success'))
                    <div class="alert alert-success" role="success">
                    <span class="fa fa-exclamation-circle" aria-hidden="true"></span>
                    {{ session('success') }}
                    </div>
                    @endif

                    @if (session('failure'))
                    <div class="alert alert-danger" role="danger">
                    <span class="fa fa-exclamation-circle" aria-hidden="true"></span>
                    {{ session('failure') }}
                    </div>
                    @endif
                 
                    

					</div>
                </div>  

            </div>
          
           <!--paper bags-->
       

<div class="row wrapper wrapper-content animated fadeInRight">

  <div class="ibox float-e-margins">
  
      <div class="ibox-content">
      
        <div class="table-responsive" style="overflow:hidden">
        <form name="productdetailsadd" id="productdetailsadd" method="post" action="{{ url(route('user.add_productsgroupdetails')) }}" class="form-horizontal" enctype="multipart/form-data">
         {{ csrf_field() }}
            <div class="modal-body">
            <div class="col-sm-12 b-r">
             @foreach($productdevelopmentfields as $list)
             
              <div class="form-group">
               
                  <!--check dropdown and textbox to display in forms starts here-->
                @if($list->dropdown!="")
                <?php
				$table=$list->tablename;
				$fielddetailslist = DB::table($table)->get();
				$fieldname=$list->columnfieldname;
				$listoffieldname=$list->fieldname;
				?>
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:</label>
                   <div class="col-lg-5">
                
                        <select id="{{$fieldname}}" name="{{$fieldname}}" class="form-control dropdownwidth">
                        <option value="">Please Select</option>
                         @foreach ($fielddetailslist as $fielddetails)
                           
                         <option value="{{$fielddetails->id}}">{{ $fielddetails->$fieldname }}</option>
                           @endforeach
                                            
                        </select>
                       
                   
                 
                </div>
                @elseif($list->checkbox!="" && $list->columnfieldname=="QualityReference")
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:</label>
                 <div class="col-lg-5">
                
                      <input type="text" name="qty_ref" id="qty_ref" class="form-control qty_refbtn"/>                   
                <!--</div>
                <div class="col-lg-5">-->
                	<input type="checkbox" name="qty_chk" id="qty_chk" class="qty_checkbox"/>
                    <p  class="aspersample"> As per sample</p>
                       
                   
                 
                </div>
                 @elseif($list->checkbox!="" && $list->columnfieldname=="Thickness")
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:</label>
                 <div class="col-lg-5 Thicknessdiv">
                
                      <input type="text" name="Thickness" id="Thickness" class="form-control"/>                   
              
                </div>
                 <div class="col-lg-5 checkboxdiv">
                  <input type="checkbox" name="pt" id="pt" value="1" class="thicknesschkbox"/><p  class="spanval"> pt</p>
                  <input type="checkbox" name="gms" id="gms" value="2" class="thicknesschkbox"/><p class="spanval"> gms</p>
                   <input type="checkbox" name="mm" id="mm" value="3"  class="thicknesschkbox"/><p class="spanval"> mm</p>
                  </div>
                 @elseif($list->columnfieldname=="Width")
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:</label>
                 <div class="col-lg-5">
                
                      <input type="text" name="Width" id="Width" class="form-control boxthickwidheightcls"/>                   
              
                </div>
                 @elseif($list->columnfieldname=="Height")
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:</label>
                 <div class="col-lg-5">
                
                      <input type="text" name="Width" id="Width" class="form-control boxthickwidheightcls"/>                   
              
                </div>
                 @elseif($list->columnfieldname=="Length")
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:</label>
                 <div class="col-lg-5">
                
                      <input type="text" name="Length" id="Length" class="form-control boxthickwidheightcls"/>                   
              
                </div>
                 @elseif($list->columnfieldname=="CMYK")
                  <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:</label>
                 <div class="col-lg-5 cmykwidthdiv">
                 <input type="radio" name="printcolor" id="cmykyes"  class="chkbox cmyk" value="1"  onclick="printcolor();"/>
                 <span class="cmykyes" style="font-size:12px;position: absolute;top: -3px;">Yes</span>&nbsp;
                 </div>
                  <div class="col-lg-5">
                 <input type="radio" name="printcolor" id="cmykno" class="chkbox cmyk" value="0"  onclick="printcolor();" />
                 <span class="cmykno" style="font-size:12px;position: absolute;top: -3px;">No</span>
                </div>
             
             @elseif($list->fieldname=="Print Color 1 (Pantone)")
              <div style="display:block;" id="printcolor1">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}"  class="form-control" />
                 </div>
             </div>
              @elseif($list->fieldname=="Print Color 2 (Pantone)")
              <div style="display:block;" id="printcolor2">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}"  class="form-control" />
                 </div>
             </div>
              @elseif($list->fieldname=="Print Color 3 (Pantone)")
              <div style="display:block;" id="printcolor3">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}"  class="form-control" />
                 </div>
             </div>
              @elseif($list->fieldname=="Print Color 4 (Pantone)")
              <div style="display:block;" id="printcolor4">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}"  class="form-control" />
                 </div>
             </div>
            @elseif($list->fieldname=="Print Color 5 (Pantone)")
              <div style="display:none;overflow:hidden;" id="printcolor5">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}"  class="form-control" />
                 </div>
             </div>
           @elseif($list->fieldname=="Print Color 6 (Pantone)")
              <div style="display:none;overflow:hidden;" id="printcolor6">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}"  class="form-control" />
                 </div>
             </div>
              @elseif($list->fieldname=="Print Color 7 (Pantone)")
              <div style="display:none;overflow:hidden;" id="printcolor7">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}"  class="form-control" />
                 </div>
             </div>
              @elseif($list->fieldname=="Print Color 8 (Pantone)")
              <div style="display:none;overflow:hidden;" id="printcolor8">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}"  class="form-control" />
                 </div>
             </div>
                 @elseif($list->checkbox!="" && $list->columnfieldname=="Hook")
                   <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:</label>
                   <div class="col-lg-8">
                 <input type="checkbox" id="hook" name="hook"  value="1" class="chkselectionproducts" />
                </div>
                 @elseif($list->checkbox!="" && $list->columnfieldname=="TissuePaper")
                   <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:</label>
                   <div class="col-lg-8">
                 <input type="checkbox" id="hook" name="hook"  value="1" class="chkselectionproducts" />
                </div>
                 @elseif($list->checkbox!="" && $list->columnfieldname=="PackagingStickers")
                   <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:</label>
                   <div class="col-lg-8">
                 <input type="checkbox" id="hook" name="hook"  value="1" class="chkselectionproducts" />
                </div>
                 
                @else
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}"  class="form-control" />
                 </div>
                
                @endif
                
                
              </div>
              @endforeach
              
             
              
              
              
              
       
              
            </div>
            
           
            
          </div>
        
     
        
        
    <div class="form-group">
                
                 <div class="col-lg-12 submitbtndiv">
              <!--  <a data-href="{{ url('/') }}" data-selecthref="" value="1"  title="test"
                  data-id="1" class="button"/>Next</a>-->
                  <input type="submit" id="submit" value="Next"  class="button" style="width: 12%;"/>
                </div>
                 <div class="col-lg-8">
                 
                 </div>
                </div>
                
                   </form>
                   
           </div>
      
      </div>

    </div>
</div>



 <!--paper bags End-->






<!--Woven Subgroup-->










@endsection 
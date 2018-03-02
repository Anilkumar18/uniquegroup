@extends('admin.layouts.addheattransfers')

@section('content')
<style>
.modal-align
{
width:1000px;
}
.mandatory_fields
{
color:#FF0000;
}
</style>
        
      
     <!-- wrapper content -->   
        
        
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    
                    <!--<div class="col-lg-12 clsheaderbanner">
                    	<img src="img/banner001.png" />
                    </div>-->
                    <?php
					$customerdetails=Session::get('customername');
					$groupdetails=Session::get('groupname');
					$subgroupdetails=Session::get('subgroupname');
					?>
                    
                   
                     <div class="col-lg-12 clsbreadcrumb">
                    	<div class="col-lg-10"> > Product Maintanance -<?php  echo $customerdetails->CustomerName;  ?>- <?php echo $groupdetails->ProductGroup; ?>- <?php echo $subgroupdetails->ProductSubGroupName; ?>- Add Product </div>
                        
                         <div class="col-lg-2"> <button class="button" onclick="location.href='{{ url(route('admin.heattransfers',['id'=>4]))}}'">View List</button></div>
                    </div>
                    
                    <div class="col-lg-12 clsaddnewvendorform">
                    
                         <form class="addheattransfer" name="heattransferadd" id="heattransferadd" method="post" action="{{ url(route('admin.addheattransfersinsertions'))}}" enctype="multipart/form-data">
                        	 {{ csrf_field() }}
                             
                        <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="typeoflabel" class="col-md-3">Type of Label<span class="mandatory_fields">*</span></label>
                                
                                <div class="col-md-3">
    							 <select id="typeoflabel" name="typeoflabel" class="form-control">
                                 <option value="">Please Select</option>
                                  @foreach($typeoflabelist as $typeoflabel)
                                 <option value="{{$typeoflabel->id}}">{{$typeoflabel->TypeofLabels}}</option>
                                 @endforeach
                                 </select>
                                </div>
  							</div>
                            
                        </row>    
                       
                       <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="typeofheattransfer" class="col-md-3">Type of Heat Transfer<span class="mandatory_fields">*</span></label>
                                
                                <div class="col-md-3">
    							 <select id="typeofheattransfer" name="typeofheattransfer" class="form-control">
                                 <option value="">Please Select</option>
                                 @foreach($typeofheattransfer as $typeofheattransferlist)
                                 <option value="{{$typeofheattransferlist->id}}">{{$typeofheattransferlist->TypeofHeatTransfer}}</option>
                                 @endforeach
                                 </select>
                                </div>
  							</div>
                            
                        </row>    
                        
                        
                         <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="first_name" class="col-md-3">Quality reference</label>
                                
                                <div class="col-md-3">
                                
                                 <input type="text" name="quality_ref" id="quality_ref" class="form-control" />
                                </div>
                                 <div class="col-md-1">
                                
                                 <input type="checkbox" name="quality_chk_ref" id="quality_chk_ref"  />
                                </div>
  							</div>
                            
                        </row>    
                        
                         <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="finish" class="col-md-3">Finish<span class="mandatory_fields">*</span></label>
                                
                                <div class="col-md-3">
    							 <select id="finish" name="finish" class="form-control">
                                 <option value="">Please Select</option>
                                 @foreach($heattransferfinish as $finish)
                                 <option value="{{$finish->id}}">{{$finish->Finish}}</option>
                                 @endforeach
                                 </select>
                                </div>
  							</div>
                            
                        </row>    
                        
                        <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="width" class="col-md-3">Width<span class="mandatory_fields">*</span></label>
                                
                                <div class="col-md-3">
                             
                                  <input type="text" name="heattransfer_width" id="heattransfer_width" class="form-control"/>
                 
                                </div>
  							</div>
                            
                        </row>  
                         <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="email" class="col-md-3">Length<span class="mandatory_fields">*</span></label>
                                
                                <div class="col-md-3">
                                
                                  <input type="text" name="heattransfer_length" id="heattransfer_length"  class="form-control"  />
                                </div>
  							</div>
                            
                        </row>  
                        
                        <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="email" class="col-md-3">Print Color1(pantone):<span class="mandatory_fields">*</span></label>
                                
                                <div class="col-md-3">
                                
                                  <input type="text" name="printcolor1" id="printcolor1"  class="form-control">
                                </div>
  							</div>
                            
                        </row>  
                          <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="email" class="col-md-3">Print Color2(pantone):</label>
                                
                                <div class="col-md-3">
                                
                                  <input type="text" name="printcolor2" id="printcolor2"  class="form-control">
                                </div>
  							</div>
                            
                        </row>  
                          <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="email" class="col-md-3">Print Color3(pantone):</label>
                                
                                <div class="col-md-3">
                                
                                  <input type="text" name="printcolor3" id="printcolor3"  class="form-control">
                                </div>
  							</div>
                            
                        </row>  
                          <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="email" class="col-md-3">Print Color4(pantone):</label>
                                
                                <div class="col-md-3">
                                
                                  <input type="text" name="printcolor4" id="printcolor4"  class="form-control">
                                </div>
  							</div>
                            
                        </row>  
                      
                        
                         <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="finish" class="col-md-3">Application<span class="mandatory_fields">*</span></label>
                                
                                <div class="col-md-3">
    							 <select id="application" name="application" class="form-control">
                                 <option value="">Please Select</option>
                                 @foreach($application as $applicationlist)
                                 <option value="{{$applicationlist->id}}">{{$applicationlist->Application}}</option>
                                 @endforeach
                                 </select>
                                </div>
  							</div>
                            
                        </row>    
                          <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="email" class="col-md-3">Art Work<span class="mandatory_fields">*</span></label>
                              <div class="col-md-3">
                                <input type='file' class="fbfile" name="imgInp" id="imgInp" onchange="imageselect();"/>
                                 <input type="hidden" name="selectimage" id="selectimage" class="form-control selectimage" readonly="readonly">
                                  <input type="hidden" name="selectimageid" id="selectimageid" class="form-control" readonly="readonly">
                              </div>
                                 <div class="col-sm-3" id="selimage"> <img id="blah" src="storage/data/product/" alt="" width="150" height="150" /> <img id="blah" src="{{ asset('/img/image-sample.jpg') }}" alt="your image" width="150" height="150" /> </div>
  							</div>
                            
                        </row>  
                        
                        
                         <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="zip" class="col-md-3"></label>
    							<!--<button class="col-md-3 btn btn-info clsbutton" name="addvendors" id="addvendors"> Add </button>-->
                                <div class="col-md-3">
                                 <input type="submit" name="addheattransfersinfo" id="addheattransfersinfo" value="Next"  class="clsbutton"/>
                                 </div>
  							</div>
                            
                        </row>
                     
                        
                       
                        
                       
                        
                       
                        
                       
                        
                        
                       
                       
                         
                      
                        
                        
                         
                         
                        
                      
                       
                       
                       
                        
                            
                        </form>
                    
                    </div>
                    
                </div>
            </div>
        </div>
	<!-- /- wrapper content -->        
        
@endsection 
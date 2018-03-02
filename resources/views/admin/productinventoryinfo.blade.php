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
#errmsg
{
color: red;
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
                    
                         <form class="addproductinventory" name="addproductinventory" id="addproductinventory" method="post" action="{{url(route('admin.addheattransfers'))}}" enctype="multipart/form-data">
                        	 {{ csrf_field() }}
                             
                         
                         <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="first_name" class="col-md-3">Unique Product Code<span class="mandatory_fields">*</span></label>
                                
                                <div class="col-md-3">
                                
                                 <input type="text" name="unique_product_code" id="unique_product_code" class="form-control" />
                                </div>
                             
  							</div>
                            
                        </row>    
                         <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="inventory" class="col-md-3">Inventory<span class="mandatory_fields">*</span></label>
                                
                                <div class="col-md-3">
                                
                                <!-- <input type="text" name="inventory" id="inventory" class="form-control" />-->
                                <select  name="inventory" id="inventory" class="form-control">
                                <option value="">Please Select</option>
                                @foreach($inventorydetails as $inventorylist)
                               <option value="{{$inventorylist->id}}">{{$inventorylist->InventoryName}}</option>
                                @endforeach
                                </select>
                                </div>
                             
  							</div>
                            
                        </row>    
                        <div id="inventoryblock" style="display:none;">
                         <row class="col-md-12">
                           <div class="form-group clsformelements">
    							<label for="finish" class="col-md-3">Projection<span class="mandatory_fields">*</span></label>
                                
                                <div class="col-md-3">
    							<input type="text" name="projection" id="projection" class="form-control" />
                                </div>
  							</div>
                         
                         
                           </row>    
                         <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="finish" class="col-md-3">Unique factory1-Inventory<span class="mandatory_fields">*</span></label>
                                
                                <div class="col-md-3">
    							 <select id="uniquefactory1" name="uniquefactory1" class="form-control">
                                 <option value="">Please Select</option>
                                 @foreach($uniqueofficeslist as $uniqueoffices)
                                 <option value="{{$uniqueoffices->id}}">{{$uniqueoffices->OfficeFactoryName}}</option>
                                 @endforeach
                                 </select>
                                </div>
  							</div>
                            
                        </row>    
                         <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="finish" class="col-md-3">Unique factory2-Inventory</label>
                                
                                <div class="col-md-3">
    							 <select id="uniquefactory2" name="uniquefactory2" class="form-control">
                                 <option value="">Please Select</option>
                                   @foreach($uniqueofficeslist as $uniqueoffices)
                                 <option value="{{$uniqueoffices->id}}">{{$uniqueoffices->OfficeFactoryName}}</option>
                                 @endforeach
                                 </select>
                                </div>
  							</div>
                            
                        </row>   
                        <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="width" class="col-md-3">Maximum pieces on Stock<span class="mandatory_fields">*</span></label>
                                
                                <div class="col-md-3">
                             
                                  <input type="text" name="max_stock" id="max_stock" class="form-control" />
                 
                                </div>
  							</div>
                            
                        </row>  
                        
                        
                        <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="email" class="col-md-3">Minimum pieces on Stock<span class="mandatory_fields">*</span></label>
                                
                                <div class="col-md-3">
                                
                                  <input type="text" name="min_stock" id="min_stock"  class="form-control">
                                </div>
  							</div>
                            
                        </row>  
                     </div>  

                         <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="zip" class="col-md-3"></label>
    							<!--<button class="col-md-3 btn btn-info clsbutton" name="addvendors" id="addvendors"> Add </button>-->
                                <div class="col-md-3">
                                 <input type="submit" name="addproductinventory" id="addproductinventory" value="Next"  class="clsbutton"/>
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
 <h1>Product Details</h1>
                                <fieldset>
                                   
                                <div class="row">
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <h4><label>Item Code : </label></h4>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                            <h4><span class="productitemcode"></span></h4>
                                            </div>
                                        </div>
                                     </div>
                                  
                                  <h2>Product Details</h2>


                                   <span id="imgsrc" style="display: none;">{{ route('user.productpic', ['id' =>'']) }}</span>


                                    <div class="row">
                                    
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <div class="col-sm-12s"><label>Marks PO Number *</label></div>
                                            <div class="col-sm-12s" id="frmCheckUsername"><input id="ponumber" name="poNumber" type="text" class="form-control required" value="<?php echo isset($Orderdetails->poNumber)?$Orderdetails->poNumber:''; ?>" <?php echo isset($Orderdetails->poNumber)?'readonly="readonly"':''; ?>></div>
                                           </div>
                    </div>

                                         <div class="col-lg-4">
                         <div class="form-group" id="data_1">
                                <label>PO Date *</label>
                                <div class="input-group <?php echo isset($Orderdetails->poDate)?'date1':'date'; ?>">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input name="poDate" type="text" class="form-control" value="<?php echo isset($Orderdetails->poDate)?$Orderdetails->poDate:date('m/d/Y', time()); ?>" <?php echo isset($Orderdetails->poDate)?'readonly="readonly"':''; ?>>
                                </div>
                            </div>
                                        </div>
                                          <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Style No *</label>
                                            <input id="styleNo" name="styleNo" type="text" class="form-control" value="<?php echo isset($Orderdetails->styleNo)?$Orderdetails->styleNo:''; ?>" <?php echo isset($Orderdetails->styleNo)?'readonly="readonly"':''; ?>>
                                           </div>
                    </div>   
                                             
                                        
                                        </div>
                                       
                                       
                                       <div class="row">
                                       
                                       <input type="hidden" name="careenable" id="careenable" value="1">
                                        
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Season *</label>
                                                <?php 
                                                if(isset($Orderdetails->season)){ 
$seasonID=isset($Orderdetails->season)?$Orderdetails->season:''; 
                                                  ?>

                                                 <select name="season" class="dropdownwidth" id="season" disabled="disabled">
                                                  @foreach($seasondetails as $seasonlist)
                                          <option value="{{$seasonlist->id}}" @if($seasonID==$seasonlist->id) selected="selected" @endif>{{$seasonlist->Season}}</option>
                                            @endforeach
                                           </select>
<input type="hidden" name="season" value="<?php echo $seasonID; ?>">
                                                <?php }else{ ?>
                                             <select name="season" class="dropdownwidth" id="season">
                                            <option>Plaese Select</option>
                                            @foreach($seasondetails as $seasonlist)
                                          <option value="{{$seasonlist->id}}">{{$seasonlist->Season}}</option>
                                            @endforeach
                                          </select>
                                          <?php } ?>
                                           </div>
                                        </div>
                    @if($carestatus==1)
                    <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Country of Origin:</label>
                                            <select name="countryOfOrigin" class="dropdownwidth" id="countryOfOrigin">
                                            
                                          </select>
                                           </div>
                    </div>
                    @endif
                                       </div>
 <div class="row">
                                        <div class="col-lg-12">
                                            <div class="text-center">
                                              <div id="caresize"></div> 
                                               
                                            </div>
                                        </div>
                                    </div>

                                       <div class="row">
                                        <div class="col-lg-12">
                                            <div class="text-center">
                                              <div id="productimg"><img src="" style="margin-top: 25px; height:auto; border:solid 1px #1AB394"></div> 
                                               
                                            </div>
                                        </div>
                                    </div>  
                                </fieldset>
                                @if($carestatus==1)
<h1>Care Instruction</h1>
                                <fieldset>
                                   
                                <div class="row">
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <h4><label>Item Code : </label></h4>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                            <h4><span class="productitemcode"></span></h4>
                                            </div>
                                        </div>
                                     </div>
                                  
                                  <h2>Care Instruction</h2>
                                     @foreach($symboldetails as $symboltype)   
                                        <div class="row">
                                     <div class="col-lg-3"><div class="wash"><h3>{{$symboltype->symboltypes}}</h3></div></div>
                                    <div class="col-lg-9">
                                   
                                    </div>
                                    </div>
                                    <?php $symbolimgdetails=DB::Select('call sp_Getsymbolsdetails('.$symboltype->id.')'); ?>
                                    <div class="row">
                                    @foreach($symbolimgdetails as $symboldesc)
                                    <div class="col-lg-6" style="margin-bottom:10px;">
                                    
                                    <div class="form-group">
                                    <div class="radio radio-info radio-inline col-lg-10">
                                    
                                            <label for="{{$symboldesc->id}}"><input type="radio" id="{{$symboldesc->id}}" name="<?php echo 'care'.str_replace(' ','', $symboltype->symboltypes); ?>" value="{{$symboldesc->id}}" class="valid">{{$symboldesc->descEnglish}}                                       </label>
                                       </div>
                                        <div class="col-lg-2">
                                            <img src="{{url(route('product.symbolcolor', ['id' => $symboldesc->imageID]))}}" width="30" height="30">
                                                                              </div> 
                                    </div>
                                    </div>
                                     @endforeach
                                   </div>
                                     @endforeach
                                     <?php 

                                     ?>
                                </fieldset>

                                <h1>Fabric Composition</h1>
                                <fieldset>
                                   
                                <div class="row">
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <h4><label>Item Code : </label></h4>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                            <h4><span class="productitemcode"></span></h4>
                                            </div>
                                        </div>
                                     </div>
                                  
                                  <h2>Fabric Compositions</h2>
                                     <div class="exclusivecontent">



                                     </div>   
                                     <?php
$co='eng,fre';
$type='garmentcomponents';
$processlan=explode(',', $co);
foreach ($processlan as $lanvalue) {
     $languset=$type.strtolower($lanvalue);

    $table=$languset;
                $fielddetailslist[] = DB::table($table)->get();
                
} $i=0;
foreach ($fielddetailslist as $typekey => $typevalue) {
   if($type=='garmentcomponents'){
        foreach ($typevalue as $key => $value) {
         $processdetails[$i][]=$value->GarmentComponents;
        }
    }
    

    $i++;
    
}
//echo '<pre>';print_r($processdetails);echo '</pre>';
//cho  count($processdetails);
$arraylen=0;
for ($i=0; $i <count($processdetails) ; $i++) { 
    if(count($processdetails[$i])>$arraylen){$arraylen=count($processdetails[$i]);}
}

for ($i=0; $i < $arraylen; $i++) { 
    $detaillist='';
for ($j=0; $j <count($processdetails) ; $j++) { 
    $detaillist.=isset($processdetails[$j][$i])?$processdetails[$j][$i].'/':'';
    
}

    $garmentcomponents[]=rtrim($detaillist,'/');
}

?>

<div class="row margiontop">
                                       <div class="col-lg-3">
                                       <div class="form-group" style="padding-left:0px;">
                                            <label for="materical_select">
                                            <input type="checkbox" id="materical_select" name="materical_select" value="Fibre" class="materical_select">&nbsp;&nbsp;<strong>Select Fibre Contents</strong></label>
                                            <input type="text" name="fabriccompositionstatus" id="fabriccompositionstatus" value="" style="width: 1px; height: 0px;">
                                       </div>
                                    </div>
                                    <div class="col-lg-6">
                                    <div class="form-group" style="padding-left:0px;">
                                            <label for="materical_garselect">
                                            <input type="checkbox" id="materical_garselect" name="materical_garselect" value="Garments" class="materical_garselect">&nbsp;&nbsp;<strong>Select Garment Components</strong></label>
                                    </div>
                                    </div> 
                                    
                                     
                               </div>
<input type="hidden" name="languset" id="languset" value="<?php echo $co; ?>">

   
    


                               
                               <div class="row">    
                                   <div class="col-sm-3"></div>
                                   
                               <div class="col-sm-9">
                                   <div class="form-group">
                                   <div id="garmentselectdiv" style="display: none;">
                                  
                                   <div class="row garmentbtns" style="display: block;">    
                                   <div class="col-sm-3">
                                   <button type="button" id="garmentfibrebtn" name="garmentfibrebtn" class="btn btn-primary fa addgarmentfibrebtn">Garment Fibre</button>
                                   </div>
                                   
                               <div class="col-sm-9">
                                   <button type="button" id="garmentcomponentbtn" name="garmentcomponentbtn" class="btn btn-primary fa addgarmentcomponentbtn" disabled="">Garment Component</button>
                                   </div>
                                   
                               </div>
<div class="divgarmentselect row" style="display: none;">
                                   <?php //echo "<pre>"; print_r($getgarmentdata);echo "</pre>";?>
                   
                                   <select name="GarmentComponents" class="GarmentComponents dropdownwidth" id="GarmentComponents">
  <option>Plaese Select</option>
  @foreach($garmentcomponents as $garmentdetails)
<option value="{{$garmentdetails}}">{{$garmentdetails}}</option>
  @endforeach
</select>
            
            </div>                    
                    
                                    </div>
                                    </div>
                              </div>
                                    
                                    </div>
                                    
             <div class="fabriccompositiondynamic col-md-12">


             </div>

             <div class="garmentcompositiondynamic col-md-12">


             </div>                       
                                    
                               
                                </fieldset>

                                @endif


                                 <div class="modal inmodal" id="fibremyModallink" tabindex="-1" role="dialog" aria-hidden="true" style="overflow-y: scroll;">
                                <div class="modal-dialog modal-vlg">
                                <div class="modal-content animated bounceInRight">
                                 <div class="additionalchain_bg">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">
                                            <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            
                                            <h4 class="modal-title title_bar">Select Fibre Contents</h4>
                                            <p>Select fibre content and click on the 'Select Fibre Content' button.</p>
                                        </div>
                                        <input type="hidden" name="garmentstatus" id="garmentstatus">
                                        <input type="hidden" name="garmenttext" id="garmenttext">
                                        
                                    <div class="modal-body" 1style="min-height:800px;">
                                        
                                    <div class="row" style="margin-bottom:20px;">
                              <input type="hidden" name="GarmentselectedID" id="GarmentselectedID" value="" />
                                    <input type="hidden" name="Garmentselectedtext" id="Garmentselectedtext" value="" />
                                    <div class="col-sm-6">
                                    <label class="control-label font-noraml"><strong>Fibre Contents</strong></label>
                                </div>
                                    
                                    <div class="col-sm-6"><label class="control-label font-noraml">
                                        <strong>Insert the Fiber Content % in the boxes below</strong></label></div>
                                    
                                  </div>
                                 
                            <div class="row">      
                         
                         <div class="col-sm-5">
                         <div class="col-sm-12">
                                <div class="form-group">
                                <div id="selectgarmentfibrecontent1">
                                <select name="orderfibrecontent1[]" id="orderfibrecontent1" class="form-control" style="width:100%" multiple="multiple" size="13" >
                                  

                                
          </select>
                                    </div>
                                    </div>
                                    </div>
                         </div>
                         
                         <div class="col-sm-7 processdetails" >
                          <div class="row">    
                         <div class="col-sm-7" style="margin-bottom:10px;">
                       <input type="text" class="form-control selectedfabric"  name="SelectedGarmentFibre1" id="SelectedGarmentFibre1" readonly="readonly" >
                         <input type="hidden" id="selectedGarmentfibID1" name="selectedGarmentfibID1" />
                       </div>  
                                        
                      <div class="col-sm-2">
                      <input type="text" class="form-control checkdecimal"  name="GarmentFibrePerc1" id="GarmentFibrePerc1" value="0" readonly="readonly">
                        <input type="hidden" class="form-control" name="SelGarmentFibreID1" id="SelGarmentFibreID1" />
                      </div>
                        
                      <div class="col-sm-1">%</div>
                      <div class="col-sm-2"><a href="javascript:;" class="btn btn-danger btn-xs removegarmentfibre">Remove</a>
                        </div>
                         </div>
                          <div class="row">    
                         <div class="col-sm-7" style="margin-bottom:10px;">
                       <input type="text" class="form-control selectedfabric"  name="SelectedGarmentFibre2" id="SelectedGarmentFibre2" readonly="readonly">
                           <input type="hidden" id="selectedGarmentfibID2" name="selectedGarmentfibID2" />
                       </div>  
                                        
                      <div class="col-sm-2">
                      <input type="text" class="form-control checkdecimal"  name="GarmentFibrePerc2" id="GarmentFibrePerc2" value="0" readonly="readonly">
                         <input type="hidden" class="form-control" name="SelGarmentFibreID2" id="SelGarmentFibreID2" />
                      </div>
                        
                      <div class="col-sm-1">%</div>
                      <div class="col-sm-2"><a href="javascript:;" class="btn btn-danger btn-xs removegarmentfibre">Remove</a>
                        </div>
                         </div>
                          <div class="row">    
                         <div class="col-sm-7" style="margin-bottom:10px;">
                       <input type="text" class="form-control selectedfabric"  name="SelectedGarmentFibre3" id="SelectedGarmentFibre3" readonly="readonly">
                           <input type="hidden" id="selectedGarmentfibID3" name="selectedGarmentfibID3" />
                       </div>  
                                        
                      <div class="col-sm-2">
                      <input type="text" class="form-control checkdecimal"  name="GarmentFibrePerc3" id="GarmentFibrePerc3" value="0" readonly="readonly">
                         <input type="hidden" class="form-control" name="SelGarmentFibreID3" id="SelGarmentFibreID3" />
                      </div>
                        
                      <div class="col-sm-1">%</div>
                      <div class="col-sm-2"><a href="javascript:;" class="btn btn-danger btn-xs removegarmentfibre">Remove</a>
                        </div>
                         </div>
                          <div class="row">    
                         <div class="col-sm-7" style="margin-bottom:10px;">
                       <input type="text" class="form-control selectedfabric"  name="SelectedGarmentFibre4" id="SelectedGarmentFibre4" readonly="readonly">
                           <input type="hidden" id="selectedGarmentfibID4" name="selectedGarmentfibID4" />
                       </div>  
                                        
                      <div class="col-sm-2">
                      <input type="text" class="form-control checkdecimal"  name="GarmentFibrePerc4" id="GarmentFibrePerc4" value="0" readonly="readonly">
                         <input type="hidden" class="form-control" name="SelGarmentFibreID4" id="SelGarmentFibreID4" />
                      </div>
                        
                      <div class="col-sm-1">%</div>
                      <div class="col-sm-2"><a href="javascript:;" class="btn btn-danger btn-xs removegarmentfibre">Remove</a>
                        </div>
                         </div>
                         
                          <div class="row">    
                         <div class="col-sm-7" style="margin-bottom:10px;">
                       <input type="text" class="form-control selectedfabric"  name="SelectedGarmentFibre5" id="SelectedGarmentFibre5" readonly="readonly" >
                           <input type="hidden" id="selectedGarmentfibID5" name="selectedGarmentfibID5" />
                       </div>  
                                        
                      <div class="col-sm-2">
                      <input type="text" class="form-control checkdecimal"  name="GarmentFibrePerc5" id="GarmentFibrePerc5" value="0" readonly="readonly">
                         <input type="hidden" class="form-control" name="SelGarmentFibreID5" id="SelGarmentFibreID5" />
                      </div>
                        
                      <div class="col-sm-1">%</div>
                      <div class="col-sm-2"><a href="javascript:;" class="btn btn-danger btn-xs removegarmentfibre">Remove</a>
                        </div>
                         </div>
                          <div class="row">    
                         <div class="col-sm-7" style="margin-bottom:10px;">
                       <input type="text" class="form-control selectedfabric"  name="SelectedGarmentFibre6" id="SelectedGarmentFibre6" readonly="readonly">
                           <input type="hidden" id="selectedGarmentfibID6" name="selectedGarmentfibID6" />
                       </div>  
                                        
                      <div class="col-sm-2">
                      <input type="text" class="form-control checkdecimal"  name="GarmentFibrePerc6" id="GarmentFibrePerc6" value="0" readonly="readonly">
                         <input type="hidden" class="form-control" name="SelGarmentFibreID6" id="SelGarmentFibreID6" />
                      </div>
                        
                      <div class="col-sm-1">%</div>
                      <div class="col-sm-2"><a href="javascript:;" class="btn btn-danger btn-xs removegarmentfibre">Remove</a>
                        </div>
                         </div>
                          <div class="row">    
                         <div class="col-sm-7" style="margin-bottom:10px;">
                       <input type="text" class="form-control selectedfabric"  name="SelectedGarmentFibre7" id="SelectedGarmentFibre7" readonly="readonly">
                           <input type="hidden" id="selectedGarmentfibID7" name="selectedGarmentfibID7" />
                       </div>  
                                        
                      <div class="col-sm-2">
                      <input type="text" class="form-control checkdecimal"  name="GarmentFibrePerc7" id="GarmentFibrePerc7" value="0" readonly="readonly">
                         <input type="hidden" class="form-control" name="SelGarmentFibreID7" id="SelGarmentFibreID7" />
                      </div>
                        
                      <div class="col-sm-1">%</div>
                      <div class="col-sm-2"><a href="javascript:;" class="btn btn-danger btn-xs removegarmentfibre">Remove</a>
                        </div>
                         </div>
                          <div class="row">    
                         <div class="col-sm-7" style="margin-bottom:10px;">
                       <input type="text" class="form-control selectedfabric"  name="SelectedGarmentFibre8" id="SelectedGarmentFibre8" readonly="readonly" >
                           <input type="hidden" id="selectedGarmentfibID8" name="selectedGarmentfibID8" />
                       </div>  
                                        
                      <div class="col-sm-2">
                      <input type="text" class="form-control checkdecimal"  name="GarmentFibrePerc8" id="GarmentFibrePerc8" value="0" readonly="readonly">
                         <input type="hidden" class="form-control" name="SelGarmentFibreID8" id="SelGarmentFibreID8" />
                      </div>
                        
                      <div class="col-sm-1">%</div>
                      <div class="col-sm-2"><a href="javascript:;" class="btn btn-danger btn-xs removegarmentfibre">Remove</a>
                        </div>
                         </div>
                        
                         </div> 
                          
                    </div>
                    
                    <div class="row">
                    
                    <div class="col-sm-6"><input type="button" name="addgarmentfibre" id="addgarmentfibre" class="btn savebtn" value="Select Fibre Content >>" onclick="AddGarmentFibre();"></div>
                    <div class="col-sm-2"></div>
                    <div class="col-sm-1">TOTAL:</div>
                    <div class="col-sm-2"><input type="text" id="GarmentFibrePerctotal" name="GarmentFibrePerctotal" class="form-control" readonly="readonly"  /></div>
                    <div class="col-sm-1"></div>
                    </div>
                          </div>
                          
                               <div class="modal-footer">
                               <button type="button" class="btn closebtn" onclick="garmentfacbricclosefunc();">Close</button>
                                <input type="button" name="symbolmaintenancesubmit" id="symbolmaintenancesubmit" class="btn savebtn" value="Save" onclick="garmentfibresaveclick();">
                               </div>
                               
                      
                                        
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>  
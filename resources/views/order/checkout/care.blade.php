
                                <div class="panel-body panel_orderlist">
                                  <?php foreach ($ProductDetails as $Productlist) {
                                  if($Productlist->carecount==1){ ?>
                                                            <div class="row margiontop">
                            <div class="col-xs-4"><h5 class="fontsize">Care Labels Order Details</h5></div>
                                     <div class="col-xs-6"> <img width="150px" height="150px" alt="image" class="img-square" style="margin-left: -45px;" src="{{ route('user.productpic', ['id' =>$Productlist->id]) }}"></div>
                             </div>
                                     
                                     
                                     
                                   
                                  <div class="step-content">
                        
                        
                        
                         <div class="row margiontop">
                                     <div class="col-xs-8 "><h5 class="sub_heading margiontop">Order Information</h5></div>
                                     
                                   <div class="col-xs-4 editdelicon" style="margin-top: 20px;">
                                    <div class="icons">
                                    <a href="javascript:;" class="btn btn-primary fa fa-edit" style="margin-right:10px;"> Edit</a>
                                    <a href="javascript:;" onclick="" class="btn btn-primary fa fa-trash-o"> Delete</a>
                                     
                                    </div>
                                   </div>
                                     </div> 
                       
                        
                          <div class="row" style="margin-top:20px;">
                                        
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <label class="col-xs-5 control-label font-noraml text-left">Contact Name</label>
                                    <div class="col-xs-7 control-label text-left font-bold">
                                                                        </div>
                                    
                            </div>
                           <div class="col-xs-12 col-sm-6 col-md-6">
                                    <label class="col-xs-5 control-label font-noraml text-left">Customer Name</label>
                                    <div class="col-xs-7 control-label text-left font-bold"> 
                                    Marks                                    </div>
                           </div>
                           
                          </div>
                          <div class="row margiontop">
                          <div class="col-xs-12 col-sm-6 col-md-6">
                                    <label class="col-xs-5 control-label font-noraml text-left">Region Name</label>
                                    <div class="col-xs-7 control-label text-left font-bold">
                                     <?php
$region = DB::table('productionregions')->where('id',$Productlist->productRegion)->first();
echo $region->ProductionRegions;
                                      ?>                                     </div>
                                  
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                    <label class="col-xs-5 control-label font-noraml text-left">Company Name</label>
                                    <div class="col-xs-7 control-label text-left font-bold">
                                     Marks                                    </div>
                                  
                            </div>
                            
                            </div>  
                           
                        
                        </div>
                                  
                                     
                                     
                                     
                                     
                            
                    
                    
                    <div class="step-content">
                                 
                                  
                                    
                                     <h5 class="sub_heading margiontop">Product Details</h5>
                                    
                                    
                                    <div class="row margiontop">
                                        
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <label class="col-xs-5 control-label font-noraml text-left">Marks PO Number</label>
                                    <div class="col-xs-7 control-label text-left font-bold">
                                     <?php echo $Productlist->poNumber; ?>                                    </div>
                                   </div>
                                   
                            
                            
                                        
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <label class="col-xs-5 control-label font-noraml text-left">PO Date</label>
                                    <div class="col-xs-7 control-label text-left font-bold">
                                     <?php echo $Productlist->poDate; ?>                                   </div>
                            </div>
                         
                           
                          </div>
                          
                            <div class="row margiontop">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                    <label class="col-xs-5 control-label font-noraml text-left">Style No</label>
                                    <div class="col-xs-7 control-label text-left font-bold"> 
                                    <?php echo $Productlist->styleNo; ?>                                    </div>
                           </div>
                           <div class="col-xs-12 col-sm-6 col-md-6">
                                    <label class="col-xs-5 control-label font-noraml text-left">Season</label>
                                    <div class="col-xs-7 control-label text-left font-bold"> 
                                    <?php
$table = DB::table('season')->where('id',$Productlist->season)->first();
echo $table->Season;
                                      ?>                                    </div>
                           </div>
                           
                          </div>
                                       
                            <div class="row margiontop">
                                        
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <label class="col-xs-5 control-label font-noraml text-left">Product Code</label>
                                    <div class="col-xs-7 control-label text-left font-bold">
                                     <?php echo $Productlist->CustomerProductCode; ?>                                 </div>
                            </div>
                            
                          
                                        
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <label class="col-xs-5 control-label font-noraml text-left">Product Description</label>
                                    <div class="col-xs-7 control-label text-left font-bold ">
                                      <?php echo $Productlist->Description; ?>                                  </div>
                            </div>
                            
                          </div>
                                        
                           
                           <div class="row margiontop">
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                    <label class="col-xs-5 control-label font-noraml text-left">Country of Origin:</label>
                                    <div class="col-xs-7 control-label text-left font-bold ">
                                   <?php echo $Productlist->countryOfOrigin; ?>                                    </div>
                                 </div>
                            
                          </div>  
                          
                       
                                
                  </div>
                    
                      <div class="step-content">
                                    
                        <h5 class="sub_heading margiontop">Care Instruction</h5> 
                        
                                                <div class="row margiontop">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Wash</label>
                                    <div class="col-lg-7 control-label text-left font-bold">
                                      <img src="{{url(route('product.symbolcolor', ['id' => $Productlist->careWash]))}}" width="30" height="30">
                                                                          </div>
                                    </div>
                            </div>
                           <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Bleach</label>
                                    <div class="col-lg-7 control-label text-left font-bold"> 
                                      <img src="{{url(route('product.symbolcolor', ['id' => $Productlist->careBleach]))}}" width="30" height="30">
                                                                         </div>
                                    </div>
                           </div>
                          </div>
                          <div class="row margiontop">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Iron</label>
                                    <div class="col-lg-7 control-label text-left font-bold">
                                      <img src="{{url(route('product.symbolcolor', ['id' => $Productlist->careIron]))}}" width="30" height="30">
                                                       </div>
                                    </div>
                            </div>
                           <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Dry Clean</label>
                                    <div class="col-lg-7 control-label text-left font-bold">           
                                      <img src="{{url(route('product.symbolcolor', ['id' => $Productlist->careDryClean]))}}" width="30" height="30">
                                                       </div>
                                    </div>
                           </div>
                          </div>
                          <div class="row margiontop">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Dry</label>
                                    <div class="col-lg-7 control-label text-left font-bold">
                                      <img src="{{url(route('product.symbolcolor', ['id' => $Productlist->careDry]))}}" width="30" height="30">
                                                                         </div>
                                    </div>
                            </div>
                            </div>
                            </div>
                            <div class="step-content">
                                    <h5 class="sub_heading margiontop">Fabric Composition </h5>
                                    
                                                                        <div class="row margiontop" align="center">
                  
                  <div class="col-lg-12">
                  </div>
                                    
                                    </div>
                                    
                         <?php $fi=0;$fabriccom=explode('#', $Productlist->fabricID);
                         $fabriccomper=explode('#', $Productlist->fabricComposition); ?>                                              
                                                    
                                    <div class="row margiontop">
                                    <div class="col-sm-12 ">
                                    <div class="form-group">
                                    <label class="col-lg-2 control-label font-noraml text-left"></label>
                                    <div class="col-lg-7 control-label font-noraml text-left">Garment Fibre </div>
                                 </div>
                               </div></div>
                                    <?php foreach ($fabriccom as $fabrictxt) { ?>
                                     
                                    
                                   <div class="row margiontopnew">
                                <div class="col-sm-12 ">
                                    <div class="form-group">
                                      <label class="col-lg-2 control-label font-noraml text-left"></label>
                                    <div class="col-xs-8 control-label text-left font-bold">
                                    <?php echo $fabrictxt; ?>                                   </div>
                                    
                                    <div class="col-xs-2 control-label text-left font-bold"><?php echo $fabriccomper[$fi]; ?></div>
                                    
                             </div>
                            </div>
                          </div>
                            <?php $fi++; } ?>                        
                           
                                          </div>
<?php if($Productlist->garmentID){ ?>
<div class="step-content">
                                    <h5 class="sub_heading margiontop">Garment Composition </h5>
                                    
                                                                       
                  <?php $gr=0;$dbgarmentID=explode('$', rtrim($Productlist->garmentID,'$'));
                         $dbgarmentfabricID=explode('$', $Productlist->garmentfabricID);
                  $dbgarmentfabricComposition=explode('$', $Productlist->garmentfabricComposition);
                         ?>
                         <?php foreach ($dbgarmentID as $dbgarmentIDvalue) { ?>
                           
                          <div class="row margiontop" align="center">
                  <div class="col-lg-12">
<h5 class="sub_heading margiontop"><?php echo 'Garment - '.str_replace('#',"",$dbgarmentIDvalue); ?></h5>
                  </div>
                                    
                                    </div>
                                    
                                                                       
                                                    
                                    <div class="row margiontop">
                                    <div class="col-sm-12 ">
                                    <div class="form-group">
                                    <label class="col-lg-2 control-label font-noraml text-left"></label>
                                    <div class="col-lg-7 control-label font-noraml text-left">Garment Fibre </div>
                                 </div>
                               </div></div>
                                    <?php $fi=0;
                                    $fabriccom=explode('#',$dbgarmentfabricID[$gr]);
                                    $fabriccomper=explode('#', $dbgarmentfabricComposition[$gr]);
                                     foreach ($fabriccom as $fabrictxt) {
                                     if($fabriccomper[$fi]){ ?>
                                     
                                    
                                   <div class="row margiontopnew">
                                <div class="col-sm-12 ">
                                    <div class="form-group">
                                      <label class="col-lg-2 control-label font-noraml text-left"></label>
                                    <div class="col-xs-8 control-label text-left font-bold">
                                    <?php echo $fabrictxt; ?>                                   </div>
                                    
                                    <div class="col-xs-2 control-label text-left font-bold"><?php echo $fabriccomper[$fi]; ?>%</div>
                                    
                             </div>
                            </div>
                          </div>
                            <?php } $fi++; } 
                            $gr++;} ?>                        
                           
                                          </div>
<?php } 

$jsonsizedetails=\App\Http\Controllers\OrderController::getsizedetails($Productlist->productID);

$sizedetails=json_decode($jsonsizedetails,true);
foreach ($sizedetails as $k=>$v){

 $orderSizebyLetter=explode('#',$v['SizebyLetter']);
    $orderSizebyNumber=explode('#',$v['SizebyNumber']);
    $orderBraSizes=explode('#',$v['BraSizes']);
    $orderToddlerSizes=explode('#',$v['ToddlerSizes']);
    $orderPantsSizes=explode('#',$v['PantsSizes']);

}
$sizesarray=explode('#',$Productlist->sizeQuanity);$sizeii=0;
?>
<table id="colortable" class="table table-bordered" style="background-color: white;">
                                              <thead>
                                                <tr>
                                              <th style="background-color: white;">Size</th>
                                              <th style="background-color: white;width: 350px;">Quantity</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <tr class="gradeX"><td class="" id="" colspan="2"><b>Size By Letter</b></td></tr>

                                            <?php foreach ($orderSizebyLetter as $Sizebyvalue) { ?>
                                            <tr class="gradeX"><td class="" id=""><?php echo $Sizebyvalue; ?></td><td><?php echo isset($sizesarray[$sizeii])?$sizesarray[$sizeii]:''; ?></td></tr>
                                            <?php $sizeii++; } ?>
                                          

                                            <tr class="gradeX"><td class="" id="" colspan="2"><b>Size By Number</b></td></tr>

                                            <?php foreach ($orderSizebyNumber as $Sizebyvalue) {?>
                                            <tr class="gradeX"><td class="" id=""><?php echo $Sizebyvalue; ?></td><td><?php echo isset($sizesarray[$sizeii])?$sizesarray[$sizeii]:''; ?></td></tr>
                                            <?php $sizeii++; } ?>

                                            <tr class="gradeX"><td class="" id="" colspan="2"><b>Bra Size</b></td></tr>

                                            <?php foreach ($orderBraSizes as $Sizebyvalue) {?>
                                            <tr class="gradeX"><td class="" id=""><?php echo $Sizebyvalue; ?></td><td><?php echo isset($sizesarray[$sizeii])?$sizesarray[$sizeii]:''; ?></td></tr>
                                            <?php $sizeii++; } ?>

                                            <tr class="gradeX"><td class="" id="" colspan="2"><b>Toddler Size</b></td>

                                           <?php foreach ($orderToddlerSizes as $Sizebyvalue) {?>
                                            <tr class="gradeX"><td class="" id=""><?php echo $Sizebyvalue; ?></td><td><?php echo isset($sizesarray[$sizeii])?$sizesarray[$sizeii]:''; ?></td></tr>
                                            <?php $sizeii++; } ?>

                                            <tr class="gradeX"><td class="" id="" colspan="2"><b>Pants Size</b></td></tr>

                                            <?php foreach ($orderPantsSizes as $Sizebyvalue) {?>
                                            <tr class="gradeX"><td class="" id=""><?php echo $Sizebyvalue; ?></td><td><?php echo isset($sizesarray[$sizeii])?$sizesarray[$sizeii]:''; ?></td></tr>
                                            <?php $sizeii++; } ?>

                                          </tbody>
                                        </table> 

                <div class="seperater"></div>
                        
                          
                                <?php } } ?>
                                  
                                              
                                               </div>
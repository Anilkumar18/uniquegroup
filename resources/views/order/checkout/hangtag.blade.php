
                                <div class="panel-body panel_orderlist">
                                  <?php foreach ($ProductDetails as $Productlist) {
                                  if($Productlist->HangTagscount==1){ ?>
                                                            <div class="row margiontop">
                            <div class="col-xs-4"><h5 class="fontsize">Hangtags Order Details</h5></div>
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
                                        
                          
                       
                                
                  </div>
                    
                      
                <div class="seperater"></div>
                        
                          
                                <?php } } ?>
                                  
                                              
                                               </div>
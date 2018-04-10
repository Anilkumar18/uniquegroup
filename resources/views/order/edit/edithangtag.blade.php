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
                                            <h4><span class="productitemcode"><?php echo $Productdetails->UniqueProductCode; ?></span></h4>
                                            </div>
                                        </div>
                                     </div>
                                  
                                  <h2>Product Details</h2>


                                   <span id="imgsrc" style="display: none;">{{ route('user.productpic', ['id' =>'']) }}</span>


                                    <div class="row">
                                    
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <div class="col-sm-12s"><label>Marks PO Number *</label></div>
                                            <div class="col-sm-12s" id="frmCheckUsername"><input id="ponumber" name="poNumber" type="text" class="form-control required" value="<?php echo isset($Orderdetails->poNumber)?$Orderdetails->poNumber:''; ?>"></div>
                                           </div>
                    </div>

                                          <div class="col-lg-4">
                         <div class="form-group" id="data_1">
                                <label>PO Date *</label>
                                <div class="input-group date>">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input name="poDate" type="text" class="form-control" value="<?php echo isset($Orderdetails->poDate)?$Orderdetails->poDate:date('m/d/Y', time()); ?>" <?php echo isset($Orderdetails->poDate)?'readonly="readonly"':''; ?>>
                                </div>
                            </div>
                                        </div>
                                             
                                              <div class="col-lg-4">
                      <div class="form-group">
                                               
                                                <label>Quantity *</label>
                                                <input id="quantity" name="quantity" type="text" class="form-control required quantitycls" value="?php echo isset($Orderdetails->sizeQuanity)?$Orderdetails->sizeQuanity:''; ?>">
                                               
                                              </div>
                                              
                                        </div>
                                        
                                        </div>
                                       
                                       
                                       <div class="row">
                                       
                                       <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Style No *</label>
                                            <input id="styleNo" name="styleNo" type="text" class="form-control" value="<?php echo isset($Orderdetails->styleNo)?$Orderdetails->styleNo:''; ?>" >
                                           </div>
                    </div>   
                                        
                                       <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Season *</label>
                                                <?php 
                                                
$seasonID=isset($Orderdetails->season)?$Orderdetails->season:''; 
                                                  ?>
                                                 <select name="season" class="dropdownwidth" id="season">
                                                  @foreach($seasondetails as $seasonlist)
                                          <option value="{{$seasonlist->id}}" @if($seasonID==$seasonlist->id) selected="selected" @endif>{{$seasonlist->Season}}</option>
                                            @endforeach
                                           </select>

                                                
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
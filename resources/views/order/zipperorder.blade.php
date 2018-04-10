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


                                   <span id="zipperimgsrc" style="display: none;">{{ route('product.zippercolor', ['id' =>'']) }}</span>


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
                                       </div>

                                       <div class="row">
                                        <div class="col-lg-12">
                                            <div class="text-center">
                                              <div id="productimg"><img src="" style="margin-top: 25px; height:auto; border:solid 1px #1AB394"></div> 
                                               
                                            </div>
                                        </div>
                                    </div>  
                                </fieldset>
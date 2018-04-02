 <h1>Product Details</h1>
                                <fieldset>
                                   
                                <div class="row">
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <h4><label>Item Code : </label></h4>
                                            </div>
                                        </div>
                                        <div class="col-lg-4" style="margin-left: -100px;">
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
                                            <div class="col-sm-12s" id="frmCheckUsername"><input id="ponumber" name="ponumber" type="text" class="form-control required" value=""></div>
                                           </div>
                    </div>

                                         <div class="col-lg-4">
                         <div class="form-group" id="data_1">
                                <label>PO Date *</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" value="<?php echo date('m/d/Y', time()) ?>">
                                </div>
                            </div>
                                        </div>
                                          <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Style No *</label>
                                            <input id="styleNo" name="styleNo" type="text" class="form-control" value="">
                                           </div>
                    </div>   
                                             
                                        
                                        </div>
                                       
                                       
                                       <div class="row">
                                       
                                       
                                        
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Season *</label>
                                            <input id="season" name="season" type="text" class="form-control" value="" onkeyup="">
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
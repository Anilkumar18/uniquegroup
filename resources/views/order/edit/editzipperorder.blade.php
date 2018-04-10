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


                                   <span id="zipperimgsrc" style="display: none;">{{ route('product.zippercolor', ['id' =>'']) }}</span>


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
                                                <label>Style No *</label>
                                            <input id="styleNo" name="styleNo" type="text" class="form-control" value="<?php echo isset($Orderdetails->styleNo)?$Orderdetails->styleNo:''; ?>" >
                                           </div>
                    </div>   
                                             
                                        
                                        </div>
                                       
                                       
                                       <div class="row">
                                       
                                       
                                        
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
                                              <div id="productimg">
                                                <?php

//echo '<pre>';print_r($caredetails);echo '</pre>';
foreach ($productzippercolor as $k=>$v){

   
    $zipcolorid=$v['zipcolorid'];
    $zipcolorcolor=$v['zipcolorcolor'];
}
                    ?>
                                                <table id="colortable" class="table table-bordered" style="background-color: white;">
                                                  <thead>
                                                    <tr>
                                                      <th style="background-color: white;">Picture</th>
                                                      <th style="background-color: white;width: 350px;">Colour</th>
                                                      <th style="background-color: white;">Quantity</th></tr>
                                                    </thead>
                                                    <tbody>
<?php $sizesarray=explode('#', $Orderdetails->sizeQuanity); ?>
                                                      <?php $zi=0;
                                                            foreach ($zipcolorid as $zipcolor){ ?>
                                                              <tr class="gradeX"><td class="zippercolorimg colorimg" id="colorimg"><img width="200px" height="30px" src="{{ route('product.zippercolor', ['id' =>$zipcolor]) }}"></td><td><input id="zipperColor" name="zipperColor[]" type="hidden" class="form-control" value="<?php echo $zipcolor; ?>"><?php echo $zipcolorcolor[$zi]; ?></td><td><input id="quantity" name="sizeQuanity[]" type="text" class="form-control quantitycls" value="<?php echo $sizesarray[$zi]; ?>"></td></tr>
   
  
<?php $zi++; } ?>
                                                    
                                                      

                                                      
                                                    </tbody></table>
                                              </div> 
                                               
                                            </div>
                                        </div>
                                    </div>  
                                </fieldset>
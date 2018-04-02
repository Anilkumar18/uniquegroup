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
                                                <label>Enter Style No *</label>
                                            <input id="styleNo" name="styleNo" type="text" class="form-control" value="">
                                           </div>
                    </div>
                                        
                                        </div>
                                       
                                       
                                       <div class="row">
                                       
                                       <input type="hidden" name="careenable" id="careenable" value="1">
                                        
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Season *</label>
                                            <input id="season" name="season" type="text" class="form-control" value="" onkeyup="">
                                           </div>
										</div>
                    @if($carestatus==1)
                    <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Country of Origin:</label>
                                            <input id="countryoforigin" name="countryoforigin" type="text" class="form-control" value="" onkeyup="">
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
                                        <div class="col-lg-4" style="margin-left: -100px;">
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
                                    
                                            <label for="18"><input type="radio" id="" name="<?php echo strtolower(str_replace(' ','_', $symboltype->symboltypes)); ?>" value="" class="valid">{{$symboldesc->descriptionEnglish}}                                       </label>
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
                                        <div class="col-lg-4" style="margin-left: -100px;">
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
<?php

$type='fabriccomposition';
$processlan=explode(',', $co);
foreach ($processlan as $lanvalue) {
     $languset=$type.strtolower($lanvalue);

     $table=$languset;
                $fabfielddetailslist[] = DB::table($table)->get();
                
} $i=0;
foreach ($fabfielddetailslist as $typekey => $fabtypevalue) {
   if($type=='fabriccomposition'){

        foreach ($fabtypevalue as $key => $value) {
          
         $fabprocessdetails[$i][]=$value->FabricComposition;
        }
    }
    

    $i++;
    
}
//echo '<pre>';print_r($processdetails);echo '</pre>';
//cho  count($processdetails);
$arraylen=0;
for ($i=0; $i <count($fabprocessdetails) ; $i++) { 
    if(count($fabprocessdetails[$i])>$arraylen){$arraylen=count($fabprocessdetails[$i]);}
}

for ($i=0; $i < $arraylen; $i++) { 
    $detaillist='';
for ($j=0; $j <count($fabprocessdetails) ; $j++) { 
    $detaillist.=isset($fabprocessdetails[$j][$i])?$fabprocessdetails[$j][$i].'/':'';
    
}

    $fabriccomposition[]=rtrim($detaillist,'/');
}

?>
<div class="row margiontop">
                                       <div class="col-lg-3">
                                       <div class="form-group" style="padding-left:0px;">
                                            <label for="materical_select">
                                            <input type="checkbox" id="materical_select" name="materical_select" value="Fibre" class="materical_select">&nbsp;&nbsp;<strong>Select Fibre Contents</strong></label>
                                            
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
<div class="row garmentdetails" style="display: none;">
<div class="col-md-12">
<select name="GarmentComponents" class="GarmentComponents dropdownwidth" id="GarmentComponents">
  <option>Plaese Select</option>
  @foreach($garmentcomponents as $garmentdetails)
<option value="{{$garmentdetails}}">{{$garmentdetails}}</option>
  @endforeach
</select>
</div>
<div class="col-md-5">

  </div>
</div>
<div class="col-lg-12 fabricdetails" style="display: none;">
  <div class="col-md-5 listbox listleft">
@foreach($fabriccomposition as $fabricdetails)
<div class="col-lg-12"><label><input type="checkbox" value="{{$fabricdetails}}" name="fabriccomposition" id="moveleft" class="moveLeftblk">{{$fabricdetails}}</label><input type="text" name="fabriccomposition[]" class="compositionblk"></div>
@endforeach

    </div>
    <div class="subject-info-arrows text-center col-md-2"><input type="button" id="moveAllRight" class="1moveAllRight" onclick="fillmoveAllRight(this)" value=">>"><br><input type="button" id="moveRight" class="1moveRight" onclick="fillmoveRight(this)" value=">"><br><input type="button" id="moveLeft" class="1moveLeft" onclick="fillmoveLeft(this)" value="<"><br><input type="button" id="moveAllLeft" class="1moveAllLeft" onclick="fillmoveAllLeft(this)" value="<<"></div>
    <div class="col-md-5 listbox listright"></div></div><div class="col-lg-12 fabricdetails" style="display: none;"><div class="col-lg-6"></div><div class="col-lg-6">Total<input type="text" name="totalcompositionpercenatge" id="totalcompositionpercenatge" class="form-control totalcompositionpercenatge" value="">%<input type="hidden" id="percen100" class="percen100" value="100"></div></div>

<div class="col-md-12">
<div class="garmentcomponentsblk"></div>
</div>
                                </fieldset>

                                @endif
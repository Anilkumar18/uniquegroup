<h4 style="color:#00ADEF;"><strong>HEATTRANSFER DETAILS</strong></h4>
<input type="hidden" name="heattransfer_editID" id="heattransfer_editID" value="{{$heattransferdetails->id}}"  />

<div class="row wrapper wrapper-content animated fadeInRight" id="boxform" style="display:block;">

  <div class="ibox float-e-margins">
  
      <div class="ibox-content">
      
        <div class="table-responsive" style="overflow:hidden">
        <!--form name="productdetailsadd" id="productdetailsadd" method="post" action="{{ url(route('user.add_productsgroupdetails')) }}" class="form-horizontal" enctype="multipart/form-data"-->
        <input type="hidden" name="region_url" id="region_url" value="<?php echo url('/');?>" />
           <div class="modal-body">
            <div class="col-sm-12 b-r">
             <?php
        $i=1;
        $j=1;


        ?>
             @foreach($productdevelopmentfields as $list)
             
              <div class="form-group frmgroup">
               
                  <!--check dropdown and textbox to display in forms starts here-->
                @if($list->dropdown!="")
                <?php
        $table=$list->tablename;
        $fielddetailslist = DB::table($table)->get();
        $fieldname=$list->columnfieldname;
        $listoffieldname=$list->fieldname;


        ?>
                
                @if($list->columnfieldname=="TypeofLabels")
                
                <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5">
                
                        <select id="{{$fieldname}}" name="{{$fieldname}}" class="form-control dropdownwidth">
                        <option value="">Please Select</option>
                         @foreach ($fielddetailslist as $fielddetails)
                           
                         <option value="{{$fielddetails->id}}"  @if($heattransferdetails->TypeofLabelID==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                           @endforeach
                                            
                        </select>
                       
                </div>   
                 
                </div>
                  @elseif($list->columnfieldname=="TypeofHeatTransferName")
                
                <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5">
                
                        <select id="{{$fieldname}}" name="{{$fieldname}}" class="form-control dropdownwidth">
                        <option value="">Please Select</option>
                         @foreach ($fielddetailslist as $fielddetails)
                           
                         <option value="{{$fielddetails->id}}"  @if($heattransferdetails->TypeofHeatTransfer==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                           @endforeach
                                            
                        </select>
                       
                </div>   
                 
                </div>
                  @elseif($list->columnfieldname=="HeatTransferFinish")
                
                <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5">
                
                        <select id="{{$fieldname}}" name="{{$fieldname}}" class="form-control dropdownwidth">
                        <option value="">Please Select</option>
                         @foreach ($fielddetailslist as $fielddetails)
                           
                         <option value="{{$fielddetails->id}}"  @if($heattransferdetails->FinishID==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                           @endforeach
                                            
                        </select>
                       
                </div>   
                 
                </div>
                   
                    @elseif($list->columnfieldname=="ApplicationName")
                
                <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5">
                
                        <select id="{{$fieldname}}" name="{{$fieldname}}" class="form-control dropdownwidth">
                        <option value="">Please Select</option>
                         @foreach ($fielddetailslist as $fielddetails)
                           
                         <option value="{{$fielddetails->id}}"  @if($heattransferdetails->ApplicationName==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                           @endforeach
                                            
                        </select>
                       
                </div>   
                 
                </div>
                 
                  @elseif($list->columnfieldname=="Currency")
                
                <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5">
                
                        <select id="{{$fieldname}}" name="box{{$fieldname}}" class="form-control dropdownwidth">
                        <option value="">Please Select</option>
                         @foreach ($fielddetailslist as $fielddetails)
                           
     <option value="{{$fielddetails->id}}"  @if($heattransferdetails->Currency==$fielddetails->id)selected="selected" @endif>{{$fielddetails->$fieldname }}</option>
                           @endforeach
                                            
                        </select>
                       
                </div>   
                 
                </div>
                @elseif($listoffieldname=="Production Region 1")
                  <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5">
                
                  <select id="{{$fieldname}}1" name="{{$fieldname}}1" class="form-control dropdownwidth regionselect">
                <option value="">Please Select</option>
                 @foreach ($fielddetailslist as $fielddetails)
                   
                 <option value="{{$fielddetails->id}}" @if($heattransferdetails->ProductionRegionID1==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                   @endforeach
                                    
                </select>
                       
                </div>   
                 
                </div>
               
                 @elseif($listoffieldname=="Unique Factory 1")
                  <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                  <div class="col-lg-5 uniquefactory1 factoryselect">
                
                   <select id="uniquefactory1" name="uniquefactory1[]" class="form-control dropdownwidth ">
                <option value="">Please Select</option>
                          
                </select>
                </div>   
                        <input type="hidden" id="SelUniquefactory1" class="SelUniquefactory" name="SelUniquefactory1" value="{{$heattransferdetails->UniqueFactory1}}" /> 
                 
                </div>
                 @elseif($listoffieldname=="Production Region 2")
                  <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5">
                
                        <select id="{{$fieldname}}2" name="{{$fieldname}}2" class="form-control dropdownwidth regionselect">
                <option value="">Please Select</option>
                 @foreach ($fielddetailslist as $fielddetails)
                   
                 <option value="{{$fielddetails->id}}" @if($heattransferdetails->ProductionRegionID2==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                   @endforeach
                                    
                </select>
                       
                </div>   
                 
                </div>
                
                 @elseif($listoffieldname=="Unique Factory 2")
                  <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                  <div class="col-lg-5 uniquefactory2 factoryselect">
                
                 <select id="uniquefactory2" name="uniquefactory2[]" class="form-control dropdownwidth ">
                <option value="">Please Select</option>  
                </select>
                       <input type="hidden" id="SelUniquefactory2" class="SelUniquefactory" name="SelUniquefactory2" value="{{$heattransferdetails->UniqueFactory2}}" /> 
                </div>   
                 
                </div>
                 @elseif($listoffieldname=="Production Region 3")
                  <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                   <div class="col-lg-5">
                
                        <select id="{{$fieldname}}3" name="{{$fieldname}}3" class="form-control dropdownwidth regionselect">
                <option value="">Please Select</option>
                 @foreach ($fielddetailslist as $fielddetails)
                   
                 <option value="{{$fielddetails->id}}" @if($heattransferdetails->ProductionRegionID3==$fielddetails->id)selected="selected" @endif>{{ $fielddetails->$fieldname }}</option>
                   @endforeach
                                    
                </select>
                       
                </div>   
                 
                </div>
                 
                 @elseif($listoffieldname=="Unique Factory 3")
                  <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                  <div class="col-lg-5 uniquefactory3 factoryselect">
                
                 <select id="uniquefactory3" name="uniquefactory3[]" class="form-control dropdownwidth ">
                <option value="">Please Select</option>  
                </select>
                    <input type="hidden" id="SelUniquefactory3" name="SelUniquefactory3" class="SelUniquefactory" value="{{$heattransferdetails->UniqueFactory3}}" />   
                </div>   
                 
                </div>
                
                @endif

                @elseif($list->checkbox!="" && $list->columnfieldname=="QualityReference")
             <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                
                      <input type="text" name="qty_ref" id="{{$list->columnfieldname}}" value="{{$heattransferdetails->Qualityreference}}" class="form-control qty_refbtn"/>                   

                  <input type="checkbox" name="qty_chk" id="qty_chk" class="qty_checkbox" value="1" @if($heattransferdetails->Qualityreferencem==1) checked="checked" @endif />
                    @if($list->checkboxvalue!="")
                    <p  class="aspersample">{{$list->checkboxvalue}}</p>
                       @endif

                </div>
                </div>
   
                 @elseif($list->columnfieldname=="Width")
                 <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                
                      <input type="text" name="Width" id="Width" value="{{$heattransferdetails->Width}}" class="form-control boxthickwidheightcls"/>                   
              
                </div>
                </div>
               
                 @elseif($list->columnfieldname=="Length")
                 <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                
                      <input type="text" name="Length" id="Length" value="{{$heattransferdetails->Length}}" class="form-control boxthickwidheightcls"/>                   
              
                </div>
                </div>
                <!-- Defect:pdf march:page11
               //Vidhya: PHP Team
               //ADd 2 fields -->
                @elseif($list->columnfieldname=="heat_Samplecost")
                 <div class="printcolorhidden">
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                
                      <input type="text" name="heat_Samplecost" id="heat_Samplecost" value="{{$heattransferdetails->SampleCost}}" class="form-control boxthickwidheightcls"/>                   
              
                </div>
                </div>
                <!-- Defect:pdf march14:page5
               //Vidhya: PHP Team
               //Yes, No alignment -->
                
                 @elseif($list->uploadimage!="")
                 <div class="printcolorhidden">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname}}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 
                  <div class="col-lg-5">
                 <input type="file" class="fbfile3" name="imgInp3" id="imgInp3" value="{{$heattransferdetails->Artwork}}"onchange="uploadimageselect(this,'heatimagelist');"/>
                 <input type="hidden" name="selectimage3" id="selectimage3" class="form-control selectimage" value="{{$heattransferdetails->Artwork}}" readonly="readonly">
                  <input type="hidden" name="selectimageid3" id="selectimageid3" class="form-control" value="{{$heattransferdetails->id}}" readonly="readonly">
                  </div>
                   
                   
               </div>
             
                
                 <div class="printcolorhidden">
                <label class="col-lg-2 control-label font-noraml text-left label_font"></label>
                 
                  <div class="col-lg-5" id="selimage3">
                  
                  <input type="hidden" id="existingboximage" name="existingboximage" value="{{$heattransferdetails->Artwork}}" />
                  
                     
                <img id="blah3" src="storage/data/product/" alt="" width="80" height="80" /> 
               
              
             <img id="heatimagelist" src="{{ route('user.heattransferpic', ['id' => $heattransferdetails->id]) }}" alt="your image" width="80" height="80" />
                 
                 
               
                </div> 
                   
               </div>

             
             @elseif($list->columnfieldname=="PrintColor1")
              <div class="printcolorhidden" style="display:block;" id="printcolor1">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}"  value="{{$heattransferdetails->PrintColor1}}" class="form-control" />
                 </div>
             </div>
              @elseif($list->columnfieldname=="PrintColor2")
              <div class="printcolorhidden" style="display:block;" id="printcolor2">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}" 
                     value="{{$heattransferdetails->PrintColor2}}" class="form-control" />
                 </div>
             </div>
              @elseif($list->columnfieldname=="PrintColor3")
              <div class="printcolorhidden" style="display:block;" id="printcolor3">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}" 
                      value="{{$heattransferdetails->PrintColor3}}" class="form-control" />
                 </div>
             </div>
              @elseif($list->columnfieldname=="PrintColor4")
              <div class="printcolorhidden" style="display:block;" id="printcolor4">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}" value="{{$heattransferdetails->PrintColor4}}"  class="form-control" />
                 </div>
             </div>
            
             @elseif($list->columnfieldname=="heat_samplecost")
              <div class="printcolorhidden" style="display:none;overflow:hidden;" id="printcolor8">
                <label class="col-lg-2 control-label font-noraml text-left label_font">{{$list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}"
                     value="{{$heattransferdetails->Tissue_Samplecost}}"   class="form-control" />
                 </div>
             </div>

              @elseif($list->columnfieldname=="LanguageName")

<?php if($list->checkbox!="" && $list->tablename!=''){
                  //TasK: To pass Language
            //Done by Rajesh
            //Date :19032018
                  $table=$list->tablename;
                $fielddetailslist = DB::table($table)->get();
                $fieldname=$list->columnfieldname;
                $listoffieldname=$list->fieldname;

        
                 ?>
                   <div class="printcolorhidden <?php echo strtolower($list->columnfieldname).'blk'; ?>" <?php if($list->hide==2){?> style="display: none;" <?php } ?>><label class="col-lg-2 control-label font-noraml text-left label_font"><?php echo $listoffieldname; ?>:<?php if($list->isvalid==1) {?><span class="required">*</span><?php } ?></label>
                   <div class="col-lg-10">
                      <?php 
$languagecheckbox=explode("#",$heattransferdetails->LanguageID);

                      foreach ($fielddetailslist as $fielddetails){ ?>
                            
              
                         
<?php $processlan=explode('/', $fielddetails->$fieldname);$languset='';
foreach ($processlan as $lanvalue) {
  $languset.=strtoupper(substr($lanvalue, 0, 3)).',';
}
 ?><div class="col-lg-4">
              <input type="checkbox" name="<?php echo $list->columnfieldname; ?>[]" id="<?php echo $list->columnfieldname;?>" data-lang="<?php echo rtrim($languset,','); ?>" value="<?php echo $fielddetails->id; ?>" class="<?php echo strtolower($list->columnfieldname); ?>" <?php 
         


 if(in_array($fielddetails->id,$languagecheckbox))
        {
        echo "checked=checked";  
        }

               ?> /><p class="spanval label_font"><?php echo $fielddetails->$fieldname; ?></p>
              </div>
                          <?php }  ?>

               </div></div>
        <?php
                }
                   ?>
               
       
                @else
                 <label class="col-lg-2 control-label font-noraml text-left label_font">{{ $list->fieldname }}:@if($list->isvalid==1)<span class="required">*</span>@endif</label>
                 <div class="col-lg-5">
                     <input type="text" name="{{$list->columnfieldname}}" id="{{$list->columnfieldname}}"  class="form-control" />
                 </div>
                
                @endif
                
                
              </div>
              @endforeach
              
             
              
             <input type="hidden" name="valcountryoforigin" id="valcountryoforigin" value="{{$heattransferdetails->CountryofOriginID}}">


<input type="hidden" name="valsizes" id="valsizes" value="{{$heattransferdetails->SizeRangeID}}">

<input type="hidden" name="exclusiveoftrim" id="exclusiveoftrim" value="{{$heattransferdetails->ExclusiveofTrimmings}}">
<input type="hidden" name="exclusiveofdec" id="exclusiveofdec" value="{{$heattransferdetails->ExclusiveofDecoration}}">
<input type="hidden" name="exclusiveoffind" id="exclusiveoffind" value="{{$heattransferdetails->ExclusiveofFindings}}">
<input type="hidden" name="firewarninglabl" id="firewarninglabl" value="{{$heattransferdetails->FireWarningLabel}}">

<div class="printcolorhidden">
      <div class="careinformation"></div>
   </div> 
              
              
       
              
            </div>
            
           
            
          </div>
        
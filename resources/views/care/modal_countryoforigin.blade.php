<div class="modal inmodal" id="myModal2" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                <div class="modal-content animated bounceInRight">
                                 <div class="chain_bg">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" onclick="close_form()">
                                            <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            
                                            <h4 class="modal-title title_bar">Country of Origin Maintenance</h4>
                                           <p>Just fill in your country of origin details and we'll help you..</p>
                                        </div>
                                        <?php
										//echo "customerid".$customerID;
										?>
                                        
                                        <form name="countryoforiginadd" id="countryoforiginadd" method="post" action="{{url(route('ecommercemaintenance.addnewcoo'))}}" class="form-horizontal">
                                          {{ csrf_field() }}
                                        
                                        <div class="modal-body">
                                        
                                        <div class="row">
                                    <?php $customer=App\Customers::where('id',$customerID)->get(); ?> 
                                <!--<div class="col-sm-6 ">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Customer</label>
                                    <div class="col-lg-7">
                                     
                    
                              
                            <!--<select name="CustomerID" id="CustomerID" class="form-control">
                               <option value="">Please select a Customer Store</option>
                               @foreach($customer as $listnew)
                               <option value="{{$listnew->id}}">{{$listnew->CustomerName}}</option>
                                @endforeach
                             
                             
                              </select>-->
                              
                                    <!--/div>
                                    </div>
                            </div>-->
                            
                            
                           
                            
                             </div>
                          
                          <div class="row">
                          
                          
                          
                            <!-- <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Country ID</label>
                                    <div class="col-lg-7"> 
                                  <input type="text" name="countryID" id="countryID" placeholder="Country ID" class="form-control">
                                    </div>
                                    </div>
                           </div> -->
                           
                          <!--<div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left"> Country ISO Code - Numeric</label>
                                    <div class="col-lg-7"> 
                                  <input type="text" name="countryCode" id="countryCode" placeholder="Country code" class="form-control">
                                    </div>
                                    </div>
                           </div>-->
                           
                          
                           
                            
                           
                          </div>
                          
                           
                         
                           
                           <div class="row">
                           
                          @foreach($carelanguage as $languagelist)
                          @if($languagelist->status!=0)
                           <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - {{$languagelist->LanguageName}}</label>
                                    <div class="col-lg-7">
                                   <textarea name="{{$languagelist->LanguageName}}Desc" id="{{$languagelist->LanguageName}}Desc" placeholder="Description {{$languagelist->LanguageName}}" class="form-control"></textarea>
                                   
                                   <input type="hidden" name="fieldlist[]" id="fieldlist" value="{{$languagelist->LanguageName}}" />
                                    </div>
                                    </div>
                           </div>
                          @endif
                           
                            @endforeach
                           
                          </div>
                        
                          
                          
                           
                         
                               </div>
                              
                                         
                                        <div class="modal-footer">
                               <button type="button" class="btn closebtn" data-dismiss="modal" onclick="close_form()">Close</button>
                                <input type="submit" name="countrysubmit" id="countrysubmit" class="btn savebtn" value="Save">
                               </div>
                               
                                        </form>
                                        
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
@extends('ecommercemaintenance.layouts.countryoforigin')

@section('content')

<div class="wrapper wrapper-content animated fadeInRight">
<div class="col-lg-12">

          <div class="logoutSucc">



                     @if (session('success'))

                    <div class="alert alert-success" role="success">

                    <span class="fa fa-exclamation-circle" aria-hidden="true"></span>

                    {{ session('success') }}

                    </div>

                    @endif



                    @if (session('failure'))

                    <div class="alert alert-danger" role="danger">

                    <span class="fa fa-exclamation-circle" aria-hidden="true"></span>

                    {{ session('failure') }}

                    </div>

                    @endif



          </div>

                </div>
                <div class="row">
<?php $customer=\App\Customers::where('id', $customerid)->get(); ?>    
<div class="col-lg-12">


                <div class="col-lg-12 clsaddnewvendorform">

            <div class="row">

                <div class="col-lg-12">

                <div class="ibox float-e-margins">

                    <div class="ibox-title">
                        <div class="col-lg-8">
                    <h2>Country Of Origin Maintenance</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="">Home</a>
                        </li>
                        @foreach($customer as $customername)
                        <li>
                            Customer Name ::  <strong>{{$customername->CustomerName}}</strong>
                         </li>
                         @endforeach
                        
                        <li class="active">
                            <strong>Country Of Origin Maintenance</strong>
                        </li>
                        
                       
                    </ol>
                    
                  
                </div>
                       <div class="title-action">
                        <a href="" class="btn btn-primary fa fa-plus addnewlabelprint" data-toggle="modal" data-target="#myModal"> Add New Country of Origin</a>
                    </div> 

                    </div>

                    <div class="ibox-content">

                        <form name="thisForm" id="thisForm" method="post" action="">

                             {{ csrf_field() }}

                        <div class="table-responsive">

                     
                    <table id="example" class="table table-striped table-bordered table-hover dataTables-example">

                   <!--   <h5>View all |&nbsp;Export Results-Excel File| &nbsp;<a href="javascript:window.print();">Print Current Page</a></h5>-->
                   
                    <thead>

                    <tr>

                       <!-- <th><input name="select_all" value="1" type="checkbox"></th>-->

                       <!-- <th class="customer_th">Country ID</th>   -->                     

                        
                        <th>Customer Name</th>
                                                                                   
                        <th>Description English</th>
                        <th>Description French</th>
                        
                        
                        <th class="action_th">Actions</th>
                        <th class="action_th">Status</th>

                   
                    </tr>


                    </thead>

                    <tbody>
                   @foreach($coodetails as $coolist)
                    <tr>
                       <?php
$customer=\App\Customers::where('id', $coolist->customerID)->first();
                     ?>
                   <!-- <td>{{$coolist->id}}</td>-->
                    <td>{{$customer->CustomerName}}</td>
                    <td>{{$coolist->descEnglish}}</td>
                    <td>{{$coolist->descFrench}}</td>
                    
                    <td>

                        <a class="viewcoodetails" data-href="{{ url('/') }}" data-selecthref="{{ route('ecommercemaintenance.editcoodetails', ['id' => $coolist->id]) }}" data-toggle="modal" data-valueid="{{ $coolist->id }}" data-target="#myModal2"><img src="{{ asset('/img/view.png') }}" border="0"  title="View"/></a>

                        <a class="editcoodetails" data-href="{{ url('/') }}" data-selecthref="{{ route('ecommercemaintenance.editcoodetails', ['id' => $coolist->id]) }}" data-toggle="modal" data-valueid="{{ $coolist->id }}" data-target="#myModal"><img src="{{ asset('/img/edit.png') }}" border="0"  title="Edit"/></a> 

                       

                        

                        <a class="deletecoo" data-href="{{ url(route('ecommercemaintenance.coodelete', ['id' => $coolist->id])) }}"><span  data-valueid="{{ $coolist->id }}"><img  src="{{ asset('/img/delete.png') }}" border="0"  title="Delete"/></a>

                          @if ($coolist->status==0)
                        
                        <span class="activatecoo"><a data-href="{{ url(route('ecommercemaintenance.cooactivenew',['id' => $coolist->id])) }}"><img  src="{{ asset('/img/active.png') }}" border="0"  title="Activate"/></a></span> 
                        @else
                         <span class="deactivatecoo"><a data-href="{{ url(route('ecommercemaintenance.coodeactivenew',['id' => $coolist->id])) }}"><img  src="{{ asset('/img/deactive.png') }}" border="0"  title="Deactivate"/></a></span> 
                         @endif

                                           

       

                        </td>
                        <td>
                  @if ($coolist->status==1)
                          <img  src="{{ asset('/img/active.gif') }}" border="0"  title="Active"/>
                          @else
                          <img  src="{{ asset('/img/deactive.gif') }}" border="0"  title="Deactive"/>
                          @endif 
                    </td>
                    
                    </tr>
                     @endforeach  
                    
                    </tbody>
                    

                    <tfoot>

                    


                    </tfoot>

                  

                                        </table>

                    </div>

                    </form>

          </div>

      </div>

     </div>

  </div>
</div>
</div>
</div>
</div>           
                            
                            
                            <div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                <div class="modal-content animated bounceInRight">
                                 <div class="chain_bg">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" onclick="close_form()">
                                            <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            
                                            <h4 class="modal-title title_bar">Country of Origin Maintenance</h4>
                                           <p>Just fill in your country of origin details and we'll help you..</p>
                                        </div>
                                        
                                        <form name="countryadd" id="countryadd" method="post" action="{{url(route('ecommercemaintenance.addnewcoo'))}}" class="form-horizontal">
                                          {{ csrf_field() }}
                                        
                                        <div class="modal-body">
                                        
                                        <div class="row">
                                    <?php $customer=\App\Customers::where('id', $customerid)->get(); ?> 
                                <div class="col-sm-6 ">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Customer</label>
                                    <div class="col-lg-7">
                                     
                    
                              
                               <select name="CustomerID" id="CustomerID" class="form-control">
                               <option value="">Please select a Customer Store</option>
                               @foreach($customer as $listnew)
                               <option value="{{$listnew->id}}">{{$listnew->CustomerName}}</option>
                                @endforeach
                             
                             
                              </select>
                              
                                    </div>
                                    </div>
                            </div>
                            
                            <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Suspended Care Phrase?</label>
                                    <div class="col-lg-7">
                                  <select name="suspendedCarePhrase" id="suspendedCarePhrase" class="form-control">
                                    <option value="1">No</option>
                                    <option value="0">Yes</option>
                                    </select>
                                    </div>
                                    </div>
                           </div>
                           
                            
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
                           
                          <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left"> Country ISO Code - Numeric</label>
                                    <div class="col-lg-7"> 
                                  <input type="text" name="countryCode" id="countryCode" placeholder="Country code" class="form-control">
                                    </div>
                                    </div>
                           </div>
                           
                          
                           
                            
                           
                          </div>
                           
                           <div class="row">
                           
                           
                           <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - English</label>
                                    <div class="col-lg-7">
                                   <textarea name="englishDesc" id="englishDesc" placeholder="Description english" class="form-control" required="required"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                           
                           <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - French</label>
                                    <div class="col-lg-7">
                                    <textarea name="frenchDesc" id="frenchDesc" placeholder="Description french" class="form-control"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                          </div>
                           
                           <div class="row">
                           
                          
                            <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Spanish</label>
                                    <div class="col-lg-7">
                                    <textarea name="spanishDesc" id="spanishDesc" placeholder="Description spanish" class="form-control"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                           
                           <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Polish</label>
                                    <div class="col-lg-7">
                                    <textarea name="polishDesc" id="polishDesc" placeholder="Description polish" class="form-control"></textarea>
                                    </div>
                                    </div>
                           </div>
                            
                           
                           
                           </div>
                           
                           <div class="row">
                           
                           
                            <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Chinese</label>
                                    <div class="col-lg-7">
                                    <textarea name="chineseDesc" id="chineseDesc" placeholder="Description chinese" class="form-control"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                            <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Romanian</label>
                                    <div class="col-lg-7">
                                    <textarea name="romanianDesc" id="romanianDesc" placeholder="Description romanian" class="form-control"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                           
                           
                           
                            </div>
                           
                           <div class="row">
                           
                           
                             <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Turkish</label>
                                    <div class="col-lg-7">
                                   <textarea name="turkishDesc" id="turkishDesc" placeholder="Description turkish" class="form-control"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                          
                           
                            <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Czech</label>
                                    <div class="col-lg-7">
                                    <textarea name="czechDesc" id="czechDesc" placeholder="Description czech" class="form-control"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                           </div>
                           
                           
                           <div class="row">
                           
                            <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Hungarian</label>
                                    <div class="col-lg-7">
                                    <textarea name="hungarianDesc" id="hungarianDesc" placeholder="Description hungarian" class="form-control"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                            <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Slovak</label>
                                    <div class="col-lg-7">
                                    <textarea name="slovakDesc" id="slovakDesc" placeholder="Description slovak" class="form-control"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                          </div>
                          
                      
                      <div class="row">
                           
                            <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Portuguese</label>
                                    <div class="col-lg-7">
                                    <textarea name="portugueseDesc" id="portugueseDesc" placeholder="Description portuguese" class="form-control"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                            <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Flemish</label>
                                    <div class="col-lg-7">
                                    <textarea name="flemishDesc" id="flemishDesc" placeholder="Description flemish" class="form-control"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                          </div>
                           
                       
                       
                       <div class="row">
                           
                            <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Italian</label>
                                    <div class="col-lg-7">
                                    <textarea name="italianDesc" id="italianDesc" placeholder="Description italian" class="form-control"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                            <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - German</label>
                                    <div class="col-lg-7">
                                    <textarea name="germanDesc" id="germanDesc" placeholder="Description german" class="form-control"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                          </div>
                          
                           
                         <div class="row">
                           
                            <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Danish</label>
                                    <div class="col-lg-7">
                                    <textarea name="danishDesc" id="danishDesc" placeholder="Description danish" class="form-control"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                            <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Bulgarian</label>
                                    <div class="col-lg-7">
                                    <textarea name="bulgarianDesc" id="bulgarianDesc" placeholder="Description bulgarian" class="form-control"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                          </div>     
                           
                             
                          
                       <div class="row"> 
                       
                       
                            <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Greek</label>
                                    <div class="col-lg-7">
                                   <textarea name="greekDesc" id="greekDesc" placeholder="Description greek" class="form-control"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                          
                           
                            <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Russian</label>
                                    <div class="col-lg-7">
                                    <textarea name="russianDesc" id="russianDesc" placeholder="Description russian" class="form-control"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                           </div>   
                           
                         <div class="row">
                           
                           
                           
                           <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Arabic</label>
                                    <div class="col-lg-7">
                                    <textarea name="arabicDesc" id="arabicDesc" placeholder="Description arabic" class="form-control"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                        
                           <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Indonesian</label>
                                    <div class="col-lg-7">
                                    <textarea name="indonesianDesc" id="indonesianDesc" placeholder="Description indonesian" class="form-control"></textarea>
                                    </div>
                                    </div>
                           </div>
                            
                           
                           
                           <input type="hidden" value="addcountry" name="siteurl" id="siteurl" class="form-control">
                              <input type="hidden" name="editID" id="editID" />
                              <input type="hidden"  name="EditchainID" id="EditchainID"  />
                          
                           
                           
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
                                        
                                        <form name="countryadd" id="countryadd" method="post" action="{{url(route('ecommercemaintenance.addnewcoo'))}}" class="form-horizontal">
                                          {{ csrf_field() }}
                                        
                                        <div class="modal-body">
                                        
                                        
                          
                                                     
                           <div class="row">
                           
                           
                           <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - English</label>
                                    <div class="col-lg-7">
                                   <textarea name="englishDesc1" id="englishDesc1" placeholder="Description english" class="form-control" required="required"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                           
                           <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - French</label>
                                    <div class="col-lg-7">
                                    <textarea name="frenchDesc1" id="frenchDesc1" placeholder="Description french" class="form-control"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                          </div>
                           
                           <div class="row">
                           
                          
                            <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Spanish</label>
                                    <div class="col-lg-7">
                                    <textarea name="spanishDesc1" id="spanishDesc1" placeholder="Description spanish" class="form-control"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                           
                           <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Polish</label>
                                    <div class="col-lg-7">
                                    <textarea name="polishDesc1" id="polishDesc1" placeholder="Description polish" class="form-control"></textarea>
                                    </div>
                                    </div>
                           </div>
                            
                           
                           
                           </div>
                           
                           <div class="row">
                           
                           
                            <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Chinese</label>
                                    <div class="col-lg-7">
                                    <textarea name="chineseDesc1" id="chineseDesc1" placeholder="Description chinese" class="form-control"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                            <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Romanian</label>
                                    <div class="col-lg-7">
                                    <textarea name="romanianDesc1" id="romanianDesc1" placeholder="Description romanian" class="form-control"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                           
                           
                           
                            </div>
                           
                           <div class="row">
                           
                           
                             <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Turkish</label>
                                    <div class="col-lg-7">
                                   <textarea name="turkishDesc1" id="turkishDesc1" placeholder="Description turkish" class="form-control"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                          
                           
                            <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Czech</label>
                                    <div class="col-lg-7">
                                    <textarea name="czechDesc1" id="czechDesc1" placeholder="Description czech" class="form-control"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                           </div>
                           
                           
                           <div class="row">
                           
                            <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Hungarian</label>
                                    <div class="col-lg-7">
                                    <textarea name="hungarianDesc1" id="hungarianDesc1" placeholder="Description hungarian" class="form-control"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                            <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Slovak</label>
                                    <div class="col-lg-7">
                                    <textarea name="slovakDesc1" id="slovakDesc1" placeholder="Description slovak" class="form-control"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                          </div>
                          
                      
                      <div class="row">
                           
                            <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Portuguese</label>
                                    <div class="col-lg-7">
                                    <textarea name="portugueseDesc1" id="portugueseDesc1" placeholder="Description portuguese" class="form-control"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                            <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Flemish</label>
                                    <div class="col-lg-7">
                                    <textarea name="flemishDesc1" id="flemishDesc1" placeholder="Description flemish" class="form-control"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                          </div>
                           
                       
                       
                       <div class="row">
                           
                            <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Italian</label>
                                    <div class="col-lg-7">
                                    <textarea name="italianDesc1" id="italianDesc1" placeholder="Description italian" class="form-control"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                            <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - German</label>
                                    <div class="col-lg-7">
                                    <textarea name="germanDesc1" id="germanDesc1" placeholder="Description german" class="form-control"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                          </div>
                          
                           
                         <div class="row">
                           
                            <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Danish</label>
                                    <div class="col-lg-7">
                                    <textarea name="danishDesc1" id="danishDesc1" placeholder="Description danish" class="form-control"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                            <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Bulgarian</label>
                                    <div class="col-lg-7">
                                    <textarea name="bulgarianDesc1" id="bulgarianDesc1" placeholder="Description bulgarian" class="form-control"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                          </div>     
                           
                             
                          
                       <div class="row"> 
                       
                       
                            <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Greek</label>
                                    <div class="col-lg-7">
                                   <textarea name="greekDesc1" id="greekDesc1" placeholder="Description greek" class="form-control"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                          
                           
                            <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Russian</label>
                                    <div class="col-lg-7">
                                    <textarea name="russianDesc1" id="russianDesc1" placeholder="Description russian" class="form-control"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                           </div>   
                           
                         <div class="row">
                           
                           
                           
                           <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Arabic</label>
                                    <div class="col-lg-7">
                                    <textarea name="arabicDesc1" id="arabicDesc1" placeholder="Description arabic" class="form-control"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                        
                           <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Indonesian</label>
                                    <div class="col-lg-7">
                                    <textarea name="indonesianDesc1" id="indonesianDesc1" placeholder="Description indonesian" class="form-control"></textarea>
                                    </div>
                                    </div>
                           </div>
                            
                           
                           
                           <input type="hidden" value="addcountry" name="siteurl" id="siteurl" class="form-control">
                              <input type="hidden" name="editID" id="editID" />
                              <input type="hidden"  name="EditchainID" id="EditchainID"  />
                          
                           
                           
                            </div>
                               </div>
                                         
                                        <div class="modal-footer">
                               <button type="button" class="btn closebtn" data-dismiss="modal" onclick="close_form()">Close</button>
                                
                               </div>
                               
                                        </form>
                                        
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
 
@endsection 
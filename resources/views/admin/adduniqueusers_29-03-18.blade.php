@extends('admin.layouts.uniqueusers')
<?php

error_reporting(0);
?>


@section('content')
<style>
.mandatory_fields {
    color: #FF0000;
  }
  input[type=checkbox]
  {
    height: 18px;
    margin-top: 9px;
  }
</style>

<div class="wrapper wrapper-content animated fadeInRight">

<div class="row">

<div class="col-lg-12">

 <div class="col-lg-12 clsbreadcrumb">
                      <div class="col-lg-10"> > Unique Maintenance - Unique Users - Add New User</div>
                        
                         <div class="col-lg-2"> <button class="button" onclick="location.href='{{ url(route('admin.uniqueusers'))}}'">View List</button></div>
                    </div>

<div class="col-lg-12 clsaddnewvendorform">

                    <form name="uniqueuseradd" id="uniqueuseradd" method="post" action="{{url(route('admin.addnewuniqueusers'))}}" enctype="multipart/form-data">

                    {{ csrf_field() }}

                    <input type="hidden" name="editID" id="editID" value="@if($edit_val==1){{$uniqueUsers->id}}@endif" />



         <!--Defect: users.pdf page no.4
         Name: Bala-Uniquegroup Team
         Desc. align the user types and depends upon 
         accounts manager and customer service to show the forms-->



                    
 <row class="col-md-12">

                 

                            <div class="form-group clsformelements">

                  <label for="userType" class="col-md-3">User Type<span class="mandatory_fields">*</span></label>

                    

                                <div class="col-md-3">

                          <select name="userType" id="userType" class="form-control usertype_dropdown">

                                <option value="">Please select a User Type</option>

                                @foreach ($userType as $type_list)
                                @if($type_list->id!=1 && $type_list->id!=3 && $type_list->id!=4 && $type_list->id!=5 && $type_list->id!=6 && $type_list->id!=11 && $type_list->id!=12 && $type_list->id!=15 && $type_list->id!=13 && $type_list->id!=10)
                                <option value="{{ $type_list->id}}" @if($edit_val==1) {{ $uniqueUsers->UsertypeID == $type_list->id ? 'selected=selected' : '' }} @endif>{{ $type_list->userType }}</option>
                                @endif
                                @endforeach

                                </select>

                                </div>

                </div>

                          

                        </row>
                        <row class="col-md-12">

                          

                            <div class="form-group clsformelements customerlist_check" style="display: none;">
                            
                            <label for="customercheckID" class="col-md-3">Customer Name<span class="mandatory_fields">*</span></label>

                             <!-- <label for="customercheckID" class="">Customer Name</label>-->

                              
                            
                                @foreach($uniquecustomers as $customerlist)
                                <div class="col-lg-offset-3 col-md-9">
                                  <div class="col-md-1">
                              <label>
                                {{$customerlist->CustomerName}}
                                </label>
                                    
                                  </div>
                              <div class="col-md-1">
								<?php
                                $uniqueuserssselecteddetails=$uniqueUsers->customercheckID;
                                $chkvaluniqueusersexp=explode(',',$uniqueuserssselecteddetails);
                                ?>
                               
                                  <input type="checkbox" class="customercheckID" name="customercheckID[]" value="{{$customerlist->id}}"{{$customerlist->CustomerName}} @foreach($chkvaluniqueusersexp as $chkvalbox)
             @if($chkvalbox==$customerlist->id)
             checked="checked"
              @endif
             @endforeach >
                                
                              </div>

                               </div>
                                @endforeach


                            </div>

                            

                        </row>
                 

                    

<row class="col-md-12">
   
   
   
   
   
   
   
   
   
   
                          

                            <div class="form-group clsformelements factorylist_check" style="display: none;">

                  <label for="factoryName" class="col-md-3">Factory Name<span class="mandatory_fields">*</span></label>

                                

                                <div class="col-md-3">

             <select name="OfficeFactoryName" id="factoryName" class="form-control">

                     <option value="">Please select a Factory</option>

                     @foreach ($uniqueoffices as $uniqueoffices_list)

                    
                     <option value="{{$uniqueoffices_list->id}}" @if($edit_val==1){{$uniqueUsers->FactoryID == $uniqueoffices_list->id ? 'selected=selected' : ''}} @endif >{{ $uniqueoffices_list->OfficeFactoryName}}</option>

                     @endforeach

                     </select>

                                </div>

                </div>

                            

                        </row>                    

                     <row class="col-md-12">

                          

                            <div class="form-group clsformelements">

                  <label for="firstName" class="col-md-3">First Name<span class="mandatory_fields">*</span></label>

                                

                                <div class="col-md-3">

                <input type="text" name="firstName" id="firstName" placeholder="First Name" class="form-control" value="@if($edit_val==1) {{ $uniqueUsers->firstName }} @endif">                                

                                </div>

                </div>

                            

                        </row>

                    <row class="col-md-12">

                          

                            <div class="form-group clsformelements">

                  <label for="lastName" class="col-md-3">Last Name<span class="mandatory_fields">*</span></label>

                                

                                <div class="col-md-3">

                <input type="text" name="lastName" id="lastName" placeholder="Last Name" class="form-control" value="@if($edit_val==1) {{ $uniqueUsers->lastName }} @endif">                                

                                </div>

                </div>

                            

                        </row>

                     <row class="col-md-12">

                            <div class="form-group clsformelements">

                  <label for="phoneNumber" class="col-md-3">Phone Number <span class="mandatory_fields">*</span></label>

                                

                                <div class="col-md-3">

    <input type="text" name="phoneNumber" id="phoneNumber" placeholder="Phone Number" class="form-control" value="@if($edit_val==1){{$uniqueUsers->phoneNumber}}@endif">

                   <span id="phoneerror" style="display: none;" class="mandatory_fields">Not valid phone number</span>

                                </div>

                </div>

                            

                        </row>

                   <row class="col-md-12">

                          

                            <div class="form-group clsformelements">

                  <label for="email" class="col-md-3">E-mail<span class="mandatory_fields">*</span></label>

                                

                                <div class="col-md-3">

              <input type="email" name="email" id="email" placeholder="E-mail" class="form-control" value="@if($edit_val==1){{$uniqueUsers->Email}}@endif">                                

                                </div>

                </div>

                            

                        </row>

                   <row class="col-md-12">

                          

                            <div class="form-group clsformelements">

                  <label for="userName" class="col-md-3">User Name<span class="mandatory_fields">*</span></label>

                                

                                <div class="col-md-3">

              <input type="text" name="userName" id="userName" placeholder="User Name" class="form-control" value="@if($edit_val==1) {{ $uniqueUsers->userName }} @endif" @if($edit_val==1) readonly="readonly" @endif>                                

                                </div>

                </div>

                            

                        </row>

                     @if($edit_val==0)

                   <row class="col-md-12">

                          

                            <div class="form-group clsformelements">

                  <label for="password" class="col-md-3">Password</label>

                                

                                <div class="col-md-3">

                          <input type="password" name="password" id="password" placeholder="Password" class="form-control" value="Unique123" readonly="readonly">

                                </div>

                </div>

                            

                        </row>

                     @endif
               

              <row class="col-md-12">

                          

                            <div class="form-group clsformelements">

                  <label for="zip" class="col-md-3"></label>

                  <div class="col-md-3">

                                  <input type="submit" name="uniqueuserssubmit" id="uniqueuserssubmit" class="clsbutton" value="Add">

                                 </div>

                </div>

                            

                        </row>   

                        

                     </form>

          </div>

      </div>

     </div>

  </div>
 <script type="text/javascript">
    $(document).ready(function() { 

     
    });
 </script>
         

@endsection




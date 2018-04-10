@extends('ecommercemaintenance.layouts.garmentmaintenance')

@section('content')


<div class="headerlink">
<h5> >PDM Maintenance</h5>
</div>
<div class="ibox-title" id="maintenancedashboard" style="display:none;">

 
           <div class="form-group">

              <div class="dropdown col-lg-2">

             

                          <button class="dropbtn">Customer Maintenance &nbsp; <span class=" fa fa-chevron-down"></span></button>

                          <div class="dropdown-content drop" align="center">

                             <a href="{{ url(route('admin.customers')) }}">Customers</a>

                             <a href="{{ url(route('admin.customerusers')) }}">Customer User</a>

                          </div>                      

              </div>

              <div class="dropdown col-lg-2">

             

                          <button class="dropbtn">Vendor Maintenance &nbsp; <span class=" fa fa-chevron-down"></span></button>

                          <div class="dropdown-content drop" align="center">

                             <a href="{{ url(route('admin.vendors')) }}">Vendors</a>

                             <a href="{{  url(route('admin.vendorusers')) }}">Vendor User</a>

                          </div>                      

              </div>

              <div class="dropdown col-lg-2">

             

                          <button class="dropbtn">Unique Maintenance &nbsp; <span class="fa fa-chevron-down"></span></button>

                          <div class="dropdown-content drop" align="center">

                             <a href="{{ url(route('admin.uniquefacility')) }}">Unique Facilities</a>

                             <a href="{{  url(route('admin.uniqueusers')) }}">Unique User</a>

                          </div>                      

              </div>

              <div class="dropdown col-lg-2">

             

                          <button class="dropbtn">Product Maintenance &nbsp; <span class="fa fa-chevron-down"></span></button>

                          <div class="dropdown-content drop" align="center">

                            <?php
                            //print_r($user->customerID);
                            if($user->userTypeID==9)
                            {
                              $customerdetails=App\Customers::where('id','=',$user->customerID)->get();
                            }else
                            $customerdetails=App\Customers::all();
                          foreach($customerdetails as $customers)
                          {
                          ?>
                             <a href="{{  url(route('admin.producthome',['sidebarid'=>$customers->id])) }}">{{$customers->CustomerName}}</a>
                           <?php
                           }
                           ?>

                            
                          </div>

                                             

              </div>

              <div class="dropdown col-lg-2">

                    <a href="{{  url(route('admin.productdevelopmenthome')) }}"><button class="dropbtn">PDM Maintenance&nbsp; <span class="fa fa-chevron-down"></span></button></a>

                    <div class="dropdown-content drop" align="center">

                             <a href="{{ url(route('admin.pdmproductgroups')) }}">Product Group & <br /> Sub Group</a>

                             <a href="">User Type</a>

                             <a href="{{ url(route('admin.mktproductionregions')) }}">Marketing & <br /> Production Regions</a>

                             <a href="{{ url(route('admin.productdetails')) }}">Production Details</a>

                             <a href="{{ url(route('admin.productdevelopmenthome'))}}">Product Development</a>

                          </div>                           

              </div>


           </div>
           
    
           
          
           </div>
 <div class="ibox-title" id="pdmdashboard" style="display:block;">
  
                                      <div class="col-lg-8">
                    <h2>Garment Component Maintenance</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="">Home</a>
                        </li>
                        
                        <li>
                            Customer Name ::  <strong>Marks</strong>
                         </li>
                        
                        <li class="active">
                            <strong>Garment Component Maintenance</strong>
                        </li>
                         </ol> 
                </div>
              <a href="" class=" button fa fa-plus garmentcomponent" data-toggle="modal" data-target="#myModal"> Add New Garment Component</a>
</div></div>


                
        <div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                <div class="modal-content animated bounceInRight">
                                 <div class="chain_bg">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" onclick="close_form()">
                                            <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            
                                            <h4 class="modal-title title_bar">Garment Component Maintenance</h4>
                                           <p>Just fill in your garment component details and we'll help you..</p>
                                        </div>
                                        <form name="garmentmaintenance" id="garmentmaintenancedetail" method="post" action="{{ url(route('admin.add_garmentmaintenance')) }}" class="form-horizontal">     {{ csrf_field() }}
                
                                        
                          <div class="modal-body">
                                        
                          <div class="row">
                                        
                            <div class="col-sm-6 ">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Chain</label>
                                    <div class="col-lg-7">
                                                        
                              <select name="chainID" id="chainID" disabled class="form-control">
                              <option value="1">Marks</option>
                              </select> <input type="hidden"  name="chainID" id="chainID" value="1"? />                                                                 </div>
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
                           
                           <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">ZNumber</label>
                                    <div class="col-lg-7">
                                   <input type="text" name="ZNumber" id="znumber" class="form-control" placeholder="ZNumber">
                                    </div>
                                    </div>
                           </div>
                            <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - English</label>
                                    <div class="col-lg-7">
                                   <textarea name="descEnglish" id="descEnglish" class="form-control" placeholder="Description english"></textarea>
                                    </div>
                                    </div>
                           </div>
                          
                          </div>
                          
                          <div class="row"> 
                          
                            <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - French</label>
                                    <div class="col-lg-7">
                                    <textarea name="descFrench" id="descFrench" class="form-control" placeholder="Description french"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                            <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Spanish</label>
                                    <div class="col-lg-7">
                                    <textarea name="descSpanish" id="descSpanish" class="form-control" placeholder="Description spanish"></textarea>
                                    </div>
                                    </div>
                           </div>
                         
                         </div>
                         
                         <div class="row">
                           
                            <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Polish</label>
                                    <div class="col-lg-7">
                                    <textarea name="descPolish" id="descPolish" class="form-control" placeholder="Description polish"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                            <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Chinese</label>
                                    <div class="col-lg-7">
                                    <textarea name="descChinese" id="descChinese" class="form-control" placeholder="Description chinese"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                           </div>
                           
                           <div class="row">
                           
                            <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Romanian</label>
                                    <div class="col-lg-7">
                                    <textarea name="descRomanian" id="descRomanian" class="form-control" placeholder="Description romanian"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                            <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Turkish</label>
                                    <div class="col-lg-7">
                                    <textarea name="descTurkish" id="descTurkish" class="form-control" placeholder="Description turkish"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                           </div>
                           
                         <div class="row">
                           
                           <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Danish</label>
                                    <div class="col-lg-7">
                                    <textarea name="descDanish" id="descDanish" class="form-control" placeholder="Description danish"></textarea>
                                    </div>
                                    </div>
                           </div>
                           <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Czech</label>
                                    <div class="col-lg-7">
                                    <textarea name="descCzech" id="descCzech" class="form-control" placeholder="Description czech"></textarea>
                                    </div>
                                    </div>
                           </div>
                          
                          </div>
                          
                          
                          <div class="row">
                          
                           
                           <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Hungarian</label>
                                    <div class="col-lg-7">
                                    <textarea name="descHungarian" id="descHungarian" class="form-control" placeholder="Description hungarian"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                            <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Slovak</label>
                                    <div class="col-lg-7">
                                    <textarea name="descSlovak" id="descSlovak" class="form-control" placeholder="Description slovak"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                           </div>
                           
                           <div class="row">
                           
                            <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Portuguese</label>
                                    <div class="col-lg-7">
                                    <textarea name="descPortuguese" id="descPortuguese" class="form-control" placeholder="Description portuguese"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                           <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Flemish</label>
                                    <div class="col-lg-7">
                                   <textarea name="descFlemish" id="descFlemish" class="form-control" placeholder="Description flemish"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                           </div>
                           
                           <div class="row">
                           
                           
                           <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Italian</label>
                                    <div class="col-lg-7">
                                    <textarea name="descItalian" id="descItalian" class="form-control" placeholder="Description italian"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                           <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Greek</label>
                                    <div class="col-lg-7">
                                    <textarea name="descGreek" id="descGreek" class="form-control" placeholder="Description greek"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                           </div>
                           
                           <div class="row">
                           
                           <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Japanese</label>
                                    <div class="col-lg-7">
                                    <textarea name="descJapanese" id="descJapanese" class="form-control" placeholder="Description japanese"></textarea>
                                    </div>
                                    </div>
                           </div>
                           <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - German</label>
                                    <div class="col-lg-7">
                                   <textarea name="descGerman" id="descGerman" class="form-control" placeholder="Description german"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                           </div>
                          
                          <div class="row"> 
                           
                           <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Slovenian</label>
                                    <div class="col-lg-7">
                                    <textarea name="descSlovenian" id="descSlovenian" class="form-control" placeholder="Description slovenian"></textarea>
                                    </div>
                                    </div>
                           </div>
                           <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Bulgarian</label>
                                    <div class="col-lg-7">
                                    <textarea name="descBulgarian" id="descBulgarian" class="form-control" placeholder="Description bulgarian"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                          </div>
                          
                          <div class="row">
                           
                 <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Korean</label>
                                    <div class="col-lg-7">
                                    <textarea name="descKorean" id="descKorean" class="form-control" placeholder="Description korean"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                           
                           <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Russian</label>
                                    <div class="col-lg-7">
                                    <textarea name="descRussian" id="descRussian" class="form-control" placeholder="Description russian"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                           </div>
                           
                           <div class="row">
                           
                           <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Arabic</label>
                                    <div class="col-lg-7">
                                    <textarea name="descArabic" id="descArabic" class="form-control" placeholder="Description arabic"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                            <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description -Indonesian</label>
                                    <div class="col-lg-7">
                                    <textarea name="descIndonesian" id="descIndonesian" class="form-control" placeholder="Description indonesian"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                             
                          
                           
                           <input type="hidden" name="CustomerID" id="status" value="30" />
                            <input type="hidden" name="status" id="status" value="1" />
                           <input type="hidden" value="addgarment" name="siteurl" id="siteurl" class="form-control" placeholder="Description english"></textarea>
                              <input type="hidden" name="editID" id="editID" />
                              <input type="hidden"  name="EditchainID" id="EditchainID"  />
                          
                           
                           
                            </div>
                               </div>
                                         
                                        <div class="modal-footer">
                               <button type="button" class="btn closebtn" data-dismiss="modal" onclick="close_form()">Close</button>
                                <input type="submit" name="garmentmaintenancesubmit" id="garmentmaintenancesubmit" class="btn savebtn" value="Save">
                               </div>
                               
                                        </form>
                                        
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                







      <div class="modal inmodal" id="viewModal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                <div class="modal-content animated bounceInRight">
                                 <div class="chain_bg">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" onclick="close_form()">
                                            <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            
                                            <h4 class="modal-title title_bar">Garment Component Maintenance</h4>
                                           <p>Just fill in your garment component details and we'll help you..</p>
                                        </div>

                                         <form name="garmentmaintenanceadd" id="garmentmaintenanceview" method="post" action=" " class="form-horizontal">     {{ csrf_field() }}
                          <div class="modal-body">
                                      
                                      
                        
                        <div class="row">
                           
                            <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - English</label>
                                    <div class="col-lg-7">
                                   <textarea name="descriptionEnglish" id="descriptionEnglish" class="form-control" placeholder="Description english"></textarea>
                                    </div>
                                    </div>

                           </div>


                           <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - French</label>
                                    <div class="col-lg-7">
                                    <textarea name="descriptionFrench" id="descriptionFrench" class="form-control" placeholder="Description french"></textarea>
                                    </div>
                                    </div>
                           </div>


                          
                          </div>
                          
                          <div class="row"> 
                          
                          
                           
                            <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Spanish</label>
                                    <div class="col-lg-7">
                                    <textarea name="descriptionSpanish" id="descriptionSpanish" class="form-control" placeholder="Description spanish"></textarea>
                                    </div>
                                    </div>
                           </div>


                         <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Polish</label>
                                    <div class="col-lg-7">
                                    <textarea name="descriptionPolish" id="descriptionPolish" class="form-control" placeholder="Description polish"></textarea>
                                    </div>
                                    </div>
                           </div>

                         </div>
                         
                         <div class="row">
                                                      
                            <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Chinese</label>
                                    <div class="col-lg-7">
                                    <textarea name="descriptionChinese" id="descriptionChinese" class="form-control" placeholder="Description chinese"></textarea>
                                    </div>
                                    </div>
                           </div>



                    <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Romanian</label>
                                    <div class="col-lg-7">
                                    <textarea name="descriptionRomanian" id="descriptionRomanian" class="form-control" placeholder="Description romanian"></textarea>
                                    </div>
                                    </div>
                           </div>
                           

                           
                           </div>
                           
                           <div class="row">
                           
                          
                            <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Turkish</label>
                                    <div class="col-lg-7">
                                    <textarea name="descriptionTurkish" id="descriptionTurkish" class="form-control" placeholder="Description turkish"></textarea>
                                    </div>
                                    </div>
                           </div>



                           <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Danish</label>
                                    <div class="col-lg-7">
                                    <textarea name="descriptionDanish" id="descriptionDanish" class="form-control" placeholder="Description danish"></textarea>
                                    </div>
                                    </div>
                           </div>





                           
                           </div>
                           
                         <div class="row">
                        
                           <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Czech</label>
                                    <div class="col-lg-7">
                                    <textarea name="descriptionCzech" id="descriptionCzech" class="form-control" placeholder="Description czech"></textarea>
                                    </div>
                                    </div>
                           </div>
                          



                               <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Hungarian</label>
                                    <div class="col-lg-7">
                                    <textarea name="descriptionHungarian" id="descriptionHungarian" class="form-control" placeholder="Description hungarian"></textarea>
                                    </div>
                                    </div>
                           </div>


                          </div>
                          
                          
                          <div class="row">
                          
                           
                       
                           
                            <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Slovak</label>
                                    <div class="col-lg-7">
                                    <textarea name="descriptionSlovak" id="descriptionSlovak" class="form-control" placeholder="Description slovak"></textarea>
                                    </div>
                                    </div>
                           </div>



                             <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Portuguese</label>
                                    <div class="col-lg-7">
                                    <textarea name="descriptionPortuguese" id="descriptionPortuguese" class="form-control" placeholder="Description portuguese"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                           </div>
                           
                           <div class="row">
                           
                          
                           
                           <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Flemish</label>
                                    <div class="col-lg-7">
                                   <textarea name="descriptionFlemish" id="descriptionFlemish" class="form-control" placeholder="Description flemish"></textarea>
                                    </div>
                                    </div>
                           </div>


                           <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Italian</label>
                                    <div class="col-lg-7">
                                    <textarea name="descriptionItalian" id="descriptionItalian" class="form-control" placeholder="Description italian"></textarea>
                                    </div>
                                    </div>
                           </div>
                           

                           </div>
                           
                           <div class="row">
                           
                     
                           <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Greek</label>
                                    <div class="col-lg-7">
                                    <textarea name="descriptionGreek" id="descriptionGreek" class="form-control" placeholder="Description greek"></textarea>
                                    </div>
                                    </div>
                           </div>



                      <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Japanese</label>
                                    <div class="col-lg-7">
                                    <textarea name="descriptionJapanese" id="descriptionJapanese" class="form-control" placeholder="Description japanese"></textarea>
                                    </div>
                                    </div>
                           </div>

                           
                           </div>
                           
                           <div class="row">
                           
                        
                           <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - German</label>
                                    <div class="col-lg-7">
                                   <textarea name="descriptionGerman" id="descriptionGerman" class="form-control" placeholder="Description german"></textarea>
                                    </div>
                                    </div>
                           </div>




                           <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Slovenian</label>
                                    <div class="col-lg-7">
                                    <textarea name="descriptionSlovenian" id="descriptionSlovenian" class="form-control" placeholder="Description slovenian"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                           </div>
                          
                          <div class="row"> 
                       
                           <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Bulgarian</label>
                                    <div class="col-lg-7">
                                    <textarea name="descriptionBulgarian" id="descriptionBulgarian" class="form-control" placeholder="Description bulgarian"></textarea>
                                    </div>
                                    </div>
                           </div>



                            <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Korean</label>
                                    <div class="col-lg-7">
                                    <textarea name="descriptionKorean" id="descriptionKorean" class="form-control" placeholder="Description korean"></textarea>
                                    </div>
                                    </div>
                           </div>


                           
                          </div>
                          
                          <div class="row">
                           
                
                           
                           
                           <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Russian</label>
                                    <div class="col-lg-7">
                                    <textarea name="descriptionRussian" id="descriptionRussian" class="form-control" placeholder="Description russian"></textarea>
                                    </div>
                                    </div>
                           </div>


                                 <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Arabic</label>
                                    <div class="col-lg-7">
                                    <textarea name="descriptionArabic" id="descriptionArabic" class="form-control" placeholder="Description arabic"></textarea>
                                    </div>
                                    </div>
                           </div>


                           
                           </div>
                           
                           <div class="row">
                           
                      
                           
                            <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description -Indonesian</label>
                                    <div class="col-lg-7">
                                    <textarea name="descriptionIndonesian" id="descriptionIndonesian" class="form-control" placeholder="Description indonesian"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                           
                            </div>
                               </div>
                                        
                                        </form>
                                        
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                     




  <div class="row wrapper wrapper-content animated fadeInRight">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        

<h5>View Garment Component List</h5>
                
                    <div class="ibox-content">

                        <div class="table-responsive">
                        
                        <form name="thisForm" id="thisForm" method="get" action="admin.get_productstore">
                        
                    <table id="example1" class="table table-striped table-bordered table-hover dataTables-example" >
                        <thead> 
                          <tr>
                           <th><input name="select_all" value="1" type="checkbox"></th>
                      
                         <th>ZNumber</th>
                        <th>Description</br>English</th>
                       
                         <th>Actions</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                   <tbody>
                <?php  
              $Garmentcomponentmaintenance=\App\Garmentmaintenance::get();
               
                        ?>
                        <tr>
 @foreach($Garmentcomponentmaintenance as $Garmentmaintenance) 
                 <td><input name="select_all" value="1" type="checkbox"></td>
                 <td>{{ $Garmentmaintenance->ZNumber}}</td>
                <td>{{ $Garmentmaintenance->descEnglish}}</td>
                
                 
                 <td>
                      
  <a href="" class="viewgarmentmaintenance" data-toggle="modal" data-id="{{$Garmentmaintenance->id}}" data-target="#viewModal" data-selecthref="{{url(route('admin.view_garmentmaintenance', ['id'=>$Garmentmaintenance->id]))}}"><img  src="{{ asset('/img/view.png') }}"  border="0"  title="Activate"/></a>



     <a href="" data-toggle="modal" data-target="#myModal" data-selecthref="{{url(route('admin.edit_garmentmaintenance', ['id' =>$Garmentmaintenance->id]))}}" class="fillgarmentmaintenance"><img src="{{ asset('/img/edit.png') }}" border="0"  title="Edit"/></a>


<!--<span class="deletegarmentmaintenance" data-href="{{url(route('admin.delete_garmentmaintenance', ['id' =>$Garmentmaintenance->id]))}}" 

   data-valueid="{{ $Garmentmaintenance->id }}"><a href="javascript:;"><img src="{{asset('/img/delete.png')}}" border="0"  title="Delete"/></a></span>-->
          
 @if ($Garmentmaintenance->status==0)
          <span class="activatsymbol"><a data-href="{{ url(route('admin.garmentstickersymbolactive',['id' =>$Garmentmaintenance->id])) }}"><img  src="{{ asset('/img/active.png') }}" border="0"  title="Activate"/></a></span> 
  @else
      <span class="deactivatesymbol"><a data-href="{{ url(route('admin.garmentstickersymboldeactive',['id' =>$Garmentmaintenance->id])) }}"><img  src="{{ asset('/img/deactive.png') }}" border="0"  title="Deactivate"/></a></span> 

 @endif




                        </td>
              
                              <td>
         @if ($Garmentmaintenance->status==1)
                          <img  src="{{ asset('/img/active.gif') }}" border="0"  title="Active"/>
                    @else
                          <img  src="{{ asset('/img/deactive.gif') }}" border="0"  title="Deactive"/>
                 @endif
                        </td>
                    </tr>
     @endforeach 


                    </tbody>
                         </table>
                       </form>
                     </div>
</div>
</div>



@endsection 
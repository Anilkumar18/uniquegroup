@extends('ecommercemaintenance.layouts.fabriccomposition')

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
                    <h2>Fabric Composition Maintenance</h2>
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
                            <strong>Fabric Composition Maintenance</strong>
                        </li>
                        
                       
                    </ol>
                    
                  
                </div>

                       <div class="title-action">
                        <a href="" class="btn btn-primary fa fa-plus addnewlabelprint" data-toggle="modal" data-target="#myModal"> Add New Fibre Contents</a>
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

                       <!-- <th class="customer_th">Fabric Contents ID</th>-->                        

                        
                        
                                                                                   
                        <th>Description English</th>
                        <th>Description French</th>
                        
                        
                        <th class="action_th">Actions</th>
                        <th class="action_th">Status</th>

                   
                    </tr>


                    </thead>

                    <tbody>
                   @foreach($fabricdetails as $coolist)
                    <tr>
                       
                    <!--<td>{{$coolist->id}}</td>-->
                    
                    <td>{{$coolist->descEnglish}}</td>
                    <td>{{$coolist->descFrench}}</td>
                    
                    <td>

                        <a class="viewfabric" data-href="{{ url('/') }}" data-selecthref="{{ route('ecommercemaintenance.editfabricdetails', ['id' => $coolist->id]) }}" data-toggle="modal" data-valueid="{{ $coolist->id }}" data-target="#myModal2"><img src="{{ asset('/img/view.png') }}" border="0"  title="View"/></a>

                        <a class="editfabricdetails" data-href="{{ url('/') }}" data-selecthref="{{ route('ecommercemaintenance.editfabricdetails', ['id' => $coolist->id]) }}" data-toggle="modal" data-valueid="{{ $coolist->id }}" data-target="#myModal"><img src="{{ asset('/img/edit.png') }}" border="0"  title="Edit"/></a> 

                       

                        

                        <a class="deletefabric" data-href="{{ url(route('ecommercemaintenance.fabricdelete', ['id' => $coolist->id])) }}"><span  data-valueid="{{ $coolist->id }}"><img  src="{{ asset('/img/delete.png') }}" border="0"  title="Delete"/></a>

                          @if ($coolist->status==0)
                        
                        <span class="activatefabric"><a data-href="{{ url(route('ecommercemaintenance.fabricactivenew',['id' => $coolist->id])) }}"><img  src="{{ asset('/img/active.png') }}" border="0"  title="Activate"/></a></span> 
                        @else
                         <span class="deactivatefabric"><a data-href="{{ url(route('ecommercemaintenance.fabricdeactivenew',['id' => $coolist->id])) }}"><img  src="{{ asset('/img/deactive.png') }}" border="0"  title="Deactivate"/></a></span> 
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
                                            
                                            <h4 class="modal-title title_bar">Fibre Contents Maintenance</h4>
                                           <p>Just fill in your fibre details and we'll help you..</p>
                                        </div>
                                        
                                        <form name="fibremaintenanceadd" id="fibremaintenanceadd" method="post" action="{{url(route('ecommercemaintenance.addnewfabric'))}}" class="form-horizontal">
                                        {{ csrf_field() }}
                                        <div class="modal-body">
                                        
                                        <div class="row">
                                        
                            <div class="col-sm-6 ">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Customer Name</label>
                                    <div class="col-lg-7">
                                   
										
                               <select name="customerID" id="customerID" class="form-control">
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
                                    <label class="col-lg-5 control-label font-noraml text-left">Fibre Contents ID</label>
                                    <div class="col-lg-7">
                                   <input type="text" name="fibreContentsID" id="fibreContentsID" placeholder="Fibre Contents ID" class="form-control">
                                    </div>
                                    </div>
                           </div> -->
                           
                            <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - English</label>
                                    <div class="col-lg-7">
                                    <textarea name="descriptionEnglish" id="descriptionEnglish" placeholder="Description english" class="form-control"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                            </div>
                        
                        
                        <div class="row">
                          
                            <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - French</label>
                                    <div class="col-lg-7">
                                    <textarea name="descriptionFrench" id="descriptionFrench" placeholder="Description french" class="form-control"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                            <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Spanish</label>
                                    <div class="col-lg-7">
                                    <textarea name="descriptionSpanish" id="descriptionSpanish" placeholder="Description spanish" class="form-control"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                            </div>
                        
                        
                        <div class="row">
                           
                            <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Polish</label>
                                    <div class="col-lg-7">
                                    <textarea name="descriptionPolish" id="descriptionPolish" placeholder="Description polish" class="form-control"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                            <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Chinese</label>
                                    <div class="col-lg-7">
                                    <textarea name="descriptionChinese" id="descriptionChinese" placeholder="Description chinese" class="form-control"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                            </div>
                        
                        
                        <div class="row">
                        
                            <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Romanian</label>
                                    <div class="col-lg-7">
                                    <textarea name="descriptionRomanian" id="descriptionRomanian" placeholder="Description romanian" class="form-control"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                            <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Turkish</label>
                                    <div class="col-lg-7">
                                    <textarea name="descriptionTurkish" id="descriptionTurkish" placeholder="Description turkish" class="form-control"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                            </div>
                        
                        
                        <div class="row">
                        
                        
                           <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Danish</label>
                                    <div class="col-lg-7">
                                <textarea name="descriptionDanish" id="descriptionDanish" placeholder="Description danish" class="form-control"></textarea>

                                    </div>
                                    </div>
                           </div>
                           <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Czech</label>
                                    <div class="col-lg-7">
                                  <textarea name="descriptionCzech" id="descriptionCzech" placeholder="Description czech" class="form-control"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                            </div>
                        
                        
                        <div class="row">
                        
                        
                           <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Hungarian</label>
                                    <div class="col-lg-7">
                                    <textarea name="descriptionHungarian" id="descriptionHungarian" placeholder="Description hungarian" class="form-control"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                            <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Slovak</label>
                                    <div class="col-lg-7">
                                    <textarea name="descriptionSlovak" id="descriptionSlovak" placeholder="Description slovak" class="form-control"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                           
                            </div>
                        
                        
                        <div class="row">
                        
                            <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Portuguese</label>
                                    <div class="col-lg-7">
                                    <textarea name="descriptionPortuguese" id="descriptionPortuguese" placeholder="Description portuguese" class="form-control"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                           <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Flemish</label>
                                    <div class="col-lg-7">
                                    <textarea name="descriptionFlemish" id="descriptionFlemish" placeholder="Description flemish" class="form-control"></textarea>
                                    </div>
                                    </div>
                           </div>
                          
                           </div>
                        
                        
                        <div class="row"> 
                           
                           <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Italian</label>
                                    <div class="col-lg-7">
                                     <textarea name="descriptionItalian" id="descriptionItalian" placeholder="Description italian" class="form-control"></textarea>
                                    </div>
                                    </div>
                           </div>
                           <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Greek</label>
                                    <div class="col-lg-7">
                                    <textarea name="descriptionGreek" id="descriptionGreek" placeholder="Description Greek" class="form-control"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                            </div>
                        
                        
                        <div class="row">
                        
                        
                           <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Japanese</label>
                                    <div class="col-lg-7">
                                    <textarea name="descriptionJapanese" id="descriptionJapanese" placeholder="Description Japanese" class="form-control"></textarea>
                                    
                                    </div>
                                    </div>
                           </div>
                           <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - German</label>
                                    <div class="col-lg-7">
                                     <textarea name="descriptionGerman" id="descriptionGerman" placeholder="Description german" class="form-control"></textarea>

                                    </div>
                                    </div>
                           </div>
                           
                            </div>
                        
                        
                        <div class="row">
                        
                        
                           <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Slovenian</label>
                                    <div class="col-lg-7">
                                    <textarea name="descriptionSlovenian" id="descriptionSlovenian" placeholder="Description slovenian" class="form-control"></textarea>
                                    </div>
                                    </div>
                           </div>
                           <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Descriptionn - Bulgarian</label>
                                    <div class="col-lg-7">
                                     <textarea name="descriptionBulgarian" id="descriptionBulgarian" placeholder="Description bulgarian" class="form-control"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                            </div>
                        
                        
                        <div class="row">
                        
                        
     						 <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Korean</label>
                                    <div class="col-lg-7">
                                    <textarea name="descriptionKorean" id="descriptionKorean" placeholder="Description korean" class="form-control"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                           
                           <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Russian</label>
                                    <div class="col-lg-7">
                                    <textarea name="descriptionRussian" id="descriptionRussian" placeholder="Description russian" class="form-control"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                            </div>
                        
                        
                        <div class="row">
                        
                        
                           <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Arabic</label>
                                    <div class="col-lg-7">
                                    <textarea name="descriptionArabic" id="descriptionArabic" placeholder="Description arabic" class="form-control"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                            <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description -Indonesian</label>
                                    <div class="col-lg-7">
                                    <textarea name="descriptionIndonesian" id="descriptionIndonesian" placeholder="Description indonesian" class="form-control"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                             
                          
                           
                           
                           <input type="hidden" value="addfibre" name="siteurl" id="siteurl" class="form-control">
                              <input type="hidden" name="editID" id="editID" />
                              <input type="hidden"  name="EditchainID" id="EditchainID"  />
                          
                           
                           
                            </div>
                               </div>
                                         
                                        <div class="modal-footer">
                               <button type="button" class="btn closebtn" data-dismiss="modal" onclick="close_form()">Close</button>
                                <input type="submit" name="fibremaintenancesubmit" id="fibremaintenancesubmit" class="btn savebtn" value="Save">
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
                                            
                                            <h4 class="modal-title title_bar">Fibre Contents Maintenance</h4>
                                           <p>Just fill in your fibre details and we'll help you..</p>
                                        </div>
                                        
                                        <form name="fibremaintenanceadd" id="fibremaintenanceadd" method="post" action="{{url(route('ecommercemaintenance.addnewfabric'))}}" class="form-horizontal">
                                        {{ csrf_field() }}
                                        <div class="modal-body">
                                        
                                       
                        
                        
                        <div class="row">
                           
                           
                           <!-- <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Fibre Contents ID</label>
                                    <div class="col-lg-7">
                                   <input type="text" name="fibreContentsID" id="fibreContentsID" placeholder="Fibre Contents ID" class="form-control">
                                    </div>
                                    </div>
                           </div> -->
                           
                            <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - English</label>
                                    <div class="col-lg-7">
                                    <textarea name="descriptionEnglish1" id="descriptionEnglish1" placeholder="Description english" class="form-control"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                            </div>
                        
                        
                        <div class="row">
                          
                            <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - French</label>
                                    <div class="col-lg-7">
                                    <textarea name="descriptionFrench1" id="descriptionFrench1" placeholder="Description french" class="form-control"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                            <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Spanish</label>
                                    <div class="col-lg-7">
                                    <textarea name="descriptionSpanish1" id="descriptionSpanish1" placeholder="Description spanish" class="form-control"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                            </div>
                        
                        
                        <div class="row">
                           
                            <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Polish</label>
                                    <div class="col-lg-7">
                                    <textarea name="descriptionPolish1" id="descriptionPolish1" placeholder="Description polish" class="form-control"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                            <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Chinese</label>
                                    <div class="col-lg-7">
                                    <textarea name="descriptionChinese1" id="descriptionChinese1" placeholder="Description chinese" class="form-control"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                            </div>
                        
                        
                        <div class="row">
                        
                            <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Romanian</label>
                                    <div class="col-lg-7">
                                    <textarea name="descriptionRomanian1" id="descriptionRomanian1" placeholder="Description romanian" class="form-control"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                            <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Turkish</label>
                                    <div class="col-lg-7">
                                    <textarea name="descriptionTurkish1" id="descriptionTurkish1" placeholder="Description turkish" class="form-control"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                            </div>
                        
                        
                        <div class="row">
                        
                        
                           <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Danish</label>
                                    <div class="col-lg-7">
                                <textarea name="descriptionDanish1" id="descriptionDanish1" placeholder="Description danish" class="form-control"></textarea>

                                    </div>
                                    </div>
                           </div>
                           <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Czech</label>
                                    <div class="col-lg-7">
                                  <textarea name="descriptionCzech1" id="descriptionCzech1" placeholder="Description czech" class="form-control"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                            </div>
                        
                        
                        <div class="row">
                        
                        
                           <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Hungarian</label>
                                    <div class="col-lg-7">
                                    <textarea name="descriptionHungarian1" id="descriptionHungarian1" placeholder="Description hungarian" class="form-control"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                            <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Slovak</label>
                                    <div class="col-lg-7">
                                    <textarea name="descriptionSlovak1" id="descriptionSlovak1" placeholder="Description slovak" class="form-control"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                           
                            </div>
                        
                        
                        <div class="row">
                        
                            <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Portuguese</label>
                                    <div class="col-lg-7">
                                    <textarea name="descriptionPortuguese1" id="descriptionPortuguese1" placeholder="Description portuguese" class="form-control"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                           <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Flemish</label>
                                    <div class="col-lg-7">
                                    <textarea name="descriptionFlemish1" id="descriptionFlemish1" placeholder="Description flemish" class="form-control"></textarea>
                                    </div>
                                    </div>
                           </div>
                          
                           </div>
                        
                        
                        <div class="row"> 
                           
                           <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Italian</label>
                                    <div class="col-lg-7">
                                     <textarea name="descriptionItalian1" id="descriptionItalian1" placeholder="Description italian" class="form-control"></textarea>
                                    </div>
                                    </div>
                           </div>
                           <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Greek</label>
                                    <div class="col-lg-7">
                                    <textarea name="descriptionGreek1" id="descriptionGreek1" placeholder="Description Greek" class="form-control"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                            </div>
                        
                        
                        <div class="row">
                        
                        
                           <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Japanese</label>
                                    <div class="col-lg-7">
                                    <textarea name="descriptionJapanese1" id="descriptionJapanese1" placeholder="Description Japanese" class="form-control"></textarea>
                                    
                                    </div>
                                    </div>
                           </div>
                           <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - German</label>
                                    <div class="col-lg-7">
                                     <textarea name="descriptionGerman1" id="descriptionGerman1" placeholder="Description german" class="form-control"></textarea>

                                    </div>
                                    </div>
                           </div>
                           
                            </div>
                        
                        
                        <div class="row">
                        
                        
                           <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Slovenian</label>
                                    <div class="col-lg-7">
                                    <textarea name="descriptionSlovenian1" id="descriptionSlovenian1" placeholder="Description slovenian" class="form-control"></textarea>
                                    </div>
                                    </div>
                           </div>
                           <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Descriptionn - Bulgarian</label>
                                    <div class="col-lg-7">
                                     <textarea name="descriptionBulgarian1" id="descriptionBulgarian1" placeholder="Description bulgarian" class="form-control"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                            </div>
                        
                        
                        <div class="row">
                        
                        
                             <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Korean</label>
                                    <div class="col-lg-7">
                                    <textarea name="descriptionKorean1" id="descriptionKorean1" placeholder="Description korean" class="form-control"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                           
                           <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Russian</label>
                                    <div class="col-lg-7">
                                    <textarea name="descriptionRussian1" id="descriptionRussian1" placeholder="Description russian" class="form-control"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                            </div>
                        
                        
                        <div class="row">
                        
                        
                           <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description - Arabic</label>
                                    <div class="col-lg-7">
                                    <textarea name="descriptionArabic1" id="descriptionArabic1" placeholder="Description arabic" class="form-control"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                            <div class="col-sm-6">
                                    <div class="form-group">
                                    <label class="col-lg-5 control-label font-noraml text-left">Description -Indonesian</label>
                                    <div class="col-lg-7">
                                    <textarea name="descriptionIndonesian1" id="descriptionIndonesian1" placeholder="Description indonesian" class="form-control"></textarea>
                                    </div>
                                    </div>
                           </div>
                           
                             
                          
                           
                           
                           <input type="hidden" value="addfibre" name="siteurl" id="siteurl" class="form-control">
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
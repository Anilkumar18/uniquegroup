@extends('admin.layouts.caredryinstructions')
<?php
error_reporting(0);
?>


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

<div class="col-lg-12">

<div class="col-lg-12 clsbreadcrumb">

       <p> > Product Maintenance - Care Instructions Dry Clean Maintenance</p>

</div>
<!--<button class="button addnewcustomerusers" onclick="location.href='{{ url(route('admin.addcustomerusers'))}}'">Add New User</button>-->
<a href="" class=" button fa fa-plus addnewcustomerusers addnewsymbol" data-toggle="modal" data-target="#myModal5"> Add New Symbol</a>


 <div class="col-lg-12 clsaddnewvendorform">

            <div class="row">

                <div class="col-lg-12">

                <div class="ibox float-e-margins">

                    <div class="ibox-title">

                        

                    </div>

                    <div class="ibox-content">

                        <form name="thisForm" id="thisForm" method="post" action="">

                             {{ csrf_field() }}

                        <div class="table-responsive">

                     
                    <table id="example" class="table table-striped table-bordered table-hover dataTables-example">

                   <!--   <h5>View all |&nbsp;Export Results-Excel File| &nbsp;<a href="javascript:window.print();">Print Current Page</a></h5>-->

                    @if (count($symbollist) > 0)

                    <thead>

                    <tr>

                       

                        <th class="customer_th">Symbol Image</th>                        

                        <th class="contact_th">Symbol Type</th>

                       <th class="contact_third_th">Description English</th> 
                       <th class="contact_third_th">Description French</th> 
                       <th class="contact_third_th">Description Spanish</th> 
                       <th class="contact_third_th">Description Polish</th>   
                       <th class="contact_third_th">Description Chinese</th>
                       <th class="contact_third_th">Description Romanian</th>   
                       <th class="contact_third_th">Description Turkish</th>     
                       <th class="contact_third_th">Description Portuguese</th>
                        <th class="contact_third_th">Description Russian</th>
                        <th class="action_th">Actions</th>
                        <th class="action_th">Status</th>

                        

                    </tr>

                    </thead>

                    <tbody>
                     

                    <?php
					 $i=0; 
					?>

                    @foreach($symbollist as $symbollists)    
                    
                                        
                        <tr>
                         
                    <td>@if($symbollists->imageName)<img src='{{ route('admin.symbolimage',['id' => $symbollists->imageID]) }}' width="60" height="60"  />@else
                 <img src='../img/image-sample.jpg' width="60" height="60"  />@endif</td>
                   
                    <td><?php
                    $symboltypedetails=App\SymbolType::where('id','=',$symbollists->symbolType)->first();
					?>
                    {{$symboltypedetails->symboltypes}}
                    </td>
                    <td>{{$symbollists->descriptionEnglish}}</td>
                    <td>{{$symbollists->descriptionFrench}}</td>
                    <td>{{$symbollists->descriptionSpanish}}</td>
                   
                    <td>{{$symbollists->descriptionPolish}}</td>
                     <td>{{$symbollists->descriptionChinese}}</td>
                      <td>{{$symbollists->descriptionRomanian}}</td>
                       <td>{{$symbollists->descriptionTurkish}}</td>
                        <td>{{$symbollists->descriptionPortuguese}}</td>
                         <td>{{$symbollists->descriptionRussian}}</td>
                    <td>

                <a data-href="{{ url('/') }}" data-selecthref="{{ url(route('admin.drycleansymbolselect', ['id' => $symbollists->id])) }}"  href="javascript:;" class="editSymbol" data-valueid="{{ $symbollists->id }}" data-toggle="modal" data-target="#myModal5"><img  src="{{ asset('/img/edit.png') }}" border="0"  title="Edit"/></a>


                       <span class="deletesymbol" data-href="{{ url(route('admin.drycleansymboldelete',['id' => $symbollists->id])) }}"  data-valueid="{{ $symbollists->id }}"><a href="javascript:;"><img  src="{{ asset('/img/delete.png') }}" border="0"  title="Delete"/></a></span>
                       
                        @if ($symbollists->status==0)
                        
                        <span class="activatsymbol"><a data-href="{{ url(route('admin.drycleansymbolactive',['id' => $symbollists->id])) }}"><img  src="{{ asset('/img/active.png') }}" border="0"  title="Activate"/></a></span> 
                        @else
                         <span class="deactivatesymbol"><a data-href="{{ url(route('admin.drycleansymboldeactive',['id' => $symbollists->id])) }}"><img  src="{{ asset('/img/deactive.png') }}" border="0"  title="Deactivate"/></a></span> 
                         @endif

                                           

       

                        </td>
                    <td>
                  @if ($symbollists->status==1)
                          <img  src="{{ asset('/img/active.gif') }}" border="0"  title="Active"/>
                          @else
                          <img  src="{{ asset('/img/deactive.gif') }}" border="0"  title="Deactive"/>
                          @endif 
                    </td>
</tr>
                    @endforeach

                    </tbody>

                    <tfoot>
                     <!--<tr>
                    <th colspan="6"> <div class="col-lg-2"> <a data-href="{{ url(route('admin.symbolactive')) }}" href="javascript:;" class="btn btn-primary activatsymbol"> <i class="fa fa-check"></i><span class="bold">&nbsp;Activate</span></a> </div>
                      <div class="col-lg-2"> <a data-href="{{ url(route('admin.symboldeactive')) }}" href="javascript:;" class="btn btn-warning deactivatesymbol"> <i class="fa fa-warning"></i><span class="bold">&nbsp;Deactivate</span></a> </div>
                      </th>
                  </tr>-->

                    @else

                    <tr class="gradeC"><td colspan="4">No Symbol Maintenance(s) Found</td></tr>

                    @endif



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
<div class="modal inmodal" id="myModal5" tabindex="-1" role="dialog" aria-hidden="true" style="overflow-y: scroll;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content animated bounceInRight">
      <div class="chain_bg">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" onclick="close_form()"> <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <h4 class="modal-title title_bar">Symbol Maintenance</h4>
          <p>Just fill in your symbol details and we'll help you..</p>
        </div>
        <form name="symbolmaintenanceadd" id="symbolmaintenanceadd" method="post"  action="{{ url(route('admin.drycleanadd_symbolist')) }}" class="form-horizontal" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="modal-body">
            <div class="row">
              <div class="col-sm-6 ">
                <div class="form-group">
                  <label class="col-lg-5 control-label font-noraml text-left">Customer Name</label>
                  <div class="col-lg-7">
                     <input type="hidden" name="customerID" id="customerID" value="{{$customers->id}}" readonly="readonly" />
                                        <select class="form-control" name="customerID" id="customerID">
                                        <option value="{{$customers->id}}">{{$customers->CustomerName}}</option>
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
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="col-lg-5 control-label font-noraml text-left">Description - English</label>
                  <div class="col-lg-7">
                    <textarea name="descriptionEnglish" id="descriptionEnglish" placeholder="Description english" class="form-control"></textarea>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="col-lg-5 control-label font-noraml text-left">Description - French</label>
                  <div class="col-lg-7">
                    <textarea name="descriptionFrench" id="descriptionFrench" placeholder="Description french" class="form-control"></textarea>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="col-lg-5 control-label font-noraml text-left">Description - Spanish</label>
                  <div class="col-lg-7">
                    <textarea name="descriptionSpanish" id="descriptionSpanish" placeholder="Description spanish" class="form-control"></textarea>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="col-lg-5 control-label font-noraml text-left">Description - Polish</label>
                  <div class="col-lg-7">
                    <textarea name="descriptionPolish" id="descriptionPolish" placeholder="Description polish" class="form-control"></textarea>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="col-lg-5 control-label font-noraml text-left">Description - Chinese</label>
                  <div class="col-lg-7">
                    <textarea name="descriptionChinese" id="descriptionChinese" placeholder="Description chinese" class="form-control"></textarea>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="col-lg-5 control-label font-noraml text-left">Description - Romanian</label>
                  <div class="col-lg-7">
                    <textarea name="descriptionRomanian" id="descriptionRomanian" placeholder="Description romanian" class="form-control"></textarea>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="col-lg-5 control-label font-noraml text-left">Description - Turkish</label>
                  <div class="col-lg-7">
                    <textarea name="descriptionTurkish" id="descriptionTurkish" placeholder="Description turkish" class="form-control"></textarea>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="col-lg-5 control-label font-noraml text-left">Description - Portuguese</label>
                  <div class="col-lg-7">
                    <textarea name="descriptionPortuguese" id="descriptionPortuguese" placeholder="Description portuguese" class="form-control"></textarea>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="col-lg-5 control-label font-noraml text-left">Description - Russian</label>
                  <div class="col-lg-7">
                    <textarea name="descriptionRussian" id="descriptionRussian" placeholder="Description russian" class="form-control"></textarea>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="col-lg-5 control-label font-noraml text-left">Symbol Type</label>
                  <div class="col-lg-7">
                    <select name="symbolType" id="symbolType" class="form-control">
                      <option value="0">Please select one</option>
                    <?php
					$symboltypedetails=App\SymbolType::where('id','=',4)->where('status','=',1)->get();
					?> 
                    @foreach($symboltypedetails as $symboltypelist)
                    <option value="{{ $symboltypelist->id}}">{{ $symboltypelist->symboltypes}}</option>
                    @endforeach
                     
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="col-lg-5 control-label font-noraml text-left">Upload Image</label>
                  <div class="col-lg-7">
                    <input type="file" name="image" id="image" class="form-control fbfile" onchange="symbolselect();">
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="col-lg-5 control-label font-noraml text-left">Select Image</label>
                  <div class="col-lg-7"> <a  href="#myModal" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Select Image</a> </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="col-lg-5 control-label font-noraml text-left">Selected Image</label>
                  <div class="col-lg-7">
                    <input type="text" name="logo" id="selectimage" class="form-control selectimage" readonly="readonly">
                    <input type="hidden" name="selectimageid" id="selectimageid" class="form-control" readonly="readonly">
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <div class="col-lg-12">
                    <div id="selimage"> <img id="blah" src="../img/image-sample.jpg" alt="your image" width="150" height="150" /></div>
                  </div>
                </div>
              </div>
            </div>
            <input type="hidden" value="addsymbol" name="siteurl" id="siteurl" class="form-control">
            <input type="hidden" name="editID" id="editID" />
            <input type="hidden"  name="EditcustomerID" id="EditcustomerID"  />
            <span class="spandiv" style="display:none">{{ route('admin.symbolimage',['id' => '']) }}</span>
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn closebtn" data-dismiss="modal" onclick="close_form()">Close</button>
            <input type="submit" name="symbolmaintenancesubmit" id="symbolmaintenancesubmit" class="btn savebtn" value="Save">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true" style="margin-top:20px;overflow-y: scroll;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content animated bounceInRight">
      <div class="chain_bg">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"> <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <h4 class="modal-title title_bar">Symbol Images Maintenance</h4>
          <p>Just see the sample symbol images..</p>
        </div>
        <form name="imageadd" id="imageadd" method="post" class="form-horizontal" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="row"> @foreach($symbolimagelist as $imagelist)
             @if($imagelist->imageName!="")
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="col-lg-2 control-label font-noraml text-left">
                  <input type="radio" name="imageid" id="imageid" data-imagename="{{$imagelist->imageName}}" value="{{$imagelist->id}}" class="form-control" />
                  </label>
                  <label class="col-lg-6 control-label font-noraml text-left">
                  <input type="text" name="imagename" id="imagename" value="{{$imagelist->imageName}}" class="form-control" />
                  &nbsp;&nbsp;</label>
                 
                  <div class="col-lg-4"> <img src="{{ route('admin.drysymbolimage',['id' =>$imagelist->id]) }}" width="60" height="60" /> </div>
                 
                  
                </div>
              </div>
              @endif
              @endforeach </div>
          </div>
        </form>
        <div class="modal-footer">
          <button type="button" class="btn closebtn" data-dismiss="modal">Close</button>
          <input type="submit" name="symbolimagesubmit" id="symbolimagesubmit" class="btn savebtn" value="Save" data-dismiss="modal" onclick="imageselection();">
        </div>
      </div>
    </div>
  </div>
</div>




         

@endsection




@extends('users.layouts.dashboard')

@section('content')


<div class="col-lg-12">
            
                <div class="wrapper wrapper-content">
                
                 <div class="row"><div class="col-lg-12">

                 	<center><div style="color:#4d4d4d; font-size:18px;">Select one of the following</div></center></div></div></br>
                  

                        <div class="row"> <center>  <a href="" class="btn btn-w-m btn-success" data-toggle="modal" data-target="#changepass" style="min-width:201px; background-color:#0099CC;">Change My Password</a></center></div></br>
                        <div class="row"><center><a href="{{ url('/logout') }}" onClick="event.preventDefault(); document.getElementById('logout-form').submit();"><button type="button" class="btn btn-w-m btn-success" style="min-width:201px; background-color:#0099CC;">Log Out</button></a></center></div></br>
                        
                </div>

            </div>




<div class="modal inmodal" id="changepass" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content animated bounceInRight">
                                
                                		<div class="chain_bg">
                                
                                        <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">
                                        <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title title_bar">Change My Password</h4>
                                           <p>Just fill in your old password and we'll help you..</p>
                                            <small class="font-bold"></small>
                                        </div>
                                        
                              <form name="changepasswordform" id="changepasswordform" class="form-horizontal" action="{{ url(route('admin.changepassword')) }}" method="POST" enctype="multipart/form-data">	
                                        	{{ csrf_field() }}
                                        <div class="modal-body">
                                        
                                         
                              <div class="row">
                              <div class="col-sm-12">
                                    <div class="form-group">
                                    <label class="col-lg-4 control-label font-noraml text-left">Old Password</label>
                                    <div class="col-lg-8">                                    
                                    <input type="password" name="oldpassword" id="oldpassword" class="form-control required">
                                    </div>
                                    </div>
                           </div>
                           </div>
                           <div class="row">
                              <div class="col-sm-12">
                                    <div class="form-group">
                                    <label class="col-lg-4 control-label font-noraml text-left">New Password</label>
                                    <div class="col-lg-8">
                                    <input type="password" name="password" id="password" class="form-control">
                                    </div>
                                    </div>
                           </div>
                           </div>
                           <div class="row">
                              <div class="col-sm-12">
                                    <div class="form-group">
                                    <label class="col-lg-4 control-label font-noraml text-left">Re-Enter New Password</label>
                                    <div class="col-lg-8">
                                    <input type="password" name="confirmed" id="confirmed" class="form-control">
                                    </div>
                                    </div>
                           </div>
                           </div>
                           
                               </div>
                               <div class="modal-footer">
                               <button type="button" class="btn closebtn" data-dismiss="modal">Close</button>
                               <input type="submit" name="changepasswordsubmit" id="changepasswordsubmit" class="btn savebtn" value="Save">
                               </div>
                               </form>
                                        
                                    </div>
                                </div>
                            </div>
                            </div>

@endsection


@extends('admin.layouts.usertype')

@section('content')

<link rel="stylesheet" href="{{ asset("/css/custom_style.css")}}">

<!-- Data Tables -->
    <link href="{{ asset("/css/plugins/dataTables/dataTables.bootstrap.css")}}" rel="stylesheet">
    <link href="{{ asset("/css/plugins/dataTables/dataTables.responsive.css")}}" rel="stylesheet">
    <link href="{{ asset("/css/plugins/dataTables/dataTables.tableTools.min.css")}}" rel="stylesheet">
     <link href="{{ asset("/css/plugins/sweetalert/sweetalert.css")}}" rel="stylesheet">
   <style>
.sweet-alert {min-height:0px !important; max-width: 355px; left:60%;}  
.sweet-alert h2 {font-size:14px !important;}
.sweet-alert button.cancel {background-color: #D0D0D0 !important;}
.sweet-alert button {background-color:#00c0ef !important;font-size: 12px; padding: 4px 12px; margin: 10px 5px 0 5px;}
   </style>


<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>User Type Maintenance</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="dashboard">Home</a>
                        </li>
                        
                        <li class="active">
                            <strong>User Type Maintenance</strong>
                        </li>
                        
                    </ol>
                </div>
               
                <div class="col-lg-2">
					<div class="title-action">
                        <a href="" class="btn btn-primary addnewusertype fa fa-plus" data-toggle="modal" data-target="#usertypeModal">Add New User Type</a>
                    </div>
                </div>
                
                <div class="col-lg-12">
                    <div class="logoutSucc" style="margin-top: 10px;">

                     @if (session('success'))
                    <div class="alert alert-success" role="success">
                    <span class="fa fa-exclamation-circle" aria-hidden="true"></span>
                    {{ session('success') }}
                    </div>
                    @endif

                    @if (session('error'))
                    <div class="alert alert-danger" role="danger">
                    <span class="fa fa-exclamation-circle" aria-hidden="true"></span>
                    {{ session('error') }}
                    </div>
                    @endif

					</div>

                </div>
                
            </div>

<div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>View User Type List</h5>
                    </div>
                    <div class="ibox-content">
                        <form name="thisForm" id="thisForm" method="post" action="">
                             {{ csrf_field() }}
                        <div class="table-responsive">
                    <table id="example1" class="table table-striped table-bordered table-hover dataTables-example" >
                    @if (count($usertypes) > 0)
                    <thead>
                    <tr>
                        <th><input name="select_all" value="1" type="checkbox"></th>
                        <th>User Type Name</th>                        
                        <th>Actions</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=0; ?>
                    @foreach ($usertypes as $usertype_list)    
                    <?php $i++;  
                    $status=$usertype_list->status;

                    ?>
                    <tr class="gradeX">
                        <td><?php echo '<input type="checkbox" name="ChkEvent[]" id="ChkEvent[]" value="'.$usertype_list->id.'" class="hobbies_class">'; ?></td>
                        <td>{{ $usertype_list->userType }}</td>                        
                        <td class="center"><a data-href="{{ url('/') }}" data-selecthref="{{ url(route('usertype.select', ['id' => $usertype_list->id])) }}" href="" class="editusertype" data-valueid="{{ $usertype_list->id }}" data-toggle="modal" data-target="#usertypeModal"><img  src="{{ asset('/img/edit.png') }}" border="0"  title="Edit"/></a>
                            <span class="deleteusertype" data-href="{{ url(route('usertype.delete')) }}"  data-valueid="{{ $usertype_list->id }}" data-chain="{{ $usertype_list->userType }}"style="padding-left: 25px;"><a href="javascript:;"><img  src="{{ asset('/img/delete.png') }}" border="0"  title="Delete"/></a></span>
                        </td>
                        <td class="center">
                          @if ($status==1)
                          <img  src="{{ asset('/img/active.gif') }}" border="0"  title="Active"/>
                          @else
                          <img  src="{{ asset('/img/deactive.gif') }}" border="0"  title="Deactive"/>
                          @endif  
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th colspan="5">
                       <div class="col-lg-2"> <a data-href="{{ url(route('usertype.activate')) }}" href="javascript:;" class="btn btn-primary activatusertype">
                        <i class="fa fa-check"></i><span class="bold">&nbsp;Activate</span></a>
                        </div>
                        
                        <div class="col-lg-2">
                        
                        <a data-href="{{ url(route('usertype.deactivate')) }}" href="javascript:;" class="btn btn-warning deactivateusertype">
                        <i class="fa fa-warning"></i><span class="bold">&nbsp;Deactivate</span></a>
                        </div>
                          <div class="col-lg-2">
                        
                        <a data-href="{{ url(route('usertype.delete')) }}" href="javascript:;" class="btn btn-danger deleteusertype">
                        <i class="fa fa-warning"></i><span class="bold">&nbsp;Delete</span></a>
                        </div>
                       </th>  
                    </tr>
                    @else
                    <tr class="gradeC"><td colspan="5" style="color:#FF0000; text-align:center;">No User Type(s) Found</td></tr>
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


        
        <div class="modal inmodal" id="usertypeModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated bounceInRight">
            <div class="chain_bg">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title title_bar">User Type Maintenance</h4>
                    <p>Just fill in your user type and we'll help you..</p>
                </div>
               
              <form name="usertypeadd" id="usertypeadd" action="{{ url(route('admin.add_usertype')) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                    <div class="modal-body">
                        <input type="hidden" name="editID" id="editID" />
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="col-lg-4 control-label font-noraml text-left">User Type</label>
                                    <div class="col-lg-8">
                                        <input type="text" name="userType" id="userType" placeholder="User Type" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>                       
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn closebtn" data-dismiss="modal">Close</button>
                        <input type="submit" name="usertypesubmit" id="usertypesubmit" class="btn savebtn" value="Save">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
	
@endsection


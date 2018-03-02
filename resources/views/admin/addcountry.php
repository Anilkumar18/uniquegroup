@extends('admin.layouts.adminLayout')

@section('content')

<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
<div class="col-lg-12">
<div class="col-lg-12 clsbreadcrumb">
<p> > Country Maintenance - Add New State</p>
</div>
<div class="col-lg-12 clsaddnewvendorform">
            <form name="statesadd" id="statesadd" method="post" action="{{ url(route('admin.addnewcountry'))}}" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="modal-body">
                <input type="hidden" id="editID"/>
                
                <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="country" class="col-md-3">Country Name</label>
                                
                                <div class="col-md-3">
    							<input type="text" name="countryName" id="countryName" placeholder="Country Name" class="form-control" />
                                </div>
  							</div>
                            
                        </row>

              <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="zip" class="col-md-3"></label>
    							<div class="col-md-3">
                               <input type="submit" name="addstates" id="addstates" value="Add" class="clsbutton"/>
                                 </div>
  							</div>
                            
                        </row>   
                
            </form>
          </div>
      </div>
     </div>
  </div>
@endsection 
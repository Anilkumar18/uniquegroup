@extends('admin.layouts.adminLayout')

@section('content')

<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
<div class="col-lg-12">
<div class="col-lg-12 clsbreadcrumb">
<p> > Country Maintenance - Add New State</p>
</div>
<div class="col-lg-12 clsaddnewvendorform">
            <form name="statesadd" id="statesadd" method="post" action="{{ url(route('admin.addnewstate'))}}" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="modal-body">
                <input type="hidden" id="editID"/>
                
                <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="country" class="col-md-3">Country</label>
                                
                                <div class="col-md-3">
    				 <select id="country" name="country" class="form-control">
                          <option value=""> Please Select Country</option>
                          @foreach($countries as $countrieslist)
                          <option value="{{$countrieslist->id}}">{{$countrieslist->Country}}</option>
                         @endforeach
                        </select>
                                </div>
  							</div>
                            
                        </row>
                <row class="col-md-12">
                          
                            <div class="form-group clsformelements">
    							<label for="country" class="col-md-3">State Name</label>
                                
                                <div class="col-md-3">
    							<input type="text" name="stateName" id="stateName" placeholder="State Name" class="form-control" />
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
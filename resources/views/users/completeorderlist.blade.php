@extends('users.layouts.developmentlist')

<?php
error_reporting(0);

?>
@section('content')

<div class="col-lg-12">
                        <img class="dashboard-mainimg"  src="{{ asset("/img/test2.png")}} " />
                        
                    </div>
<div class="col-lg-12">

          <div class="logoutSucc" style="margin-top: 10px;">



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
<div class="col-lg-12">
            
                <div class="wrapper wrapper-content">
                
                 <div class="row"><div class="col-lg-12">

                  <center></center></div></div></br>

                  <div class="col-lg-12"> > Complete Order List</div></br></br>

                                   


                  
                     
                </div>

            </div>






@endsection


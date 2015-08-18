@extends('layouts.master')

@section('pagetitle','New Company')

@endsection

@section('content')

   <div class="header">
            <h2>Add <strong>New</strong></h2>
            <div class="breadcrumb-wrapper">
              <ol class="breadcrumb">
                <li><a href="dashboad.html">Astronaut</a>
                </li>
                <li class="active">Add New Company</li>
              </ol>
            </div>
          </div>
    <div class="row">
        <div class="col-md-12">
            <div style="height:50vh;position:relative;"><div style="    position: absolute;
    top: 50%;
    transform: translateY(-50%);text-align:center;width:100%;">
             <button type="button" class="btn btn-dark" ><i class="fa fa-upload"></i>Upload</button>
                </div></div>
            
        </div>
    </div>

@endsection


@section('pagejs')


@endsection

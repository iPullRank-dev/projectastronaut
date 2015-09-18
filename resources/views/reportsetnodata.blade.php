@extends('layouts.master')


@section('pagetitle','Reportset')


@endsection

@section('content')

<!--upload modal-->

<div class="modal fade" id="uploadnew" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i></button>
        <h4 class="modal-title"><strong>Report</strong> Upload</h4>
      </div>
      <div class="modal-body">
          <div class="uploadbox">
        <form action="uploadreport" method="post" enctype="multipart/form-data" files="true">
            {!! csrf_field() !!}
    Select  Prospects CSV file:
    <input type="file" name="prospectsToUpload" id="prospectsToUpload" class="uploadinput" required >
    Select  Contacts CSV file:
    <input type="file" name="contactsToUpload" id="contactsToUpload" class="uploadinput" >
    <input type="submit" value="Upload" name="submit"  class="btn btn-dark">
</form>
          </div></div></div></div></div>
        
        

<!-- main part-->


   <div class="header">

            <h2>Report<strong>Setup</strong></h2>
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
                <p style="text-align:center;font-size:30px;margin-bottom:20px;">Upload a valid .CSV file to get start.</p>
             <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#uploadnew"><i class="fa fa-upload"></i>Upload</button>
                </div></div>
            
        </div>
    </div>

@endsection


@section('pagejs')

@endsection

@extends('layouts.master')

@section('pagetitle','Report Setup')

@section('content')

<!--upload modal-->



<div class="modal fade" id="uploadmodal" tabindex="-1" role="dialog" aria-hidden="true" >
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
    <input type="file" name="prospectsToUpload" id="prospectsToUpload" class="uploadinput" >
    Select  Contacts CSV file:
    <input type="file" name="contactsToUpload" id="contactsToUpload" class="uploadinput" >
            <p><input type="checkbox" name="clean" id="clean">Clean all the previous data</p>
    <input type="submit" value="Upload" name="submit"  class="btn btn-dark">
</form>
          </div></div>
      <!--<div class="modal-footer">
        <button type="button" class="btn btn-default btn-embossed" data-dismiss="modal">Close</button>
      </div>-->
    </div>
  </div>
</div>

<!--code modal-->

<div class="modal fade" id="codemodal" tabindex="-1" role="dialog" aria-hidden="true" >
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i></button>
        <h4 class="modal-title"><strong>Code</strong>Editing</h4>
      </div>
      <div class="modal-body">
          <div id="codebody"></div>
          <button class="btn btn-dark" id="codesave">Save</button>
          <div class="fixer"></div>
          </div>
      <!--<div class="modal-footer">
        <button type="button" class="btn btn-default btn-embossed" data-dismiss="modal">Close</button>
      </div>-->
    </div>
  </div>
</div>

<!--editor modal-->

<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-hidden="true" >
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i></button>
        <h4 class="modal-title"><strong>Record</strong>Editing</h4>
      </div>
      <div class="modal-body">
          <div id="editorbody">
                  <form action="updatecompany" method="post" enctype="multipart/form-data">
            {!! csrf_field() !!}
          <ul class="nav nav-tabs">
    <li class="active"><a href="#tab-1" data-toggle="tab">Company Info</a></li>
    <li><a href="#tab-2" data-toggle="tab">Grade</a></li>
</ul>
<div class="tab-content">
    <div class="tab-pane fade active in" id="tab-1">
    </div>
    <div class="tab-pane fade" id="tab-2">
        
    </div>
</div>
                <input style="float:right;margin-top:15px;"type="submit" value="Save" name="submit"  class="btn btn-dark">
              </form>
          </div>
          
          <div class="fixer"></div>
          </div>
      <!--<div class="modal-footer">
        <button type="button" class="btn btn-default btn-embossed" data-dismiss="modal">Close</button>
      </div>-->
    </div>
  </div>
</div>


<!--main content-->


    <div class="header">
            <h2>Report <strong>Setup</strong></h2>
            <div class="breadcrumb-wrapper">
              <ol class="breadcrumb">
                <li><a href="./dashboard">Astronaut</a>
                </li>
                <li class="active">Report Setup</li>
              </ol>
            </div>
          </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-header">
                    <h3>Edit<strong>Report</strong></h3>
                    
                    
                </div>
                <div class="panel-content">
                    <div >
                    <button type="button" id="upfile" class="btn btn-dark" style="float:left;margin-left:0px;"><i class="fa fa-upload"></i>Upload</button>
                         <a type="button" class="btn btn-success" style="float:right;" id="print" href="./print" target="_blank"><i class="fa fa-print"></i>Print Reports</a>
                        <a type="button" class="btn btn-dark" style="float:right;margin-left:0px;" href="./exportall" target="_blank"><i class="fa fa-download"></i>Export Urls</a>
                    <!--<button type="button" class="btn btn-success" style="float:right;"  id="table-edit_new"><i class="fa fa-plus"></i>Add New Line</button>-->
                   
                        <div class="fixer"></div>
                    </div>
                   <table class="table  dataTable" id="table-editable">
                    <thead>
                      <tr>
                          <th class="checkall" style="padding-left:8px;"><input type="checkbox" id="checkall"></th>
                        <th>Company</th>
                        <th>Grade</th>
                        <th># of Contacts</th>
                        <th class="text-right">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        foreach ($data as $item){
                            echo "<tr>";
                            echo "<td><input type='checkbox' name='checks' value='" . $item->id . "'></td>";
                        echo "<td>" . $item->fc_company_name . "</td>";
                        echo "<td>" . $item->final_grade . "</td>";
                        echo "<td>" . $item->user_total . "</td>";
                        echo "<td class='text-right'><a class='btn btn-sm btn-default' href='../display-report-authed/?report=" . $item->id ."' target='_blank'>Preview</a> <a class='btn btn-sm btn-default' name='edit' value='" . $item->id . "'><i class='icon-note'></i></a> <a class='btn btn-sm btn-default' name='code' value='" . $item->id . "'><i class='fa fa-file-code-o'></i></a> <a class='delete btn btn-sm btn-danger' href='javascript:;'><i class='icons-office-52'></i></a></td>";   
                        echo "</tr>";
                        };
                        ?> 
                    </tbody>
                  </table>
               
                </div>
            </div>
        
        </div>
    </div>


@endsection


@section('pagejs')

<script src="../resources/assets/customjs/reportsettable.js"></script>

<script src="../resources/assets/customjs/reportset.js"></script>

@endsection

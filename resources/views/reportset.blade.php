@extends('layouts.master')

@section('pagetitle','Report Setup')

@endsection

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
        <form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload" class="uploadinput" >
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
                         <button type="button" class="btn btn-success" style="float:right;"><i class="fa fa-print"></i>Print Reports</button>
                    <button type="button" class="btn btn-success" style="float:right;"  id="table-edit_new"><i class="fa fa-plus"></i>Add New Line</button>
                   
                        <div class="fixer"></div>
                    </div>
                   <table class="table  dataTable" id="table-editable">
                    <thead>
                      <tr>
                        <th>Company</th>
                        <th>Company site</th>
                        <th>score</th>
                        <th class="text-right">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        foreach ($data as $item){
                            echo "<tr>";
                        echo "<td>" . $item->fc_company_name . "</td>";
                        echo "<td>" . $item->fc_website . "</td>";
                        echo "<td>" . $item->final_score . "</td>";
                        echo "<td class='text-right'><a class='btn btn-sm btn-default' href='../display-report=" . $item->id ."'>Preview</a><a class='edit btn btn-sm btn-default' href='javascript:;'><i class='icon-note'></i></a> <a class='btn btn-sm btn-default' name='code' value='" . $item->id . "'><i class='fa fa-file-code-o'></i></a> <a class='delete btn btn-sm btn-danger' href='javascript:;'><i class='icons-office-52'></i></a></td>";   
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

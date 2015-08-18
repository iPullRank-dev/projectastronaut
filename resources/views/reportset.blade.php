@extends('layouts.master')

@section('pagetitle','Report Setup')

@endsection

@section('content')

    <div class="header">
            <h2>Report <strong>Setup</strong></h2>
            <div class="breadcrumb-wrapper">
              <ol class="breadcrumb">
                <li><a href="dashboad.html">Astronaut</a>
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
                    <button type="button" class="btn btn-dark" style="float:left;margin-left:0px;"><i class="fa fa-upload"></i>Upload</button>
                         <button type="button" class="btn btn-success" style="float:right;"><i class="fa fa-print"></i>Print Reports</button>
                    <button type="button" class="btn btn-success" style="float:right;"  id="table-edit_new"><i class="fa fa-plus"></i>Add New Line</button>
                   
                        <div class="fixer"></div>
                    </div>
                   <table class="table table-dynamic dataTable" id="table-editable">
                    <thead>
                      <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Points</th>
                        <th>Status</th>
                        <th class="text-right">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Smith</td>
                        <td>John</td>
                        <td>435</td>
                        <td>super Admin</td>
                        <td class="text-right">
                            <a class="edit btn btn-sm btn-default" href="javascript:;"><i class="icon-note"></i></a> 
                            
                            <a class="edit btn btn-sm btn-default" href="javascript:;"><i class="fa fa-file-code-o"></i></a>
                            <a class="delete btn btn-sm btn-danger" href="javascript:;"><i class="icons-office-52"></i></a>
                            
                        </td>
                      </tr>
                      <tr>
                        <td>Johnson</td>
                        <td>Alexa</td>
                        <td>220</td>
                        <td>super Admin</td>
                        <td class="text-right"><a class="edit btn btn-sm btn-default" href="javascript:;"><i class="icon-note"></i></a> <a class="edit btn btn-sm btn-default" href="javascript:;"><i class="fa fa-file-code-o"></i></a> <a class="delete btn btn-sm btn-danger" href="javascript:;"><i class="icons-office-52"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <td>Brown</td>
                        <td>Bobby</td>
                        <td>545</td>
                        <td>super Admin</td>
                        <td class="text-right"><a class="edit btn btn-sm btn-default" href="javascript:;"><i class="icon-note"></i></a> <a class="edit btn btn-sm btn-default" href="javascript:;"><i class="fa fa-file-code-o"></i></a> <a class="delete btn btn-sm btn-danger" href="javascript:;"><i class="icons-office-52"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <td>Miller</td>
                        <td>James</td>
                        <td>525</td>
                        <td>ipsume dolor</td>
                        <td class="text-right"><a class="edit btn btn-sm btn-default" href="javascript:;"><i class="icon-note"></i></a>  <a class="edit btn btn-sm btn-default" href="javascript:;"><i class="fa fa-file-code-o"></i></a><a class="delete btn btn-sm btn-danger" href="javascript:;"><i class="icons-office-52"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <td>Harris</td>
                        <td>Samantha</td>
                        <td>567</td>
                        <td class="center">nothing</td>
                        <td class="text-right"><a class="edit btn btn-sm btn-default" href="javascript:;"><i class="icon-note"></i></a> <a class="edit btn btn-sm btn-default" href="javascript:;"><i class="fa fa-file-code-o"></i></a> <a class="delete btn btn-sm btn-danger" href="javascript:;"><i class="icons-office-52"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <td>Thomson</td>
                        <td>Scott</td>
                        <td>435</td>
                        <td>super Admin</td>
                        <td class="text-right"><a class="edit btn btn-sm btn-default" href="javascript:;"><i class="icon-note"></i></a>  <a class="edit btn btn-sm btn-default" href="javascript:;"><i class="fa fa-file-code-o"></i></a><a class="delete btn btn-sm btn-danger" href="javascript:;"><i class="icons-office-52"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <td>Aishmen</td>
                        <td>Samuel</td>
                        <td>435</td>
                        <td>super Admin</td>
                        <td class="text-right"><a class="edit btn btn-sm btn-default" href="javascript:;"><i class="icon-note"></i></a> <a class="edit btn btn-sm btn-default" href="javascript:;"><i class="fa fa-file-code-o"></i></a> <a class="delete btn btn-sm btn-danger" href="javascript:;"><i class="icons-office-52"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <td>Addams</td>
                        <td>Kim</td>
                        <td>435</td>
                        <td>super Admin</td>
                        <td class="text-right"><a class="edit btn btn-sm btn-default" href="javascript:;"><i class="icon-note"></i></a> <a class="edit btn btn-sm btn-default" href="javascript:;"><i class="fa fa-file-code-o"></i></a> <a class="delete btn btn-sm btn-danger" href="javascript:;"><i class="icons-office-52"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <td>Morris</td>
                        <td>Heather</td>
                        <td>987</td>
                        <td>ipsume dolor</td>
                        <td class="text-right"><a class="edit btn btn-sm btn-default" href="javascript:;"><i class="icon-note"></i></a> <a class="edit btn btn-sm btn-default" href="javascript:;"><i class="fa fa-file-code-o"></i></a> <a class="delete btn btn-sm btn-danger" href="javascript:;"><i class="icons-office-52"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <td>Aster</td>
                        <td>Fred</td>
                        <td>567</td>
                        <td class="center">nothing</td>
                        <td class="text-right"><a class="edit btn btn-sm btn-default" href="javascript:;"><i class="icon-note"></i></a> <a class="edit btn btn-sm btn-default" href="javascript:;"><i class="fa fa-file-code-o"></i></a> <a class="delete btn btn-sm btn-danger" href="javascript:;"><i class="icons-office-52"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <td>Carry</td>
                        <td>John</td>
                        <td>987</td>
                        <td>ipsume dolor</td>
                        <td class="text-right"><a class="edit btn btn-sm btn-default" href="javascript:;"><i class="icon-note"></i></a> <a class="edit btn btn-sm btn-default" href="javascript:;"><i class="fa fa-file-code-o"></i></a> <a class="delete btn btn-sm btn-danger" href="javascript:;"><i class="icons-office-52"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <td>Paul</td>
                        <td>Billy</td>
                        <td>567</td>
                        <td class="center">nothing</td>
                        <td class="text-right"><a class="edit btn btn-sm btn-default" href="javascript:;"><i class="icon-note"></i></a> <a class="edit btn btn-sm btn-default" href="javascript:;"><i class="fa fa-file-code-o"></i></a> <a class="delete btn btn-sm btn-danger" href="javascript:;"><i class="icons-office-52"></i></a>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                   
                </div>
            </div>
        
        </div>
    </div>


@endsection


@section('pagejs')

<script src="../resources/assets/customjs/dash.js"></script>

@endsection

@extends('layouts.master')

@section('pagetitle','Company')

@endsection

@section('content')

     <div class="header">
            <h2>company_name <strong>Performance</strong></h2>
            <div class="breadcrumb-wrapper">
              <ol class="breadcrumb">
                <li><a href="dashboad.html">Astronaut</a>
                </li>
                <li>All Companies</li>
                  <li class="active">company_name</li>
              </ol>
            </div>
          </div>
    <div class="row">
        <div class="col-md-4" style="    height: 270px;
    position: relative;">
            <div style="position: relative;
    top: 50%;
    transform: translateY(-50%);
    text-align: center;
    width: 100%;">
                <div class="companyimg">
                    <img src="#">
                </div>
                <div class="companytitle">
                    <h2>company_name</h2>
                </div>
            </div>    
        </div>
        <div class="col-md-8">
            <div><span style="width: 10px;height: 10px;background-color: rgba(151,187,205,1);display: inline-block;margin: 0 5;"></span># of New Contacts
                </div>
            <div style="margin-bottom:20px;">
             <canvas id="testChart" width="500" height="250px"></canvas>
            </div>
        </div>      
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-header">
                    <h3>All<strong>Contacts</strong></h3>
                </div>
                <div class="panel-content">
                    <div>
                    <button type="button" class="btn btn-dark" style="float:right;margin-left:0px;"><i class="fa fa-download"></i>Export</button>
                         
                    <button type="button" class="btn btn-success" style="float:right;" id="addnewrow"><i class="fa fa-plus"></i>Add New Line</button>
                   
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
                            
                             
                            <a class="delete btn btn-sm btn-danger" href="javascript:;"><i class="icons-office-52"></i></a>
                            
                        </td>
                      </tr>
                      <tr>
                        <td>Johnson</td>
                        <td>Alexa</td>
                        <td>220</td>
                        <td>super Admin</td>
                        <td class="text-right"><a class="edit btn btn-sm btn-default" href="javascript:;"><i class="icon-note"></i></a>   <a class="delete btn btn-sm btn-danger" href="javascript:;"><i class="icons-office-52"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <td>Brown</td>
                        <td>Bobby</td>
                        <td>545</td>
                        <td>super Admin</td>
                        <td class="text-right"><a class="edit btn btn-sm btn-default" href="javascript:;"><i class="icon-note"></i></a>   <a class="delete btn btn-sm btn-danger" href="javascript:;"><i class="icons-office-52"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <td>Miller</td>
                        <td>James</td>
                        <td>525</td>
                        <td>ipsume dolor</td>
                        <td class="text-right"><a class="edit btn btn-sm btn-default" href="javascript:;"><i class="icon-note"></i></a>   <a class="delete btn btn-sm btn-danger" href="javascript:;"><i class="icons-office-52"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <td>Harris</td>
                        <td>Samantha</td>
                        <td>567</td>
                        <td class="center">nothing</td>
                        <td class="text-right"><a class="edit btn btn-sm btn-default" href="javascript:;"><i class="icon-note"></i></a>   <a class="delete btn btn-sm btn-danger" href="javascript:;"><i class="icons-office-52"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <td>Thomson</td>
                        <td>Scott</td>
                        <td>435</td>
                        <td>super Admin</td>
                        <td class="text-right"><a class="edit btn btn-sm btn-default" href="javascript:;"><i class="icon-note"></i></a>   <a class="delete btn btn-sm btn-danger" href="javascript:;"><i class="icons-office-52"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <td>Aishmen</td>
                        <td>Samuel</td>
                        <td>435</td>
                        <td>super Admin</td>
                        <td class="text-right"><a class="edit btn btn-sm btn-default" href="javascript:;"><i class="icon-note"></i></a>   <a class="delete btn btn-sm btn-danger" href="javascript:;"><i class="icons-office-52"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <td>Addams</td>
                        <td>Kim</td>
                        <td>435</td>
                        <td>super Admin</td>
                        <td class="text-right"><a class="edit btn btn-sm btn-default" href="javascript:;"><i class="icon-note"></i></a>   <a class="delete btn btn-sm btn-danger" href="javascript:;"><i class="icons-office-52"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <td>Morris</td>
                        <td>Heather</td>
                        <td>987</td>
                        <td>ipsume dolor</td>
                        <td class="text-right"><a class="edit btn btn-sm btn-default" href="javascript:;"><i class="icon-note"></i></a>   <a class="delete btn btn-sm btn-danger" href="javascript:;"><i class="icons-office-52"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <td>Aster</td>
                        <td>Fred</td>
                        <td>567</td>
                        <td class="center">nothing</td>
                        <td class="text-right"><a class="edit btn btn-sm btn-default" href="javascript:;"><i class="icon-note"></i></a>   <a class="delete btn btn-sm btn-danger" href="javascript:;"><i class="icons-office-52"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <td>Carry</td>
                        <td>John</td>
                        <td>987</td>
                        <td>ipsume dolor</td>
                        <td class="text-right"><a class="edit btn btn-sm btn-default" href="javascript:;"><i class="icon-note"></i></a>   <a class="delete btn btn-sm btn-danger" href="javascript:;"><i class="icons-office-52"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <td>Paul</td>
                        <td>Billy</td>
                        <td>567</td>
                        <td class="center">nothing</td>
                        <td class="text-right"><a class="edit btn btn-sm btn-default" href="javascript:;"><i class="icon-note"></i></a>   <a class="delete btn btn-sm btn-danger" href="javascript:;"><i class="icons-office-52"></i></a>
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

<script src="../resources/assets/customjs/company.js"></script>

@endsection

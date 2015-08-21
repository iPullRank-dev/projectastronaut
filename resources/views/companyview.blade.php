@extends('layouts.master')

@section('pagetitle','Company')

@endsection

@section('content')

     <div class="header">
            <h2><?php echo $data[0]->fc_company_name ?><strong> Performance</strong></h2>
            <div class="breadcrumb-wrapper">
              <ol class="breadcrumb">
                <li><a href="dashboad.html">Astronaut</a>
                </li>
                <li>All Companies</li>
                  <li class="active"><?php echo $data[0]->fc_company_name ?></li>
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
                    <h2><?php echo $data[0]->fc_company_name ?></h2>
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
                        <th>Name</th>
                        <th>Title</th>
                        <th>Email</th>
                        <th class="text-right">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        foreach ($contacts as $item){
                            echo "<tr onclick=\"window.document.location='/admin/user-detail=" . $item->id . "';\">";
                        echo "<td>" . $item->full_name . "</td>";
                        echo "<td>" . $item->title . "</td>";
                        echo "<td>" . $item->email . "</td>";
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

<script src="../resources/assets/customjs/company.js"></script>

@endsection

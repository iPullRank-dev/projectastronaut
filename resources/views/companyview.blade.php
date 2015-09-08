@extends('layouts.master')

@section('pagetitle','Company')

@endsection

@section('content')
    <script>
        var companyid = <?php echo json_encode($data[0]->id); ?>;
        var companyname = <?php echo json_encode($data[0]->fc_company_name); ?>;
    </script>


<!--modal-->

<div class="modal fade" id="urlModal" tabindex="-1" role="dialog" aria-hidden="true" >
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i></button>
        <h4 class="modal-title"><strong>Contact</strong>URL</h4>
      </div>
      <div class="modal-body">
          <div id="urlboxbody"></div>
        </div></div></div></div>

<!--main-->
     <div class="header">
            <h2><?php echo $data[0]->fc_company_name ?><strong> Performance</strong></h2>
            <div class="breadcrumb-wrapper">
              <ol class="breadcrumb">
                <li><a href="./dashboard">Astronaut</a>
                </li>
                  <li><a href="./all-companies">All Companies</a></li>
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
                    <?php echo "<img src='" . $data[0]->fc_logo_url . "' height='120' >" ?>
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
            <div class="panel companyviewlist">
                <div class="panel-header">
                    <h3>All<strong>Contacts</strong></h3>
                </div>
                <div class="panel-content">
                    <div>
                    <button type="button" class="btn btn-dark" style="float:right;margin-left:0px;"><i class="fa fa-download"></i>Export</button>
                         
                    <button type="button" class="btn btn-success" style="float:right;" id="user_new"><i class="fa fa-plus"></i>Add New Line</button>
                   
                        <div class="fixer"></div>
                    </div>
                   <table class="table dataTable" id="table-editable2">
                    <thead>
                      <tr>
                          <th></th>
                        <th>Name</th>
                        <th>Title</th>
                        <th>Email</th>
                        <th class="text-right">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        foreach ($contacts as $item){
                            echo "<tr>";
                        echo "<td><div class='uhead'><img src='" . $item->fc_gravatar . "' height='40'></div></td>";
                        echo "<td>" . $item->full_name . "</td>";
                        echo "<td>" . $item->title . "</td>";
                        echo "<td>" . $item->email . "</td>";
                        echo " <td class='text-right'><a class='btn btn-sm btn-default' href='user-detail=" . $item->id . "'>Performance</a> <a class='btn btn-sm btn-default' name='userurl' value='" . $item->id . "'><i class='fa fa-link'></i></a> <a class='edit btn btn-sm btn-default' href='javascript:;'><i class='icon-note'></i></a> <a class='delete btn btn-sm btn-danger' href='javascript:;'><i class='icons-office-52'></i></a></td>";
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
<script src="../resources/assets/customjs/companyviewtable.js"></script>

@endsection

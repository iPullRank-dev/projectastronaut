@extends('layouts.master')

@section('pagetitle','Dashboard')

@endsection

@section('content')

     <div class="header">
            <h2>Dash<strong>board</strong></h2>
          </div>
    <div class="row dashstyle">
        <div class="col-md-7">
            <div><span style="width: 10px;height: 10px;background-color: rgba(220,220,220,1);display: inline-block;margin: 0 5;"></span>Pageviews
                <span style="width: 10px;height: 10px;background-color: rgba(151,187,205,1);display: inline-block;margin: 0 5;">
                </span>Conversions</div>
            <div style="margin-bottom:20px;">
                 <canvas id="myChart" width="500" height="300px"></canvas>
            </div>
          </div>
       
        <div class="col-md-5">
          <div class="panel" style="height:320px;">
            <div class="panel-header">
                <h3>New <strong>Contacts</strong></h3>
            </div>
            <div class="panel-content" >
                <table class="table" id="table-newcontact">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Company</th>
                        <th>Email</th>
                      </tr>
                    </thead>
                    <tbody>
                     <?php
                        foreach ($newusers as $item){
                            echo "<tr onclick=\"window.document.location='dashboard';\">";
                        echo "<td>" . $item->full_name . "</td>";
                        echo "<td>" . $item->company . "</td>";
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
    <div class="row dashstyle">
        <div class="col-md-12">
        
            <div class="panel">
            <div class="panel-header">
                <h3>All <strong>Contact</strong></h3>
            </div>
            <div class="panel-content" id="dashmaintable">
                   <table class="table table-dynamic">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Company</th>
                        <th>Title</th>
                        <th>Email</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        foreach ($allcontacts as $item){
                            echo "<tr onclick=\"window.document.location='/admin/user-detail?id=" . $item->id . "';\">";
                        echo "<td>" . $item->full_name . "</td>";
                        echo "<td>" . $item->company . "</td>";
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

<script src="../resources/assets/customjs/dash.js"></script>

@endsection

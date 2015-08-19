@extends('layouts.master')

@section('pagetitle','All Companies')

@endsection

@section('content')

<div class="header">
            <h2>All <strong>Companies</strong></h2>
            <div class="breadcrumb-wrapper">
              <ol class="breadcrumb">
                <li><a href="dashboad.html">Astronaut</a>
                </li>
                <li class="active">All Companies</li>
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
                    
                   <table class="table table-dynamic table-hover dataTable">
                    <thead>
                      <tr>
                        <th>Company Name</th>
                        <th>Last Name</th>
                        <th>Points</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($companies as $company){
                            echo "<tr onclick='window.document.location='dash.blade.php';'>";
                        echo "<td>" . $company->fc_company_name . "</td>";
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


@endsection

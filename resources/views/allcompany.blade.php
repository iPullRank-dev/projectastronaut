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
            <div class="panel allcomp">
                <div class="panel-header">
                    <h3>Company<strong>List</strong></h3>
                </div>
                <div class="panel-content">
                    
                   <table class="table table-dynamic table-hover dataTable">
                    <thead>
                      <tr>
                        <th>Company Logo</th>
                        <th>Company Name</th>
                        <th>Website</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                       <?php
                        foreach ($data as $item){
                            echo "<tr onclick=\"window.document.location='company-view=" . $item->id . "';\">";
                        echo "<td><div class='clogo'><img src='" . $item->fc_logo_url . "' height='40'></div></td>";
                        echo "<td>" . $item->fc_company_name . "</td>";
                        echo "<td>" . $item->fc_website . "</td>";
                        echo "<td></td>";
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

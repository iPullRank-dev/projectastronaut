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
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Points</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                        <tr onclick="window.document.location='company.php';">
                        <td>Smith</td>
                        <td>John</td>
                        <td>435</td>
                        <td>super Admin</td>
        
                          </tr>
                      <tr>
                        <td>Johnson</td>
                        <td>Alexa</td>
                        <td>220</td>
                        <td>super Admin</td>
                       
                      </tr>
                      <tr>
                        <td>Brown</td>
                        <td>Bobby</td>
                        <td>545</td>
                        <td>super Admin</td>
                        
                      </tr>
                      <tr>
                        <td>Miller</td>
                        <td>James</td>
                        <td>525</td>
                        <td>ipsume dolor</td>
                  
                      </tr>
                      <tr>
                        <td>Harris</td>
                        <td>Samantha</td>
                        <td>567</td>
                        <td class="center">nothing</td>
                        
                      </tr>
                      <tr>
                        <td>Thomson</td>
                        <td>Scott</td>
                        <td>435</td>
                        <td>super Admin</td>
                       
                      </tr>
                      <tr>
                        <td>Aishmen</td>
                        <td>Samuel</td>
                        <td>435</td>
                        <td>super Admin</td>
                       
                      </tr>
                      <tr>
                        <td>Addams</td>
                        <td>Kim</td>
                        <td>435</td>
                        <td>super Admin</td>
                     
                      </tr>
                      <tr>
                        <td>Morris</td>
                        <td>Heather</td>
                        <td>987</td>
                        <td>ipsume dolor</td>
                       
                      </tr>
                      <tr>
                        <td>Aster</td>
                        <td>Fred</td>
                        <td>567</td>
                        <td class="center">nothing</td>
                       
                      </tr>
                      <tr>
                        <td>Carry</td>
                        <td>John</td>
                        <td>987</td>
                        <td>ipsume dolor</td>
                        
                      </tr>
                      <tr>
                        <td>Paul</td>
                        <td>Billy</td>
                        <td>567</td>
                        <td class="center">nothing</td>
                        
                      </tr>
                    </tbody>
                  </table>
                   
                </div>
            </div>
        
        </div>
    </div>

@endsection


@section('pagejs')

@endsection

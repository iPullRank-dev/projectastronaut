@extends('layouts.master')

@section('pagetitle','Dashboard')

@endsection

@section('content')

     <div class="header">
            <h2>Dash<strong>board</strong></h2>
            
          </div>
    <div class="row">
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
                        <th>#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                      </tr>
                      <tr>
                        <td>3</td>
                        <td colspan="2">Larry the Bird</td>
                        <td>@twitter</td>
                      </tr>
                      <tr>
                        <td>4</td>
                        <td>Steve</td>
                        <td>Urkel</td>
                        <td>@steve</td>
                      </tr>
                        <tr>
                        <td>4</td>
                        <td>Steve</td>
                        <td>Urkel</td>
                        <td>@steve</td>
                      </tr>
                        <tr>
                        <td>4</td>
                        <td>Steve</td>
                        <td>Urkel</td>
                        <td>@steve</td>
                      </tr>
                        <tr>
                        <td>4</td>
                        <td>Steve</td>
                        <td>Urkel</td>
                        <td>@steve</td>
                      </tr>
                        <tr>
                        <td>4</td>
                        <td>Steve</td>
                        <td>Urkel</td>
                        <td>@steve</td>
                      </tr>
                    </tbody>
                </table>
            </div>
            </div>
          </div>
    </div>
    <div class="row">
        <div class="col-md-12">
        
            <div class="panel">
            <div class="panel-header">
                <h3>All <strong>Contact</strong></h3>
            </div>
            <div class="panel-content" id="dashmaintable">
                   <table class="table table-dynamic">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                      </tr>
                      <tr>
                        <td>3</td>
                        <td colspan="2">Larry the Bird</td>
                        <td>@twitter</td>
                      </tr>
                      <tr>
                        <td>4</td>
                        <td>Steve</td>
                        <td>Urkel</td>
                        <td>@steve</td>
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

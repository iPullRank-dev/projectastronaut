@extends('layouts.master')

@section('pagetitle','Company')

@endsection

@section('content')
    <script type="text/javascript">
        var gadata = <?php echo json_encode($analytics);?>;
    </script>

    <div class="header">
            <h2>Contact <strong>Info</strong></h2>
            <div class="breadcrumb-wrapper">
              <ol class="breadcrumb">
                <li><a href="./dashboard">Astronaut</a>
                </li>
                <li><?php echo "<a href='company-view=" . $data[0]->company_id . "'>" . $data[0]->company . "</a>"?></li>
                  <li class="active"><?php echo $data[0]->full_name ?></li>
              </ol>
            </div>
          </div>
    <div class="row" style="margin: 10px -15px;">
        <div class="col-md-12">
            <div style="float:left;text-align:center;">
                <div class="contactimg">
                    <?php echo "<img src='" . $data[0]->fc_gravatar . "' height='80' >"?>
                </div>
                <div class="contacttitle">
                    <h3><?php echo $data[0]->full_name ?></h3>
                </div>    
            </div>
            <div style="float:right;">
                <button type="button" class="btn btn-dark"><i class="fa fa-download"></i>Export</button>
            </div>
            <div class="fixer"></div>
    </div>
    </div>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div><span style="width: 10px;height: 10px;background-color: rgba(151,187,205,1);display: inline-block;margin: 0 5;"></span>Conversions
                </div>
            <div style="margin-bottom:20px;">
             <canvas id="contactChart1" width="500" height="250px"></canvas>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div><span style="width: 10px;height: 10px;background-color: rgba(151,187,205,1);display: inline-block;margin: 0 5;"></span># of Views
                </div>
            <div style="margin-bottom:20px;">
             <canvas id="contactChart2" width="500" height="250px"></canvas>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>

@endsection


@section('pagejs')

<script src="../resources/assets/customjs/contact.js"></script>

@endsection

@extends('layouts.report-temp')

@section('customcode')

<?php echo $companyinfo[0]->code_zone ;?>

@endsection


@section('passdata')

<script>
        var hash = <?php echo json_encode($hash); ?>;
        var c_name = <?php echo json_encode($companyinfo[0]->fc_company_name);?>;
        var c_id = <?php echo json_encode($companyinfo[0]->id);?>;
        var c_account = <?php echo json_encode($companyinfo[0]->account_with);?>;
</script>

@endsection

@section('companyid')

<?php
    echo $companyinfo[0]->id;
?>

@endsection

@section('grade')

<?php 

if(isset($data)){
echo $data[0]->final_grade;};

?>


@endsection

@section('rank')

<?php 

if(isset($data)){
echo $data[0]->rank;};

?>


@endsection

@section('company')

<div id="reportcompany">
    <div style="text-align:center;" class="ctitle">
    <?php
        echo "<img src='" . $companyinfo[0]->fc_logo_url . "' width='80'>";
    ?>
    <h2><?php echo $companyinfo[0]->fc_company_name ?></h2>
    </div>
    <div class="cdetail">
        <h3>Founded</h3>   
        <p> 
            <?php echo $companyinfo[0]->fc_founded ?>
        </p>
        <h3>Employees</h3> 
        <p>   
            <?php echo $companyinfo[0]->fc_approx_employees ?>
        </p>
        <h3>Overview</h3>  
        <p>  
            <?php echo $companyinfo[0]->fc_overview ?>
        </p>
    </div>
</div>


@endsection



@section('companym')

<div id="reportcompany">
    <div style="text-align:center;">
    <?php
        echo "<img src='" . $companyinfo[0]->fc_logo_url . "' width='80'>";
    ?>
    </div>
    <div class="cdetail">
        <p>
        <h3>Founded</h3>    
            <?php echo $companyinfo[0]->fc_founded ?>
        </p>
        <p>
        <h3>Employees</h3>    
            <?php echo $companyinfo[0]->fc_approx_employees ?>
        </p>
        <p>
        <h3>Overview</h3>    
            <?php echo $companyinfo[0]->fc_overview ?>
        </p>
    </div>
</div>

@endsection

@section('companymname')

    <?php echo $companyinfo[0]->fc_company_name ?>

@endsection

@section('unnatural_link')

<div><?php echo $copycontent['unnatural_link'] ?></div>

@endsection

@section('spam_score')

<div><?php echo $copycontent['spam_score'] ?></div>

@endsection

@section('trust_metrics')

<div><?php echo $copycontent['trust_metrics'] ?></div>

@endsection

@section('link_popularity')

<div><?php echo $copycontent['link_popularity'] ?></div>

@endsection

<?php
        $level=array("a"=>"Excellent","b"=>"Good","c"=>"Average","d"=>"Poor");
?>

@section('unnatural_link-level')
    <?php echo (isset($level[strtolower($data[0]->unnatural_link)])?$level[strtolower($data[0]->unnatural_link)]:'Unavaliable')?>
@endsection

@section('spam_score-level')
    <?php echo (isset($level[strtolower($data[0]->spam_score)])?$level[strtolower($data[0]->spam_score)]:'Unavaliable')?>
@endsection

@section('trust_metrics-level')
    <?php echo (isset($level[strtolower($data[0]->trust_metrics)])?$level[strtolower($data[0]->trust_metrics)]:'Unavaliable')?>
@endsection

@section('link_popularity-level')
    <?php echo (isset($level[strtolower($data[0]->link_popularity)])?$level[strtolower($data[0]->link_popularity)]:'Unavaliable')?>
@endsection

@section('pagejs')

    <script src="http://cdn.jsdelivr.net/fingerprintjs2/0.7.0/fingerprint2.min.js"></script>
    <script src="../resources/assets/customjs/report.js"></script>


@endsection

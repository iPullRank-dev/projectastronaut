@extends('layouts.report-temp')

@section('pagetitle','{{Company Name}} Report')

@section('passdata')

<script>
        var hash = <?php echo json_encode($hash); ?>;
        var c_name = <?php echo json_encode($companyinfo[0]->fc_company_name);?>;
        var c_id = <?php echo json_encode($companyinfo[0]->id);?>;
</script>

@endsection


@section('grade')

<?php 

//if(isset($data)){
//echo $data[0]->final_score;};

?>

B
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

@section('quad1')

One thing Google takes very seriously is the existence of unnatural links pointing to your website and you're currently in the danger zone for some major penalties. When it comes to your link profile, "black hat" tactics such as purchasing links, excessive link exchanges, blog spam, comment spam and online directories are a sure-fire way of getting hit with Google penalties that can take up to several months to resolve. While proper link building methods can seem exhaustive and time-consuming, it is crucial to the success of your online business.

@endsection

@section('quad2')

    Spam is the four-letter word that no online marketer wants to hear but you've managed to keep your link profile squeaky clean! Your high domain diversity is nothing short of stellar and when it comes to meaty content and internal links, you've got it going on! Less is more when it comes to spam flags and your count is under five; way to go rock star!

@endsection

@section('quad3')

We've noticed that you're working hard to score high on Trust Metrics but you're not quite where you should be. With all the tips out there on Google Rankings, it's easy to think that an abundance of site links and high page rank is enough to be considered a trustworthy domain. Newsflash, domain authority and diversity are far superior contributors to stellar Trust Metrics. While Trust Metrics can be a complex animal to conquer, solutions are right around the corner.

@endsection

@section('quad4')

You're so popular that even Google's raving about you! Your link popularity is through the roof which attracts lots of eyes to your content. Your domain is linking to many power players of the web and your link distribution is impressive. You understand that while keywords, anchor text and page rank are important factors, domain authority and diversity is crucial. Congrats on being part of the SEO cool crowd!

@endsection

@section('pagejs')

    <script src="http://cdn.jsdelivr.net/fingerprintjs2/0.7.0/fingerprint2.min.js"></script>
    <script src="../resources/assets/customjs/report.js"></script>


@endsection

<html class="" lang="en">

<head>

  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <meta name="description" content="Project Astronaut">
    
  <meta name="csrf_token" content="{{ csrf_token() }}" />    

  <link rel="shortcut icon" href="../resources/assets/images/favicon.png" type="image/png">

  <title>Project Astronaut - Build 0.1 - @yield('pagetitle')</title>

    <style>
body,html{

    font-family: Helvetica;
}
        #headpar{
        
            margin-bottom:30px;
        }
        table{
            width:100%;
        }
        
        table td{
            height:200px;
        }
        
        .left{
            width:200px;
            text-align:center;
            background-color:#e1ecef;
        }
        
        .right{
            width:cal(100% - 200px);
            padding:0px 20px;
        }
        
        .right h1{
            font-weight:100;
            font-size:40px;
            color:#4c4c4c;
            margin-top:0px;
        }
        
        .right p{
            color: #a4a4a4;
            margin: 5px 0px;
            font-weight: 100;
        }
        
        .quad{
            margin:20px 0px;
        }
        
        .title{
            font-size:20px;
            border-bottom:1px solid #e1e1e1;
            padding:10px 0px;
            color:#319db5;
        }
        
        .content{
            padding:10px 0px;
            color:#636363;
        }
        
</style>


</head>
<body>

<div id="headpar">
    <table style="border:1px solid #e1e1e1;border-collapse: collapse;">
        <tr>
            <td class="left">
                <div>
                    <div style="font-size:70px;color:#319db5;"><?php echo $data[0]->final_score;?></div>
                    <div style="font-size:12px;">Grade</div>
                </div>
            </td>
            <td class="right">
                <h1><?php echo $companyinfo[0]->fc_company_name ?></h1>
                <p>Founded: <?php echo $companyinfo[0]->fc_founded ?></p>
                <p>Employee: <?php echo $companyinfo[0]->fc_approx_employees ?></p>
            </td>
        </tr>
    </table>
</div>
    
    <?php
        $level=array("a"=>"Excellent","b"=>"Good","c"=>"Average","d"=>"Poor");
?>

    
<div id="main">
    <div class="quad">
        <div class="title">UNNATURAL LINKING - <?php echo (isset($level[strtolower($data[0]->quad1)])?$level[strtolower($data[0]->quad1)]:'Unavaliable')?></div>
        <div class="content">
            <?php echo $copycontent['quad1'] ?>
        </div>
    </div>
    <div class="quad">
        <div class="title">SPAM SCORE - <?php echo (isset($level[strtolower($data[0]->quad2)])?$level[strtolower($data[0]->quad2)]:'Unavaliable')?></div>
        <div class="content"><?php echo $copycontent['quad2'] ?></div>
    </div>
    <div class="quad">
        <div class="title">TRUST METRICS - <?php echo (isset($level[strtolower($data[0]->quad3)])?$level[strtolower($data[0]->quad3)]:'Unavaliable')?></div>
        <div class="content"><?php echo $copycontent['quad3'] ?></div>
    </div>
    <div class="quad">
        <div class="title">LINK POPULARITY AND VISIBILITY - <?php echo (isset($level[strtolower($data[0]->quad4)])?$level[strtolower($data[0]->quad4)]:'Unavaliable')?></div>
        <div class="content"><?php echo $copycontent['quad4'] ?>
</div>
    </div>
</div>
    
    

<!-- END PAGE SCRIPTS -->

</body>

</html>    
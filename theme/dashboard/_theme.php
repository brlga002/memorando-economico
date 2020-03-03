<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="pt-br">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $title ?></title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="<?= url("theme/dashboard/")?>apple-icon.png">
    <link rel="shortcut icon" href="<?= url("theme/dashboard/")?>favicon.ico">

    <link rel="stylesheet" href="<?= url("theme/dashboard/")?>vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= url("theme/dashboard/")?>vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= url("theme/dashboard/")?>vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="<?= url("theme/dashboard/")?>vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?= url("theme/dashboard/")?>vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="<?= url("theme/dashboard/")?>vendors/jqvmap/dist/jqvmap.min.css">

    <link rel="stylesheet" href="<?= url("theme/dashboard/")?>assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <!--link of page -->
    <?= $v->section("link") ?>  

    

</head>

<body>

    <!-- Left Panel -->
    <?php $v->insert("sections/leftPanel") ?>
    <!-- Left Panel -->

    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <?php //$v->insert("sections/header") ?>
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Home</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Home</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">

         <?php //$v->insert("sections/alerts") ?>

         <div class="col-sm-12">
         <?= $v->section("content") ?>
         </div>       

        </div> <!-- .content -->
    </div><!-- /#right-panel -->
    <!-- Right Panel -->

    <!--script src="<?= url("theme/dashboard/")?>vendors/jquery/dist/jquery.min.js"></script>
    <script src="<?= url("theme/dashboard/")?>vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?= url("theme/dashboard/")?>vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?= url("theme/dashboard/")?>assets/js/main.js"></script>
    <script src="<?= url("theme/dashboard/")?>vendors/chart.js/dist/Chart.bundle.min.js"></script>
    <script src="<?= url("theme/dashboard/")?>assets/js/dashboard.js"></script>
    <script src="<?= url("theme/dashboard/")?>assets/js/widgets.js"></script>
    <script src="<?= url("theme/dashboard/")?>vendors/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="<?= url("theme/dashboard/")?>vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <script src="<?= url("theme/dashboard/")?>vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>

    <script>
        (function($) {
            "use strict";

            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
        })(jQuery);
    </script>
    -->
<!--JS of page -->
<?= $v->section("js") ?>
</body>

</html>

<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8"/>
    <title>Test</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
    <link href="<?php echo SITE_DIR; ?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo SITE_DIR; ?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo SITE_DIR; ?>assets/global/plugins/bootstrap-toastr/toastr.min.css" rel="stylesheet" type="text/css"/>

    <link href="<?php echo SITE_DIR; ?>assets/global/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" type="text/css">
    <?php if ($styles): ?>
        <?php foreach ($styles as $style): ?>
            <link href="<?php echo $style; ?>" rel="stylesheet" type="text/css"/>
        <?php endforeach; ?>
    <?php endif; ?>
    <link href="<?php echo SITE_DIR; ?>css/backend/style.css" rel="stylesheet" type="text/css"/>
    <link rel="shortcut icon" href="favicon.ico"/>
    <!--[if lt IE 9]>
    <script src="<?php echo SITE_DIR; ?>assets/global/plugins/respond.min.js"></script>
    <script src="<?php echo SITE_DIR; ?>assets/global/plugins/excanvas.min.js"></script>
    <![endif]-->
    <script src="<?php echo SITE_DIR; ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo SITE_DIR; ?>assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
    <!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
    <script src="<?php echo SITE_DIR; ?>assets/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
    <script src="<?php echo SITE_DIR; ?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo SITE_DIR; ?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
    <script src="<?php echo SITE_DIR; ?>assets/global/plugins/datatables/all.min.js" type="text/javascript"></script>
    <script src="<?php echo SITE_DIR; ?>assets/global/plugins/bootstrap-toastr/toastr.min.js" type="text/javascript"></script>
    <script src="<?php echo SITE_DIR; ?>js/notifier.js" type="text/javascript"></script>
    <?php if ($scripts): ?>
        <?php foreach ($scripts as $script): ?>
            <script src="<?php echo $script; ?>" type="text/javascript"></script>      
        <?php endforeach; ?>
    <?php endif; ?>
    <script src="<?php echo SITE_DIR; ?>js/script.js" type="text/javascript"></script>
</head>



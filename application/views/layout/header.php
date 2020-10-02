<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-Language" content="en">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Al Shirawi | Engineering</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
        <meta name="description" content="MEP Dashboard">
        <meta name="msapplication-tap-highlight" content="no">
        <meta name="google-signin-client_id" content="425358583339-far844lf77h43iedtf5ikgvt9k4kq3rv.apps.googleusercontent.com">

        <link rel="stylesheet" href="<?= base_url() ?>public/assets/main-2.css" />
        <link rel="stylesheet" href="<?= base_url() ?>public/assets/mep.css" />
        <!--<link rel="stylesheet" href="<?= base_url() ?>public/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css" />-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <!--<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">-->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/ui-lightness/jquery-ui.css">
        
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>public/assets/scripts/Chart.min.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>public/assets/scripts/mep.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>public/assets/scripts/project.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>public/assets/scripts/billing.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>public/assets/scripts/inspection.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>public/assets/scripts/issue.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>public/assets/scripts/material.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>public/assets/scripts/shop_drawing.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>public/assets/scripts/asbuilt_drawing.js"></script>
        
        <style>
            /*.login-bg{background: url(<?= base_url() . '/public/images/dubai1.jpg' ?>);background-size: cover; background-attachment: fixed; background-repeat: no-repeat; background-position: center;}*/
            .login-bg{background: url('https://drive.google.com/uc?export=view&id=1U1a5AvzIIdienhM3Rv_cxFzZ3L7fU1xh');background-size: cover; background-attachment: fixed; background-repeat: no-repeat; background-position: center;}
        </style>
        <script>
            $(document).ready(function () {
                $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {
                    localStorage.setItem('activeTab', $(e.target).attr('href'));
                });
                var activeTab = localStorage.getItem('activeTab');
                if (activeTab) {
                    $('#myTab a[href="' + activeTab + '"]').tab('show');
                }
            });
            var SHOWALLMILESTONEURL = "<?= base_url() . 'milestone/AJAXshowOverallMilestones'; ?>";
            var MILESTONE_URL = "<?= base_url() . 'milestone/AJAXgetMilestoneProject'; ?>";
            var ADDMILESTONE = "<?= base_url() . 'milestone/AJAXaddMilestone'; ?>";
            var MASTERFORMURL = "<?= base_url() . 'milestone/AJAXgetMasterForm'; ?>";
            var MILESTONEFORMURL = "<?= base_url() . 'milestone/AJAXgetMilestoneForm'; ?>";
            var MASTERADDURL = "<?= base_url() . 'milestone/AJAXaddMaster'; ?>";
            var EDITMILESTONEFORMURL = "<?= base_url() . 'milestone/AJAXeditMilestoneForm'; ?>";
            var UPDATEMILESTONEURL = "<?= base_url() . 'milestone/AJAXupdateMilestone'; ?>";
            var DELETEMILESTONEURL = "<?= base_url() . 'milestone/AJAXdeleteMilestone'; ?>";
            var ADDPROJECTFORMURL = "<?= base_url() . 'projects/AJAXaddProjectForm'; ?>";
            var ADDPROJECTURL = "<?= base_url() . 'projects/AJAXaddProject'; ?>";
            var EDITPROJECTFORMURL = "<?= base_url() . 'projects/AJAXshowEditForm'; ?>";
            var EDITPROJECTURL = "<?= base_url() . 'projects/AJAXupdateProject'; ?>";
            var ADDINSPECTIONFORM = "<?= base_url() . 'inspections/AJAXgetInspectionForm'; ?>";
            var ADDINSPECTION = "<?= base_url() . 'inspections/AJAXAddInspection'; ?>";
            var INSPECTIONMASTERFORM = "<?= base_url() . 'inspections/AJAXgetInspectionMasterForm'; ?>";
            var INSPECTIONMASTERADD = "<?= base_url() . 'inspections/AJAXaddMaster'; ?>";
            var INSPECTIONS = "<?= base_url() . 'inspections'; ?>";
            var CRITICALISSUE = "<?= base_url() . 'critical_issue'; ?>";
            var MILESTONE = "<?= base_url() . 'milestone'; ?>";
            var PROJECTS = "<?= base_url() . 'projects'; ?>";
            var BILLING = "<?= base_url() . 'billing'; ?>";
            var MATERIAL = "<?= base_url() . 'material'; ?>";
            var SHOPDRAWING = "<?= base_url() . 'shop_drawing'; ?>";
            var ASBUILT = "<?= base_url() . 'asbuilt_drawing'; ?>";
        </script>
        
    </head>
    <body class="bg-dark-blue <?php if ($this->router->fetch_class() == 'login') { ?> login-bg <?php } ?>">     
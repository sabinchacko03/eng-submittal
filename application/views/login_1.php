<style>
    * {
        box-sizing: border-box;
        padding:0;
        margin:0;
    }

    /* Add padding to containers */
    .container {
        padding: 16px;
        background-color: white;
    }


    .astertiks
    {
        color:#d93025;	

    }
    .form-outer
    {
        float:left;
        width:100%;
        margin-top:100px;
        background: #f5f2e7;
        overflow: visible;
        position: relative;
    }
    .form-container
    {
        float:none;
        width: 658px;
        margin:0 auto;
        padding: 10px 20px;
        background: #fff;
        box-shadow: 0px 0px 8px #9a9a9a;
        /*margin-top: -70px;*/
    }
    .form-container label
    {
        float:left;
        width:100%;
        margin:0;
        font-size:18px;
        text-align:left;
        color:#000;
        font-weight:300 !important;
    }

    #otherregionbox,#otherlanguagebox {

        display:none; 


    }

    .form-container label b
    {
        font-weight:400;
    }
    /* Full-width input fields */
    input[type=text], input[type=password], input[type=tel], input[type=number], input[type=email], input[type=date], textArea {padding: 10px;display: inline-block;border: 1px solid #eaeaea;background: #f1f1f19e;float: left;width: 100%;margin-bottom: 30px;font-size: 16;text-align: left;color: #000;}

    input[type=radio],input[type=checkbox] {
        float: left;
        margin-right: 12px;
    }

    .span-head{
        text-align: justify;
    }

    select 
    {
        padding: 15px;
        display: inline-block;
        border: none;
        background: #f1f1f1;  
        float: left;
        width: 100%;
        margin-bottom: 30px;
        font-size: 16;
        text-align: left;
        text-transform: capitalize;
        color: #000;
    }
    input[type=text]:focus, input[type=password]:focus {
        background-color: #ddd;
        outline: none;
    }

    /* Overwrite default styles of hr */
    hr {
        border: 1px solid #f1f1f1;
        margin-bottom: 25px;
    }

    /* Set a style for the submit button */
    .registerbtn {
        background-color: #4CAF50;
        color: white;
        padding: 16px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
        opacity: 0.9;
        font-size:20;


    }

    .registerbtn:hover {
        opacity: 1;
    }

    /* Add a blue text color to links */
    a {
        color: dodgerblue;
    }

    /* Set a grey background color and center the text of the "sign in" section */
    .signin {
        background-color: #f1f1f1; 
        text-align: center;
    }


    .showbox{
        color: green;
    }
    .box1 {
        float: left;
        width: 90px;
        text-align: left;
    }
    .box2 {
        float: left;
        width: 90px;
        text-align: left;
    }
    .grey {
        float: left;
        width: 100%;
        margin: 16px 0;
        text-align: left;
        color: #000;
        font-weight: 400;
        font-size: 16px;
    }

    .dobInner1{

        float: left;


    }

    .countrynumber{

        float: left;


    }
    .column-left {
        float: left;
        text-align: right;
        width: 40%;
        background: #ffffff;
        padding: 10px;
        height: 100%;
    }
    .column-right {
        float: left;
        text-align: left;
        width: 60%;
        background:url(images/bg.jpg) no-repeat 0 0 #fff;
        padding: 45px 0 0 45px;
        height: 100%;
    }
    .header h1
    {
        font-size: 31px;
        color: #ffffff;
        font-weight: 400;
        text-transform: uppercase;
    }
    .header h2
    {
        font-size: 55px;
        color: #ffffff;
        font-weight: 700;
        text-transform: uppercase;
    }
    .header h4 {
        font-size: 16px;
        color: #1b1b1b;
        font-weight: 300;
    }
    .header h3
    {
        font-size: 26px;
        color: #1b1b1b;
        font-weight: 600;
    }
    .header p
    {
        font-size: 33px;
        color: #ffffff;
        font-weight: 700;
        text-align: left;
    }
    .header span
    {
        font-size: 26px;
        color: #ffffff;
        font-weight: 700;
    }
    .header {
        float: left;
        width: 100%;
        max-height: 460px;
        background: #c8d4e0;
    }
    .j-logo {
        text-align: left;
        float: left;
        width: 100%;
        padding: 0px 0 5px;
    }
    .j-logo img
    {
        width: 100px !important;
        margin-left: 22%;
    }
    .j-logo
    {
        display:block !important;
    }
    .j-logo-mob
    {
        display:none !important;
    }
    @media only screen and (max-width: 767px) {
        .j-logo img {
            width: 50px !important;
        }
        .j-logo
        {
            display: block !important;
        }

        .form-container {
            width: 100%;
            margin-top: 0;
        }
        .header h1 {
            font-size: 23px;
        }
        .header h2 {
            font-size: 27px;
        }
        .header h3 {
            font-size: 18px;
        }
        .header h4 {
            font-size: 16px;
        }
        .header p {
            font-size: 19px;
        }.header span {
            font-size: 16px;
            font-weight: 400;
        }
        .column-right {
            padding: 11px 0 0 15px;
            background-size: 100% 60%;
        }
        .header {
            max-height: 294px;
        }
        .column-left img {
            width: 110px;
        }
        .j-logo-mob img
        {
            width: 50px !important;
        }
    }
</style>

<div class="form-container">
    <div class="container-fluid">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="admin" role="tabpanel" aria-labelledby="home-tab">
                <div class="container text-center">
                    <form method="post" action="login/validate_login">
                        <div class="row">
                            <div class="col-md-12">
                                <img src="<?= base_url(); ?>public/images/logo.png"/>
                            </div>
                        </div>                    
                        <div class="form-group row">                    
                            <label for="username" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10">
                                <input type="text" name="admin_username" id="username" class="form-text"/>
                                <span class="text-danger"><?= form_error('username') ?></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" name="admin_password" id="password" class="form-text"/>
                                <span class="text-danger"><?= form_error('password') ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="admin_login" class="btn btn-primary full-blue" value="Login"/>
                        </div>                
                    </form>
                    <a href="<?php echo $loginURL; ?>"><div class="g-signin2"><img class="img-responsive" src="<?= base_url() ?>public/assets/images/btn_google_signin.png" /></div></a>
                    <?= $this->session->flashdata('loginMsg') ? $this->session->flashdata('loginMsg') : ''; ?>
                </div>
            </div>                        
        </div>        
    </div>        
</div>
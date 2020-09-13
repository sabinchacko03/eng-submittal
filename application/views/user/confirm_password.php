<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-display1 icon-gradient bg-premium-dark">
                        </i>
                    </div>
                    <div>
                        <h2>Change Password</h2>
                    </div>
                </div>
            </div>
        </div>    
        <div class="row" id="billingDetailsTable">
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">
                        <i class="header-icon lnr-graduation-hat icon-gradient bg-happy-itmeo"> </i>Change Password
                        <div class="btn-actions-pane-right">
                            <!--<button class="btn btn-square btn-primary btn-sm btn-add-billing"><i class="fa fa-plus-circle"></i> Add Billing</button>-->
                        </div>
                    </div>   
                    <form method="post" action="<?= base_url() ?>user/change_password">  
                        <span class="alert-success"><?= $this->session->flashdata('success') ?> </span>
                        <div class="card-body">
                            <div class="form-group row mt-3">     
                                <div class="col-md-6">                   
                                    <label for="password" class="col-sm-6 col-form-label">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" tabindex="1"/>
                                    <span class="text-danger"><?= form_error('password') ?></span>
                                </div>  
                                <div class="col-md-6">                  
                                    <label for="email" class="col-sm-6 col-form-label">Confirm Password</label>
                                    <input type="password" name="confirm_password" id="confirm_password" class="form-control" tabindex="2"/>
                                    <span class="text-danger"><?= form_error('confirm_password') ?></span>
                                </div>  
                            </div>                        
                        </div>
                        <div class="d-block text-right card-footer">                            
                            <input type="hidden" name="id" value="<?= $this->session->userdata('user_id') ?>" />
                            <input type="submit" name="submit" class="btn btn-primary full-blue " value="Save"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>        
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
                        <h2>User Management</h2>
                    </div>
                </div>
            </div>
        </div>    
        <div class="row" id="billingDetailsTable">
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">
                        <i class="header-icon lnr-graduation-hat icon-gradient bg-happy-itmeo"> </i>Add User
                        <div class="btn-actions-pane-right">
                            <!--<button class="btn btn-square btn-primary btn-sm btn-add-billing"><i class="fa fa-plus-circle"></i> Add Billing</button>-->
                        </div>
                    </div>                    
                    <form method="post" action="<?= base_url() ?>user/manage">        
                        <div class="card-body">
                            <div class="form-group row mt-3">    
                                <div class="col-md-6">
                                    <label for="username" class="col-sm-6 col-form-label">Username</label>
                                    <input type="text" name="username" id="username" class="form-control"/>
                                    <span class="text-danger"><?= form_error('username') ?></span>
                                </div>  
                                <div class="col-md-6">                   
                                    <label for="password" class="col-sm-6 col-form-label">Password</label>
                                    <input type="password" name="password" id="password" class="form-control"/>
                                    <span class="text-danger"><?= form_error('password') ?></span>
                                </div>  
                                <div class="col-md-6">                  
                                    <label for="email" class="col-sm-6 col-form-label">Email</label>
                                    <input type="text" name="email" id="email" class="form-control"/>
                                    <span class="text-danger"><?= form_error('email') ?></span>
                                </div>  
                                <div class="col-md-6">                    
                                    <label for="user_type" class="col-sm-6 col-form-label">Type</label>
                                    <select name="user_type" id="user_type" class="form-control text-center">
                                        <?php foreach ($user_types->result() as $user_type) { ?>
                                            <option value="<?= $user_type->id ?>"><?= $user_type->type ?></option>
                                        <?php } ?>
                                    </select>
                                    <span class="text-danger"><?= form_error('type') ?></span>
                                </div>
                                <div class="col-md-6">                    
                                    <label for="designation" class="col-sm-6 col-form-label">Designation</label>
                                    <select name="designation" id="designation" class="form-control text-center">
                                        <?php foreach ($designations->result() as $row) { ?>
                                            <option value="<?= $row->id ?>"><?= $row->name ?></option>
                                        <?php } ?>
                                    </select>
                                    <span class="text-danger"><?= form_error('designation') ?></span>
                                </div>
                            </div>                        
                        </div>
                        <div class="d-block text-right card-footer">
                            <input type="submit" name="submit" class="btn btn-primary full-blue " value="Save"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row" id="billingDetailsTable">
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">
                        <i class="header-icon lnr-graduation-hat icon-gradient bg-happy-itmeo"> </i>All Users
                    </div>
                    <div class="card-body">
                        <?php $id = 1; ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Type</th>
                                    <!--<th>Status</th>-->
                                    <th>Designation</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($users->result() as $row) { ?>
                                    <tr>
                                        <td><?= $id++; ?></td>
                                        <td><?= $row->username; ?></td>
                                        <td><?= $row->email; ?></td>
                                        <td><?= $row->type; ?></td>                    
                                        <td><?= $row->user_designation; ?></td>
                                        <!--<td><?= date('d-M-Y', strtotime($row->updated_date)); ?></td>-->
                                        <td>
                                            <a href='<?= base_url() ?>user/editUser/<?= $row->id ?>' class="" data-milestone="<?= $row->id ?>"><i class="fa fa-pencil-square-o" title="Edit"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <script>
            //    $("#date").datepicker({
            //        dateFormat: "yy-mm-dd"
            //    }).datepicker("setDate", new Date());
        </script>
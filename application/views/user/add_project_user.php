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
                        <h2>Assign Project</h2>
                    </div>
                </div>
            </div>
        </div> 
        <div class="row" id="billingDetailsTable">
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">
                        <i class="header-icon lnr-graduation-hat icon-gradient bg-happy-itmeo"> </i>Project To User
                        <div class="btn-actions-pane-right">
                            <!--<button class="btn btn-square btn-primary btn-sm btn-add-billing"><i class="fa fa-plus-circle"></i> Add Billing</button>-->
                        </div>
                    </div>
                    <form method="post" action="<?= base_url() ?>user/add_project_user"> 
                        <div class="card-body">
                            <div class="form-group row">                    
                                <label for="user" class="col-sm-6 col-form-label">User</label>
                                <div class="col-sm-6">
                                    <select name="user" id="user" class="form-control text-center">
                                        <option value="">--- Select User ---</option>
                                        <?php foreach ($users->result() as $user) { ?>
                                            <option value="<?= $user->id ?>"><?= $user->username ?></option>
                                        <?php } ?>
                                    </select>
                                    <span class="text-danger"><?= form_error('user') ?></span>
                                </div>
                            </div>                                     
                            <div class="form-group row">                    
                                <label for="project" class="col-sm-6 col-form-label">Project</label>
                                <div class="col-sm-6">
                                    <select name="project" id="project" class="form-control text-center">
                                        <option value="">--- Select Project ---</option>
                                        <?php foreach ($projects->result() as $project) { ?>
                                            <option value="<?= $project->id ?>"><?= $project->name ?></option>
                                        <?php } ?>
                                    </select>
                                    <span class="text-danger"><?= form_error('project') ?></span>
                                </div>
                            </div>                       
                        </div>                            
                        <div class="d-block text-right card-footer">
                            <input type="submit" name="submit" class="btn btn-primary full-blue" value="Add"/>
                        </div>                
                    </form>
                </div>
            </div>
        </div>

        <?php $id = 1; ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Project Allocation</h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Project</th>
                                    <th>Added Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($user_projects->result() as $row) { ?>
                                    <tr>
                                        <th scope="row"><?= $id++; ?></th>
                                        <td><?= $row->username; ?></td>
                                        <td><?= $row->project_name; ?></td>
                                        <td><?= date('Y-m-d', strtotime($row->added_date)) ?></td>                    
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
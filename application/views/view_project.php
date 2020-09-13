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
                        <h2>Project Details</h2>
                    </div>
                </div>
            </div>
        </div> 

        <div class="tab-content">
            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                <div class="row">
                    <div class="col-md-12">
                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                <form class="forms-sample" method="post">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputName1">Project</label>
                                                <select name="project_id" id="project_id" class="form-control text-center">
                                                    <option value="">--- Select Project ---</option>
                                                    <?php foreach ($projects->result() as $project) { ?>
                                                        <option value="<?= $project->id ?>"><?= $project->name ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>                        
                                    </div>
                                    <button type="submit" class="btn btn-primary mr-2"> View Details </button>
                                    <!--<button class="btn btn-light">Cancel</button>-->
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        if (isset($details)) {
            foreach ($details->result() as $project) {
                ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                <h4 class="card-title"><?= $project->name ?></h4>
                                <p class = "card-description"> Client: <code><?= $project->client_name; ?></code>
                                </p>                        
                                <div class = "table-responsive">
                                    <table class="table table-bordered">
                <!--                                <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>First name</th>
                                                <th>Progress</th>
                                                <th>Amount</th>
                                                <th>Deadline</th>
                                            </tr>
                                        </thead>-->
                                        <tbody>
                                            <tr>
                                                <td><small>Main Contractor </small></td>
                                                <td>
                                                    <h6 class="mb-0">
                                                        <?= $project->mc_name ?>
                                                    </h6>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><small>Consultant</small></td>
                                                <td>
                                                    <h6 class="mb-0">
                                                        <?= $project->consultant ?>
                                                    </h6>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><small>Project Value</small></td>
                                                <td>
                                                    <h6 class="mb-0">
                                                        <?= $project->project_value ?>
                                                    </h6>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><small>Kick-Off Date</small></td>
                                                <td>
                                                    <h6 class="mb-0">
                                                        <?= date('Y-M-d', strtotime($project->start_date)) ?>
                                                    </h6>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><small>End Date</small></td>
                                                <td>
                                                    <h6 class="mb-0">
                                                        <?= date('Y-M-d', strtotime($project->end_date)) ?>
                                                    </h6>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><small>Elapsed Days</small></td>
                                                <td>
                                                    <h6 class="mb-0">
                                                        <?= time() > strtotime($project->start_date) ? round((time() - strtotime($project->start_date)) / (60 * 60 * 24)) : 0 ?>
                                                    </h6>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><small>Remaining Days</small></td>
                                                <td>
                                                    <h6 class="mb-0">
                                                        <?= time() < strtotime($project->end_date) ? round((strtotime($project->end_date) - time()) / (60 * 60 * 24)) : 0 ?>
                                                    </h6>
                                                </td>
                                            </tr>                                   
                                            <tr>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                <!--<h4 class="card-title">Statistics</h4>-->
                                <div class="row pt-2 pb-1">
                                    <div class="col-12 col-sm-5">
                                        <div class="row">
                                            <div class="col-8 col-md-8 p-sm-0">
                                                <h6 class="mb-0">Project Completion</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-7 pl-0">
                                        <div class="progress" style="height: 30px;">
                                            <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 80%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">80%</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row pt-2 pb-1">
                                    <div class="col-12 col-sm-5">
                                        <div class="row">
                                            <div class="col-8 col-md-8 p-sm-0">
                                                <h6 class="mb-0">Billing Status</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-7 pl-0">
                                        <div class="progress" style="height: 30px;">
                                            <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">10%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                
                    </div>
                </div>
                <?php
            }
        }
        ?>
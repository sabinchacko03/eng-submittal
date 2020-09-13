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
                        <h2>Projects</h2>
                        <!--<div class="page-title-subheading">Wide selection of forms controls, using the Bootstrap 4 code base, but built with React.-->
                        <!--</div>-->
                    </div>
                </div>
            </div>
        </div>    
        <div class="row" id="projectDetailsTable">
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">
                        <i class="header-icon lnr-graduation-hat icon-gradient bg-happy-itmeo"> </i>Projects
<!--                        <div class="btn-actions-pane-right">
                            <button class="btn btn-square btn-primary btn-sm btn-add-project"><i class="fa fa-plus-circle"></i> New Project</button>
                        </div>-->
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Start Date</th>
                                    <th scope="col">End Date</th>
                                    <th scope="col">Location</th>
                                    <th scope="col">Project Value</th>
                                    <th scope="col">Status</th>
                                    <!--<th scope="col">Action</th>-->
                                </tr>
                            </thead>
                            <?php $id = 1; ?>
                            <tbody>
                                <?php $today = date('Y-m-d'); ?>
                                <?php foreach ($projects->result() as $project) { ?>
                                    <tr>
                                        <th scope="row"><?= $id++ ?></th>
                                        <td><?= $project->name ?></td>
                                        <td><?= date('d-M-y', strtotime($project->start_date)) ?></td>
                                        <td><?= date('d-M-y', strtotime($project->end_date)) ?></td>
                                        <td><?= $project->location ?></td>
                                        <td><?= $project->plumbing_total + $project->hvac_total + $project->electrical_total + $project->ff_total + $project->variation_plumbing + $project->variation_hvac + $project->variation_electrical + $project->variation_ff ?></td>
                                        <?php
                                        if ($project->start_date > $today) {
                                            $status = '<span class="badge badge-warning">Not Started</span>';
                                        } elseif ($project->end_date > $today) {
                                            $status = '<span class="badge badge-primary">In Progress</span>';
                                        } else {
                                            $status = '<span class="badge badge-success">Completed</span>';
                                        }
                                        ?>
                                        <td><?= $status ?></td>
<!--                                        <td>
                                            <a href='#' class="editProject" data-project="<?= $project->id ?>"><i class="fa fa-pencil-square-o" title="Edit"></i></a>
                                        </td>-->
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
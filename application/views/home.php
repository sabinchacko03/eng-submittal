<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-car icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>MEP Dashboard
                        <!--                                        <div class="page-title-subheading">This is an example dashboard created using build-in elements and components.
                                                                </div>-->
                    </div>
                </div>
                <div class="page-title-actions">                                    

                </div> 
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-xl-4">
                <div class="card mb-3 widget-content bg-midnight-bloom">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading">
                                 <!--<a href="<?= base_url() ?>home/view_project">-->
                                Active Projects
                                <!--</a>-->
                            </div>
                            <div class="widget-subheading">Currently Ongoing Projects</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white"><span><?= count($projects->result()); ?></span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
                <div class="card mb-3 widget-content bg-arielle-smile">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading">Total Project Cost</div>
                            <div class="widget-subheading">All the active projects cost</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white"><span>20,000,000 Dhs</span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
                <div class="card mb-3 widget-content bg-grow-early">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading">Total Monthly Billed</div>
                            <div class="widget-subheading">Total amount billed in the current month</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white"><span>2,000,300 Dhs</span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-xl-none d-lg-block col-md-6 col-xl-4">
                <div class="card mb-3 widget-content bg-premium-dark">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading">Monthly Expenditure</div>
                            <div class="widget-subheading">(Labor + Material + Overhead)</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-warning"><span>100,753 Dhs</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        <div class="row">
            <div class="col-xl-12 col-sm-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body px-0 overflow-auto">
                        <h4 class="card-title pl-4">Project History</h4>
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="bg-light">
                                    <tr>
                                        <th>Name</th>
                                        <th>Client</th>
                                        <th>Status</th>
                                        <th>Cost</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($projects->result() as $project) { ?>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="table-user-name ml-3">
                                                        <a href="<?= base_url() ?>home/view_more/<?= $project->id; ?>" style="color:inherit;">
                                                            <p class="mb-0 font-weight-medium"> <?= $project->name; ?> </p>
                                                            <small> View More</small>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td> <?= $project->client_name; ?></td>
                                            <td>
                                                <div class="badge badge-inverse-success"> <?= $project->status ? 'Ongoing' : 'Closed'; ?></div>
                                            </td>
                                            <td><?= number_format($project->project_value); ?></td>
                                        </tr>                            
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <a class="text-black mt-3 d-block pl-4" href="<?= base_url() ?>home/view_project">
                            <span class="font-weight-medium h6">View all Projects</span>
                            <i class="mdi mdi-chevron-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
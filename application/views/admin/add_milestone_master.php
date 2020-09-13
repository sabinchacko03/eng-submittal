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
                        <h2>Add Milestone Master</h2>
                        <!--<div class="page-title-subheading">Wide selection of forms controls, using the Bootstrap 4 code base, but built with React.-->
                        <!--</div>-->
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
                                <!--<h5 class="card-title">Add Milestone</h5>-->
                                <form method="post" action="<?= base_url() ?>milestone/add_master">                    
                                    <div class="form-group row">                    
                                        <label for="project" class="col-sm-6 col-form-label">Name</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="name" id="name" class="form-control"/>
                                            <span class="text-danger"><?= form_error('name') ?></span>
                                        </div>
                                    </div>                                     
                                    <div class="form-group offset-6">
                                        <input type="submit" name="submit" class="btn btn-primary full-blue" value="Add"/>
                                    </div>                
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $id = 1; ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Milestone Master</h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Added Date</th>
                                    <th>Added By</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($milestones->result() as $row) { ?>
                                    <tr>
                                        <td><?= $id++; ?></td>
                                        <td><?= $row->name; ?></td>
                                        <td><?= date('d-M-Y', strtotime($row->added_date)); ?></td>
                                        <td><?= $row->user; ?></td>
                                        <td><?= $row->status; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $("#planned_date,#actual_date").datepicker({
                dateFormat: "yy-mm-dd"
            });
        </script>
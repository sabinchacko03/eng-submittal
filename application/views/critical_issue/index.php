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
                        <h2>Critical Issues</h2>
                    </div>
                </div>
            </div>
        </div>         
        <div class="row" id="viewContent">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">

                    </div>
                </div>
            </div>
        </div>       

        <?php $id = 1; ?>
        <div class="row" id="issueDetailsTable">
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">
                        <i class="header-icon lnr-graduation-hat icon-gradient bg-happy-itmeo"> </i>Critical Issues
                        <div class="btn-actions-pane-right">
                            <?php if ($this->edit_role) { ?>
                                <button class="btn btn-square btn-primary btn-sm btn-add-issue"><i class="fa fa-plus-circle"></i> New Issue</button>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Project</th>                                    
                                    <th>Open Issues</th>
                                    <th>Assigned Issues</th>
                                    <th>Completed Issues</th>
                                    <th>Closed Issues</th>
                                    <th>Total Issues</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach ($issues->result_array() as $row) { ?>
                                    <tr>
                                        <!--<th scope="row"><?= $id++; ?></th>-->
                                        <td><?= $row['project_id']; ?></td>
                                        <td><?= $row['project_name']; ?></td>
                                        <td><?= $row['total_open']; ?></td>
                                        <td><?= $row['total_assigned']; ?></td>
                                        <td><?= $row['total_completed']; ?></td>
                                        <td><?= $row['total_closed']; ?></td>  
                                        <td><?= $row['total_issues']; ?></td>                                         
                                        <td>
                                            <a href='#' class="viewIssueDetails" data-project="<?= $row['project'] ?>">
                                                View
                                            </a>
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
            $("#planned_date,#actual_date,#amended_date").datepicker({
                dateFormat: "yy-mm-dd"
            });

        </script>
<?php $id = 1; ?>
<div class="col-lg-12">
    <div class="main-card mb-3 card">
        <div class="card-header">
            <i class="header-icon lnr-graduation-hat icon-gradient bg-happy-itmeo"> </i>Overall Milestone Achievements
            <div class="btn-actions-pane-right">
                <?php if ($this->edit_role) { ?>
                    <button class="btn btn-square btn-primary btn-sm btn-add-milestone"><i class="fa fa-plus-circle"></i> New Milestone</button>
                <?php } ?>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Project</th>
                        <th>Total Milestones</th>
                        <th>Achieved</th>
                        <th>Lapsed</th>
                        <th>Not Updated</th>
                        <th>Balance to Achieve</th>
                        <th>Project Status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($project_milestones as $row) { ?>
                        <tr>
                            <!--<th scope="row"><?= $id++; ?></th>-->
                            <td><?= $row['project_id']; ?></td>
                            <td><?= $row['project_name']; ?></td>
                            <td><?= $row['total']; ?></td>
                            <td><?= $row['achieved']; ?></td>  
                            <td><?= $row['lapsed']; ?></td>  
                            <td><?= $row['not_updated']; ?></td>
                            <td><?= $row['balance_to_achieve']; ?></td>
                            <td><?= $row['project_status'] == 1 ? 'Ongoing' : 'Closed'; ?></td>  
                            <td>
                                <a href='#' class="viewMilestoneDetails" data-project="<?= $row['project'] ?>">
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
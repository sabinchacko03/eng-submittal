<?php $id = 1; ?>
<div class="col-lg-12">
    <div class="main-card mb-3 card">
        <div class="card-header">
            <i class="header-icon lnr-graduation-hat icon-gradient bg-happy-itmeo"> </i>Overall Inspections
            <div class="btn-actions-pane-right">
                <?php if ($this->edit_role) { ?>
                    <button class="btn btn-square btn-primary btn-sm btn-add-inspection"><i class="fa fa-plus-circle"></i> New Inspection</button>
                <?php } ?>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Project</th>
                        <th>Total Inspections</th>
                        <th>Approved</th>
                        <th>Rejected</th>
                        <th>Update Required</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($summary as $row) { ?>
                        <tr>
                            <!--<th scope="row"><?= $id++; ?></th>-->
                            <td><?= $row['project_id']; ?></td>
                            <td><?= $row['project_name']; ?></td>
                            <td><?= $row['total_inspections']; ?></td>  
                            <td><?= $row['approved']; ?></td>  
                            <td><?= $row['rejected']; ?></td>
                            <td><?= $row['update_required']; ?></td> 
                            <td>
                                <a href='#' class="viewInspectionDetails" data-project="<?= $row['project'] ?>">
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
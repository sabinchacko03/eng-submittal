<?php $id = 1; ?>
<?php
$projectName = '';
foreach ($issues->result_array() as $row) {
    $projectName = $row['project_name'];
}
?>
<div class="col-lg-12">
    <div class="main-card mb-3 card">
        <div class="card-header">
            <i class="header-icon lnr-graduation-hat icon-gradient bg-happy-itmeo"> </i><?= $projectName ?>
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
                        <th>#</th>
                        <th>Project ID</th>
                        <th>Department</th>
                        <th>Issue</th>
                        <th>Description</th>
                        <th>Created Date</th>
                        <th>Status</th>
                        <th>Issue Owner</th>
                        <th>Assignee</th>
                        <!--<th>Closed Date</th>-->
                        <?php if ($this->edit_role || $this->delete_role) { ?>
                            <th>Action</th>
<?php } ?>
                    </tr>
                </thead>

                <tbody>
<?php foreach ($issues->result_array() as $row) { ?>
                        <tr>
                            <th scope="row"><?= $id++; ?></th>
                            <td><?= $row['project_name']; ?></td>
                            <td><?= $row['department']; ?></td>
                            <td><?= $row['issue']; ?></td>  
                            <td><?= $row['description']; ?></td>  
                            <td><?= date('Y-M-d', strtotime($row['date_added'])); ?></td>
                            <td><?= $row['status']; ?></td>  
                            <td><?= $row['issue_owner']; ?></td>  
                            <td><?= $row['assignee']; ?></td>  
                            <!--<td><?= $row['date_closed']; ?></td>-->  
                                <?php if ($this->edit_role || $this->delete_role) { ?>
                                <td>
        <?php if ($this->edit_role) { ?>
                                        <a href='#' class="editIssue" data-issue="<?= $row['id'] ?>">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true" title="Edit"></i>
                                        </a>
                                <?php } ?>
                                </td>
                        <?php } ?>
                        </tr>
<?php } ?>
                </tbody>
            </table>
        </div>
        <div class="d-block text-right card-footer">
            <button class="mr-2 btn btn-link btn-sm btn-cancel">Back</button>
        </div>
    </div>
</div>
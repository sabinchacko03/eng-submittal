<?php
$id = 1;
$today = date('Y-m-d');
$status = '';
$achived_status = FALSE;
?>
<div class="col-lg-12">
    <div class="main-card mb-3 card">
        <div class="card-header"><?= $project_name; ?>
            <div class="btn-actions-pane-right">
                <?php if ($this->edit_role) { ?>
                    <button class="btn btn-square btn-primary btn-sm btn-add-milestone" data-project="<?= $project; ?>"><i class="fa fa-plus-circle"></i> New Milestone</button>
                <?php } ?>
                <input type="hidden" name="project" id="project" value="<?= $project; ?>" />                
            </div>
        </div>
        <div class="card-body">
            <h5 class="card-title"></h5>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Milestone</th>
                        <th>Description</th>
                        <th>Sequence</th>
                        <th>Planned Completion Date</th>                       
                        <th>Amended Date</th>
                        <th>Actual Completion Date</th>
                        <th>Status</th>
                        <?php if ($this->edit_role || $this->delete_role) { ?>
                            <th>Action</th>
                        <?php } ?>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    foreach ($milestones->result() as $row) {
                        $status = '';
                        $achived_status = FALSE;
                        if ($row->actual_date != '0000-00-00') {
                            if ($row->actual_date <= $today) {  // Actual date should be less than today: This check can be avoided.
                                if ($row->actual_date > $row->planned_date) {
                                    if ($row->amended_date != '0000-00-00') {
                                        if ($row->actual_date > $row->amended_date) {
                                            $status = '<span class="badge badge-danger">Lapsed</span>';
                                        } else {
                                            $status = '<span class="badge badge-success">Achieved</span>';
                                        }
                                    } else {
                                        $status = '<span class="badge badge-danger">Lapsed</span>';
                                    }
                                } else {
                                    $status = '<span class="badge badge-success">Achieved</span>';
                                    $achived_status = TRUE;
                                }
                            }
                        } elseif ($row->planned_date < $today) {
                            if ($row->amended_date != '0000-00-00') {
                                if ($row->amended_date < $today) {
                                    $status = '<span class="badge badge-warning">Not Updated</span>';
                                } else {
                                    $status = '<span class="badge badge-primary">Balance to Achieve</span>';
                                }
                            } else {
                                $status = '<span class="badge badge-warning">Not Updated</span>';
                            }
                        } else {
                            $status = '<span class="badge badge-primary">Balance to Achieve</span>';
                        }
                        ?>
                        <tr>
                            <th scope="row"><?= $id++; ?></th>
                            <td><?= $row->milestone; ?> </td>
                            <td><?= $row->description; ?> </td>
                            <td><?= $row->sequence; ?> </td>
                            <td><?= date('d-M-y', strtotime($row->planned_date)); ?> </td>                            
                            <td><?= $row->amended_date == '0000-00-00' ? 'NA' : date('d-M-y', strtotime($row->amended_date)); ?> </td>
                            <td><?= $row->actual_date == '0000-00-00' ? 'NA' : date('d-M-y', strtotime($row->actual_date)) ?> </td>
                            <td><?= $status ?> </td>
                            <?php if ($this->edit_role || $this->delete_role) { ?>
                                <td>
                                    <?php if ($this->edit_role && !$achived_status) { ?>                                
                                        <a href='#' class="editMilestone" data-milestone="<?= $row->id ?>"><i class="fa fa-pencil-square-o" title="Edit"></i></a>
                                    <?php } ?>
                                    <?php if ($this->delete_role) { ?>
                                        <a href='#' class="deleteMilestone" data-milestone="<?= $row->id ?>"><i class="fa fa-trash" aria-hidden="true" title="Delete"></i></a>                                
                                    <?php } ?>
                                </td>
                            <?php } ?>
                        <?php } ?>
                        </tr>
                </tbody>
            </table>
        </div>
        <div class="d-block text-right card-footer">
            <button class="mr-2 btn btn-link btn-sm btn-cancel">Back</button>
        </div>
    </div>
</div>
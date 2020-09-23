<?php
foreach ($material->result_array() as $row) {
    $projectName = $row['project_name'];
}
?>
<div class="col-lg-12">
    <div class="main-card mb-3 card">
        <div class="card-header">
            <i class="header-icon lnr-graduation-hat icon-gradient bg-happy-itmeo"> </i><?= $projectName ?>
            <div class="btn-actions-pane-right">
                <?php if ($this->edit_role) { ?>
                    <button class="btn btn-square btn-primary btn-sm btn-add-shop-drawing-form"><i class="fa fa-plus-circle"></i> New Shop Drawing</button>
                <?php } ?>
            </div>
        </div>
        <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Department</th>
                    <th>Total</th>
                    <th>Submitted</th>
                    <th>A</th>  
                    <th>B</th>
                    <th>C</th>
                    <th>D</th>
                    <th>UR</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($material->result_array() as $row) { ?>
                    <tr>
                        <!--<th scope="row"><?= $id++; ?></th>-->
                        <td><?= $row['project_id']; ?></td>
                        <td><?= $row['department_name']; ?></td>
                        <td><?= $row['total']; ?></td>  
                        <td><?= $row['submitted']; ?></td>
                        <td><?= $row['approved']; ?></td>                                          
                        <td><?= $row['b']; ?></td>                                          
                        <td><?= $row['c']; ?></td>                                          
                        <td><?= $row['d']; ?></td>                                          
                        <td><?= $row['ur']; ?></td>                                          
                        <td>
                            <a href='#' class="viewShopDrawingDetailsDept" data-project="<?= $row['project'] ?>" data-department="<?= $row['department'] ?>">
                                View
                            </a>
                        </td>
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
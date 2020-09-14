<div class="col-lg-12">
    <div class="main-card mb-3 card">
        <div class="card-header">
            <i class="header-icon lnr-graduation-hat icon-gradient bg-happy-itmeo"> </i>Overall Material Submittal
            <div class="btn-actions-pane-right">
                <?php if ($this->edit_role) { ?>
                    <button class="btn btn-square btn-primary btn-sm btn-add-material-form"><i class="fa fa-plus-circle"></i> New Material</button>
                <?php } ?>
            </div>
        </div>
        <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Project</th>
                    <th>Total</th>
                    <th>Approved</th>
                    <th>Submitted</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($material->result_array() as $row) { ?>
                    <tr>
                        <!--<th scope="row"><?= $id++; ?></th>-->
                        <td><?= $row['project_id']; ?></td>
                        <td><?= $row['project_name']; ?></td>
                        <td><?= $row['total']; ?></td>  
                        <td><?= $row['approved']; ?></td>  
                        <td><?= $row['submitted']; ?></td>
                        <td>
                            <a href='#' class="viewMaterialDetails" data-project="<?= $row['project'] ?>">
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
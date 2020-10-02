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
        <!-- <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <!-- <th>ID</th> -->
                    <!-- <th>Project</th> -->
                    <th>Total</th>
                    <th>Approved</th>
                    <th>Submitted</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($material->result_array() as $row) { ?>
                    <tr>
                        <!-- <th scope="row"><?= $id++; ?></th> -->
                        <!-- <td><?= $row['project_id']; ?></td> -->
                        <!-- <td><?= $row['project_name']; ?></td> -->
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
        </div> -->
        <ul class="list-group list-group-flush">
        <?php foreach ($material->result_array() as $row) { ?>
            <li class="list-group-item">
                <div class="widget-content p-0">
                    <div class="widget-content-wrapper">
                    <h5 class="list-group-item-heading">Total</h5>
                    <div class="widget-content-right">
                        <div role="group" class="btn-group-sm btn-group">
                        <div class="widget-numbers text-primary"><span class="count-up-wrapper"><?= $row['total']; ?></span></div>
                        </div>
                    </div>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="widget-content p-0">
                    <div class="widget-content-wrapper">
                        <h5 class="list-group-item-heading">Submitted</h5>
                        <div class="widget-content-right">
                            <div role="group" class="btn-group-sm btn-group">
                            <div class="widget-numbers text-primary"><span class="count-up-wrapper"><?= $row['submitted']; ?></span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="widget-content p-0">
                    <div class="widget-content-wrapper">
                        <h5 class="list-group-item-heading">Approved</h5>
                        <div class="widget-content-right">
                            <div role="group" class="btn-group-sm btn-group">
                            <div class="widget-numbers text-primary"><span class="count-up-wrapper"><?= $row['approved']; ?></span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="widget-content p-0">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left mr-3">
                            <img width="42" class="rounded-circle" src="assets/images/avatars/4.jpg" alt="">
                        </div>
                        <div class="widget-content-left">
                            <div class="widget-heading">Ella-Rose Henry</div>
                            <div class="widget-subheading">Lorem ipsum dolor sit amet, consectetuer</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-primary"><span class="count-up-wrapper">$593</span></div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="widget-content p-0">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left mr-3">
                            <img width="42" class="rounded-circle" src="assets/images/avatars/5.jpg" alt="">
                        </div>
                        <div class="widget-content-left">
                            <div class="widget-heading">Eliot Huber</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="ml-auto badge badge-pill badge-warning">43</div>
                        </div>
                    </div>
                </div>
            </li>
        <?php } ?>
        </ul>
    </div>
</div>
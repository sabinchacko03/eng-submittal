<div class="col-lg-12">
    <div class="main-card mb-3 card">
        <div class="card-header">
            <i class="header-icon lnr-graduation-hat icon-gradient bg-happy-itmeo"> </i>Overall Billing Summary
            <div class="btn-actions-pane-right">
                <button class="btn btn-square btn-primary btn-sm btn-add-billing"><i class="fa fa-plus-circle"></i> Add Billing</button>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Project</th>
                        <th>Year</th>
                        <th>Project Value</th>
                        <th>Projected Amount</th>
                        <th>Actual Amount</th>
                        <th>Achievement</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <?php $id = 1; ?>
                <tbody>
                    <?php foreach ($summary->result() as $row) { ?>
                        <tr>
                            <!--<td><?= $id++; ?></td>-->
                            <td><?= $row->project_id; ?></td>
                            <td><?= $row->project_name; ?></td>
                            <td><?= $row->year; ?></td>
                            <td><?= number_format($row->project_value); ?></td>
                            <td><?= number_format($row->projected); ?></td>
                            <td><?= number_format($row->actual); ?></td>
                            <td><?= round(($row->actual / $row->projected) * 100, 2) ?>%</td>
                            <td>
                                <a href='#' class="viewBilling" data-project="<?= $row->project ?>">View</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
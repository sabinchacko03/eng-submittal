<div class="col-lg-12">
    <div class="main-card mb-3 card">
        <div class="card-header">
            <i class="header-icon lnr-graduation-hat icon-gradient bg-happy-itmeo"> </i>Billing Summary - <?= $project_name ?>
            <div class="btn-actions-pane-right">
                <?php if ($this->edit_role) { ?>
                    <button class="btn btn-square btn-primary btn-sm btn-add-billing" data-project="<?= $project; ?>"><i class="fa fa-plus-circle"></i> Add Billing</button>
                <?php } ?>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Project</th>
                        <th>Department</th>
                        <th>Year</th>
                        <th>Month</th>
                        <th>Projected Amount</th>
                        <th>Actual Amount</th>
                        <th>Achievement</th>
                        <?php if ($this->edit_role || $this->delete_role) { ?>
                            <th>Action</th>
                        <?php } ?>
                    </tr>
                </thead>
                <?php $id = 1; ?>
                <tbody>
                    <?php foreach ($billings->result() as $row) { ?>
                    <?php
                        $future = FALSE;
                        if(date('Y-m') < date('Y-m', strtotime($row->year . '-' . $row->month))){
                            $future = TRUE;
                        }
//                        echo date('Y-m'). '=='. date('Y-m', strtotime($row->year . '-' . $row->month)) . '<br>';
                    ?>
                        <tr>
                            <td><?= $id++; ?></td>
                            <td><?= $row->project_name; ?></td>
                            <td><?= $row->dept_name; ?></td>
                            <td><?= $row->year; ?></td>
                            <td><?= date('F', strtotime("2020-$row->month-1")); ?></td>
                            <td><?= number_format($row->projected); ?></td>
                            <td><?= number_format($row->actual); ?></td>
                            <td><?= round(($row->actual / $row->projected) * 100, 2) ?>%</td>
                            <?php if ($this->edit_role || $this->delete_role) { ?>
                                <td>
                                    <?php if ($this->edit_role && !$future) { ?>
                                        <a href='#' class="editBilling" data-billing="<?= $row->id ?>"><i class="fa fa-pencil-square-o" title="Edit"></i></a>
                                    <?php } ?>
                                </td>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <?php if ($this->edit_role || $this->delete_role) { ?>
                            <th></th>
                        <?php } ?>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="d-block text-right card-footer">
            <button class="mr-2 btn btn-link btn-sm btn-cancel">Back</button>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('.table').DataTable({
            initComplete: function () {
                this.api().columns([3,4]).every(function () {
                    var column = this;
                    var select = $('<select><option value=""></option></select>')
                            .appendTo($(column.footer()).empty())
                            .on('change', function () {
                                var val = $.fn.dataTable.util.escapeRegex(
                                        $(this).val()
                                        );

                                column
                                        .search(val ? '^' + val + '$' : '', true, false)
                                        .draw();
                            });
                    column.data().unique().sort().each(function (d, j) {
                        select.append('<option value="' + d + '">' + d + '</option>');
                    });
                });
            }
        });
    });
</script>
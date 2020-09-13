<?php $id = 1; ?>
<?php
foreach ($inspections as $row) {
    $projectName = $row['project_name'];
}
?>
<div class="col-lg-12">
    <div class="main-card mb-3 card">
        <div class="card-header">
            <i class="header-icon lnr-graduation-hat icon-gradient bg-happy-itmeo"> </i><?= $projectName ?>
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
                        <th>#</th>
                        <th></th>
                        <th>Inspection</th>
                        <th>Project ID</th>
                        <!--<th>Milestone</th>-->
                        <th>Description</th>
                        <th>Planned Date</th>
                        <!--<th>Amended Date</th>-->
                        <th>Last Inspection</th>
                        <th>Inspection Number</th>
                        <th>Status</th>
                        <?php if ($this->edit_role || $this->delete_role) { ?>
                            <th>Action</th>
                        <?php } ?>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($inspections as $row) { ?>
                        <tr>
                            <th scope="row"><?= $id++; ?></th>
                            <td class="details-control" data-id="<?= $row['id'] ?>"></td>
                            <td><?= $row['inspection_name']; ?></td>
                            <td><?= $row['project_name']; ?></td>
                            <!--<td><?= $row['milestone']; ?></td>-->  
                            <td><?= $row['description']; ?></td>  
                            <td><?= date('Y-M-d', strtotime($row['planned_date'])); ?></td>
                            <!--<td><?= $row['amended_date'] == '0000-00-00' ? 'NA' : date('d-M-y', strtotime($row['amended_date'])); ?></td>-->
                            <td><?= $row['last_inpsection_date']; ?></td>
                            <td><?= $row['inspection_no']; ?></td>
                            <td><?= $row['status']; ?></td>  
                            <?php if ($this->edit_role || $this->delete_role) { ?>
                                <td>
                                    <?php if ($this->edit_role && !$row['is_completed']) { ?>
                                        <a href='#' class="enterInspection" data-inspection="<?= $row['id'] ?>">
                                            <i class="fa fa-plus-square" title="Add" aria-hidden="true"></i>
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

<script>
    $(document).ready(function ($) {
        var url = window.location.href;
        $('.vertical-nav-menu li ul li a[href="' + url + '"]').addClass('mm-active');
        $('.vertical-nav-menu li ul li a[href="' + url + '"]').closest('li').addClass('mm-active');
        $('.table').DataTable();

        var table = $('.table').DataTable();

        $(document).on('click', '.table tbody td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = table.row(tr);
            var id = $(this).data('id');

            if (row.child.isShown()) {
                row.child.hide();
                tr.removeClass('shown');
            } else {
                row.child(format(row.data(), id)).show();
                tr.addClass('shown');
            }
        });

        function format(rowData, id) {
            var div = $('<div/>')
                    .addClass('loading')
                    .text('Loading...');

            $.ajax({
                url: INSPECTIONS + '/AJAXGetInspectionHistory',
                method: 'POST',
                data: {
                    'id': id
                },
                success: function (json) {
                    div
                            .html(json)
                            .removeClass('loading');
                }
            });

            return div;
        }
    });

</script>
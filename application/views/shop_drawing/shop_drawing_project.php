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
                        <th></th>
                        <!--<th>Project</th>-->
                        <th>Department</th>
                        <th>Shop Drawing</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Planned Date</th>
                        <?php if ($this->edit_role || $this->delete_role) { ?>
                            <th>Action</th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($material->result_array() as $row) { ?>
                        <tr>
                            <!--<th scope="row"><?= $id++; ?></th>-->
                            <td><?= $row['project_id']; ?></td>
                            <td class="details-control" data-id="<?= $row['id'] ?>"></td>
                            <!--<td><?= $row['project_name']; ?></td>-->
                            <td><?= $row['department']; ?></td>  
                            <td><?= $row['name']; ?></td>  
                            <td><?= $row['description']; ?></td>
                            <td><?= $row['status']; ?></td>
                            <td><?= $row['planned_date']; ?></td> 
                            <?php if ($this->edit_role || $this->delete_role) { ?>
                                <td>
                                    <?php if ($this->edit_role && !$row['is_approved']) { ?>
                                        <a href='#' class="enterShopDrawinglLog" data-material="<?= $row['id'] ?>">
                                            <i class="fa fa-plus-square" title="Add" aria-hidden="true"></i>
                                        </a>
                                        <a href='#' class="editShopDrawing" data-material="<?= $row['id'] ?>">
                                            <i class="fa fa-pencil-square-o" title="Edit" aria-hidden="true"></i>
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
                url: SHOPDRAWING + '/AJAXGetShopDrawingLog',
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
<?php if (count($material_log->result()) > 0) { ?>
    <table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;" >
        <thead>
            <tr>
                <th>Revision</th>
                <th>Actual Submittal Date</th>
                <th>Expected Returned Date</th>
                <th>Returned Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($material_log->result() as $row) { ?>
                <tr>
                    <td><?= $row->revision ?></td>
                    <td><?= date('d-M-Y', strtotime($row->actual_submittal_date)) ?></td>
                    <td><?= date('d-M-Y', strtotime('+7 days', strtotime($row->actual_submittal_date))) ?></td>
                    <td><?= $row->returned_date == '0000-00-00' ? 'NA' : date('d-M-Y', strtotime($row->returned_date)) ?></td>
                    <td><?= $row->status ?></td>
                    <?php if($this->edit_role && $row->status == 'UR'){ ?>
                        <td><a href='#' class="editMaterialLog" data-material-log="<?= $row->id ?>"><i class="fa fa-pencil-square-o" title="Edit"></i></a></td>
                    <?php } ?>
                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php } else { ?>
    <div>No Inspections to display!</div>
<?php } ?>

<?php if (count($material_log->result()) > 0) { ?>
    <table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;" >
        <thead>
            <tr>
                <th>Revision</th>
                <th>Actual Submittal Date</th>
                <th>Returned Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($material_log->result() as $row) { ?>
                <tr>
                    <td><?= $row->revision ?></td>
                    <td><?= $row->actual_submittal_date ?></td>
                    <td><?= $row->returned_date ?></td>
                    <td><?= $row->status ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php } else { ?>
    <div>No Inspections to display!</div>
<?php } ?>

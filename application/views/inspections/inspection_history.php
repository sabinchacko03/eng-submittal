<?php if (count($history->result()) > 0) { ?>
    <table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;" >
        <thead>
            <tr>
                <th>Number</th>
                <th>Date</th>
                <th>Status</th>
                <th>Remark</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($history->result() as $row) { ?>
                <tr>
                    <td><?= $row->number ?></td>
                    <td><?= $row->date ?></td>
                    <td><?= $row->status ?></td>
                    <td><?= $row->remark ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php } else { ?>
    <div>No Inspections to display!</div>
<?php } ?>

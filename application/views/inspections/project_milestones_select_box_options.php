<option value="">--- Select Milestone ---</option>
<?php foreach ($milestones->result() as $row) { ?>
    <option value="<?= $row->id ?>"><?= $row->milestone ?></option>
<?php } ?>
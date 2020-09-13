<option value="">--- Select Milestone ---</option>
<?php foreach ($inspection_master->result() as $inspection) { ?>
    <option value="<?= $inspection->id ?>" <?= $inspection->id == $lastMaster ? 'selected' : '' ?>><?= $inspection->name ?></option>
<?php } ?>
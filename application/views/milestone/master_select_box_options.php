<option value="">--- Select Milestone ---</option>
<?php foreach ($milestone_master->result() as $milestone) { ?>
    <option value="<?= $milestone->id ?>" <?= $milestone->id == $lastMaster ? 'selected' : '' ?>><?= $milestone->name ?></option>
<?php } ?>
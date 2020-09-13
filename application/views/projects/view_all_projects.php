<table class="table">
    <thead>
        <tr>
            <th scope="col">Project ID</th>
            <th scope="col">Name</th>
            <th scope="col">Start Date</th>
            <th scope="col">End Date</th>
            <th scope="col">Location</th>
            <th scope="col">Project Value</th>
            <th scope="col">Status</th>
            <?php if ($this->edit_role) { ?>
                <th scope="col">Action</th>
            <?php } ?>
        </tr>
    </thead>
    <?php $id = 1; ?>
    <tbody>
        <?php $today = date('Y-m-d'); ?>
        <?php foreach ($projects->result() as $project) { ?>
            <tr>
                <!--<th scope="row"><?= $id++ ?></th>-->
                <th scope="row"><?= $project->project_id ?></th>
                <td><?= $project->name ?></td>
                <td><?= date('d-M-y', strtotime($project->start_date)) ?></td>
                <td><?= date('d-M-y', strtotime($project->end_date)) ?></td>
                <td><?= $project->location ?></td>
                <td><?= number_format($project->plumbing_total + $project->hvac_total + $project->electrical_total + $project->ff_total + $project->variation_plumbing + $project->variation_hvac + $project->variation_electrical + $project->variation_ff) ?></td>
                <?php
                if ($project->start_date > $today) {
                    $status = '<span class="badge badge-warning">Not Started</span>';
                } elseif ($project->end_date > $today) {
                    $status = '<span class="badge badge-primary">In Progress</span>';
                } else {
                    $status = '<span class="badge badge-success">Completed</span>';
                }
                ?>
                <td><?= $status ?></td>
                <?php if ($this->edit_role) { ?>
                    <td>
                        <a href='#' class="editProject" data-project="<?= $project->id ?>"><i class="fa fa-pencil-square-o" title="Edit"></i></a>
                    </td>
                <?php } ?>
            </tr>
        <?php } ?>
    </tbody>
</table>
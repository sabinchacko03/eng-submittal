<div class="container text-center mt-3">
    <h2>Daily Manpower Allocation</h2>
    <form method="post" action="<?= base_url() ?>admin/add_daily_manpower">                    
        <div class="form-group row">                    
            <label for="project" class="col-sm-6 col-form-label">Project</label>
            <div class="col-sm-6">
                <select name="project" id="project" class="form-control text-center">
                    <option value="">--- Select Project ---</option>
                    <?php foreach ($projects->result() as $project) { ?>
                        <option value="<?= $project->id ?>"><?= $project->name ?></option>
                    <?php } ?>
                </select>
                <span class="text-danger"><?= form_error('project') ?></span>
            </div>
        </div>                    
        <div class="form-group row">                    
            <label for="department" class="col-sm-6 col-form-label">Department</label>
            <div class="col-sm-6">
                <select name="department" id="department" class="form-control text-center">
                    <option value="">--- Select Department ---</option>
                    <?php foreach ($departments->result() as $department) { ?>
                        <option value="<?= $department->id ?>"><?= $department->name ?></option>
                    <?php } ?>
                </select>
                <span class="text-danger"><?= form_error('department') ?></span>
            </div>
        </div>                    
        <div class="form-group row">                    
            <label for="activity" class="col-sm-6 col-form-label">Activity</label>
            <div class="col-sm-6">
                <input type="text" name="activity" id="activity" class="form-control"/>
                <span class="text-danger"><?= form_error('activity') ?></span>
            </div>
        </div>
        <div class="form-group row">                    
            <label for="technician" class="col-sm-6 col-form-label">Technician</label>
            <div class="col-sm-6">
                <input type="number" name="technician" id="technician" class="form-control"/>
                <span class="text-danger"><?= form_error('technician') ?></span>
            </div>
        </div>
        <div class="form-group row">                    
            <label for="helper" class="col-sm-6 col-form-label">Helper</label>
            <div class="col-sm-6">
                <input type="number" name="helper" id="helper" class="form-control"/>
                <span class="text-danger"><?= form_error('helper') ?></span>
            </div>
        </div>        

        <div class="form-group">
            <input type="submit" name="submit" class="btn btn-primary full-blue" value="Save"/>
        </div>                
    </form>
</div>
<br />
<?php $id = 1; ?>
<div class="container border mt-3">
    <div class="header text-center">
        <h2>Daily Manpower Allocation</h2>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Activity</th>
                <th>Technician</th>
                <th>Helper</th>
                <th>Project</th>
                <th>Department</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($details->result() as $row) { ?>
                <tr>
                    <td><?= $id++; ?></td>
                    <td><?= $row->activity; ?></td>
                    <td><?= $row->technician; ?></td>
                    <td><?= $row->helper; ?></td>
                    <td><?= $row->project_name; ?></td>
                    <td><?= $row->dept_name; ?></td>
                    <td><?= date('d-M-Y', strtotime($row->date)); ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<script>
    $(function () {
        $("#planned_sub_date,#act_sub_date,appr_req_date,#appr_date,#rev1_date,#rev1_appr_date,#rev2_date,#rev2_appr_date").datepicker({
            dateFormat: "yy-mm-dd"
        });
    });
</script>
<div class="container text-center mt-3">
    <h2>Add Critical Issue</h2>
    <form method="post" action="<?= base_url() ?>critical_issue/add">                    
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
            <label for="issue" class="col-sm-6 col-form-label">Critical Issue Description</label>
            <div class="col-sm-6">
                <input type="text" name="issue" id="issue" class="form-control"/>
                <span class="text-danger"><?= form_error('issue') ?></span>
            </div>
        </div>
        <!--        <div class="form-group row">                    
                    <label for="date" class="col-sm-6 col-form-label">Date</label>
                    <div class="col-sm-6">
                        <input type="text" name="date" id="date" class="form-control"/>
                        <span class="text-danger"><?= form_error('date') ?></span>
                    </div>
                </div>     -->             
        <div class="form-group row">                    
            <label for="status" class="col-sm-6 col-form-label">Status</label>
            <div class="col-sm-6">
                <select name="status" id="status" class="form-control text-center">
                    <option value="">--- Select Status ---</option>
                    <?php foreach ($status->result() as $status) { ?>
                        <option value="<?= $status->id ?>"><?= $status->name ?></option>
                    <?php } ?>
                </select>
                <span class="text-danger"><?= form_error('status') ?></span>
            </div>
        </div>  
        <div class="form-group row">                    
            <label for="remark" class="col-sm-6 col-form-label">Remark</label>
            <div class="col-sm-6">
                <textarea name="remark" id="date" class="form-control" rows="4"></textarea>
                <span class="text-danger"><?= form_error('remark') ?></span>
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
        <h2>Critical Issue Details</h2>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Project</th>
                <th>Department</th>
                <th>Critical Issue</th>
                <th>Date Loaded</th>
                <th>Current Status</th>
                <th>Date Closed</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($details->result() as $row) { ?>
                <tr>
                    <td><?= $id++; ?></td>
                    <td><?= $row->project_name; ?></td>
                    <td><?= $row->department; ?></td>
                    <td><?= $row->issue; ?></td>                    
                    <td><?= date('d-M-Y', strtotime($row->date_loaded)); ?></td>
                    <td><?= $row->status; ?></td>
                    <td><?= date('d-M-Y', strtotime($row->date_closed)); ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<script>
//    $("#date").datepicker({
//        dateFormat: "yy-mm-dd"
//    }).datepicker("setDate", new Date());
</script>
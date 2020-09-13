<div class="container text-center mt-3">
    <h2>Add Project</h2>
    <form method="post" action="<?= base_url() ?>admin/add_project">                    
        <div class="form-group row mt-3">                    
            <label for="project_name" class="col-sm-6 col-form-label">Project Name</label>
            <div class="col-sm-6">
                <input type="text" name="project_name" id="project_name" class="form-control"/>
                <span class="text-danger"><?= form_error('project_name') ?></span>
            </div>
        </div>                    
        <div class="form-group row">                    
            <label for="start_date" class="col-sm-6 col-form-label">Start Date</label>
            <div class="col-sm-6">
                <input type="text" name="start_date" id="start_date" class="form-control"/>
                <span class="text-danger"><?= form_error('start_date') ?></span>
            </div>
        </div>
        <div class="form-group row">                    
            <label for="end_date" class="col-sm-6 col-form-label">End Date</label>
            <div class="col-sm-6">
                <input type="text" name="end_date" id="end_date" class="form-control"/>
                <span class="text-danger"><?= form_error('end_date') ?></span>
            </div>
        </div>
        <div class="form-group row">                    
            <label for="m_contractor" class="col-sm-6 col-form-label">Main Contractor</label>
            <div class="col-sm-6">
                <select name="m_contractor" id="m_contractor" class="form-control text-center">
                    <option value="">--- Select Contractor ---</option>
                    <?php foreach ($m_contractors->result() as $contractor) { ?>
                        <option value="<?= $contractor->id ?>"><?= $contractor->name ?></option>
                    <?php } ?>
                </select>
                <span class="text-danger"><?= form_error('m_contractor') ?></span>
            </div>
        </div>
        <div class="form-group row">                    
            <label for="client" class="col-sm-6 col-form-label">Client</label>
            <div class="col-sm-6">
                <select name="client" id="client" class="form-control text-center">
                    <option value="">--- Select Client ---</option>
                    <?php foreach ($clients->result() as $client) { ?>
                        <option value="<?= $client->id ?>"><?= $client->name ?></option>
                    <?php } ?>
                </select>
                <span class="text-danger"><?= form_error('client') ?></span>
            </div>
        </div>
        <div class="form-group row">                    
            <label for="consultant" class="col-sm-6 col-form-label">Consultant</label>
            <div class="col-sm-6">
                <input type="text" name="consultant" id="consultant" class="form-control"/>
                <span class="text-danger"><?= form_error('consultant') ?></span>
            </div>
        </div>
        <div class="form-group row">                    
            <label for="project_value" class="col-sm-6 col-form-label">Total Project Value</label>
            <div class="col-sm-6">
                <input type="text" name="project_value" id="project_value" class="form-control"/>
                <span class="text-danger"><?= form_error('project_value') ?></span>
            </div>
        </div>
        <div class="form-group row">                    
            <label for="location" class="col-sm-6 col-form-label">Location</label>
            <div class="col-sm-6">
                <input type="text" name="location" id="location" class="form-control"/>
                <span class="text-danger"></span>
            </div>
        </div>

        <div class="form-group">
            <input type="submit" name="add_project" class="btn btn-primary full-blue" value="Add Project"/>
        </div>                
    </form>
</div>
<?php $id = 1; ?>
<div class="container border mt-3">
    <div class="header text-center">
        <h2>Current Projects</h2>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Start Date</th>
                <th scope="col">End Date</th>
                <th scope="col">Location</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($projects->result() as $project) { ?>
                <tr>
                    <th scope="row"><?= $id++ ?></th>
                    <td><?= $project->name ?></td>
                    <td><?= $project->start_date ?></td>
                    <td><?= $project->end_date ?></td>
                    <td><?= $project->location ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
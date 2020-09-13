<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-display1 icon-gradient bg-premium-dark">
                        </i>
                    </div>
                    <div>
                        <h2>Add Milestone</h2>
                        <!--<div class="page-title-subheading">Wide selection of forms controls, using the Bootstrap 4 code base, but built with React.-->
                        <!--</div>-->
                    </div>
                </div>
            </div>
        </div> 
        <div class="tab-content">
            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                <div class="row">
                    <div class="col-md-12">
                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                <!--<h5 class="card-title">Add Milestone</h5>-->
                                <form method="post" action="<?= base_url() ?>Milestone/add_milestone">                    
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
                                        <label for="milestone" class="col-sm-6 col-form-label">Milestone</label>
                                        <div class="col-sm-6">
                                            <select name="milestone" id="milestone" class="form-control text-center">
                                                <option value="">--- Select Milestone ---</option>
                                                <?php foreach ($milestones->result() as $milestone) { ?>
                                                    <option value="<?= $milestone->id ?>"><?= $milestone->name ?></option>
                                                <?php } ?>
                                            </select>
                                            <span class="text-danger"><?= form_error('milestone') ?></span>
                                        </div>
                                    </div>        
                                    <div class="form-group row">                    
                                        <label for="sequence" class="col-sm-6 col-form-label">Sequence</label>
                                        <div class="col-sm-6">
                                            <input type="number" name="sequence" id="sequence" class="form-control"/>
                                            <span class="text-danger"><?= form_error('sequence') ?></span>
                                        </div>
                                    </div>        
                                    <div class="form-group row">                    
                                        <label for="description" class="col-sm-6 col-form-label">Description</label>
                                        <div class="col-sm-6">
                                            <textarea type="description" name="description" id="description" class="form-control" rows="4">
                                            </textarea>
                                            <span class="text-danger"><?= form_error('description') ?></span>
                                        </div>
                                    </div>        
                                    <div class="form-group row">                    
                                        <label for="planned_date" class="col-sm-6 col-form-label">Planned Date of Achievement</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="planned_date" id="planned_date" class="form-control" data-toggle="datepicker"/>
                                            <span class="text-danger"><?= form_error('planned_date') ?></span>
                                        </div>
                                    </div>        
                                    <div class="form-group row">                    
                                        <label for="actual_date" class="col-sm-6 col-form-label">Actual Date of Achievement</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="actual_date" id="actual_date" class="form-control"/>
                                            <span class="text-danger"><?= form_error('actual_date') ?></span>
                                        </div>
                                    </div>        
                                    <div class="form-group offset-6">
                                        <input type="submit" name="submit" class="btn btn-primary full-blue" value="Add"/>
                                    </div>                
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <?php $id = 1; ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Milestone Achievments</h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Project</th>
                                    <th>Milestone</th>
                                    <th>Planned Date</th>
                                    <th>Actual Date</th>
                                    <th>Amended Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($details->result() as $row) { ?>
                                    <tr>
                                        <th scope="row"><?= $id++; ?></th>
                                        <td><?= $row->project_name; ?></td>
                                        <td><?= $row->milestone; ?></td>
                                        <!--<td><?= $row->issue; ?></td>-->                    
                                        <td><?= substr($row->planned_date, 0, 10) == '0000-00-00'? 'NA' : date('d-M-Y', strtotime($row->planned_date)); ?></td>                    
                                        <td><?= substr($row->actual_date, 0, 10) == '0000-00-00'? 'NA' : date('d-M-Y', strtotime($row->actual_date)); ?></td>
                                        <td><?= substr($row->amended_date, 0, 10) == '0000-00-00'? 'NA' : date('d-M-Y', strtotime($row->amended_date)); ?></td>
                                        <td><a href="<?= base_url() ?>milestone/edit_milestone/<?= $row->id ?>"><i class="fa fa-edit" aria-hidden="true"title="Edit"></i></a></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        <script>
            $("#planned_date,#actual_date").datepicker({
                dateFormat: "yy-mm-dd"
            });
        </script>
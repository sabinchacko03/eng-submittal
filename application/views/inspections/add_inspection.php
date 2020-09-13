<div class="col-md-12">
    <div class="main-card mb-3 card">
        <div class="card-header">
            <i class="header-icon lnr-graduation-hat icon-gradient bg-happy-itmeo"> </i>Add Inspection     
            <div class="btn-actions-pane-right">
                <button type="button" class="mb-2 mr-2 btn btn-dark btn-sm sidePanelClose">
                    Close
                </button>
            </div>
        </div>
        <form method="post" class="addInspectionForm" action="">
            <div class="card-body">            
                <div class="form-group row">                    
                    <div class="col-md-12">                    
                        <label for="inspection" class="col-form-label">Inspection</label>
                        <select name="inspection" id="inspection" class="form-control text-center" required="">
                            <option value="">--- Select Inspection Type ---</option>
                            <?php foreach ($inspection_master->result() as $row) { ?>
                                <option value="<?= $row->id ?>"><?= $row->name ?></option>
                            <?php } ?>
                        </select>
                        <span style="color: red;" id="inspection_msg"></span>
                    </div>
                    <div class="col-md-12">                    
                        <label for="project" class="col-form-label">Project</label>
                        <select name="project" id="project" class="form-control text-center" required="" onchange="loadMilestones(this)">
                            <option value="">--- Select Project ---</option>
                            <?php foreach ($projects->result() as $project) { ?>
                                <option value="<?= $project->id ?>"><?= $project->name ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-12">                    
                        <label for="project" class="col-form-label">Milestone</label>
                        <select name="milestone" id="milestone" class="form-control text-center" onchange="getMilestonePlannedDate(this)" required>
                            <option value="">--- Select Milestone ---</option>
                            <?php foreach ($milestones->result() as $milestone) { ?>
                                <option value="<?= $milestone->id ?>"><?= $milestone->milestone ?></option>
                            <?php } ?>
                        </select>
                        <div id="masterDiv"></div>
                    </div>
                    <div class="col-md-12">                    
                        <label class="col-form-label">Planned Date</label>
                        <div class="input-group">
                            <div class="input-group-prepend datepicker-trigger">
                                <div class="input-group-text">
                                    <a id="planned_date_icon" class="font-icon-md">
                                        <i class="fa fa-calendar-alt"></i>
                                    </a>
                                </div>
                            </div>
                            <input type="text" data-toggle="datepicker-icon" required name="planned_date" id='planned_date' autocomplete="off" readonly/>
                        </div>
                    </div>
                    <div class="col-md-12">                    
                        <label for="description" class="col-form-label">Description</label>
                        <textarea name="description" class="form-control" cols="2"> </textarea>
                    </div>                    
                </div>     
            </div>
            <div class="d-block text-right card-footer">
                <input type="button" value="Cancel" class="mr-2 btn btn-link btn-sm sidebar-cancel" />
                <button type="submit" class="btn-shadow-primary btn btn-primary" >Save</button>
            </div>
        </form>
    </div>
</div>
<script>
    function loadMilestones(project) {
        var project_id = project.value;
        $.post(INSPECTIONS + '/AJAXgetProjectMilestones', {'project': project_id}, function (result) {
            $("#milestone").html(result);
        });
    }
    function getMilestonePlannedDate(milestone) {
        var milestone_id = milestone.value;
        $.post(INSPECTIONS + '/AJAXgetMilestonePlannedDate', {'milestone': milestone_id}, function (planned_date) {
            $("#planned_date").val(planned_date);
        });
    }
</script>
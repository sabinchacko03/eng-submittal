<div class="col-md-12">
    <div class="main-card mb-3 card">
        <div class="card-header">
            <i class="header-icon lnr-graduation-hat icon-gradient bg-happy-itmeo"> </i>Add Milestone  
            <div class="btn-actions-pane-right">
                <button type="button" class="mb-2 mr-2 btn btn-dark btn-sm sidePanelClose">
                    Close
                </button>
            </div>
        </div>
        <form method="post" class="addMilestonForm" action="">
            <div class="card-body">            
                <div class="form-group row">                    
                    <div class="col-md-12">                    
                        <label for="project" class="col-form-label">Project</label>
                        <select name="project" id="project" class="form-control text-center" required="" onchange="getMaxSequence()">
                            <option value="">--- Select Project ---</option>
                            <?php foreach ($projects->result() as $project) { ?>
                                <option value="<?= $project->id ?>"><?= $project->name ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-12">                    
                        <label for="project" class="col-form-label">Milestone</label>
                        <select name="milestone" id="milestone" class="form-control text-center" required="" onchange="getMaxSequence()">
                            <option value="">--- Select Milestone ---</option>
                            <?php foreach ($milestone_master->result() as $milestone) { ?>
                                <option value="<?= $milestone->id ?>"><?= $milestone->name ?></option>
                            <?php } ?>
                        </select>
                        <a class="addMaster" href="">
                            <i class="fa fa-plus-circle"></i>
                            Add Master
                        </a>
                        <div id="masterDiv"></div>
                    </div>
                    <div class="col-md-12">                    
                        <label for="sequence" class="col-form-label">Sequence</label>
                        <input type="number" id="sequence" name="sequence" class="form-control text-center" min="1" value="1" required/>
                    </div>
                    <div class="col-md-12">                    
                        <label for="project" class="col-form-label">Description</label>
                        <textarea name="description" class="form-control" rows="2" maxlength = "500"></textarea>
                    </div>
                    <div class="col-md-12">                    
                        <label for="planned_date" class="col-form-label">Planned Date</label>
                        <div class="input-group">
                            <div class="input-group-prepend datepicker-trigger">
                                <div class="input-group-text">
                                    <a id="planned_date_icon" class="font-icon-md">
                                        <i class="fa fa-calendar-alt"></i>
                                    </a>
                                </div>
                            </div>
                            <input type="text" name="planned_date" id="planned_date" required autocomplete="off" onkeydown="return false;"/>
                        </div>
                        <span style="color: red;" id="milestone_msg"></span>
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
    $(function () {
        getMaxSequence();
    });
    function getMaxSequence() {
        var project = $("#project").val();
        $.post(MILESTONE + '/AJAXgetSequenceNumber', {'project': project}, function (result) {
            $("#sequence").val(result);
        });
        $.post(MILESTONE + '/AJAXgetProjectDates', {'project': project}, function (res) {
            var data = JSON.parse(res);
            $("#planned_date").datepicker({
                dateFormat: "yy-mm-dd",
                changeMonth: true,
                changeYear: true,
            });
            $("#planned_date").datepicker('option', 'maxDate', new Date(data[0].end_date));
            $("#planned_date").datepicker('option', 'minDate', new Date(data[0].start_date));
        });
    }
</script>
<div class="col-md-12">
    <div class="main-card mb-3 card">
        <div class="card-header">
            <i class="header-icon lnr-graduation-hat icon-gradient bg-happy-itmeo"> </i>Edit Milestone        
            <div class="btn-actions-pane-right">
                <button type="button" class="mb-2 mr-2 btn btn-dark btn-sm sidePanelClose">
                    Close
                </button>
            </div>
        </div>
        <form method="post" class="editMilestonForm" action="">
            <div class="card-body">            
                <?php foreach ($milestone_details->result() as $row) { ?>
                    <div class="form-group row">                    
                        <div class="col-md-12">                    
                            <label for="project" class="col-form-label">Project</label>
                            <input type="text" class="form-control" readonly="readonly" value="<?= $row->project_name ?>" />
                        </div>
                        <div class="col-md-12">                    
                            <label for="project" class="col-form-label">Milestone</label>
                            <input type="text" class="form-control" readonly="readonly" value="<?= $row->milestone ?>" />
                        </div>
                        <div class="col-md-12">                    
                            <label for="project" class="col-form-label">Sequence</label>
                            <input type="number" readonly="true" name="sequence" min="1" class="form-control text-center" value="<?= $row->sequence ?>"/>
                        </div>
                        <div class="col-md-12">                    
                            <label for="project" class="col-form-label">Description</label>
                            <textarea name="description" class="form-control" rows="2" readonly="true"><?= $row->description ?></textarea>
                        </div>
                        <div class="col-md-12">                    
                            <label class="col-form-label">Planned Date</label>
                            <input type="text" class="form-control" readonly="readonly" value="<?= $row->planned_date ?>" readonly/>
                        </div>
                        <div class="col-md-12">                    
                            <label class="col-form-label">Amended Date</label>
                            <div class="input-group">
                                <div class="input-group-prepend datepicker-trigger">
                                    <div class="input-group-text">
                                        <a id="amended_date_icon" class="font-icon-md">
                                            <i class="fa fa-calendar-alt"></i>
                                        </a>
                                    </div>
                                </div>
                                <input type="text" name="amended_date" id="amended_date" value="<?= substr($row->amended_date, 0, 10) == '0000-00-00' ? '' : $row->amended_date ?>" autocomplete="off"/>
                            </div>
                        </div>
                        <div class="col-md-12">                    
                            <label class="col-form-label">Actual Date</label>
                            <div class="input-group">
                                <div class="input-group-prepend datepicker-trigger">
                                    <div class="input-group-text">
                                        <a id="actual_date_icon" class="font-icon-md">
                                            <i class="fa fa-calendar-alt"></i>
                                        </a>
                                    </div>
                                </div>
                                <input type="text" name="actual_date" id="actual_date" autocomplete="off" readonly/>
                            </div>
                        </div>
                        <input type="hidden" name="id" id="id" value="<?= $row->id ?>" />
                        <input type="hidden" id="project" name="project" value="<?= $row->project ?>" />                    
                    <?php } ?>
                </div>
            </div>
            <div class="d-block text-right card-footer">
                <input type="button" value="Cancel" class="mr-2 btn btn-link btn-sm sidebar-cancel" />
                <button type="submit" class="btn-shadow-primary btn btn-primary" >Update</button>
            </div>       
        </form>    
    </div>
</div>

<script>
    $(function () {
        var project = $("#project").val();
        $.post(MILESTONE + '/AJAXgetProjectDates', {'project': project}, function (res) {
            var data = JSON.parse(res);
            $("#actual_date,#amended_date").datepicker({
                dateFormat: "yy-mm-dd",
                changeMonth: true,
                changeYear: true,
            });
            $("#actual_date,#amended_date").datepicker('option', 'minDate', new Date(data[0].start_date));
            $("#amended_date").datepicker('option', 'maxDate', new Date(data[0].end_date));
            $("#actual_date").datepicker('option', 'maxDate', '0');
        });
    });
</script>
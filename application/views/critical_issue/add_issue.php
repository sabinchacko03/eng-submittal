<div class="col-md-12">
    <div class="main-card mb-3 card">
        <div class="card-header">
            <i class="header-icon lnr-graduation-hat icon-gradient bg-happy-itmeo"> </i>Add Critical Issue     
            <div class="btn-actions-pane-right">
                <button type="button" class="mb-2 mr-2 btn btn-dark btn-sm sidePanelClose">
                    Close
                </button>
            </div>
        </div>
        <form method="post" class="addIssueForm" action="">
            <div class="card-body">            
                <div class="form-group row">                    
                    <div class="col-md-12">                    
                        <label for="project" class="col-form-label">Project</label>
                        <select name="project" id="project" class="form-control text-center" required="">
                            <option value="">--- Select Project ---</option>
                            <?php foreach ($projects->result() as $project) { ?>
                                <option value="<?= $project->id ?>"><?= $project->name ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-12">                    
                        <label for="department" class="col-form-label">Department</label>
                        <select name="department" id="department" class="form-control text-center" required="">
                            <option value="">--- Select Department ---</option>
                            <?php foreach ($departments->result() as $row) { ?>
                                <option value="<?= $row->id ?>"><?= $row->name ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-12">                    
                        <label for="issue" class="col-form-label">Issue</label>
                        <select name="issue" id="issue" class="form-control text-center" required>
                            <option value="">--- Select Issue ---</option>
                            <?php foreach ($issue_master->result() as $row) { ?>
                                <option value="<?= $row->id ?>"><?= $row->name ?></option>
                            <?php } ?>
                        </select>
                        <span style="color: red;" id="issue_msg"></span>
                    </div>
                    <input type="hidden" name="open_date" value="<?= date('Y-m-d'); ?>" />
                    <input type="hidden" name="issue_owner" value="<?= $this->session->userdata('user_id') ?>" />
                    <input type="hidden" name="assignee" value="" />
                    <div class="col-md-12">                    
                        <label for="description" class="col-form-label">Description</label>
                        <textarea name="description" class="form-control" cols="2"> </textarea>
                    </div> 
<!--                    <div class="col-md-12">                    
                        <label for="issue_owner" class="col-form-label">Issue Owner</label>
                        <select name="issue_owner" id="issue_owner" class="form-control text-center" required>
                            <option value="">--- Issue Owner ---</option>
                            <?php foreach ($users->result() as $row) { ?>
                                <option value="<?= $row->id ?>"><?= $row->username ?></option>
                            <?php } ?>
                        </select>
                    </div>-->
<!--                    <div class="col-md-12">                    
                        <label for="assignee" class="col-form-label">Assigned To</label>
                        <select name="assignee" id="assignee" class="form-control text-center">
                            <option value="">--- Assignee ---</option>
                            <?php foreach ($users->result() as $row) { ?>
                                <option value="<?= $row->id ?>"><?= $row->username ?></option>
                            <?php } ?>
                        </select>
                    </div>-->
                    <div class="col-md-12">                    
                        <label class="col-form-label">Remark</label>
                        <textarea type="text" name="remark" id="remark" class="form-control" rows="2"></textarea>
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
    $(document).on("change", "#project", function () {
        var project = $("#project").val();
        $.post(MILESTONE + '/AJAXgetProjectDates', {'project': project}, function (res) {
            var data = JSON.parse(res);
            $("#open_date").datepicker('option', 'minDate', new Date(data[0].start_date));
            $("#open_date").datepicker('option', 'maxDate', '0');
        });
    });
</script>
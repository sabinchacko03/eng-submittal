<div class="col-md-12">
    <div class="main-card mb-3 card">
        <div class="card-header">
            <i class="header-icon lnr-graduation-hat icon-gradient bg-happy-itmeo"> </i>Edit Critical Issue           
            <div class="btn-actions-pane-right">
                <button type="button" class="mb-2 mr-2 btn btn-dark btn-sm sidePanelClose">
                    Close
                </button>
            </div>
        </div>
        <form method="post" class="editIssueForm" action="">
            <div class="card-body">    
                <?php foreach ($issue_details->result() as $row) { ?>
                    <div class="form-group row">                    
                        <div class="col-md-12">                    
                            <label for="project" class="col-form-label">Project</label>
                            <input type="text" readonly value="<?= $row->project_name ?>"  class="form-control text-center" />
                        </div>
                        <div class="col-md-12">                    
                            <label for="department" class="col-form-label">Department</label>
                            <input type="text" readonly value="<?= $row->department ?>"  class="form-control text-center" />
                        </div>
                        <div class="col-md-12">                    
                            <label for="issue" class="col-form-label">Issue</label>
                            <input type="text" readonly value="<?= $row->issue ?>"  class="form-control text-center" />
                            <input type="hidden" name="id" value="<?= $row->id ?>" />
                            <input type="hidden" name="project" id="project" value="<?= $row->project ?>" />
                        </div>
                        <div class="col-md-12">                    
                            <label for="description" class="col-form-label">Description</label>
                            <textarea name="description" class="form-control" cols="2" readonly> <?= $row->description ?></textarea>
                        </div> 
                        <div class="col-md-12">                    
                            <label for="issue_owner" class="col-form-label">Issue Owner</label>
                            <select name="issue_owner" id="issue_owner" class="form-control text-center">
                                <option value="">--- Select Issue Owner---</option>
                                <?php foreach ($users->result() as $rowUsers) { ?>
                                    <option value="<?= $rowUsers->id ?>" <?= $row->issue_owner == $rowUsers->username ? 'selected' : '' ?> ><?= $rowUsers->username ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-12">                    
                            <label for="assignee" class="col-form-label">Assignee</label>
                            <select name="assignee" id="assignee" class="form-control text-center">
                                <option value="">--- Select Assignee---</option>
                                <?php foreach ($users->result() as $rowUsers) { ?>
                                    <option value="<?= $rowUsers->id ?>" <?= $row->assignee == $rowUsers->username ? 'selected' : '' ?> ><?= $rowUsers->username ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-12">                    
                            <label for="issue_owner" class="col-form-label">Issue Status</label>
                            <select name="status" id="status" class="form-control text-center">
                                <option value="">--- Select Issue Status---</option>
                                <?php foreach ($status->result() as $rowStatus) { ?>
                                    <option value="<?= $rowStatus->id ?>" <?= $row->status == $rowStatus->name ? 'selected' : '' ?> ><?= $rowStatus->name ?></option>
                                <?php } ?>
                            </select>
                        </div>
<!--                        <div class="col-md-12">                    
                            <label for="closed_date" class="col-form-label">Closed Date</label>
                            <div class="input-group">
                                <div class="input-group-prepend datepicker-trigger">
                                    <div class="input-group-text">
                                        <a id="planned_date_icon" class="font-icon-md">
                                            <i class="fa fa-calendar-alt"></i>
                                        </a>
                                    </div>
                                </div>
                                <input type="text" name="closed_date" id="closed_date" required autocomplete="off" onkeydown="return false;"/>
                            </div>
                        </div>-->
                        <div class="col-md-12">                    
                            <label class="col-form-label">Remark</label>
                            <textarea type="text" name="remark" id="remark" class="form-control" rows="2"></textarea>
                        </div>                                       
                    </div>    
                <?php } ?>
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
        var project = $("#project").val();
        $.post(MILESTONE + '/AJAXgetProjectDates', {'project': project}, function (res) {
            var data = JSON.parse(res);
            $("#closed_date").datepicker('option', 'minDate', new Date(data[0].start_date));
            $("#closed_date").datepicker('option', 'maxDate', '0');
        });
    });
</script>
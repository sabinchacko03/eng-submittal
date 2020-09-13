<div class="col-md-12">
    <div class="main-card mb-3 card">
        <div class="card-header">
            <i class="header-icon lnr-graduation-hat icon-gradient bg-happy-itmeo"> </i>Enter Inspection              
            <div class="btn-actions-pane-right">
                <button type="button" class="mb-2 mr-2 btn btn-dark btn-sm sidePanelClose">
                    Close
                </button>
            </div>
        </div>
        <form method="post" class="enterInspectionForm" action="">
            <div class="card-body">            
                <div class="form-group row">                    
                    <div class="col-md-12">                    
                        <label for="inspection" class="col-form-label">Inspection</label>
                        <?php foreach ($inspectionDetails->result() as $row) { ?>
                            <input type="text" value="<?= $row->inspection_name ?>" readonly="true" class="form-control"/>
                            <input type="hidden" name="inspection" id="inspection" value="<?= $row->id ?>" readonly="true" required/>
                            <input type="hidden" name="project" id="project" value="<?= $row->project ?>" readonly="true" required/>
                        <?php } ?>
                    </div>
                    <div class="col-md-12">                    
                        <label for="project" class="col-form-label">Number</label>
                        <input type="number" name="number" id="number" value="<?= count($history->result()) + 1 ?>" class="form-control" required/>
                    </div>
                    <div class="col-md-12">                    
                        <label for="project" class="col-form-label">Date</label>
                        <div class="input-group">
                            <div class="input-group-prepend datepicker-trigger">
                                <div class="input-group-text">
                                    <a id="date_icon" class="font-icon-md">
                                        <i class="fa fa-calendar-alt"></i>
                                    </a>
                                </div>
                            </div>
                            <input type="text" name="date" id="date" required autocomplete="off"/>
                        </div>
                        <div id="masterDiv"></div>
                    </div>
                    <div class="col-md-12">                    
                        <label class="col-form-label">Status</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="">--- Select Status ---</option>
                            <?php foreach ($status->result() as $row) { ?>
                                <option value="<?= $row->id ?>"><?= $row->name ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-12">                    
                        <label for="description" class="col-form-label">Remark</label>
                        <textarea name="remark" id="remark" class="form-control" cols="2"> </textarea>
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
        var project = $("#project").val();
        var inspection = $("#inspection").val();
        $.post(INSPECTIONS + '/AJAXgetInpectionDateLimits', {'project': project, 'inspection' : inspection}, function (res) {   
            var data = JSON.parse(res);
            $("#date").datepicker('option', 'minDate', new Date(data.min_date));
            $("#date").datepicker('option', 'maxDate', new Date(data.max_date));
        });
    });
</script>
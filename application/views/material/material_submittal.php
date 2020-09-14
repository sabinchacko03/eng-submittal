<div class="col-md-12">
    <div class="main-card mb-3 card">
        <div class="card-header">
            <i class="header-icon lnr-graduation-hat icon-gradient bg-happy-itmeo"> </i>Enter Material Submittal              
            <div class="btn-actions-pane-right">
                <button type="button" class="mb-2 mr-2 btn btn-dark btn-sm sidePanelClose">
                    Close
                </button>
            </div>
        </div>
        <form method="post" class="materialLogForm" action="">
            <div class="card-body">            
                <div class="form-group row">                    
                    <div class="col-md-12">                    
                        <label for="material" class="col-form-label">Material Details</label>
                        <?php foreach ($materialDetails->result() as $row) { ?>
                            <input type="text" value="<?= $row->name ?>" readonly="true" class="form-control"/>
                            <input type="hidden" name="material" id="material" value="<?= $row->id ?>" readonly="true" required/>
                            <input type="hidden" name="project" id="project" value="<?= $row->project ?>" readonly="true" required/>
                        <?php } ?>
                    </div>
                    <div class="col-md-12">                    
                        <label for="project" class="col-form-label">Revision</label>
                        <input type="number" name="revision" id="revision" value="<?= count($materialLog->result()) + 1 ?>" class="form-control" required readonly/>
                    </div>
                    <div class="col-md-12">                    
                        <label for="project" class="col-form-label">Actual Submittal Date</label>
                        <div class="input-group">
                            <div class="input-group-prepend datepicker-trigger">
                                <div class="input-group-text">
                                    <a id="actual_submittal_date_icon" class="font-icon-md">
                                        <i class="fa fa-calendar-alt"></i>
                                    </a>
                                </div>
                            </div>
                            <input type="text" name="actual_submittal_date" id="actual_submittal_date" required autocomplete="off"/>
                        </div>
                    </div>
                    <div class="col-md-12">                    
                        <label for="project" class="col-form-label">Returned Date</label>
                        <div class="input-group">
                            <div class="input-group-prepend datepicker-trigger">
                                <div class="input-group-text">
                                    <a id="returned_date_icon" class="font-icon-md">
                                        <i class="fa fa-calendar-alt"></i>
                                    </a>
                                </div>
                            </div>
                            <input type="text" name="returned_date" id="returned_date" required autocomplete="off"/>
                        </div>
                    </div>
                    <div class="col-md-12">                    
                        <label class="col-form-label">Status</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="">--- Select Status ---</option>
                            <?php foreach ($status->result() as $row) { ?>
                                <option value="<?= $row->id ?>"><?= $row->name . ' - '. $row->description ?></option>
                            <?php } ?>
                        </select>
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
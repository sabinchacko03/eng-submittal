<div class="col-md-12">
    <div class="main-card mb-3 card">
        <div class="card-header">
            <i class="header-icon lnr-graduation-hat icon-gradient bg-happy-itmeo"> </i>Shop Drawing Submittal              
            <div class="btn-actions-pane-right">
                <button type="button" class="mb-2 mr-2 btn btn-dark btn-sm sidePanelClose">
                    Close
                </button>
            </div>
        </div>
        <form method="post" class="asbuiltDrawingLogForm" action="">
            <div class="card-body">            
                <div class="form-group row">                    
                    <div class="col-md-12">                    
                        <label for="material" class="col-form-label">Shop Drawing</label>
                        <?php foreach ($materialDetails->result() as $row) { ?>
                            <input type="text" value="<?= $row->name ?>" readonly="true" class="form-control"/>
                            <input type="hidden" name="shop_drawing" id="shop_drawing" value="<?= $row->id ?>" readonly="true" required/>
                            <input type="hidden" name="project" id="project" value="<?= $row->project ?>" readonly="true" required/>
                            <input type="hidden" name="department" id="department" value="<?= $row->department ?>" readonly="true" required/>
                        <?php } ?>
                    </div>
                    <div class="col-md-12">                    
                        <label for="project" class="col-form-label">Revision</label>
                        <input type="number" name="revision" id="revision" value="<?= count($materialLog->result()) ?>" class="form-control" required readonly/>
                    </div>                    
<!--                    <div class="col-md-12">                    
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
                    </div>-->
                    <div class="col-md-12">                    
                        <label class="col-form-label">Status</label>
                        <select class="form-control" required readonly disabled>
                            <option value="">--- Select Status ---</option>
                            <?php foreach ($status->result() as $row) { ?>
                                <option value="<?= $row->id ?>" <?= $row->name == 'UR' ? 'selected' : ''; ?>><?= $row->name . ' - '. $row->description ?></option>
                                <?php if($row->name == 'UR'){
                                    $status = $row->id;
                                }?>
                            <?php } ?>
                        </select>
                        <input type="hidden" name="status" value="<?= $status?>" />
                    </div> 
                    <div class="col-md-12">                    
                        <label for="project" class="col-form-label">Document 1 <small>(Google Drive Link)</small></label>
                        <input type="text" name="doc1" id="doc1" class="form-control" />
                    </div> 
                    <div class="col-md-12">                    
                        <label for="project" class="col-form-label">Document 2 <small>(Google Drive Link)</small></label>
                        <input type="text" name="doc2" id="doc2" class="form-control" />
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
                            <input type="text" name="actual_submittal_date" value="<?= date('Y-m-d') ?>" id="actual_submittal_date" required autocomplete="off"/>
                        </div>
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
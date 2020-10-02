<div class="col-md-12">
    <div class="main-card mb-3 card">
        <div class="card-header">
            <i class="header-icon lnr-graduation-hat icon-gradient bg-happy-itmeo"> </i>Update Shop Drawing Submittal              
            <div class="btn-actions-pane-right">
                <button type="button" class="mb-2 mr-2 btn btn-dark btn-sm sidePanelClose">
                    Close
                </button>
            </div>
        </div>
        <form method="post" class="asbuiltDrawingLogUpdateForm" action="">
            <div class="card-body">            
                <div class="form-group row">
                <?php foreach ($material->result() as $row) { ?>                    
                    <div class="col-md-12">                    
                        <label for="material" class="col-form-label">Material Details</label>                        
                            <input type="text" value="<?= $row->material_name ?>" readonly="true" class="form-control"/>
                            <input type="hidden" name="id" id="id" value="<?= $row->id ?>" readonly="true" />
                            <input type="hidden" name="project" id="project" value="<?= $row->project ?>" readonly="true" />
                            <input type="hidden" name="shop_drawing" id="shop_drawing" value="<?= $row->shop_drawing ?>" readonly="true" />
                            <input type="hidden" name="department" id="department" value="<?= $row->department ?>" readonly="true" required/>
                    </div>
                    <div class="col-md-12">                    
                        <label for="revision" class="col-form-label">Revision</label>
                        <input type="number" name="revision" id="revision" value="<?= $row->revision ?>" class="form-control" required readonly/>
                    </div>
                    <div class="col-md-12">                    
                        <label for="project" class="col-form-label">Actual Submittal Date</label>
                        <div class="input-group">
                            <div class="input-group-prepend datepicker-trigger">
                                <div class="input-group-text">
                                    <a class="font-icon-md">
                                        <i class="fa fa-calendar-alt"></i>
                                    </a>
                                </div>
                            </div>
                            <input type="text" value="<?= $row->actual_submittal_date ?>" autocomplete="off" readonly/>
                        </div>
                    </div>
                    <div class="col-md-12">                    
                        <label for="project" class="col-form-label">Expected Return Date</label>
                        <div class="input-group">
                            <div class="input-group-prepend datepicker-trigger">
                                <div class="input-group-text">
                                    <a class="font-icon-md">
                                        <i class="fa fa-calendar-alt"></i>
                                    </a>
                                </div>
                            </div>
                            <input type="text" readonly value="<?= date('d-M-Y', strtotime('+7 days', strtotime($row->actual_submittal_date))) ?>" autocomplete="off"/>
                        </div>
                    </div>
                    <?php } ?>
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
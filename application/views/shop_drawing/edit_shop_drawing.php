<div class="col-md-12">
    <div class="main-card mb-3 card">
        <div class="card-header">
            <i class="header-icon lnr-graduation-hat icon-gradient bg-happy-itmeo"> </i>Edit Shop Drawing     
            <div class="btn-actions-pane-right">
                <button type="button" class="mb-2 mr-2 btn btn-dark btn-sm sidePanelClose">
                    Close
                </button>
            </div>
        </div>
        <form method="post" class="editShopDrawingForm" action="">
            <?php foreach($material->result() as $row){ ?>
            <div class="card-body">            
                <div class="form-group row">                                        
                    <div class="col-md-12">                    
                        <label for="project" class="col-form-label">Project</label>
                        <input type="text" class="form-control" readonly value="<?= $row->project_name ?>" />
                        <input type="hidden" name="id" value="<?= $row->id ?>" />
                        <input type="hidden" name="project" value="<?= $row->project ?>" />
                        <input type="hidden" name="department" value="<?= $row->department ?>" />
                    </div>
                    <div class="col-md-12">                    
                        <label for="department" class="col-form-label">Department</label>
                        <input type="text" class="form-control" readonly value="<?= $row->department_name ?>" />
                    </div>
                    <div class="col-md-12">                    
                        <label for="name" class="col-form-label">Submittal No.</label>
                        <input type="text" class="form-control" readonly value="<?= $row->name ?>" />    
                        <span style="color: red;" id="material_msg"></span>                       
                    </div>   
                    <div class="col-md-12">                    
                        <label for="description" class="col-form-label">Proposed Make</label>
                        <input type="text" name="proposed_make" id="proposed_make" class="form-control" autocomplete="off" value="<?= $row->proposed_make ?>"/> 
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
                            <input type="text" data-toggle="datepicker-icon" name="planned_date" id='planned_date' autocomplete="off" readonly required/>
                        </div>
                    </div>                    
                </div>     
            </div>
            <div class="d-block text-right card-footer">
                <input type="button" value="Cancel" class="mr-2 btn btn-link btn-sm sidebar-cancel" />
                <button type="submit" class="btn-shadow-primary btn btn-primary" >Save</button>
            </div>
            <?php } ?>
        </form>
    </div>
</div>
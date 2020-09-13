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
                            <input type="number" readonly="true" name="sequence" class="form-control text-center" value="<?= $row->sequence ?>"/>
                        </div>
                        <div class="col-md-12">                    
                            <label for="project" class="col-form-label">Description</label>
                            <textarea name="description" class="form-control" rows="2" readonly="true"><?= $row->description ?></textarea>
                        </div>
                        <div class="col-md-12">                    
                            <label class="col-form-label">Planned Date</label>
                            <input type="text" class="form-control" readonly="readonly" value="<?= $row->planned_date ?>" />
                        </div>
                        <div class="col-md-12">                    
                            <label class="col-form-label">Amended Date</label>
                            <input type="text" name="amended_date" id="amended_date" class="form-control" value="<?= substr($row->amended_date, 0, 10) == '0000-00-00' ? '' : $row->amended_date ?>" autocomplete="off"/>
                        </div>
                        <div class="col-md-12">                    
                            <label class="col-form-label">Actual Date</label>
                            <input type="text" name="actual_date" id="actual_date" class="form-control" autocomplete="off"/>
                        </div>
                        <input type="hidden" name="id" id="id" value="<?= $row->id ?>" />
                        <input type="hidden" id="project" name="project" value="<?= $row->project ?>" />                    
                        <!--                    <div class="form-group row">                    
                                                <div class="col-md-3">                    
                                                    <input type="submit" class="btn btn-primary form-control" value="Update" />
                                                </div>
                                            </div>-->
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
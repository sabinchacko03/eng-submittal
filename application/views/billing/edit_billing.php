<div class="col-md-12">
    <div class="main-card mb-3 card">
        <div class="card-header">
            <i class="header-icon lnr-graduation-hat icon-gradient bg-happy-itmeo"> </i>Edit Billing          
            <div class="btn-actions-pane-right">
                <button type="button" class="mb-2 mr-2 btn btn-dark btn-sm sidePanelClose">
                    Close
                </button>
            </div>
        </div>
        <form method="post" action="" id="edit_billing_form">  
            <div class="card-body">      
                <?php foreach ($billing->result() as $row) { ?>
                    <div class="form-group row mt-3">       
                        <div class="col-md-12">
                            <label for="project_name" class="col-sm-6 col-form-label">Project</label>
                            <input type="text" value="<?= $row->project_name ?>" class="form-control" readonly />
                        </div>
                        <div class="col-md-12">
                            <label for="start_date" class="col-sm-6 col-form-label">Department</label>
                            <input type="text" value="<?= $row->dept_name ?>" class="form-control" readonly />
                        </div>                    
                        <div class="col-md-6">
                            <label for="year" class="col-sm-12 col-form-label">Year</label>
                            <input type="text" value="<?= $row->year ?>" class="form-control" readonly />
                        </div>
                        <div class="col-md-6">
                            <label for="month" class="col-sm-12 col-form-label">Month</label>
                            <input type="text" value="<?= date('F', strtotime("2020-$row->month-1")); ?>" class="form-control" readonly />
                        </div>
                        <div class="col-md-12">
                            <label for="projected" class="col-sm-6 col-form-label">Projected Amount</label>
                            <input type="text" class="form-control" id="projected" readonly="true" value="<?= $row->projected ?>"/>
                        </div>
                        <div class="col-md-12">
                            <label for="m_contractor" class="col-sm-6 col-form-label">Actual Amount</label>
                            <input type="text" name="actual" id="actual" class="form-control" required autocomplete="off"value="<?= $row->actual ?>" <?= ($row->actual != 0) ? 'readonly' : ''; ?> />
                            <span style="color: red;" id="projected_msg"></span>
                            <input type="hidden" name="id" id="id" value="<?= $row->id ?>" />
                            <input type="hidden" name="project" id="project" value="<?= $row->project ?>" />
                        </div>                    
                    </div>
                <?php } ?>
            </div>
            <div class="d-block text-right card-footer">
                <input type="button" value="Cancel" class="mr-2 btn btn-link btn-sm sidebar-cancel" />
                <button type="submit" name="add_project" class="btn-shadow-primary btn btn-primary" >Save</button>
            </div>
        </form>
    </div>
</div>
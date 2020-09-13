<div class="container text-center mt-3">
    <h2>Material Submittal Log</h2>
    <form method="post" action="<?= base_url() ?>admin/add_material_submital">                    
        <div class="form-group row">                    
            <label for="project_id" class="col-sm-6 col-form-label">Project</label>
            <div class="col-sm-6">
                <select name="project_id" id="project_id" class="form-control text-center">
                    <option value="">--- Select Project ---</option>
                    <?php foreach ($projects->result() as $project) { ?>
                        <option value="<?= $project->id ?>"><?= $project->name ?></option>
                    <?php } ?>
                </select>
                <span class="text-danger"><?= form_error('project_id') ?></span>
            </div>
        </div>                    
        <div class="form-group row">                    
            <label for="dept_id" class="col-sm-6 col-form-label">Department</label>
            <div class="col-sm-6">
                <select name="dept_id" id="dept_id" class="form-control text-center">
                    <option value="">--- Select Department ---</option>
                    <?php foreach ($departments->result() as $department) { ?>
                        <option value="<?= $department->id ?>"><?= $department->name ?></option>
                    <?php } ?>
                </select>
                <span class="text-danger"><?= form_error('dept_id') ?></span>
            </div>
        </div>                    
        <div class="form-group row">                    
            <label for="material_desc" class="col-sm-6 col-form-label">Material Description</label>
            <div class="col-sm-6">
                <input type="text" name="material_desc" id="material_desc" class="form-control"/>
                <span class="text-danger"><?= form_error('material_desc') ?></span>
            </div>
        </div>
        <div class="form-group row">                    
            <label for="planned_sub_date" class="col-sm-6 col-form-label">Planned Submital Date</label>
            <div class="col-sm-6">
                <input type="text" name="planned_sub_date" id="planned_sub_date" class="form-control" autocomplete="off"/>
                <span class="text-danger"><?= form_error('planned_sub_date') ?></span>
            </div>
        </div>
        <div class="form-group row">                    
            <label for="manufacturer" class="col-sm-6 col-form-label">Manufaturer/ Sub Contractor</label>
            <div class="col-sm-6">
                <input type="text" name="manufacturer" id="manufacturer" class="form-control"/>
                <span class="text-danger"><?= form_error('manufacturer') ?></span>
            </div>
        </div>
        <div class="form-group row">                    
            <label for="PFA_status" class="col-sm-6 col-form-label">Previous Final Approval Status</label>
            <div class="col-sm-6">
                <input type="text" name="PFA_status" id="PFA_status" class="form-control"/>
                <span class="text-danger"><?= form_error('PFA_status') ?></span>
            </div>
        </div>
        <div class="form-group row">                    
            <label for="act_sub_date" class="col-sm-6 col-form-label">Actual Submittal Date</label>
            <div class="col-sm-6">
                <input type="text" name="act_sub_date" id="act_sub_date" class="form-control" autocomplete="off"/>
                <span class="text-danger"><?= form_error('act_sub_date') ?></span>
            </div>
        </div>
        <div class="form-group row">                    
            <label for="appr_req_date" class="col-sm-6 col-form-label">Appr. Req Date</label>
            <div class="col-sm-6">
                <input type="text" name="appr_req_date" id="appr_req_date" class="form-control" autocomplete="off"/>
                <span class="text-danger"><?= form_error('appr_req_date') ?></span>
            </div>
        </div>
        <div class="form-group row">                    
            <label for="appr_date" class="col-sm-6 col-form-label">Appr Date</label>
            <div class="col-sm-6">
                <input type="text" name="appr_date" id="appr_date" class="form-control" autocomplete="off"/>
                <span class="text-danger"><?= form_error('appr_date') ?></span>
            </div>
        </div>
        <div class="form-group row">                    
            <label for="appr_status" class="col-sm-6 col-form-label">Status</label>
            <div class="col-sm-6">
                <input type="text" name="appr_status" id="appr_status" class="form-control"/>
                <span class="text-danger"><?= form_error('appr_status') ?></span>
            </div>
        </div>
        <div class="form-group row">                    
            <label for="rev1_date" class="col-sm-6 col-form-label">Rev 01</label>
            <div class="col-sm-6">
                <input type="text" name="rev1_date" id="rev1_date" class="form-control" autocomplete="off"/>
                <span class="text-danger"><?= form_error('rev1_date') ?></span>
            </div>
        </div>
        <div class="form-group row">                    
            <label for="rev1_appr_date" class="col-sm-6 col-form-label">Approval Date</label>
            <div class="col-sm-6">
                <input type="text" name="rev1_appr_date" id="rev1_appr_date" class="form-control" autocomplete="off"/>
                <span class="text-danger"><?= form_error('rev1_appr_date') ?></span>
            </div>
        </div>
        <div class="form-group row">                    
            <label for="rev1_appr_status" class="col-sm-6 col-form-label">Status</label>
            <div class="col-sm-6">
                <input type="text" name="rev1_appr_status" id="rev1_appr_status" class="form-control"/>
                <span class="text-danger"><?= form_error('rev1_appr_status') ?></span>
            </div>
        </div>
        <div class="form-group row">                    
            <label for="rev2_date" class="col-sm-6 col-form-label">Rev. 02</label>
            <div class="col-sm-6">
                <input type="text" name="rev2_date" id="rev2_date" class="form-control" autocomplete="off"/>
                <span class="text-danger"><?= form_error('rev2_date') ?></span>
            </div>
        </div>
        <div class="form-group row">                    
            <label for="rev2_appr_date" class="col-sm-6 col-form-label">Approval Date</label>
            <div class="col-sm-6">
                <input type="text" name="rev2_appr_date" id="rev2_appr_date" class="form-control" autocomplete="off"/>
                <span class="text-danger"><?= form_error('rev2_appr_date') ?></span>
            </div>
        </div>
        <div class="form-group row">                    
            <label for="rev2_appr_status" class="col-sm-6 col-form-label">Status</label>
            <div class="col-sm-6">
                <input type="text" name="rev2_appr_status" id="rev2_appr_status" class="form-control"/>
                <span class="text-danger"><?= form_error('rev2_appr_status') ?></span>
            </div>
        </div>
        <div class="form-group row">                    
            <label for="final_status" class="col-sm-6 col-form-label">Final Status</label>
            <div class="col-sm-6">
                <input type="text" name="final_status" id="final_status" class="form-control"/>
                <span class="text-danger"><?= form_error('final_status') ?></span>
            </div>
        </div>
        <div class="form-group row">                    
            <label for="delivery_period" class="col-sm-6 col-form-label">Delivery Period</label>
            <div class="col-sm-6">
                <input type="text" name="delivery_period" id="delivery_period" class="form-control"/>
                <span class="text-danger"><?= form_error('delivery_period') ?></span>
            </div>
        </div>
        <div class="form-group row">                    
            <label for="remark" class="col-sm-6 col-form-label">Remarks</label>
            <div class="col-sm-6">
                <input type="text" name="remark" id="remark" class="form-control"/>
                <span class="text-danger"><?= form_error('remark') ?></span>
            </div>
        </div>

        <div class="form-group">
            <input type="submit" name="submit" class="btn btn-primary full-blue" value="Save"/>
        </div>                
    </form>
</div>
<script>
//    $(function () {
        $("#planned_sub_date,#act_sub_date,#appr_req_date,#appr_date,#rev1_date,#rev1_appr_date,#rev2_date,#rev2_appr_date").datepicker({
            dateFormat: "yy-mm-dd"
        });
//    });
</script>
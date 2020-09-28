<?php 
if($this->edit_role){
    $readonly = '';
}else{
    $readonly = 'readonly';
}
?>
<div class="col-md-12">
    <div class="main-card mb-3 card">
        <div class="card-header">
            <i class="header-icon lnr-graduation-hat icon-gradient bg-happy-itmeo"> </i>Edit Project  
            <div class="btn-actions-pane-right">
                <button type="button" class="mb-2 mr-2 btn btn-dark btn-sm sidePanelClose">
                    Close
                </button>
            </div>
        </div>
        <form method="post" action="" id="editProjectForm">                    
            <div class="card-body">
                <?php foreach ($details->result() as $row) { ?>
                    <div class="form-group row">         
                        <div class="col-md-12">
                            <label for="project" class="ccol-form-label">Name</label>
                            <div class="col-sm-12">
                                <input type="text" name="name" id="name" class="form-control" value="<?= $row->name; ?>" required/>
                                <input type="hidden" id="current_name" value="<?= $row->name; ?>" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">         
                        <div class="col-md-12">
                            <label for="project_id" class="ccol-form-label">Project ID</label>
                            <div class="col-sm-12">
                                <input type="text" name="project_id" id="project_id" class="form-control" value="<?= $row->project_id; ?>" required/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="start_date" class="col-sm-6 col-form-label">Start Date</label>
                        <!--<input type="text" value="<?= $row->start_date; ?>" name="start_date" id="start_date" class="form-control" required/>-->
                        <div class="input-group">
                            <div class="input-group-prepend datepicker-trigger">
                                <div class="input-group-text">
                                    <a id="start_date_icon" class="font-icon-md">
                                        <i class="fa fa-calendar-alt"></i>
                                    </a>
                                </div>
                            </div>
                            <input type="text" value="<?= $row->start_date; ?>" name="start_date" data-toggle="datepicker-icon"  id='start_date' autocomplete="off"/>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="end_date" class="col-sm-6 col-form-label">End Date</label>
                        <!--<input type="text" value="<?= $row->end_date; ?>" name="end_date" id="end_date" class="form-control" required/>-->
                        <div class="input-group">
                            <div class="input-group-prepend datepicker-trigger">
                                <div class="input-group-text">
                                    <a id="end_date_icon" class="font-icon-md">
                                        <i class="fa fa-calendar-alt"></i>
                                    </a>
                                </div>
                            </div>
                            <input type="text" value="<?= $row->end_date; ?>" name="end_date" data-toggle="datepicker-icon"  id='end_date' autocomplete="off"/>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="m_contractor" class="col-sm-6 col-form-label">Main Contractor</label>
                        <select name="m_contractor" id="m_contractor" class="form-control text-center">
                            <option value="">--- Select Contractor ---</option>
                            <?php foreach ($m_contractors->result() as $contractor) { ?>
                                <option <?= $row->m_contractor == $contractor->id ? 'selected' : '' ?> value="<?= $contractor->id ?>"><?= $contractor->name ?></option>
                            <?php } ?>
                        </select>
                    </div>  
                    <div class="col-md-12">
                        <label for="client" class="col-sm-6 col-form-label">Client</label>
                        <select name="client" id="client" class="form-control text-center" required>
                            <option value="">--- Select Client ---</option>
                            <?php foreach ($clients->result() as $client) { ?>
                                <option <?= $row->client == $client->id ? 'selected' : '' ?> value="<?= $client->id ?>"><?= $client->name ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label for="consultant" class="col-sm-6 col-form-label">Consultant</label>
                        <input type="text" value="<?= $row->consultant; ?>" name="consultant" id="consultant" class="form-control"/>
                    </div>                    
                    <div class="col-md-12">
                        <label for="location" class="col-sm-6 col-form-label">Location</label>
                        <input type="text" value="<?= $row->location; ?>" name="location" id="location" class="form-control"/>
                    </div> 
                    <div class="col-md-12">
                        <label for="plumbing_total" class="col-form-label">Projected Value - Plumbing</label>
                        <input type="text" name="plumbing_total" id="plumbing_total" class="form-control" required value="<?= $row->plumbing_total; ?>" <?= $readonly ?>/>
                    </div>
                    <div class="col-md-12">
                        <label for="hvac_total" class="col-form-label">Projected Value - HVAC</label>
                        <input type="text" name="hvac_total" id="hvac_total" class="form-control" required value="<?= $row->hvac_total; ?>" <?= $readonly ?>/>
                    </div>
                    <div class="col-md-12">
                        <label for="electrical_total" class="col-form-label">Projected Value - Electrical</label>
                        <input type="text" name="electrical_total" id="electrical_total" class="form-control" required value="<?= $row->electrical_total; ?>" <?= $readonly ?>/>
                    </div>                    
                    <div class="col-md-12">
                        <label for="ff_total" class="col-form-label">Projected Value - Fire Fighting</label>
                        <input type="text" name="ff_total" id="ff_total" class="form-control" required value="<?= $row->ff_total; ?>" <?= $readonly ?>/>
                    </div>
                    <!--                    <div class="col-md-12">
                                            <label for="variation" class="col-sm-6 col-form-label">Variation</label>
                                            <input type="text" name="variation" id="variation" class="form-control" required value="<?= $row->variation; ?>"/>
                                        </div>-->
                    <div class="col-md-12">
                        <label for="variation" class="col-sm-6 col-form-label">Variation Plumbing</label>
                        <input type="text" name="variation_plumbing" id="variation_plumbing" class="form-control" required value="<?= $row->variation_plumbing; ?>"/>
                    </div>
                    <div class="col-md-12">
                        <label for="variation" class="col-sm-6 col-form-label">Variation HVAC</label>
                        <input type="text" name="variation_hvac" id="variation_hvac" class="form-control" required value="<?= $row->variation_hvac; ?>"/>
                    </div>
                    <div class="col-md-12">
                        <label for="variation" class="col-sm-6 col-form-label">Variation Electrical</label>
                        <input type="text" name="variation_electrical" id="variation_electrical" class="form-control" required value="<?= $row->variation_electrical; ?>"/>
                    </div>
                    <div class="col-md-12">
                        <label for="variation" class="col-sm-12 col-form-label">Variation Fire Fighting</label>
                        <input type="text" name="variation_ff" id="variation_ff" class="form-control" required value="<?= $row->variation_ff; ?>"/>
                    </div>
                    <input type="hidden" name="id" value="<?= $row->id ?>" />
                <?php } ?>
            </div>
            <div class="d-block text-right card-footer">
                <input type="button" value="Cancel" class="mr-2 btn btn-link btn-sm sidebar-cancel" />
                <button type="submit" class="btn-shadow-primary btn btn-primary" >Update</button>
            </div> 
        </form>
    </div>
</div>


<script>
    $("#name").blur(function () {
        var name = $(this).val();
        $("#name").parent().find('span.text-danger').hide();
        $(':input[type="submit"]').prop('disabled', false);
        if (name.toUpperCase() != $("#current_name").val().toUpperCase()) {
            $.post(PROJECTS + '/AJAXvalidateProjectName', {'name': name}, function (result) {
                if (result == 'invalid') {
                    $("#name").after('<span class="text-danger">Project Name already exists!</span>');
                    $(':input[type="submit"]').prop('disabled', true);
                    return false;
                }
            });
        }
    });
    
    $(function () {
//        $("#start_date").datepicker('option', 'minDate', '0');
//        $("#end_date").datepicker('option', 'minDate', '0');
    });
</script>
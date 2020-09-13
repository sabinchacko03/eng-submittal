<div class="col-md-12">
    <div class="main-card mb-3 card">
        <div class="card-header">
            <i class="header-icon lnr-graduation-hat icon-gradient bg-happy-itmeo"> </i>Add Project    
            <div class="btn-actions-pane-right">
                <button type="button" class="mb-2 mr-2 btn btn-dark btn-sm sidePanelClose">
                    Close
                </button>
            </div>
        </div>
        <form method="post" action="" id="add_project_form">  
            <div class="card-body">                              
                <div class="form-group row mt-3">       
                    <div class="col-md-12">
                        <label for="name" class="col-sm-6 col-form-label">Project Name</label>
                        <input type="text" name="name" id="name" class="form-control" required autocomplete="off"/>
                    </div>
                    <div class="col-md-12">
                        <label for="project_id" class="col-sm-6 col-form-label">Project ID</label>
                        <input type="text" name="project_id" id="project_id" class="form-control" required/>
                    </div>
                    <div class="col-md-12">
                        <label for="start_date" class="col-sm-6 col-form-label">Start Date</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <a id="start_date_icon" class="font-icon-md">
                                        <i class="fa fa-calendar-alt"></i>
                                    </a>
                                </div>
                            </div>
                            <input type="text" name="start_date" id='start_date' autocomplete="off" required/>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="end_date" class="col-sm-6 col-form-label">End Date</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <a id="end_date_icon" class="font-icon-md">
                                        <i class="fa fa-calendar-alt"></i>
                                    </a>
                                </div>
                            </div>
                            <input type="text" name="end_date" id='end_date' autocomplete="off" required/>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="m_contractor" class="col-sm-6 col-form-label">Main Contractor</label>
                        <select name="m_contractor" id="m_contractor" class="form-control text-center">
                            <option value="">--- Select Contractor ---</option>
                            <?php foreach ($m_contractors->result() as $contractor) { ?>
                                <option value="<?= $contractor->id ?>"><?= $contractor->name ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label for="client" class="col-sm-6 col-form-label">Client</label>

                        <select name="client" id="client" class="form-control text-center">
                            <option value="">--- Select Client ---</option>
                            <?php foreach ($clients->result() as $client) { ?>
                                <option value="<?= $client->id ?>"><?= $client->name ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label for="manager" class="col-form-label">Project Manager</label>
                        <!--<input type="text" name="manager" id="manager" class="form-control" required/>-->
                        <select name="manager" id="manager" class="form-control text-center">
                            <option value="">--- Select User ---</option>
                            <?php foreach ($users->result() as $user) { ?>
                                <option value="<?= $user->id ?>"><?= $user->username ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label for="consultant" class="col-form-label">Consultant</label>

                        <input type="text" name="consultant" id="consultant" class="form-control"/>
                    </div>
                    <div class="col-md-12">
                        <label for="plumbing_total" class="col-form-label">Projected Value - Plumbing</label>
                        <input type="text" name="plumbing_total" id="plumbing_total" class="form-control" required/>
                    </div>
                    <div class="col-md-12">
                        <label for="hvac_total" class="col-form-label">Projected Value - HVAC</label>
                        <input type="text" name="hvac_total" id="hvac_total" class="form-control" required/>
                    </div>
                    <div class="col-md-12">
                        <label for="electrical_total" class="col-form-label">Projected Value - Electrical</label>
                        <input type="text" name="electrical_total" id="electrical_total" class="form-control" required/>
                    </div>                    
                    <div class="col-md-12">
                        <label for="ff_total" class="col-form-label">Projected Value - Fire Fighting</label>
                        <input type="text" name="ff_total" id="ff_total" class="form-control" required/>
                    </div>                    
                    <div class="col-md-12">
                        <label for="location" class="col-form-label">Location</label>
                        <input type="text" name="location" id="location" class="form-control"/>
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
            <div class="d-block text-right card-footer">
                <input type="button" value="Cancel" class="mr-2 btn btn-link btn-sm sidebar-cancel" />
                <button type="submit" name="add_project" class="btn-shadow-primary btn btn-primary" >Save</button>
            </div>
        </form>
    </div>
</div>
<script>
    $("#name").blur(function () {
        var name = $(this).val();
        $.post(PROJECTS + '/AJAXvalidateProjectName', {'name': name}, function (result) {
            $("#name").parent().find('span.text-danger').hide();
            $(':input[type="submit"]').prop('disabled', false);
            if (result == 'invalid') {
                $("#name").after('<span class="text-danger">Project Name already exists!</span>');
                $(':input[type="submit"]').prop('disabled', true);
                return false;
            }
        });
    });
    $(function () {
//        $("#start_date").datepicker('option', 'minDate', '0');
//        $("#end_date").datepicker('option', 'minDate', '0');
    });
</script>
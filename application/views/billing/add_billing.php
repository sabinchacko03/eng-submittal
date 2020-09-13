<div class="col-md-12">
    <div class="main-card mb-3 card">
        <div class="card-header">
            <i class="header-icon lnr-graduation-hat icon-gradient bg-happy-itmeo"> </i>Add Billing     
            <div class="btn-actions-pane-right">
                <button type="button" class="mb-2 mr-2 btn btn-dark btn-sm sidePanelClose">
                    Close
                </button>
            </div>
        </div>
        <form method="post" action="" id="add_billing_form">  
            <div class="card-body">                              
                <div class="form-group row mt-3">       
                    <div class="col-md-12">
                        <label for="project_name" class="col-sm-6 col-form-label">Project</label>
                        <select name="project" id="project" class="form-control text-center" required >
                            <option value="">--- Select Project ---</option>
                            <?php foreach ($projects->result() as $project) { ?>
                                <option value="<?= $project->id ?>"><?= $project->name ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label for="start_date" class="col-sm-6 col-form-label">Department</label>
                        <select name="department" id="department" class="form-control text-center" required>
                            <option value="">--- Select Department ---</option>
                            <?php foreach ($departments->result() as $department) { ?>
                                <option value="<?= $department->id ?>"><?= $department->name ?></option>
                            <?php } ?>
                        </select>
                    </div> 
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="year" class="col-sm-12 col-form-label">Year</label>
                                <select name="year" id="year" class="col-sm-12 form-control" required>
                                    <option value="">Select Year</option>
                                    <?php
                                    for ($year = 2019; $year <= 2030; $year++) {
                                        $selected = (date('Y') == $year) ? 'selected' : '';
                                        echo "<option value=$year $selected>$year</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <?php
                                $MonthArray = array(
                                    "1" => "January", "2" => "February", "3" => "March", "4" => "April",
                                    "5" => "May", "6" => "June", "7" => "July", "8" => "August",
                                    "9" => "September", "10" => "October", "11" => "November", "12" => "December",
                                );
                                ?>
                                <label for="month" class="col-sm-12 col-form-label">Month</label>
                                <select name="month" id="month" class="col-sm-12 form-control" required>
                                    <option value="">Select Month</option>
                                    <?php
                                    foreach ($MonthArray as $monthNum => $month) {
                                        $selected = (isset($getMonth) && $getMonth == $monthNum) ? 'selected' : '';
                                        echo '<option ' . $selected . ' value="' . $monthNum . '">' . $month . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>                              
                        </div>
                        <span style="color: red;" id="date_msg"></span>
                    </div>
                    <div class="col-md-12">
                        <label for="projected" class="col-sm-6 col-form-label">Projected Amount</label>
                        <input type="text" name="projected" id="projected" class="form-control" required autocomplete="off"/>
                        <span style="color: red;" id="projected_msg"></span>
                    </div>
                    <div class="col-md-12">
                        <label for="m_contractor" class="col-sm-6 col-form-label">Actual Amount</label>
                        <input type="text" name="actual" id="technician" class="form-control" readonly="true" autocomplete="off"/>
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
    $(document).on("change", '#month', function () {
        var dept = $("#department").val();
        var pjct = $("#project").val();
        var month = $("#month").val();
        var year = $("#year").val();
        $.post(BILLING + '/AJAXCompareDates', {'project': pjct, 'month': month, 'year': year, 'department': dept}, function (res) {
            var data1 = JSON.parse(res);
            if (data1.result == 'false') {
                $("#date_msg").html(data1.msg);
            }else{
                $("#date_msg").html('');
            }
        });
    });

</script>
<style>div.dataTables_wrapper {
        width: 800px;
        margin: 0 auto;
    }
</style>

<div class="page-header">
    <h3 class="page-title">Material Submittal Log</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Forms</a></li>
            <li class="breadcrumb-item active" aria-current="page"> Form elements </li>
        </ol>
    </nav>
</div>
<div class="row">              
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <!--                        <h4 class="card-title">Basic form elements</h4>
                                        <p class="card-description">Basic form elements</p>-->
                <form class="forms-sample" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputName1">Project</label>
                                <select name="project_id" id="project_id" class="form-control text-center">
                                    <option value="">--- Select Project ---</option>
                                    <?php foreach ($projects->result() as $project) { ?>
                                        <option value="<?= $project->id ?>"><?= $project->name ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail3">Department</label>
                                <select name="dept_id" id="dept_id" class="form-control text-center">
                                    <option value="">--- Select Department ---</option>
                                    <?php foreach ($departments->result() as $department) { ?>
                                        <option value="<?= $department->id ?>"><?= $department->name ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2"> View Report </button>
                    <!--<button class="btn btn-light">Cancel</button>-->
                </form>
            </div>
        </div>
    </div>
</div>
<?php if (isset($mat_sub_log)) { ?>
    <div class="row" >
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <!--                            <h4 class="card-title">Basic Table</h4>
                                                <p class="card-description"> Add class <code>.table</code>
                                                </p>-->
                    <div class="table-responsive">
                        <table id="material_table" class="display nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>RefID</th>
                                    <th>Material Description</th>
                                    <th>Planned Submittal Date</th>
                                    <th>Manufacurer/ Sub contractor</th>
                                    <th>Previous Final Approval Status</th>
                                    <th>Actual Submittal Date</th>
                                    <th>Appr. Reqd</th>
                                    <th>Appr. Date</th>
                                    <th>Status</th>
                                    <th>Rev. 01</th>
                                    <th>Approval Date</th>
                                    <th>Status</th>
                                    <th>Rev. 02</th>
                                    <th>Approval Date</th>
                                    <th>Status</th>
                                    <th>Final Status</th>
                                    <th>Delivery Period</th>
                                    <th>Remarks</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($mat_sub_log->result() as $material) { ?>
                                    <tr>
                                        <td><?= $material->id; ?></td>
                                        <td><?= $material->material_desc; ?></td>
                                        <td><?= $material->planned_sub_date; ?></td>
                                        <td><?= $material->manufacturer; ?></td>
                                        <td><?= $material->PFA_status; ?></td>
                                        <td><?= $material->act_sub_date; ?></td>
                                        <td><?= $material->appr_req_date; ?></td>
                                        <td><?= $material->appr_date; ?></td>
                                        <td><?= $material->appr_status; ?></td>
                                        <td><?= $material->rev1_date; ?></td>
                                        <td><?= $material->rev1_appr_date; ?></td>
                                        <td><?= $material->rev1_appr_status; ?></td>
                                        <td><?= $material->rev2_date; ?></td>
                                        <td><?= $material->rev2_appr_date; ?></td>
                                        <td><?= $material->rev2_appr_status; ?></td>
                                        <td><?= $material->final_status; ?></td>
                                        <td><?= $material->delivery_period; ?></td>
                                        <td><?= $material->remark; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
</div>
<script>
    $(document).ready(function () {
        $('#material_table').DataTable({
            "scrollX": true
        });
    });
</script>
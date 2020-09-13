<style>div.dataTables_wrapper {
        width: 800px;
        margin: 0 auto;
    }
</style>

<div class="page-header">
    <h3 class="page-title">Daily Manpower Allocation</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"> Daily Manpower </li>
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
<?php if (isset($details)) { ?>
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
                                    <th>ID</th>
                                    <th>Activity</th>
                                    <th>Technician</th>
                                    <th>Helper</th>
                                    <th>Project</th>
                                    <th>Department</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($details->result() as $row) { ?>
                                    <tr>
                                        <td><?= $row->id; ?></td>
                                        <td><?= $row->activity; ?></td>
                                        <td><?= $row->technician; ?></td>
                                        <td><?= $row->helper; ?></td>
                                        <td><?= $row->project_name; ?></td>
                                        <td><?= $row->dept_name; ?></td>
                                        <td><?= date('d-M-Y',strtotime($row->date)); ?></td>
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
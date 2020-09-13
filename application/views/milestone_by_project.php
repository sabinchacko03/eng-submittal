<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-display1 icon-gradient bg-premium-dark">
                        </i>
                    </div>
                    <div>
                        <h2>Milestone Achievements : <?= $project_name; ?></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-content">
            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                <div class="row">
                    <div class="col-md-8">
                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                <!--<h5 class="card-title">Add Milestone</h5>-->
                                <form method="post" action="<?= base_url() ?>milestone/view_milestone_by_project">                    
                                    <div class="form-group row">                    
                                        <label for="user" class="col-sm-6 col-form-label">Project</label>
                                        <div class="col-sm-6">
                                            <select name="project" id="project" class="form-control text-center">
                                                <option value="">--- Select Project ---</option>
                                                <?php foreach ($projects->result() as $project) { ?>
                                                    <option value="<?= $project->id ?>"><?= $project->name ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>                                                                         
                                    <div class="form-group offset-6">
                                        <input type="submit" name="submit" class="btn btn-primary full-blue" value="View"/>
                                    </div>                
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="tab-content">
            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                <div class="row">
                    <div class="col-md-6">
                        <div id="chart-container" style="width: 100%;height: auto;">
                            <canvas id="milestonBar"></canvas>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div id="chart-container" style="width: 100%;height: auto;">
                            <canvas id="milestonPie"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            var milestoneData = <?= json_encode($chartData, JSON_NUMERIC_CHECK); ?>;
            var milestoneName = [];
            var milestoneValue = [];

            $.each(JSON.parse(milestoneData), function (i, mileData) {
                milestoneName.push(mileData.label);
                milestoneValue.push(mileData.y);
            });
            var ctx = document.getElementById('milestonBar').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: milestoneName,
                    datasets: [{
                            label: 'Milestone Achievements',
                            data: milestoneValue,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        }]
                },
                options: {
                    scales: {
                        yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                    }
                }
            });
            
            var ctx1 = document.getElementById('milestonPie').getContext('2d');
            var myChart = new Chart(ctx1, {
                type: 'pie',
                data: {
                    labels: milestoneName,
                    datasets: [{
                            label: 'Milestone Achievements',
                            data: milestoneValue,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        }]
                },
                options: {
                    scales: {
                        yAxes: [{
//                                ticks: {
//                                    beginAtZero: true
//                                }
                            }]
                    }
                }
            });
        </script>
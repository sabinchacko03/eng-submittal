<div class="row">
    <div class="col-md-12">
        <div class="container border grad-blue mt-3">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#projects" role="tab" aria-controls="home" aria-selected="true">Projects</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#clients" role="tab" aria-controls="profile" aria-selected="false">Clients</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#contractors" role="tab" aria-controls="profile" aria-selected="false">Contractors</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="projects" role="tabpanel" aria-labelledby="home-tab">
                    <?php include 'admin_add_project.php'; ?>
                </div>
                <div class="tab-pane fade" id="clients" role="tabpanel" aria-labelledby="home-tab">
                    <?php include 'admin_add_client.php'; ?>
                </div>
                <div class="tab-pane fade" id="contractors" role="tabpanel" aria-labelledby="home-tab">
                    <?php include 'admin_add_contractor.php'; ?>
                </div>
            </div>
        </div>
    </div>
</div>
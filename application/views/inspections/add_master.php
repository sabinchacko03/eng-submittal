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
                        <h2>Authority Inspections</h2>
                        <!--<div class="page-title-subheading">Wide selection of forms controls, using the Bootstrap 4 code base, but built with React.-->
                        <!--</div>-->
                    </div>
                </div>
            </div>
        </div>         
        <div class="row" id="viewContent">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">

                    </div>
                </div>
            </div>
        </div>       
        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Add Inspection Master</h5>
                        <form method="post" action="">
                            <div class="form-group row">                    
                                <div class="col-md-6">                    
                                    <label for="name" class="col-form-label">Name</label>
                                    <input type="text" name="name" id="name" class="form-control" required="" />
                                    <span class="text-danger"><?= form_error('name') ?></span>
                                </div>                        
                            </div>
                            <div class="form-group row">                    
                                <div class="col-md-3">                    
                                    <input type="submit" class="btn btn-primary form-control" value="Save" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
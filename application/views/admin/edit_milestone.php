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
                        <h2>Edit Milestone</h2>
                        <!--<div class="page-title-subheading">Wide selection of forms controls, using the Bootstrap 4 code base, but built with React.-->
                        <!--</div>-->
                    </div>
                </div>
            </div>
        </div> 
        <div class="tab-content">
            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                <div class="row">
                    <div class="col-md-12">
                        <div class="main-card mb-3 card">
                            <div class="card-header">
                                <i class="header-icon lnr-graduation-hat icon-gradient bg-happy-itmeo"> </i>Edit Milestone                                            
                            </div>
                            <div class="card-body">
                                <?php foreach ($details->result() as $row) { ?>
                                    <form method="post" action="<?= base_url() ?>milestone/edit_milestone">                    
                                        <div class="form-group row">         
                                            <div class="col-md-12">
                                                <label for="project" class="ccol-form-label">Project</label>
                                                <div class="col-sm-12">
                                                    <input type="text" readonly="readonly" class="form-control" value="<?= $row->project_name; ?>"/>
                                                </div>
                                            </div>
                                        </div>                                     
                                        <div class="form-group row">                    
                                            <label for="milestone" class="col-form-label">Milestone</label>
                                            <div class="col-sm-12">
                                                <input type="text" readonly="readonly" class="form-control" value="<?= $row->milestone; ?>"/>
                                            </div>
                                        </div>        
                                        <div class="form-group row">                    
                                            <label for="sequence" class="col-form-label">Sequence</label>
                                            <div class="col-sm-12">
                                                <input type="text" readonly="readonly" class="form-control" value="<?= $row->sequence; ?>"/>
                                            </div>
                                        </div>            
                                        <div class="form-group row">                    
                                            <label for="planned_date" class="col-form-label">Planned Date</label>
                                            <div class="col-sm-12">
                                                <input type="text" readonly="readonly" class="form-control" value="<?= substr($row->planned_date, 0, 10) == '0000-00-00' ? 'NA' : date('d-M-Y', strtotime($row->planned_date)); ?>"/>
                                            </div>
                                        </div>  
                                        <div class="form-group row">                    
                                            <label for="actual_date" class="col-form-label">Amended Date</label>
                                            <div class="col-sm-12">
                                                <input type="text" name="amended_date" id="amended_date" class="form-control" value= "<?= substr($row->amended_date, 0, 10) == '0000-00-00' ? 'NA' : date('d-M-Y', strtotime($row->planned_date)); ?>" />
                                                <span class="text-danger"><?= form_error('amended_date') ?></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">                    
                                            <label for="actual_date" class="col-form-label">Actual Date</label>
                                            <div class="col-sm-12">
                                                <input type="text" name="actual_date" id="actual_date" class="form-control"/>
                                                <span class="text-danger"><?= form_error('actual_date') ?></span>
                                            </div>
                                        </div>                                                 
                                        <input type="hidden" name="id" value="<?= $row->id ?>" />
                                        <div class="form-group offset-6">
                                            <input type="submit" name="submit" class="btn btn-primary full-blue" value="Update"/>
                                        </div>                
                                    </form>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $("#actual_date,#amended_date").datepicker({
                dateFormat: "yy-mm-dd"
            });
        </script>
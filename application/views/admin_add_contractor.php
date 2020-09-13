<div class="container text-center mt-3">
    <h2>Add Main Contractor</h2>
    <form method="post" action="<?= base_url() ?>admin/add_main_contractor">                    
        <div class="form-group row mt-3">                    
            <label for="mcont_name" class="col-sm-6 col-form-label">Name</label>
            <div class="col-sm-6">
                <input type="text" name="mcont_name" id="mcont_name" class="form-control"/>
                <span class="text-danger"><?= form_error('mcont_name') ?></span>
            </div>
        </div>                    
        <div class="form-group row">                    
            <label for="mcont_phone" class="col-sm-6 col-form-label">Phone</label>
            <div class="col-sm-6">
                <input type="text" name="mcont_phone" id="mcont_phone" class="form-control"/>
                <span class="text-danger"><?= form_error('mcont_phone') ?></span>
            </div>
        </div>
        <div class="form-group row">                    
            <label for="mcont_email" class="col-sm-6 col-form-label">Email</label>
            <div class="col-sm-6">
                <input type="text" name="mcont_email" id="mcont_email" class="form-control"/>
                <span class="text-danger"><?= form_error('mcont_email') ?></span>
            </div>
        </div>

        <div class="form-group">
            <input type="submit" name="add_m_contractor" class="btn btn-primary full-blue" value="Add Contractor"/>
        </div>                
    </form>
</div>
<?php $id = 1; ?>
<div class="container border mt-3">
    <div class="header text-center">
        <h2>Active Contractors</h2>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Phone</th>
                <th scope="col">Email</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($m_contractors->result() as $contractor) { ?>
                <tr>
                    <th scope="row"><?= $id++ ?></th>
                    <td><?= $contractor->name ?></td>
                    <td><?= $contractor->phone ?></td>
                    <td><?= $contractor->email ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
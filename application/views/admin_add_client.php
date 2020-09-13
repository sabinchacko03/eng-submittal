<div class="container text-center mt-3">
    <h2>Add Client</h2>
    <form method="post" action="<?= base_url() ?>admin/add_client">                    
        <div class="form-group row mt-3">                    
            <label for="client_name" class="col-sm-6 col-form-label">Client Name</label>
            <div class="col-sm-6">
                <input type="text" name="client_name" id="client_name" class="form-control"/>
                <span class="text-danger"><?= form_error('client_name') ?></span>
            </div>
        </div>                    
        <div class="form-group row">                    
            <label for="client_phone" class="col-sm-6 col-form-label">Phone</label>
            <div class="col-sm-6">
                <input type="text" name="client_phone" id="client_phone" class="form-control"/>
                <span class="text-danger"><?= form_error('client_phone') ?></span>
            </div>
        </div>
        <div class="form-group row">                    
            <label for="client_email" class="col-sm-6 col-form-label">Email</label>
            <div class="col-sm-6">
                <input type="text" name="client_email" id="client_email" class="form-control"/>
                <span class="text-danger"><?= form_error('client_email') ?></span>
            </div>
        </div>

        <div class="form-group">
            <input type="submit" name="add_client" class="btn btn-primary full-blue" value="Add Client"/>
        </div>                
    </form>
</div>
<?php $id = 1; ?>
<div class="container border mt-3">
    <div class="header text-center">
        <h2>Active Clients</h2>
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
            <?php foreach ($clients->result() as $client) { ?>
                <tr>
                    <th scope="row"><?= $id++ ?></th>
                    <td><?= $client->name ?></td>
                    <td><?= $client->phone ?></td>
                    <td><?= $client->email ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
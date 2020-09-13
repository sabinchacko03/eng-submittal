<div class="container grad-blue mt-3 pt-2" pb-2 mb-3>
    <?php foreach ($project_details->result() as $pDetails) { ?>
        <div class="header text-center">
            <h3><?=$pDetails->name?></h3>
            <h4>Daily Report (<?=$department?>)</h4>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Activity</th>
                    <th scope="col">Technician</th>
                    <th scope="col">Helper</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Productivity</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 1; $i < 10; $i++) { ?>
                    <tr>
                        <th scope="row"><?= $i ?></th>
                        <td><?= 'activity ' . $i ?></td>
                        <td><?= rand(0, 10) ?></td>
                        <td><?= rand(0, 10) ?></td>
                        <td><?= rand(0, 7) ?></td>
                        <td><?= rand(0, 5) ?> %</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } ?>
</div>
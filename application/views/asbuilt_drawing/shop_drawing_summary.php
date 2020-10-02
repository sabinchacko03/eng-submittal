<div class="col-lg-12">
    <div class="main-card mb-3 card">
        <div class="card-header">
            <i class="header-icon lnr-graduation-hat icon-gradient bg-happy-itmeo"> </i>Overall As Built Drawing
            <div class="btn-actions-pane-right">
                <?php if ($this->edit_role) { ?>
                    <button class="btn btn-square btn-primary btn-sm btn-add-asbuilt-drawing-form"><i class="fa fa-plus-circle"></i> New As Built Drawing</button>
                <?php } ?>
            </div>
        </div>
        <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Project</th>
                    <th>Total</th>
                    <th>Submitted</th>
                    <th>A</th>  
                    <th>B</th>
                    <th>C</th>
                    <th>D</th>
                    <th>UR</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($material->result_array() as $row) { ?>
                    <tr>
                        <!--<th scope="row"><?= $id++; ?></th>-->
                        <td><?= $row['project_id']; ?></td>
                        <td><?= $row['project_name']; ?></td>
                        <td><?= $row['total']; ?></td>  
                        <td><?= $row['submitted']; ?></td>
                        <td><?= $row['approved']; ?></td>                                          
                        <td><?= $row['b']; ?></td>                                          
                        <td><?= $row['c']; ?></td>                                          
                        <td><?= $row['d']; ?></td>                                          
                        <td><?= $row['ur']; ?></td>                                          
                        <td>
                            <a href='#' class="viewAsbuiltDrawingDetails" data-project="<?= $row['project'] ?>">
                                View
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
            <tfoot>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </tfoot>
        </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('.table').DataTable({            
            footerCallback: function ( row, data, start, end, display ) {
            var api = this.api(), data;
 
                // converting to interger to find total
                var intVal = function ( i ) {
                    return typeof i === 'string' ?
                        i.replace(/[\$,]/g, '')*1 :
                        typeof i === 'number' ?
                            i : 0;
                };
    
                // computing column Total of the complete result 
                var total = api
                    .column( 2 )
                    .data()
                    .reduce( function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0 );

                var submitted = api
                    .column( 3 )
                    .data()
                    .reduce( function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0 );
                    
                var aStatus = api
                    .column( 4 )
                    .data()
                    .reduce( function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0 );  
                var bStatus = api
                .column( 5 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );                                  
                var cStatus = api
                .column( 6 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
                var dStatus = api
                .column( 7 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
                var urStatus = api
                .column( 8 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
                // Update footer by showing the total with the reference of the column index 
                $( api.column( 1 ).footer() ).html('Total : ');
                $( api.column( 2 ).footer() ).html(total);
                $( api.column( 3 ).footer() ).html(submitted);
                $( api.column( 4 ).footer() ).html(aStatus);
                $( api.column( 5 ).footer() ).html(bStatus);
                $( api.column( 6 ).footer() ).html(cStatus);
                $( api.column( 7 ).footer() ).html(dStatus);
                $( api.column( 8 ).footer() ).html(urStatus);
            },
        });
    });
</script>
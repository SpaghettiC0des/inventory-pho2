<div class="card animated fadeIn">
    <div class="card-header">
        <h2>All Categories<small>
    </div>
    
    <div class="table-responsive">
        <table data-bind = "bootgrid" class="table table-striped">
            <thead>
                <tr>
                    <th data-column-id="code" data-identifier="true">Name</th>
                    <th data-column-id="name">Added</th>
                    <th>Updated</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $category) { ?>
                    <tr>
                        <td><?php echo $category->name; ?></td>
                        <td><?php echo \Carbon\Carbon::parse( $category->created_at )->toFormattedDateString(); ?></td>
                        <td><?php echo \Carbon\Carbon::parse( $category->updated_at )->toFormattedDateString(); ?></td>
                        <td>
                            <span>todo</span>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
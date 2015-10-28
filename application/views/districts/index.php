<div class="card display-none animated fadeIn">
    <div class="card-header">
        <h2>All Districts <small>
    </div>
    
    <div class="table-responsive">
        <table id="data-table-selection" class="table table-striped">
            <thead>
                <tr>
                    <th data-column-id="name" data-identifier="true">Name</th>
                    <th data-column-id="added">Added</th>
                    <th data-column-id="updated" data-order="desc">Updated</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($districts as $district) { ?>
                    <tr>
                        <td><?php echo $district->name; ?></td>
                        <td><?php echo \Carbon\Carbon::parse( $district->updated_at )->toFormattedDateString(); ?></td>
                        <td><?php echo \Carbon\Carbon::parse( $district->updated_at )->toFormattedDateString(); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
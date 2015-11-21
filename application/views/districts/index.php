
<div class="block-header">
    <h2>Districts</h2>
</div>

<div class="card">
    <div class="card-header">
         <h2>All Categories</h2>
    </div>

    <div class="card-body card-padding">
        <table data-bind="dataTable, tableName: 'districtsDT'" id="districtsDT" class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Added</th>
                    <th>Updated</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody data-bind = "with: districtVM">
                <?php foreach ($districts as $district) { ?>
                    <tr id="districtTR_<?php echo $district->id; ?>">
                        <td><?php echo $district->name; ?></td>
                        <td><?php echo \Carbon\Carbon::parse( $district->created_at )->toFormattedDateString(); ?></td>
                        <td><?php echo \Carbon\Carbon::parse( $district->updated_at )->toFormattedDateString(); ?></td>
                        <td>
                            <div class="btn-group">
                                <button data-id="<?php echo $district->id; ?>" type="button" class="btn bgm-bluegray btn-xs district-edit">Edit</button>
                                <button data-bind = "click: function(){deleteDistrict(<?php echo $district->id; ?>)}" type="button" class="btn bgm-red btn-xs">&times;</button>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>



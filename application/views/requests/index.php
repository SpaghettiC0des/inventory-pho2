<div class="card animated fadeIn">
    <div class="card-header">
        <h2>All Requests <h2>
    </div>
    
    <div class="card-body card-padding">
        <table data-bind="dataTable" id="requestsDT" class="table table-striped">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Office</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody data-bind = "with: requestVM">
                <?php foreach ($requests as $request) { ?>
                    <tr id="requestTR_<?php echo $request->id;?>">
                        <td><?php echo date('F j, Y',strtotime($request->datetime)); ?></td>
                        <td><?php echo $request->office->name; ?></td>
                        <td><?php echo $request->status; ?></td>
                        <td>
                            <div class="btn-group">
                                <a data-bind = "click: function(){edit(<?php echo $request->id; ?>)}" href="javascript:void(0)" class="btn btn-primary btn-xs">Edit</a>
                                <a href="javascipt:void(0)" class="btn btn-primary btn-xs">Update Status</a>
                                <a data-bind = "click: function(){view(<?php echo $request->id; ?>)}" href="javascript:void(0)" class="btn btn-primary btn-xs">View</a>
                                <a href="javascript:void(0)" data-id="<?php echo $request->id?>" class="btn btn-danger btn-xs request-delete">&times;</a>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
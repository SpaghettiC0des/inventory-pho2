<div class="card animated fadeIn">
    <div class="card-header">
        <h2>All Requests <small>
    </div>
    
    <div class="table-responsive">
        <table data-bind="bootgrid" class="table table-striped">
            <thead>
                <tr>
                    <th data-column-id="date" data-identifier="true">Date</th>
                    <th data-column-id="office">Office</th>
                    <th data-column-id="status" data-order="desc">Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($requests as $request) { ?>
                    <tr>
                        <td><?php echo $request->datetime; ?></td>
                        <td><?php echo $request->office->name; ?></td>
                        <td><?php echo $request->status; ?></td>
                        <td>TODO</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<div class="card animated fadeIn">
    <div class="card-header">
        <h2>All Suppliers <h2>
    </div>
    
    <div class="card-body card-padding">
        <table data-bind="dataTable" id="suppliersDT" class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Representative</th>
                    <th>Contact No.</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody data-bind = "with: supplierVM">
                <?php foreach ($suppliers as $supplier) { ?>
                    <tr id="supplierTR_<?php echo $supplier->id?>">
                        <td><?php echo $supplier->name; ?></td>
                        <td><?php echo $supplier->representative; ?></td>
                        <td><?php echo $supplier->contact_number; ?></td>
                        <td><?php echo $supplier->email; ?></td>
                        <td><?php echo $supplier->address; ?></td>
                        <td>
                            <div class="btn-group">
                                <a href="javascript:void(0);" data-id="<?php echo $supplier->id?>" class="btn bgm-bluegray btn-xs supplier-edit">Edit</a>
                                <a href="javascript:void(0);" data-id="<?php echo $supplier->id?>" class="btn btn-danger btn-xs supplier-delete">&times;</a>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<div class="card animated fadeIn">
    <div class="card-header">
        <h2>All Purchases<small>
    </div>
    
    <div>
        <table data-bind = "dataTable, dataTableOptions: {  'order': [[ 0, 'desc' ]] }" class="table table-striped">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Reference No.</th>
                    <th>Supplier</th>
                    <th>Purchase Status</th>
                    <th>Paid</th>
                    <th>Balance</th>
                    <th>Payment Status</th>
                    <th>Commands</th>
                </tr>
            </thead>
            <tbody data-bind = "with: purchaseVM">
                <?php foreach ($purchases as $purchase) { ?>
                    <tr>
                        <td><?php echo \Carbon\Carbon::parse( $purchase->datetime )->toFormattedDateString(); ?></td>
                        <td><?php echo $purchase->reference_no; ?></td>
                        <td><?php echo $purchase->supplier->name; ?></td>
                        <td><?php echo $purchase->status; ?></td>
                        <td><?php echo $purchase->paid; ?></td>
                        <td><?php echo $purchase->balance; ?></td>
                        <td><?php echo $purchase->payment_status; ?></td>
                        <td>
                            <div class="dropdown" data-animation="flipInX,flipOutX">
                                <button type="button" class="btn btn-primary btn-xs" data-toggle="dropdown">Flip In X <i class="caret"></i></button>
                                
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something else here</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Separated link</a></li>
                                </ul>
                            </div>
                        </td>
             
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
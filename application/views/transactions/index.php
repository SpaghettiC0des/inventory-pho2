<div class="block-header">
    <h2>Transactions</h2>
</div>

<div class="card">
    <div class="card-header">
        <h2><?php echo $header; ?></h2>

        <ul class="actions">
            <li class="dropdown action-show">
                <a href="#" data-toggle="dropdown">
                    <i class="zmdi zmdi-more-vert"></i>
                </a>

                <div class="dropdown-menu pull-right">
                    <p class="p-20">
                        You can put anything here
                    </p>
                </div>
            </li>
        </ul>
    </div>

    <div class="card-body card-padding">
        <table data-bind="dataTable" id="transactionsDT" class="table table-striped">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Reference No.</th>
                    <th>Office</th>
                    <th>Amount Paid</th>
                    <th>Amount Left</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($transactions as $transaction) : ?>
                    <tr id="transactionTR_<?php echo $transaction->id?>">
                        <td><?php echo date('M d, Y h:m A',strtotime($transaction->datetime)) ?></td>
                        <td><strong><?php echo $transaction->reference_no; ?></strong></td>
                        <td><?php echo $transaction->office->name; ?></td>
                        <td><?php echo $transaction->amount_paid; ?></td>
                        <td><?php echo $transaction->amount_left; ?></td>
                        <td>
                            <?php if($transaction->status == 'Partial'){ ?>
                                <span class="text-danger">Partial</span>
                            <?php } else{?>
                                <span class="text-success">Paid</span>
                            <?php } ?>
                        </td>
                        <td>
                           <div class="btn-group">
                                <a href="javascript:void(0);" data-id="<?php echo $transaction->id?>" class="btn bgm-bluegray btn-xs transaction-edit">Edit</a>
                                <a href="javascript:void(0);" data-id="<?php echo $transaction->id?>"class="btn btn-danger btn-xs transaction-delete">&times;</a>
                           </div>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>



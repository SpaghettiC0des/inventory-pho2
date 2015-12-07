<div class="card animated fadeIn">
    <div class="card-header">
        <h2>All Pending Budgets<h2>
    </div>
    <div class="card-body card-padding">
        <table data-bind = "dataTable" id="officeBudgetsDT" class="table table-striped">
            <thead>
                <tr>
                    <th>Office</th>
                    <th class="text-center">Amount Given</th>
                    <th class="text-center">Amount Left</th>
                    <th class="text-center">Year</th>
                    <th class="text-center">Added</th>
                    <th class="text-center">Updated</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody data-bind = "with: officeBudgetVM">
                <?php foreach ($budgets as $budget) { ?>
                    <tr id="officeBudgetTR_<?php echo $budget->id; ?>">
                        <td><strong><?php echo $budget->office->name; ?></strong></td>
                        <td class="text-center">₱ <strong><?php echo $budget->amount_given; ?></strong></td>
                        <td class="text-center">₱ <strong><?php echo $budget->amount_left; ?></strong></td>
                        <td class="text-center"><?php echo $budget->year; ?></td>
                        <td class="text-center"><?php echo date('M d, Y h:m A',strtotime($budget->created_at)) ?></td>
                        <td class="text-center"><?php echo date('M d, Y h:m A',strtotime($budget->updated_at)) ?></td>
                        <td>
                            <div class="btn-group">
                                <a href="javascript:void(0);" data-id="<?php echo $budget->id?>" class="btn bgm-blue btn-xs budget-approve">Approve</a>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
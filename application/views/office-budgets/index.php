<div class="card animated fadeIn">
    <div class="card-header">
        <h2>All Office Budgets <small>
    </div>
    
    <div class="table-responsive">
        <table data-bind = "bootgrid" class="table table-striped">
            <thead>
                <tr>
                    <th data-column-id="code" data-identifier="true">Office</th>
                    <th data-column-id="name">Amount(Php)</th>
                    <th data-column-id="until">Until</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($budgets as $budget) { ?>
                    <tr>
                        <td><?php echo $budget->office->name; ?></td>
                        <td><?php echo $budget->amount; ?></td>
                        <td><?php echo $budget->date; ?></td>
                        <td>
                            <span>todo</span>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
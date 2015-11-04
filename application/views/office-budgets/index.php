<div class="card animated fadeIn">
    <div class="card-header">
        <h2>All Office Budgets <h2>
    </div>
    <div class="card-body card-padding">
        <table data-bind = "dataTable" class="table table-striped">
            <thead>
                <tr>
                    <th>Office</th>
                    <th>Amount(Php)</th>
                    <th>Until</th>
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
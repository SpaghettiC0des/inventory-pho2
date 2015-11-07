<div class="card animated fadeIn">
    <div class="card-header">
        <h2>All Office Budgets <h2>
    </div>
    <div class="card-body card-padding">
        <table data-bind = "dataTable" class="table table-striped">
            <thead>
                <tr>
                    <th>Office</th>
                    <th class="text-center">Amount(Php)</th>
                    <th class="text-center">Effective Year</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($budgets as $budget) { ?>
                    <tr>
                        <td><?php echo $budget->office->name; ?></td>
                        <td class="text-center"><strong><?php echo $budget->amount; ?></strong></td>
                        <td class="text-center"><?php echo $budget->year; ?></td>
                        <td>
                            <div class="btn-group">
                                <button class="btn btn-primary btn-sm">Edit</button>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
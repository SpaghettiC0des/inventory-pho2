<div class="block-header">
    <h2>Items</h2>
</div>

<div class="card">
    <div class="card-header">
        <h2>All newly added</h2>

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
        <table data-bind="dataTable" class="table table-striped">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Unit (Php)</th>
                    <th>Cost (Php)</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($items as $item) : ?>
                    <?php if(!isset($item->item_stocks[0])) : ?>
                    <tr>
                        <td><strong><?php echo $item->code; ?></strong></td>
                        <td><strong><?php echo $item->name; ?></td>
                        <td><strong><?php echo $item->unit; ?></td>
                        <td><strong>₱ <?php echo $item->cost; ?></td>
                        <td><strong>₱ <?php echo $item->price; ?></td>

                        <td>
                            <div class="btn-group">
                                <a href="javascript:void(0);"  class="btn bgm-bluegray btn-xs">Edit</a>
                                <a href="javascript:void(0);" class="btn btn-danger btn-xs">&times;</a>
                            </div>
                        </td>
                    </tr>
                    <?php endif ?>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>



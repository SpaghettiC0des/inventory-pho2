
<div class="card animated fadeIn">
    <div class="card-header">
        <h2>On stock Items<small>
    </div>
    
    <div>
        <table data-bind = "dataTable, dataTableOptions: {  'order': [[ 0, 'desc' ]] }" class="table table-striped">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Code</th>
                    <th>Quantity</th>
                    <!-- <th>Unit</th> -->
                    <th>Price</th>
                    <th>Expiration</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($stocks as $stock) : ?>
                    <tr>
                        <td><?php echo $stock->item_name; ?></td>
                        <td><?php echo $stock->code; ?></td>
                        <td><?php echo $stock->quantity; ?></td>
                        <td><?php echo $stock->cost; ?></td>
                        <td><?php echo $stock->expiration_date; ?></td>
                        <td><?php echo $stock->status; ?></td>
                        <td>
                            <div class="dropdown" data-animation="fadeIn,fadeOut">
                                <button type="button" class="btn btn-primary btn-xs" data-toggle="dropdown">Actions <i class="caret"></i></button>
                                
                                <ul class="dropdown-menu pull-right bgm-gray">
                                    <li><a href="javascript:void(0);">Full Details</a></li>
                                    <li><a href="#">Edit Purchase</a></li>
                                    <li><a href="#">Delete Purchase</a></li>
                                </ul>
                            </div>
                        </td>
             
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

<div class="block-header">
    <h2>Items</h2>
</div>

<div class="card">
    <div class="card-header">
        <h2>All items list</h2>

        <ul class="actions">
            <li class="dropdown action-show">
                <a href="javascript:void(0);" data-toggle="dropdown">
                    <i class="zmdi zmdi-more-vert"></i>
                </a>

                <div class="dropdown-menu pull-right">
                    <p class="p-20">
                        TODO: Add refresh blahblah
                    </p>
                </div>
            </li>
        </ul>
    </div>

    <div class="card-body card-padding">
        <table data-bind="dataTable" class="table table-striped">
            <thead>
                <tr>
                    <th class="text-center">Image</th>
                    <th>Code</th>
                    <th class="text-center">Name</th>
                    <td class="text-center">Category</td>
                    <th class="text-center">Quantity</th>
                    <th class="text-center">Expiration</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody data-bind="with: itemVM">
                <?php foreach ($items as $item) : ?>
                    <?php if(isset($item->item_stocks[0])) {?>
                        <tr>
                            <td><img src="<?php echo url::site(); ?>assets/uploads/default.png" width="50" height="50" alt=""></td>
                            <td><strong><?php echo $item->code; ?></strong></td>
                            <td>
                                <strong><?php echo $item->name; ?> 
                                    <button class="zmdi zmdi-comment-more btn btn-link pull-right" data-trigger="hover" data-placement="right" data-toggle="popover" data-placement="top" data-content="<?php echo $item->description; ?>" title="" data-original-title="<?php echo $item->name; ?> Description"></button>
                                </strong>
                            </td>
                            <td><?php echo $item->category->name; ?></td>
                            <td class="text-center">
                            <?php if($item->item_stocks[0]->quantity < 1){?>
                                <label class="label label-danger">Out of Stock</label>
                            <?php } else {
                                echo $item->item_stocks[0]->quantity;   
                            }?>
                            </td>
                            <td class="text-center"><?php echo date('D M d, Y',strtotime($item->item_stocks[0]->expiration_date));?></td>
                            
                            <td>
                                <div class="btn-group">
                                    <a href="javascript:void(0);" data-item-id="<?php echo $item->id; ?>" class="btn bgm-bluegray btn-xs item-edit">Edit</a>
                                    <a href="javascript:void(0);" class="btn btn-danger btn-xs">&times;</a>
                                </div>
                            </td>
                        </tr>
                        <?php } else {?>
                            <tr>
                                <td><img src="<?php echo url::site(); ?>assets/uploads/user-1-5642fe6f687c8-acne-set_thumb.JPG" width="50" height="50" alt=""></td>
                                <td><strong><?php echo $item->code; ?></strong></td>
                                <td>
                                    <strong><?php echo $item->name; ?> 
                                        <button class="zmdi zmdi-comment-more btn btn-link pull-right" data-trigger="hover" data-placement="right" data-toggle="popover" data-placement="top" data-content="<?php echo $item->description; ?>" title="" data-original-title="<?php echo $item->name; ?> Description"></button>
                                    </strong>
                                </td>                                <td><?php echo $item->category->name; ?></td>
                                <td class="text-center"><label class="label label-info">New Item</label></td>
                                <td class="text-center"><label class="label label-warning">N/A</label></td>
                                <td>
                                    <div class="btn-group">
                                        <a href="javascript:void(0);" data-item-id="<?php echo $item->id; ?>" class="btn bgm-bluegray btn-xs item-edit">Edit</a>
                                        <a href="javascript:void(0);" class="btn btn-danger btn-xs">&times;</a>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>



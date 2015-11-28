<div class="block-header">
    <h2>Users</h2>
</div>

<div class="card">

    <div class="card-header">
        <h2>All Users <h2>
    </div>
    
    <div class="card-body card-padding">
        <table data-bind="dataTable" id="usersDT" class="table table-striped">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Email</th>
                    <th class="text-center">Office</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody data-bind = "with: userVM">
                <?php foreach ($users as $user) { ?>
                    <tr id="userTR_<?php echo $user->id?>">
                        <td><?php echo $user->username; ?></td>
                        <td class="text-capitalize"><strong><?php //echo $user->roles[1]->name; ?></strong></td>
                        <td><?php echo $user->email; ?></td>
                        <td class="text-center">
                            <?php 
                               // $office = $user->office->name; 
                              //  if($office){
                               //     echo $office;
                              //  }else{
                            ?>
                                <label class="label label-warning">N/A</label>
                            <?php //} ?>
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="javascript:void(0);" data-id="<?php echo $user->id?>" class="btn bgm-bluegray btn-xs user-edit">Edit</a>
                                <a href="javascript:void(0);" data-id="<?php echo $user->id?>" class="btn btn-danger btn-xs user-delete">&times;</a>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
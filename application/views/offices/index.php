<div class="block-header">
    <h2>Offices</h2>
</div>

<div class="card">
    <div class="card-header">
        <h2>All Offices</h2>

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
                    <th>District Name</th>
                    <th>Name</th>
                    <th>Actions</th>
                 
                </tr>
            </thead>
            <tbody>
                <?php foreach ($offices as $office) : ?>
                    <tr>
                        <td><strong><?php echo $office->district->name; ?></strong></td>
                        <td><?php echo $office->name?></td>
                        <td>
                           <div class="btn-group">
                                <a href="javascript:void(0)" class="btn btn-sm">Edit</a> 
                                <a href="javascript:void(0)" class="btn btn-danger btn-sm">&times;</a>
                           </div>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>



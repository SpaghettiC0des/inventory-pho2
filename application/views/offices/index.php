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
                    <th>Name</th>
                    <th>District</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody data-bind = "with: officeVM">
                <?php foreach ($offices as $office) : ?>
                    <tr>
                        <td><strong><?php echo $office->name?></strong></td>
                        <td><strong><?php echo $office->district->name; ?></strong></td>
                        <td>
                           <div class="btn-group">
                                <button data-bind = "click: function(){edit(<?php echo $office->id; ?>)}" type="button" class="btn btn-sm">Edit</button>
                                <button type="button" class="btn btn-danger btn-sm">&times;</button>
                           </div>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>



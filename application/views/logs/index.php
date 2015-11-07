<div class="block-header">
    <h2>Logs</h2>
</div>

<div class="card">
    <div class="card-header">
        <h2>All Logs</h2>

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
                    <th>Level</th>
                    <th>User</th>
                    <th>Action</th>
                    <th>Date</th>
                 
                </tr>
            </thead>
            <tbody>
                <?php foreach ($logs as $log) : ?>
                    <tr>
                        <td><strong><?php echo $log->level; ?></strong></td>
                        <td><?php echo $log->user; ?></td>
                        <td><?php echo $log->action; ?></td>
                        <td><?php echo \Carbon\Carbon::parse( $log->date_added )->toFormattedDateString(); ?></td>
                
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>



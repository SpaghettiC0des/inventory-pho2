<div class="animated fadeIn">
    <div class="block-header">
        <h2>
            Users
        </h2>
        <ul class="actions">
            <li>
                <a href="#">
                    <i class="zmdi zmdi-trending-up">
                    </i>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="zmdi zmdi-check-all">
                    </i>
                </a>
            </li>
            <li class="dropdown">
                <a href="#" data-toggle="dropdown">
                    <i class="zmdi zmdi-more-vert">
                    </i>
                </a>
                <ul class="dropdown-menu dropdown-menu-right">
                    <li>
                        <a href="#">
                            Refresh
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Manage Widgets
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Widgets Settings
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="card">
        <div class="card-header">
            <h2>
                Users Statistics
            </h2>
        </div>
        <div class="card-body card-padding">
            <div>
                <?php require Kohana::find_file('views/partials/admin','report_filter');?>
            </div>
            <div id="users-report" class="am-chart"></div>
        </div>
    </div>
</div>

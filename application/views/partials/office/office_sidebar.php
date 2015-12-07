<aside id="sidebar">
    <div class="sidebar-inner c-overflow">
        <div class="profile-menu">
            <a href="#">
                <div class="profile-pic">
                    <img src="<?php echo url::base(); ?>assets/img/profile-pics/4.jpg" alt="">
                </div>

                <div class="profile-info">
                    <?php echo $this->auth->get_user()->username; ?>
                    <i class="zmdi zmdi-arrow-drop-down"></i>
                </div>
            </a>

            <ul class="main-menu">
                <li>
                    <a href="<?php echo url::base().'profile'?>"><i class="zmdi zmdi-account"></i> View Profile</a>
                </li>

                <li>
                    <a href="#"><i class="zmdi zmdi-settings"></i>Account Settings</a>
                </li>
                <li>
                    <a href="<?php echo url::base().'dashboard/logout'; ?>"><i class="zmdi zmdi-time-restore"></i> Logout</a>
                </li>
            </ul>
        </div>

        <ul class="main-menu">
            <li class="<?php echo $uriClass->dashboard; ?>"><a href="<?php echo url::base(); ?>office/dashboard"><i class="zmdi zmdi-view-dashboard"></i> Dashboard</a></li>

            <li class="sub-menu">
                <a href="#"><i class="zmdi zmdi-mail-send"></i>Requests</a>
                <ul data-bind="with: requestVM">
                    <li>
                        <a data-bind="disable: !hasBudget" href="#" data-toggle="modal" data-target="#addRequestModal">
                            Request Items <span data-bind="hidden: hasBudget" class="label label-warning">No budget assigned</span>
                        </a>
                    </li>
                    <!-- ko ifnot: hasBudget -->
                    <li>
                        <a data-bind="disable: hasBudget" href="#" data-toggle="modal" data-target="#addBudgetRequestModal">
                            Request Budget
                        </a>
                    </li>  
                    <!-- /ko -->
                    <li><a href="<?php echo url::base(); ?>office/requests">List</a></li>
                    <li><a href="#">Reports</a></li>    
                </ul>
            </li>
        </ul>
    </div>
</aside>
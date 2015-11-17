<aside id="sidebar">
    <div class="sidebar-inner c-overflow">
        <div class="profile-menu">
            <a href="#">
                <div class="profile-pic">
                    <img src="<?php echo url::base(); ?>assets/img/profile-pics/4.jpg" alt="">
                </div>

                <div class="profile-info">
                   <!--  Ritchie Prades -->
                    <?php echo $this->auth->get_user()->username; ?>
                    <i class="zmdi zmdi-arrow-drop-down"></i>
                </div>
            </a>

            <ul class="main-menu">
                <li>
                    <a href="<?php echo url::base().'profile'?>"><i class="zmdi zmdi-account"></i> View Profile</a>
                </li>

                <li>
                    <a href="#"><i class="zmdi zmdi-settings"></i> Settings</a>
                </li>
                <li>
                    <a href="<?php echo url::base().'dashboard/logout'; ?>"><i class="zmdi zmdi-time-restore"></i> Logout</a>
                </li>
            </ul>
        </div>

        <ul class="main-menu">
            <li class="<?php echo $uriClass->dashboard; ?>"><a href="<?php echo url::base(); ?>dashboard"><i class="zmdi zmdi-view-dashboard"></i> Dashboard</a></li>

            <li class="sub-menu">
                <a href="#"><i class="zmdi zmdi-mail-send"></i>Requests</a>
                <ul data-bind="with: requestVM">
                    <li>
                        <a href="#" data-toggle="modal" data-target="#addRequestModal">
                            Request Items <span class="label label-warning">No budget assigned</span>
                        </a>
                    </li>
                    <li><a data-bind="enable: hasBudget" href="#" data-toggle="modal" data-target="#addBudgetRequestModal">Request Budget</a></li>  
                    <li><a href="<?php echo url::base(); ?>requests">List</a></li>
                    <li><a href="#">Reports</a></li>
                </ul>
            </li>
        </ul>
    </div>
</aside>
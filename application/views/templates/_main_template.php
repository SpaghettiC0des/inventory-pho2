
<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
    
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Inventory PHO</title>

        <link rel="apple-touch-icon" sizes="57x57" href="<?php echo url::base(); ?>assets/img/favicons/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="<?php echo url::base(); ?>assets/img/favicons/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="<?php echo url::base(); ?>assets/img/favicons/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="<?php echo url::base(); ?>assets/img/favicons/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="<?php echo url::base(); ?>assets/img/favicons/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="<?php echo url::base(); ?>assets/img/favicons/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="<?php echo url::base(); ?>assets/img/favicons/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="<?php echo url::base(); ?>assets/img/favicons/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo url::base(); ?>assets/img/favicons/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo url::base(); ?>assets/img/favicons/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="<?php echo url::base(); ?>assets/img/favicons/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo url::base(); ?>assets/img/favicons/favicon-16x16.png">
        <link rel="manifest" href="/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="<?php echo url::base(); ?>assets/img/favicons/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">
        <!-- Vendor CSS -->
       
        <link href="<?php echo url::base(); ?>assets/vendors/bootgrid/jquery.bootgrid.min.css" rel="stylesheet">
        <link href="<?php echo url::base(); ?>assets/vendors/bower_components/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
        <link href="<?php echo url::base(); ?>assets/vendors/bower_components/animate.css/animate.min.css" rel="stylesheet">
        <link href="<?php echo url::base(); ?>assets/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.css" rel="stylesheet">
        <link href="<?php echo url::base(); ?>assets/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css" rel="stylesheet">
        <link href="<?php echo url::base(); ?>assets/vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet">
        <link href="<?php echo url::base(); ?>assets/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
            
        <!-- CSS -->
        <link href="<?php echo url::base(); ?>assets/vendors/bower_components/datatables/css/dataTables.bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo url::base(); ?>assets/css/app.min.1.css" rel="stylesheet">
        <link href="<?php echo url::base(); ?>assets/css/app.min.2.css" rel="stylesheet">
        <script src="http://www.amcharts.com/lib/3/amcharts.js"></script>
        <script src="http://www.amcharts.com/lib/3/serial.js"></script>
        <script src="http://www.amcharts.com/lib/3/themes/light.js"></script>
        <script src="http://amcharts.com/lib/3/plugins/export/export.js" type="text/javascript"></script>
        <link href="http://amcharts.com/lib/3/plugins/export/export.css" rel="stylesheet" type="text/css">

        <style>
            .display-block {
                display: block;
            }

            .display-none {
                display: none;
            }

            #chartdiv {
                width       : 100%;
                height      : 500px;
                font-size   : 11px;  
            }                                       

            .amcharts-export-menu-top-right {
              top: 10px;
              right: 0;
            }   

            #district-report {
                width       : 100%;
                height      : 500px;
                font-size   : 11px;  
            }                                       
            .am-chart {
                width       : 100%;
                height      : 500px;
                font-size   : 11px;  
            }   
            .amcharts-export-menu-top-right {
              top: 10px;
              right: 0;
            }                                                   
        </style>

    </head>
    <body>
        <header id="header">
            <ul class="header-inner">
                <li id="menu-trigger" data-trigger="#sidebar">
                    <div class="line-wrap">
                        <div class="line top"></div>
                        <div class="line center"></div>
                        <div class="line bottom"></div>
                    </div>
                </li>
            
                <li class="logo hidden-xs">
                    <a href="<?php echo url::base(); ?>">
                        <?php echo $settings->name; ?>
                    </a>
                </li>
                
                <li class="pull-right">
                <ul class="top-menu">
                    <li id="toggle-width">
                        <div class="toggle-switch">
                            <input id="tw-switch" type="checkbox" hidden="hidden">
                            <label for="tw-switch" class="ts-helper"></label>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="tm-notification" href="#"><i class="tmn-counts">9</i></a>
                        <div class="dropdown-menu dropdown-menu-lg pull-right">
                            <div class="listview" id="notifications">
                                <div class="lv-header">
                                    Notification
                    
                                    <ul class="actions">
                                        <li class="dropdown">
                                            <a href="#" data-clear="notification">
                                                <i class="zmdi zmdi-check-all"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
								
                                <div class="lv-body">
                                    <a class="lv-item" href="#">
                                        <div class="media">
                                            <div class="pull-left">
                                                <img class="lv-img-sm" src="<?php echo url::base(); ?>assets/img/profile-pics/1.jpg" alt="">
                                            </div>
                                            <div class="media-body">
                                                <div class="lv-title">David Belle</div>
                                                <small class="lv-small">Cum sociis natoque penatibus et magnis dis parturient montes</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="lv-item" href="#">
                                        <div class="media">
                                            <div class="pull-left">
                                                <img class="lv-img-sm" src="<?php echo url::base(); ?>assets/img/profile-pics/2.jpg" alt="">
                                            </div>
                                            <div class="media-body">
                                                <div class="lv-title">Jonathan Morris</div>
                                                <small class="lv-small">Nunc quis diam diamurabitur at dolor elementum, dictum turpis vel</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="lv-item" href="#">
                                        <div class="media">
                                            <div class="pull-left">
                                                <img class="lv-img-sm" src="<?php echo url::base(); ?>assets/img/profile-pics/3.jpg" alt="">
                                            </div>
                                            <div class="media-body">
                                                <div class="lv-title">Fredric Mitchell Jr.</div>
                                                <small class="lv-small">Phasellus a ante et est ornare accumsan at vel magnauis blandit turpis at augue ultricies</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="lv-item" href="#">
                                        <div class="media">
                                            <div class="pull-left">
                                                <img class="lv-img-sm" src="<?php echo url::base(); ?>assets/img/profile-pics/4.jpg" alt="">
                                            </div>
                                            <div class="media-body">
                                                <div class="lv-title">Glenn Jecobs</div>
                                                <small class="lv-small">Ut vitae lacus sem ellentesque maximus, nunc sit amet varius dignissim, dui est consectetur neque</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="lv-item" href="#">
                                        <div class="media">
                                            <div class="pull-left">
                                                <img class="lv-img-sm" src="<?php echo url::base(); ?>assets/img/profile-pics/4.jpg" alt="">
                                            </div>
                                            <div class="media-body">
                                                <div class="lv-title">Bill Phillips</div>
                                                <small class="lv-small">Proin laoreet commodo eros id faucibus. Donec ligula quam, imperdiet vel ante placerat</small>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                    
                                <a class="lv-footer" href="#">View Previous</a>
                            </div>
                    
                        </div>
                    </li>
                    <li class="dropdown hidden-xs">
                        <a data-toggle="dropdown" class="tm-task" href="#"><i class="tmn-counts">2</i></a>
                        <div class="dropdown-menu pull-right dropdown-menu-lg">
                            <div class="listview">
                                <div class="lv-header">
                                    Tasks
                                </div>
                                <div class="lv-body">
                                    <div class="lv-item">
                                        <div class="lv-title m-b-5">HTML5 Validation Report</div>
                    
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" style="width: 95%">
                                                <span class="sr-only">95% Complete (success)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="lv-item">
                                        <div class="lv-title m-b-5">Google Chrome Extension</div>
                    
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                                <span class="sr-only">80% Complete (success)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="lv-item">
                                        <div class="lv-title m-b-5">Social Intranet Projects</div>
                    
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                                <span class="sr-only">20% Complete</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="lv-item">
                                        <div class="lv-title m-b-5">Bootstrap Admin Template</div>
                    
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                                <span class="sr-only">60% Complete (warning)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="lv-item">
                                        <div class="lv-title m-b-5">Youtube Client App</div>
                    
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                                <span class="sr-only">80% Complete (danger)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    
                                <a class="lv-footer" href="#">View All</a>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="tm-settings" href="#"></a>
                        <ul class="dropdown-menu dm-icon pull-right">
                            <li class="hidden-xs">
                                <a data-action="fullscreen" href="#"><i class="zmdi zmdi-fullscreen"></i> Toggle Fullscreen</a>
                            </li>
                            <li>
                                <a data-action="clear-localstorage" href="#"><i class="zmdi zmdi-delete"></i> Clear Local Storage</a>
                            </li>
                            <li>
                                <a href="#"><i class="zmdi zmdi-face"></i> Privacy Settings</a>
                            </li>
                            <li>
                                <a href="#"><i class="zmdi zmdi-settings"></i> Other Settings</a>
                            </li>
                        </ul>
                    </li>
                    <li class="hidden-xs" id="chat-trigger" data-trigger="#chat">
                        <a class="tm-chat" href="#"></a>
                    </li>
                </li>
            </ul>
            
            <!-- Top Search Content -->
            <div id="top-search-wrap">
                <input type="text">
                <i id="top-search-close">&times;</i>
            </div>
        </header>
        
        <section id="main">
            <?php 
            if($this->current_role == 'admin'){
                require Kohana::find_file('views/partials/admin','admin_sidebar');
            } else {
                require Kohana::find_file('views/partials/office','office_sidebar');
            }

            ?>
            
            <aside id="chat">
                <ul class="tab-nav tn-justified" role="tablist">
                    <li role="presentation" class="active"><a href="#friends" aria-controls="friends" role="tab" data-toggle="tab">Friends</a></li>
                    <li role="presentation"><a href="#online" aria-controls="online" role="tab" data-toggle="tab">Online Now</a></li>
                </ul>
            
                <div class="chat-search">
                    <div class="fg-line">
                        <input type="text" class="form-control" placeholder="Search People">
                    </div>
                </div>
                
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="friends">
                        <div class="listview">
                            <a class="lv-item" href="#">
                                <div class="media">
                                    <div class="pull-left p-relative">
                                        <img class="lv-img-sm" src="<?php echo url::base(); ?>assets/img/profile-pics/2.jpg" alt="">
                                        <i class="chat-status-busy"></i>
                                    </div>
                                    <div class="media-body">
                                        <div class="lv-title">Jonathan Morris</div>
                                        <small class="lv-small">Available</small>
                                    </div>
                                </div>
                            </a>
                            
                            <a class="lv-item" href="#">
                                <div class="media">
                                    <div class="pull-left">
                                        <img class="lv-img-sm" src="<?php echo url::base(); ?>assets/img/profile-pics/1.jpg" alt="">
                                    </div>
                                    <div class="media-body">
                                        <div class="lv-title">David Belle</div>
                                        <small class="lv-small">Last seen 3 hours ago</small>
                                    </div>
                                </div>
                            </a>
                            
                            <a class="lv-item" href="#">
                                <div class="media">
                                    <div class="pull-left p-relative">
                                        <img class="lv-img-sm" src="<?php echo url::base(); ?>assets/img/profile-pics/3.jpg" alt="">
                                        <i class="chat-status-online"></i>
                                    </div>
                                    <div class="media-body">
                                        <div class="lv-title">Fredric Mitchell Jr.</div>
                                        <small class="lv-small">Availble</small>
                                    </div>
                                </div>
                            </a>
                            
                            <a class="lv-item" href="#">
                                <div class="media">
                                    <div class="pull-left p-relative">
                                        <img class="lv-img-sm" src="<?php echo url::base(); ?>assets/img/profile-pics/4.jpg" alt="">
                                        <i class="chat-status-online"></i>
                                    </div>
                                    <div class="media-body">
                                        <div class="lv-title">Glenn Jecobs</div>
                                        <small class="lv-small">Availble</small>
                                    </div>
                                </div>
                            </a>
                            
                            <a class="lv-item" href="#">
                                <div class="media">
                                    <div class="pull-left">
                                        <img class="lv-img-sm" src="<?php echo url::base(); ?>assets/img/profile-pics/5.jpg" alt="">
                                    </div>
                                    <div class="media-body">
                                        <div class="lv-title">Bill Phillips</div>
                                        <small class="lv-small">Last seen 3 days ago</small>
                                    </div>
                                </div>
                            </a>
                            
                            <a class="lv-item" href="#">
                                <div class="media">
                                    <div class="pull-left">
                                        <img class="lv-img-sm" src="<?php echo url::base(); ?>assets/img/profile-pics/6.jpg" alt="">
                                    </div>
                                    <div class="media-body">
                                        <div class="lv-title">Wendy Mitchell</div>
                                        <small class="lv-small">Last seen 2 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <a class="lv-item" href="#">
                                <div class="media">
                                    <div class="pull-left p-relative">
                                        <img class="lv-img-sm" src="<?php echo url::base(); ?>assets/img/profile-pics/7.jpg" alt="">
                                        <i class="chat-status-busy"></i>
                                    </div>
                                    <div class="media-body">
                                        <div class="lv-title">Teena Bell Ann</div>
                                        <small class="lv-small">Busy</small>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="online">
                        <div class="listview">
                            <a class="lv-item" href="#">
                                <div class="media">
                                    <div class="pull-left p-relative">
                                        <img class="lv-img-sm" src="<?php echo url::base(); ?>assets/img/profile-pics/2.jpg" alt="">
                                        <i class="chat-status-busy"></i>
                                    </div>
                                    <div class="media-body">
                                        <div class="lv-title">Jonathan Morris</div>
                                        <small class="lv-small">Available</small>
                                    </div>
                                </div>
                            </a>
                            
                            <a class="lv-item" href="#">
                                <div class="media">
                                    <div class="pull-left p-relative">
                                        <img class="lv-img-sm" src="<?php echo url::base(); ?>assets/img/profile-pics/3.jpg" alt="">
                                        <i class="chat-status-online"></i>
                                    </div>
                                    <div class="media-body">
                                        <div class="lv-title">Fredric Mitchell Jr.</div>
                                        <small class="lv-small">Availble</small>
                                    </div>
                                </div>
                            </a>
                            
                            <a class="lv-item" href="#">
                                <div class="media">
                                    <div class="pull-left p-relative">
                                        <img class="lv-img-sm" src="<?php echo url::base(); ?>assets/img/profile-pics/4.jpg" alt="">
                                        <i class="chat-status-online"></i>
                                    </div>
                                    <div class="media-body">
                                        <div class="lv-title">Glenn Jecobs</div>
                                        <small class="lv-small">Availble</small>
                                    </div>
                                </div>
                            </a>

                            <a class="lv-item" href="#">
                                <div class="media">
                                    <div class="pull-left p-relative">
                                        <img class="lv-img-sm" src="<?php echo url::base(); ?>assets/img/profile-pics/7.jpg" alt="">
                                        <i class="chat-status-busy"></i>
                                    </div>
                                    <div class="media-body">
                                        <div class="lv-title">Teena Bell Ann</div>
                                        <small class="lv-small">Busy</small>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </aside>
            
            
            <section id="content">
                <div class="container">
                    
                        <?php 
                            echo $content; 
                            if($this->current_role == 'admin'){
                                require Kohana::find_file('views/partials/admin','modals');
                            }else if($this->current_role == 'office_user'){
                                require Kohana::find_file('views/partials/office','modals');
                            }
                        ?>   
                    
                </div>
            </section>
        </section>
        
       
    

        <footer id="footer">
            Copyright &copy; 2015 <a href="<?php echo url::base(); ?>dashboard">Design Interactive</a> Inventory System 
            
            <!-- <ul class="f-menu">
                <li><a href="#">Home</a></li>
                <li><a href="#">Dashboard</a></li>
                <li><a href="#">Reports</a></li>
                <li><a href="#">Support</a></li>
                <li><a href="#">Contact</a></li>
            </ul> -->
        </footer>
        
        <!-- Older IE warning message -->
        <!--[if lt IE 9]>
            <div class="ie-warning">
                <h1 class="c-white">Warning!!</h1>
                <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
                <div class="iew-container">
                    <ul class="iew-download">
                        <li>
                            <a href="http://www.google.com/chrome/">
                                <img src="<?php echo url::base(); ?>assets/img/browsers/chrome.png" alt="">
                                <div>Chrome</div>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.mozilla.org/en-US/firefox/new/">
                                <img src="<?php echo url::base(); ?>assets/img/browsers/firefox.png" alt="">
                                <div>Firefox</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://www.opera.com">
                                <img src="<?php echo url::base(); ?>assets/img/browsers/opera.png" alt="">
                                <div>Opera</div>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.apple.com/safari/">
                                <img src="<?php echo url::base(); ?>assets/img/browsers/safari.png" alt="">
                                <div>Safari</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                                <img src="<?php echo url::base(); ?>assets/img/browsers/ie.png" alt="">
                                <div>IE (New)</div>
                            </a>
                        </li>
                    </ul>
                </div>
                <p>Sorry for the inconvenience!</p>
            </div>   
        <![endif]-->
        
        <!-- Javascript Libraries -->
        <script src="<?php echo url::base(); ?>assets/vendors/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="<?php echo url::base(); ?>assets/js/libs/lodash.min.js"></script>
        <script src="<?php echo url::base(); ?>assets/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="<?php echo url::base(); ?>assets/vendors/bower_components/datatables/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo url::base(); ?>assets/vendors/bower_components/datatables/js/dataTables.bootstrap.min.js"></script>
        <script src="<?php echo url::base(); ?>assets/js/plugins/knockout.chart/libs/chart.js"></script>
        <script src="<?php echo url::base(); ?>assets/js/libs/ko.js"></script>
        <script src="<?php echo url::base(); ?>assets/vendors/bower_components/flot/jquery.flot.js"></script>
        <script src="<?php echo url::base(); ?>assets/vendors/bower_components/flot/jquery.flot.resize.js"></script>
        <script src="<?php echo url::base(); ?>assets/vendors/bower_components/flot.curvedlines/curvedLines.js"></script>
        <script src="<?php echo url::base(); ?>assets/vendors/sparklines/jquery.sparkline.min.js"></script>
        <script src="<?php echo url::base(); ?>assets/vendors/bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
		
        <script src="<?php echo url::base(); ?>assets/js/plugins/knockout-file-bind.js"></script>
        
        <script src="<?php echo url::base(); ?>assets/vendors/bower_components/moment/min/moment.min.js"></script>
        <script src="<?php echo url::base(); ?>assets/vendors/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
        <script src="<?php echo url::base(); ?>assets/vendors/bower_components/simpleWeather/jquery.simpleWeather.min.js"></script>
        <script src="<?php echo url::base(); ?>assets/vendors/bower_components/jquery.nicescroll/jquery.nicescroll.min.js"></script>
        <script src="<?php echo url::base(); ?>assets/vendors/bower_components/Waves/dist/waves.min.js"></script>
        <script src="<?php echo url::base(); ?>assets/vendors/bootstrap-growl/bootstrap-growl.min.js"></script>
        <script src="<?php echo url::base(); ?>assets/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.min.js"></script>
        <script src="<?php echo url::base(); ?>assets/vendors/bower_components/bootstrap-select/dist/js/bootstrap-select.js"></script>
        <script src="<?php echo url::base(); ?>assets/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
        
        <script src="<?php echo url::base(); ?>assets/js/flot-charts/curved-line-chart.js"></script>
        <script src="<?php echo url::base(); ?>assets/js/flot-charts/line-chart.js"></script>
        <script src="<?php echo url::base(); ?>assets/js/charts.js"></script>
       <!-- <script src="<?php echo url::base(); ?>assets/vendors/fileinput/fileinput.min.js"></script> -->
	   
        <script src="<?php echo url::base(); ?>assets/vendors/input-mask/input-mask.min.js"></script>
		<!-- <script src="<?php echo url::base(); ?>assets/js/plugins/bootstrap-fileinput-master/js/fileinput.min.js"></script>

        <script src="<?php echo url::base(); ?>assets/js/plugins/bootstrap-fileinput-master/js/fileinput_locale_LANG.js"></script>-->
		
        <script src="<?php echo url::base(); ?>assets/js/functions.js"></script>
        <script src="<?php echo url::base(); ?>assets/js/demo.js"></script>

        <script src="<?php echo url::base(); ?>assets/vendors/bootgrid/jquery.bootgrid.min.js"></script>
       
        <script src="<?php echo url::base(); ?>assets/js/plugins/knockout.chart/src/knockout.chart.js"></script>
        <script src="<?php echo url::base(); ?>assets/js/app/customBindings.js"></script>
        <script src="<?php echo url::base(); ?>assets/js/app/settings.js"></script>
        <script src="<?php echo url::base(); ?>assets/js/app/xhr.js"></script>
        
        <?php  if($this->current_role == 'admin'){?>
        <!-- Knockout ViewModels for ADMIN-->
        <script src="<?php echo url::base(); ?>assets/js/app/view-models/admin/allDataObjects.js"></script>
        <script src="<?php echo url::base(); ?>assets/js/app/view-models/admin/categoryVM.js"></script>
        <script src="<?php echo url::base(); ?>assets/js/app/view-models/admin/itemVM.js"></script>
        <script src="<?php echo url::base(); ?>assets/js/app/view-models/admin/districtVM.js"></script>
        <script src="<?php echo url::base(); ?>assets/js/app/view-models/admin/officeVM.js"></script>
        <script src="<?php echo url::base(); ?>assets/js/app/view-models/admin/supplierVM.js"></script>
        <script src="<?php echo url::base(); ?>assets/js/app/view-models/admin/profileVM.js"></script>
        <script src="<?php echo url::base(); ?>assets/js/app/view-models/admin/settingVM.js"></script>
        <script src="<?php echo url::base(); ?>assets/js/app/view-models/admin/purchaseVM.js"></script>
        <script src="<?php echo url::base(); ?>assets/js/app/view-models/admin/userVM.js"></script>
        <script src="<?php echo url::base(); ?>assets/js/app/view-models/admin/requestVM.js"></script>         
        <script src="<?php echo url::base(); ?>assets/js/app/view-models/admin/officeBudgetVM.js"></script>
        <script src="<?php echo url::base(); ?>assets/js/app/view-models/admin/transactionVM.js"></script>
        <script src="<?php echo url::base(); ?>assets/js/app/view-models/admin/reportVM.js"></script>
        
        <?php } else if ($this->current_role == 'office_user'){?>
        <!-- Knockout ViewModels for OFFICE USER -->
        <script src="<?php echo url::base(); ?>assets/js/app/view-models/office/allDataObjects.js"></script>
        <script src="<?php echo url::base(); ?>assets/js/app/view-models/office/budgetRequestVM.js"></script>
        <script src="<?php echo url::base(); ?>assets/js/app/view-models/office/requestVM.js"></script>
        <?php } ?>

        <script src="<?php echo url::base(); ?>assets/js/app/view-models/masterVM.js"></script>
        
        <script>
           //  var chart = AmCharts.makeChart("chartdiv", {
           //   "type": "serial",
           //   "theme": "light",
           //   "marginRight": 70,
           //   "dataProvider": [{
           //     "country": "USA",
           //     "visits": 3025,
           //     "color": "#FF0F00"
           //   }, {
           //     "country": "China",
           //     "visits": 1882,
           //     "color": "#FF6600"
           //   }, {
           //     "country": "Japan",
           //     "visits": 1809,
           //     "color": "#FF9E01"
           //   }, {
           //     "country": "Germany",
           //     "visits": 1322,
           //     "color": "#FCD202"
           //   }, {
           //     "country": "UK",
           //     "visits": 1122,
           //     "color": "#F8FF01"
           //   }, {
           //     "country": "France",
           //     "visits": 1114,
           //     "color": "#B0DE09"
           //   }, {
           //     "country": "India",
           //     "visits": 984,
           //     "color": "#04D215"
           //   }, {
           //     "country": "Spain",
           //     "visits": 711,
           //     "color": "#0D8ECF"
           //   }, {
           //     "country": "Netherlands",
           //     "visits": 665,
           //     "color": "#0D52D1"
           //   }, {
           //     "country": "Russia",
           //     "visits": 580,
           //     "color": "#2A0CD0"
           //   }, {
           //     "country": "South Korea",
           //     "visits": 443,
           //     "color": "#8A0CCF"
           //   }, {
           //     "country": "Canada",
           //     "visits": 441,
           //     "color": "#CD0D74"
           //   }],
           //   "valueAxes": [{
           //     "axisAlpha": 0,
           //     "position": "left",
           //     "title": "Sales per item"
           //   }],
           //   "startDuration": 1,
           //   "graphs": [{
           //     "balloonText": "<b>[[category]]: [[value]]</b>",
           //     "fillColorsField": "color",
           //     "fillAlphas": 0.9,
           //     "lineAlpha": 0.2,
           //     "type": "column",
           //     "valueField": "visits"
           //   }],
           //   "chartCursor": {
           //     "categoryBalloonEnabled": false,
           //     "cursorAlpha": 0,
           //     "zoomable": false
           //   },
           //   "categoryField": "country",
           //   "categoryAxis": {
           //     "gridPosition": "start",
           //     "labelRotation": 50
           //   },
           //   "export": {
           //     "enabled": true
           //   }

           // });   
           // 
           // var chartData = [{
           //      "country": "USA",
           //      "visits": 4252
           //  }, {
           //      "country": "China",
           //      "visits": 1882
           //  }, {
           //      "country": "Japan",
           //      "visits": 1809
           //  }, {
           //      "country": "Germany",
           //      "visits": 1322
           //  }, {
           //      "country": "UK",
           //      "visits": 1122
           //  }, {
           //      "country": "France",
           //      "visits": 1114
           //  }, {
           //      "country": "India",
           //      "visits": 984
           //  }, {
           //      "country": "Spain",
           //      "visits": 711
           //  }, {
           //      "country": "Netherlands",
           //      "visits": 665
           //  }, {
           //      "country": "Russia",
           //      "visits": 580
           //  }, {
           //      "country": "South Korea",
           //      "visits": 443
           //  }, {
           //      "country": "Canada",
           //      "visits": 441
           //  }, {
           //      "country": "Brazil",
           //      "visits": 395
           //  }, {
           //      "country": "Italy",
           //      "visits": 386
           //  }, {
           //      "country": "Australia",
           //      "visits": 384
           //  }, {
           //      "country": "Taiwan",
           //      "visits": 338
           //  }, {
           //      "country": "Poland",
           //      "visits": 328
           //  }];
           
            
            function AmChartConstructor(URL, catField, valField, el, lineColor) {
                $.getJSON(window.INVENTO.baseURL + "reports/" + URL).done(function(chartData) {
                    var chart = new AmCharts.AmSerialChart();
                    chart.dataProvider = chartData;
                    chart.categoryField = catField;
                    chart.export = {enabled:true};
                    chart.responsive = {enabled:true};
                    chart.angle = 30;
                    chart.depth3D = 15;
                    var graph = new AmCharts.AmGraph();
                    graph.valueField = valField;
                    graph.type = "column";
                    graph.lineColor = lineColor || "#555";
                    graph.fillColorsField = "color";
                    graph.fillAlphas = 0.8;
                    graph.balloonText = "[[category]]: <b>[[value]]</b>"
                    graph.colors = ["#542654"];

                    chart.addGraph(graph);

                    chart.write(el);
                    graph.animationPlayed = true;
                    var categoryAxis = chart.categoryAxis;
                    categoryAxis.autoGridCount = true;
                    categoryAxis.gridCount = chartData.length;
                    categoryAxis.gridPosition = "start";
                    categoryAxis.labelRotation = 90;
                });
            }

            AmCharts.ready(function(){


                AmChartConstructor("getDistrictStatistics", "name","offices","district-report","#FF5722");
                AmChartConstructor("getItemStatistics", "item","quantity","chartdiv");
                AmChartConstructor("getOfficeBudgetStatistics", "office_name","budget","office-budget-report","#8BC34A");
            });          
        </script>
    </body>
  
</html>
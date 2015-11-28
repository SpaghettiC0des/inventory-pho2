
<div class="block-header">
    <h2>Messages</h2>
</div>
<?php $userInfo = json_decode($email->user_information); 
	$userAvatar = json_decode($email->user_avatar);
	?>
    <div class="card-body card-padding">
	       <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h2>View Message </h2>

                                    <ul class="actions">
				<button id="replyEmail" data-id="<?php echo $email->id?>" class="btn btn-primary btn-sm waves-effect" href="javascript:void(0);">Reply</button>
                                      <!--  <li class="dropdown">
                                            <a href="#" data-toggle="dropdown" aria-expanded="false">
                                                <i class="zmdi zmdi-more-vert"></i>
                                            </a>
                                            
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li>
                                                    <a href="#">Refresh</a>
                                                </li>
                                                <li>
                                                    <a href="#">Manage Widgets</a>
                                                </li>
                                                <li>
                                                    <a href="#">Widgets Settings</a>
                                                </li>
                                            </ul>
                                        </li> -->
                                    </ul>
                                </div>

                                <div class="card-body card-padding">
								<b style="font-size:17px;">Subject : <?php if(!empty($email->subject)){echo $email->subject;}else{echo "No Subject";}?></b>
								<p class="pull-right"><?php echo date("F j, Y h:i A",strtotime($email->created_at));?></p>
								</br>
								</br>
								<span class="c-overflow" style="display: inline-block;height: 250px;overflow:auto;">
								<p style="font-family:verdana;font-size:14px;text-indent:50px;"><?php echo $email->email_data?></p>
								</span>
								</br>
								</br>
								<p class="pull-right" style="font-size:15px;">From: <?php if(!empty($userInfo->fullname)){echo ucwords($userInfo->fullname);}else{echo "User";}?> </br><?php if(!empty($email->officeName)){echo ucwords($email->officeName);}else{echo "Admin";}?></p>
								
								</br>
								</br>
                                </div>
								
                            </div>
                        </div>

                    </div>
    </div>
</div>



<div class="block-header">
    <h2>Messages</h2>
</div>
<?php 
    $userInfo = json_decode($email->user_information); 
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
                        </ul>
                    </div>

                    <div class="card-body card-padding">
                        <b style="font-size:17px;">Subject : <?php if(!empty($email->subject)){echo $email->subject;}else{echo "No Subject";}?></b>
								
								</br>
								</br>
					<span class="c-overflow" style="display: inline-block;height: 260px;overflow:auto;">
					<?php foreach($replies as $reply){?>
					<?php $replyUserInfo = json_decode($reply->user_information); 
					$replyUserAvatar = json_decode($reply->user_avatar);?>
					<?php if($this->user_id == $reply->sender_id){ $style="background-color:#ccffff;";}else{ $style="";}?>
					 <div class="card-body card-padding" style="<?php echo $style;?>">
					
					<span style="text-indent:30px;font-size:15px;font-style:verdana;display:inline-block;">
					<?php echo $reply->email_data;?></span></br>
					<small style="margin-left:580px;">Date Sent: <?php echo date("F j, Y h:i A",strtotime($reply->created_at));?></small>
					</div></br>
					<?php }?>
					</span>
								</br>
								</br>
								<p class="pull-right" style="font-size:15px;">From: <?php if(!empty($userInfo->fullname)){echo ucwords($userInfo->fullname);}else{echo $email->username;}?> </br><?php if(!empty($email->officeName)){echo ucwords($email->officeName);}else{echo "Admin";}?></p>
								
								</br>
								</br>
                                </div>
								
                            </div>
                        </div>

                        <br />
                        <br />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="block-header">
    <h2>Messages</h2>
</div>

<div class="card">
    <div class="card-header">
         <h2>All Messages</h2>
    </div>

    <div class="card-body card-padding">
        <table data-bind="dataTable, tableName: 'emailsDT'" id="emailsDT" class="table table-striped">
            <thead>
                <tr>
                    <th>Sender</th>
                    <th>Subject</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Date Sent</th>
                </tr>
            </thead>
            <tbody data-bind = "with: messageVM" id="emailDataTable">
                <?php foreach ($emails as $email) { 
						$subject = $email->subject;
							if(strlen($subject) >= 40){
								$subject = substr($subject, 0, 39) . '. . . .' ;
							}else{
								$subject = $subject;
							}
							$userInfo = json_decode($email->user_information); 
							$userAvatar = json_decode($email->user_avatar);
							?>
                    <tr id="emailTR_<?php echo $email->id; ?>" data-id="<?php echo $email->id; ?>" class="emailTR" >
                    <td><strong><?php if(!empty($email->user_information)){echo $userInfo->fullname;}else{echo "User";} ?>  <button class="zmdi zmdi-comment-more btn btn-link pull-right" data-trigger="hover" data-placement="right" data-toggle="popover" data-placement="top" data-content="Read Message"></button></strong></td>
                    <td><?php echo $subject;?></td>
                    <td><?php if(!empty($email->officeName)){echo $email->officeName;}else{echo "Admin";}?></td>
                    <td><?php if($email->email_viewed == 0){echo "Unread";}else{echo "Viewed";}?></td>
					<td><?php echo date('F j, Y h:i A', strtotime($email->created_at));?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>



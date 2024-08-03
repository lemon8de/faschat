<div class="row">
    <div class="col-12">
        <div class="card direct-chat direct-chat-primary">
            <div class="card-body">
                <div class="direct-chat-messages" id="DirectChatBox" style="min-height:80vh;">
                    <!-- <div class="direct-chat-msg">
                        <div class="direct-chat-infos clearfix">
                            <span class="direct-chat-name float-left">lemon8de&nbsp;&nbsp;</span>
                            <span class="direct-chat-timestamp float-left">Now</span>
                        </div>
                        <img class="direct-chat-img" src="../static/img/user_image.jpeg" alt="message user image">
                        <div class="direct-chat-text float-left">
                            Please be civilized dito HAHA, FasChat is developed for fun; for training; and testing.
                        </div>
                    </div>

                    <div class="direct-chat-msg right">
                        <div class="direct-chat-infos clearfix">
                            <span class="direct-chat-name float-right">&nbsp;&nbsp;You</span>
                            <span class="direct-chat-timestamp float-right">Now</span>
                        </div>
                        <img class="direct-chat-img" src="../static/img/user_image.jpeg" alt="message user image">
                        <div class="direct-chat-text float-right">
                            Yes I abide by the rules and regulations of this website. May copy ka ng rules?
                        </div>
                    </div> -->
                    <?php include '../php_static/load_historical_messages.php';?>
                </div>
            </div>

            <div class="card-footer">
                <form id="SendTextForm">
                    <div class="input-group">
                        <input type="hidden" id="FasChatInputBoxID" readonly name="chat_id" value="<?php echo $_SESSION['main_chat_id'];?>">
                        <input type="text" id="FasChatInputBoxMSG" name="message" placeholder="Type Message ..." class="form-control" autocomplete="off">
                        <span class="input-group-append">
                            <button type="submit" class="btn btn-primary">Send</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- this should be the last white chat of the conversation -->
<input type="hidden" readonly id="last_chatmessage_id" value="<?php echo $last_whitechat_id;?>">
<input type="hidden" readonly id="oncurrent_chat_page_id" value="<?php echo $_SESSION['main_chat_id'];?>">

<script>
	//disgusting autoloading api
	setInterval(refresh_connection, 5000);
	function refresh_connection() {
		var last_whitechat_id = document.getElementById('last_chatmessage_id').value;
        var oncurrent_page_chatid = document.getElementById('oncurrent_chat_page_id').value;
		$.ajax({
            url: '../php_api/autorefresh_chat.php',
            type: 'POST',
			data: {
				"message_id" : last_whitechat_id,
                "chat_id" : oncurrent_page_chatid,
			},
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    document.getElementById('DirectChatBox').insertAdjacentHTML('beforeend', response.inner_html);
                    document.getElementById('DirectChatBox').scrollTop = document.getElementById('DirectChatBox').scrollHeight;
                    document.getElementById('last_chatmessage_id').value = response.last_chat_id;
                } else {
					//console.log('none');
                }
            }
        });
	}
</script>
<div class="row">
    <div class="col-6 mx-auto">
        <img src="../static/img/faschat2.png" style="height:150px; display:block; margin-left:auto; margin-right:auto;"> 
    </div>
</div>
<div class="row">
    <div class="col-12 mx-auto">
        <h2 class="text-center">@<?php echo $_SESSION['person'];?> has locked in on your FasTag and is looking to chat!</h2>
    </div>
</div>
<div class="row">
    <div class="col-4 mx-auto">
        <form action="../php_api/update_consent_api.php" method="POST">
            <input type="hidden" value="<?php echo $_SESSION['updateconsent_chat_id']; $_SESSION['updateconsent_chat_id'] = null;?>" name="chat_id">
            <button type="submit" class="btn bg-primary btn-block" name="UpdateConsent">FasChat! with <?php echo $_SESSION['person']; $_SESSION['person'] = null;?></button>
        </form>
    </div>
</div>
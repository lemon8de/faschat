<div class="row">
    <div class="col-sm-12">
        <h2>Welcome to FasChat!</h2>
        <h3 class="text-muted">Click 'Add a FasTag' on the left to chat a user</h3>
    </div>
</div>

<div class="row">
    <div class="col-8 mx-auto">
        <div class="card direct-chat direct-chat-primary">
            <div class="card-header ui-sortable-handle" style="cursor: move;">
                <h3 class="card-title">FasChat is an individual project by yours truly, lemon8de</h3>
                <!-- <div class="card-tools">
                    <span title="3 New Messages" class="badge badge-primary">3</span>
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" title="Contacts" data-widget="chat-pane-toggle">
                        <i class="fas fa-comments"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div> -->
            </div>

            <div class="card-body">
                <div class="direct-chat-messages">

                    <div class="direct-chat-msg">
                        <div class="direct-chat-infos clearfix">
                            <span class="direct-chat-name float-left">lemon8de</span>
                            <span class="direct-chat-timestamp float-right">Now</span>
                        </div>
                        <img class="direct-chat-img" src="../static/img/user_image.jpeg" alt="message user image">
                        <div class="direct-chat-text">
                            Please be civilized dito HAHA, FasChat is developed for fun; for training; and testing.
                        </div>
                    </div>

                    <div class="direct-chat-msg right">
                        <div class="direct-chat-infos clearfix">
                            <span class="direct-chat-name float-right">You</span>
                            <span class="direct-chat-timestamp float-left">Now</span>
                        </div>
                        <img class="direct-chat-img" src="../static/img/user_image.jpeg" alt="message user image">
                        <div class="direct-chat-text">
                            Yes I abide by the rules and regulations of this website. May copy ka ng rules?
                        </div>
                    </div>
                    <div class="direct-chat-msg">
                        <div class="direct-chat-infos clearfix">
                            <span class="direct-chat-name float-left">lemon8de</span>
                            <span class="direct-chat-timestamp float-right">Now</span>
                        </div>
                        <img class="direct-chat-img" src="../static/img/user_image.jpeg" alt="message user image">
                        <div class="direct-chat-text">
                            wala
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <form action="#" method="post">
                    <div class="input-group">
                        <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                        <span class="input-group-append">
                            <button type="button" class="btn btn-primary">Send</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include '../php_static/userconsent.php';?>
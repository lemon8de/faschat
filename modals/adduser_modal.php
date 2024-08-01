<!-- Modal -->
<form action="../php_api/create_user_connection.php" method="POST">
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="container">
                    <div class="row mt-5">
                        <div class="col-12 text-center">
                            <h3>Search for FasTags</h3>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <input type="text" class="form-control" id="username" name="username" placeholder="FasTag..." autocomplete="off" required autofocus>
                        </div>
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="CreateConnection">FasChat!</button>
            </div>
            </div>
        </div>
    </div>
</form>
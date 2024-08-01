<!-- Modal -->
<form action="" id="AddUserForm">
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="container">
                    <div class="row mt-5">
                        <div class="col-12 text-center">
                            <h3>Search for FasTags</h3>
                            <p class="text-muted">Hidden FasTags won't show up in search, but they are still FasChattable! FasChat!</p>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <input type="text" onkeyup="debounce(usernameSearch, 150)" class="form-control" id="AddUserInputModal" name="username" placeholder="FasTag..." autocomplete="off" required autofocus>
                        </div>
                    </div>
                    <div class="row mt-1 mb-2">
                        <div class="col-12 text-center" id="AddUserModalSearchBox">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    function debounce(method, delay) {
        clearTimeout(method._tId);
        method._tId = setTimeout(function() {
            method();
        }, delay);
    }
    function usernameSearch() {
        var username_to_search = document.getElementById("AddUserInputModal").value;
        $.ajax({
            url: '../php_api/add_user_keyup_get.php',
            type: 'GET',
            data: {
                'username' : username_to_search,
            },
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    document.getElementById('AddUserModalSearchBox').innerHTML = response.inner_html;
                } else {
                    //handle errors
                    //console.log("error");
                }
            }
        });
    }

    $('#AddUserForm').submit(function(e){
        e.preventDefault();
        console.log('faschat!');

        var username_to_search = document.getElementById("AddUserInputModal").value;
        $.ajax({
            url: '../php_api/add_user_connection.php',
            type: 'GET',
            data: {
                'username' : username_to_search,
            },
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    //success
                } else {
                    //handle errors
                    //console.log("error");
                }
            }
        });
    });
</script>
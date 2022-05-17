<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signupModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="hendlsignup.php" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" name="firstname" placeholder="Firstname"
                                aria-label="Firstname">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="lastname" placeholder="Lastname"
                                aria-label="Lastname">
                        </div>
                    </div>

                    <div class="col my-3">
                        <input type="text" class="form-control" name="email" placeholder="email" aria-label="email">
                    </div>
                    <div class="col  my-3">
                        <input type="password" class="form-control" name="password" placeholder="password"
                            aria-label="passqord">
                    </div>
                    <div class="col  my-3">
                        <input type="password" class="form-control" name="cpassword" placeholder="confirm pasword"
                            aria-label="passqord">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" value="submit" class="btn btn-primary">Submit</button>
                </div>
        </div>
        </form>
    </div>
</div>
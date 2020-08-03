
<!-- Modal -->
<div class="modal fade" id="SignupModal" tabindex="-1" role="dialog" aria-labelledby="SignupModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="SignupModal">Sign up for being the member of this discussion Group</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
        
        <form action="/Forum/Compo/HandleSignUp.php" method="post">
            <div class="modal-body">
                
                    <div class="form-group">
                    
                    <div class="form-group">
                        <label for="Name">Name</label>
                        <input type="text" class="form-control" id="Name" name="UserName" placeholder="Name">
                    </div>
                    
                        <label for="SignUpEmail">Email address</label>
                        <input type="email" class="form-control" id="SignUpEmail" name="SignUpEmail" aria-describedby="emailHelp"
                            placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                            else.</small>
                    </div>
                    <div class="form-group">
                        <label for="Password">Password</label>
                        <input type="password" class="form-control" id="Password" name="Password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="ConfirmPassword">Confirm Password</label>
                        <input type="password" class="form-control" id="ConfirmPassword" name="ConfirmPassword" placeholder="Password">
                    </div>
                    
                    <button type="submit" class="btn btn-primary">SignUp</button>
                           </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                
            </div>
            </form>

        </div>
    </div>
</div>
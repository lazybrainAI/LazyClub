<div id="userModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <form method="post" name="hr_form" id="hr_form">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modal_heading_event">Add new user</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <input id="signup-token" name="_token" type="hidden" value="<?php echo csrf_token() ?>">
                <div class="modal_class" id="user_modal">
                    <div class="col-sm-12">
                        <label>First name</label>
                        <input id="firstNameHR" type="text" placeholder=""
                               name="firstName" required autocomplete="off">
                    </div>
                    <div class="col-sm-12">
                        <label>Last name</label>
                        <input id="lastNameHR" type="text" name="lastName"
                               placeholder="" required autocomplete="off">
                    </div>
                    <div class="col-sm-12">
                        <label>Email</label></br>
                        <input id="emailHR" type="email" name="email" placeholder=""
                               required autocomplete="off">
                    </div>
                    <div class="col-sm-12">
                        <label>Username</label>
                        <input id="usernameHR" type="text" placeholder=""
                               name="username" required autocomplete="off">
                    </div>
                    <div class="col-sm-12">
                        <label>Position</label>
                        <select name="positionsHR" id="project" required>
                            <?php if($positions->isEmpty()){ ?>
                                <option disabled>No projects at the moment.</option>
                            <?php } else {?>
                            <option value="0" selected>Choose project</option>
                            <?php foreach($positions as $position) { ?>
                                <option value="<?php echo $position->id?>"><?php echo $position->role_name?></option>
                            <?php }} ?>
                        </select>
                    </div>

                    <div class="modal-footer" >
                        <div id="email_sent"></div>
                        <button type="submit" class="hr_button" form="hr_form">Add user</button>
                        <button type="button" class="hr_button" data-dismiss="modal">Close</button>
                    </div>
                </div>
        </form>
    </div>
</div>
<div class="modal fade" role="dialog" id="signup_modal">
    <div class="modal-dialog">
        <form id="signup_form" method="post" >
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal_heading">Submit application</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>


                <div class="col-sm-12">
                    <label>Select position</label>
                    <select required autocomplete="off" name="open_positions" id="team_apply" form="signup_form">
                        <option disabled="disabled" selected>Open positions</option>
                        <?php foreach($open_positions as $open_position) {?>
                        <option id="option_<?php echo $open_position->title?>"><?php echo $open_position->title ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="col-sm-12">
                    <label>Motivational letter</label>
                    <textarea name="motivational_letter" maxlength="450" placeholder="Describe why are you the best candidate for this position." required autocomplete="off" ></textarea>
                </div>

                <div class="modal-footer" id="footer_review">
                    <button type="submit" class="add_application" form="signup_form">Submit</button>
                    <button type="button" class="add_application" data-dismiss="modal">Close</button>
                    <input type="hidden" name="action" value="application">

                    <div id="application_sent"></div>

                </div>




            </div>

        </form>
    </div>


</div>
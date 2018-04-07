<div id="projectModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <form method="post" name="add_new_project_form" id="add_new_project_form">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modal_heading">Add new project</h4>
                    <button type="button" class="close" data-dismiss="modal" style="color:white;">&times;</button>

                </div>
                <input id="signup-token" name="_token" type="hidden" value="<?php echo csrf_token()?>">
                <div class="modal_class" id="project_modal">
                    <div class="col-sm-12">
                        <label>Project name</label>
                        <input type="text" name="project_new_name">
                    </div>
                    <div class="col-sm-12">
                        <label>Project description</label>
                        <textarea name="project_new_description"></textarea>
                    </div>
                    <div class="col-sm-12">
                        <label>Project sector</label>
                        <input type="text" name="project_new_sector">
                    </div>
                    <div class="col-sm-12">
                        <label>Project start date</label>
                        <input type="date" name="project_new_start_date">
                    </div>
                    <div class="col-sm-12">
                        <label>Project end date</label>
                        <input type="date" name="project_new_end_date">
                    </div>
                    <div class="col-sm-12">
                        <label>Project location</label>
                        <input type="text" name="project_new_location">
                    </div>
                    <div class="col-sm-12">
                        <label>Project language</label>
                        <input type="text" name="project_new_language">
                    </div>
                    <div class="col-sm-12">
                        <label>Team name for project</label>
                        <input type="text" name="project_new_team">
                    </div>
                    <div class="col-sm-12">
                        <label>Open positions</label>
                    </div>
                    <div class="col-sm-12" id="project_new_checkbox" style="">
                        <?php if (!empty($positions) && count($positions) > 0) {
                            foreach ($positions

                                     as $position) {
                                ?>
                                <div class="col-sm-12">
                                    <input type="checkbox" name="project_new_cbox[]"
                                           value="
                    <?php echo $position->title; ?>" id="<?php echo $position->title; ?>">
                                    <label for="<?php echo $position->title; ?>">
                                        <?php echo $position->title; ?></label>


                                </div>
                            <?php }
                        } else {
                            echo "There are no open positions at the moment.";
                        } ?>

                    </div>
                </div>
                <div class="modal-footer" id="project_new_footer">
                    <div class="project_saved"></div>
                    <button type="submit" class="add_new_project" form="add_new_project_form">Add project</button>
                    <button type="button" class="add_new_project" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>
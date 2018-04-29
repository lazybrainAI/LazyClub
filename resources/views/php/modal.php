<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <form method="post" name="add_new_event_form" id="add_new_event_form">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modal_heading">Add new event</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <input id="signup-token" name="_token" type="hidden" value="<?php echo csrf_token() ?>">
                <div class="modal_class" id="event_modal">
                    <div class="col-sm-12">
                        <label>Event name</label>
                        <input type="text" name="event_new_name" required autocomplete="off">
                    </div>
                    <div class="col-sm-12">
                        <label>Event description</label>
                        <textarea name="event_new_description" required autocomplete="off"></textarea>
                    </div>
                    <div class="col-sm-12">
                        <label>Event date</label>
                        <input type="date" name="event_new_date" required autocomplete="off">
                    </div>
                    <div class="col-sm-12">
                        <label>Event time</label>
                        <input type="time" name="event_new_time" required autocomplete="off">
                    </div>
                    <div class="col-sm-12">
                        <label>Event location</label>
                        <input type="text" name="event_new_location" required autocomplete="off">
                    </div>
                    <div class="col-sm-12 select_field">
                        <label>Event language</label>
                        <select name="event_new_language" title="event_new_language_select" >
                            <option selected="selected" value="selected">Select language</option>
                            <?php foreach ($events_language as $language) { ?>
                                <option value="<?php echo $language['name'] ?>"><?php echo $language['name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer" id="footer_event">
                    <div class="event_saved"></div>
                    <button type="submit" class="add_new_event" form="add_new_event_form">Add event</button>
                    <button type="button" class="add_new_event" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>
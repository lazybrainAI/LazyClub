<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
<form method="post" name="add_new_event_form" id="add_new_event_form">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal_heading">Add new event</h4>
                <button type="button" class="close" data-dismiss="modal" style="color:white;">&times;</button>

            </div>
            <div class="modal_class" id="event_modal">
                <div class="col-sm-12">
                    <label>Event name</label>
                <input type="text" name="event_new_name">
                </div>
                <div class="col-sm-12">
                    <label>Event description</label>
                    <textarea name="event_new_description"></textarea>
                </div>
                <div class="col-sm-12">
                    <label>Event date</label>
                    <input type="date" name="event_new_date">
                </div>
                <div class="col-sm-12">
                    <label>Event time</label>
                    <input type="time" name="event_new_time">
                </div>
                <div class="col-sm-12">
                    <label>Event location</label>
                    <input type="text" name="event_new_location">
                </div>
                <div class="col-sm-12">
                    <label>Event language</label>
                    <input type="text" name="event_new_language">
                </div>
            </div>
            <div class="modal-footer" >
                <div class="event_saved"></div>
                <button type="submit" class="add_new_event" form="add_new_event_form">Add event</button>
                <button type="button" class="add_new_event" data-dismiss="modal">Close</button>
            </div>
        </div>
</form>
    </div>
</div>
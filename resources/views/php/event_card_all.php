<div class="col-sm-4 padding_left" id="<?php echo $event->id; ?>">
    <form method="post" name="delete_event" class="delete_event" id="delete_event_<?php echo $event->id; ?>">
        <div class="p_e_card" id="p_e_card_">
            <div class="p_e_img">
                <input type="hidden" name="_method" value="DELETE">
                <input id="signup-token" name="_token" type="hidden" value="<?php echo csrf_token() ?>">
                <input type="text" value="<?php echo $event->id; ?>" name="event_id" style="display: none;"
                       title="event_id" id="event_id_input">
                <button type="button" class="close">&times;</button>
                <h5 class="section_title"><?php echo $event->name; ?></h5>
            </div>

            <div class="p_e_info">

                <p><?php echo $event->description; ?></p>

                <div class="see_more_btn">
                    <a href="<?php echo '/event/' . $event->name ?>"><h6 class="h7">View more</h6></a>
                </div>
                <div class="see_more_btn">
                    <a href="<?php echo '/event/' . $event->name ?>"><h6 class="h7">Attend</h6></a>
                </div>
                <div class="see_more_btn" id="see_more_btn_location">
                    <h6 class="h7"><i class="fa fa-map-marker"></i> <?php echo $event->location->name; ?></h6>
                </div>
            </div>

        </div>
    </form>
</div>
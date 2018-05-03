
<a href="<?php echo '/event/' . $event->name ?>">
    <div class="col-sm-4 padding_left">
        <div class="p_e_card" id="p_e_card_">
            <div class="p_e_img">
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
    </div>
</a>
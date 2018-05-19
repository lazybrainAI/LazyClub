<?php include_once 'project_event_description.php'?>
<div class="col-sm-6 col-md-5 order-2 order-sm-1">
    <div class="p_e_card" id="p_e_card_">
        <div class="p_e_img">
            <h5 class="section_title"><?php echo $event->name; ?></h5>
        </div>

        <div class="p_e_info">
            <p><?php echo length_of_description($event->description);?></p>
            <div class="see_more_btn">
                <a href="<?php echo '/event/' . $event->name ?>"><h6 class="h7">View more</h6></a>
            </div>
            <?php if($goings[$event->name]=="going") {?>
                <div class="see_more_btn attended_event" id="attend_<?php echo $event->id?>" >
                    <h6 class="h7">Attended</h6>
                </div>
            <?php } else { ?>
                <div class="see_more_btn attend_event" id="attend_<?php echo $event->id?>" >
                    <h6 class="h7">Attend</h6>
                </div>
            <?php } ?>

            <div class="see_more_btn" id="see_more_btn_location">
                <h6 class="h7"><i class="fa fa-map-marker"></i> <?php echo $event->location->name; ?></h6>
            </div>
        </div>

    </div>
</div>
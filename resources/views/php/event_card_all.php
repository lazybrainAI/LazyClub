
<div class="col-sm-4 padding_left" id="<?php echo $event->id; ?>">
    <div class="p_e_card" id="p_e_card_<?php echo $event->id; ?>">
        <div class="p_e_img">
            <button type="button" class="delete_event close" id="delete_event">&times;</button>
            <h5 class="section_title"><?php echo $event->name; ?></h5>
        </div>
        <div class="p_e_info">
            <?php  $word_cut = explode('.', $event->description."");
            $word = $word_cut[0].".";?>
            <p><?php echo $word;?></p>
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
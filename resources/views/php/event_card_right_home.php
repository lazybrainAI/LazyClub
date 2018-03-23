<div class="col-sm-6 col-md-5 order-2 order-sm-1">
    <div class="p_e_card" id="p_e_card_">
        <div class="p_e_img">
            <h5 class="section_title"><?php echo $event->name;?></h5>
        </div>
        <div class="p_e_info">
            <p><?php echo $event->description;?></p>

            <div class="see_more_btn">
                <a href="<?php echo '/events/'.$event->name?>" ><h6 class="h7" >Attend</h6></a>
            </div>
            <div class="see_more_btn" id="see_more_btn_location">
                <h6 class="h7"><i class="fa fa-map-marker"></i> <?php echo $event->location->name;?></h6>
            </div>
        </div>
    </div>
</div>
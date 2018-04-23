<?php //dd(get_defined_vars()['__data']) ?>
<form id="review_form" accept-charset="UTF-8" method="post">

<div class="review">



    <div class="select_field">
        <select name = "project_event_select" id="project_event_select" title="project_event_select">
            <option selected="selected" value="selected">Select Project / Event</option>
            <?php foreach ($projects as $project){?>
                <option value="<?php echo $project['name']?>"><?php echo $project['name']?></option>
            <?php } ?>
            <?php foreach ($events as $event){?>
                <option value="<?php echo $event->name?>"><?php echo $event->name?></option>
            <?php } ?>
                    </select>
    </div>

    <div class="profile_img">

    </div>
    <div class="review_text">
        <textarea placeholder="Your note" id="description" name="description"></textarea>

    </div>



</div>
    <div class="">
        <button type="submit" class="submit_btn" id="sacuvaj_review"><h6>Submit</h6></button>
    </div>
    <div id="review_sent"></div>




</form>

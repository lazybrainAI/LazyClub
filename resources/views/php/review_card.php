<?php //dd(get_defined_vars()['__data']) ?>

<div class="review">

    <div class="profile_img">
        <img src="<?php  echo $review->user->photo_link?>">
    </div>
    <div class="review_text">
        <textarea placeholder="Your note" id="description" name="description"><?php echo $review->description ?></textarea>

    </div>

</div>
<!--
    <div class="">
        <button type="submit" class="submit_btn" id="sacuvaj_review"><h6>Submit</h6></button>
    </div>
    <div id="review_sent"></div> -->




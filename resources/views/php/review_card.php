<?php //dd(get_defined_vars()['__data']) ?>

<div class="review">

    <div id="review_posted">
        <p><?php  echo $review->user->name . " " .$review->user->surname ?></p>
    </div>
    <div class="review_text">
        <textarea placeholder="Your note" id="description" name="description">"<?php echo $review->description ?>"</textarea>
    </div>
    <div id="review_date">
        <p><?php echo $review->date_posted?></p>
    </div>

</div>
<!--
    <div class="">
        <button type="submit" class="submit_btn" id="save_review"><h6>Submit</h6></button>
    </div>
    <div id="review_sent"></div> -->




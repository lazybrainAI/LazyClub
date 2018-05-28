
<div class="col-sm-6 click_to_add education"
     id="<?php
    if($education_count!=0)
        echo "education_" . $education->id;
    else echo "";
     ?> ">

    <input name="institution" class="institution" type="text" placeholder="Institution" autocomplete="off" value="<?php if($education_count!=0) {if(!is_null($education->institution->name))
            echo $education->institution->name;} ?>" disabled="disabled" required> <!-- institution -->

    <input name="institution_address" class="address" type="text" placeholder="Address" autocomplete="off"
           value="<?php if($education_count!=0) {
        if(!is_null($education->institution->address))
            echo $education->institution->address;} ?>" disabled="disabled" required>

    <input name="from_period_education" class="from_period_education" type="text" placeholder="From" autocomplete="off" value="<?php if($education_count!=0) {
        if(!is_null($education->start_date))
            echo $education->start_date;} ?>" disabled="disabled" required>

    <input name="to_period_education" class="to_period_education" type="text" placeholder="To"  autocomplete="off" value="<?php if($education_count!=0) {
        if(!is_null($education->end_date))
            echo $education->end_date;} ?>" disabled="disabled" required>

    <input name="title" id="title" type="text" placeholder="Title" autocomplete="off" value="<?php if($education_count!=0) {
        if(!is_null($education->title->name))
            echo $education->title->name;} ?>" disabled="disabled" required>

    <a class="delete_icon delete_btn"><i class="far fa-trash-alt"></i></a>
</div>
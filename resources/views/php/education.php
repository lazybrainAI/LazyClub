
<div class="col-sm-6 click_to_add education"
     id="<?php if($education_count!=0) {
    if(!is_null($education->id))
        echo "education_" . $education->id;
    else echo "";
    }
    else
        echo ""; ?>">

    <input name="institution[]" id="institution" type="text"
           value="<?php if($education_count!=0) {
        if(!is_null($education->institution->name))
            echo $education->institution->name;
        else echo "Institution";
    }
    else
        echo "Institution"; ?>" disabled="disabled" required> <!-- institution -->

    <input name="institution_address[]" id="address" type="text"
           value="<?php if($education_count!=0) {
        if(!is_null($education->institution->address))
            echo $education->institution->name;
        else echo "Address";
    }
    else
        echo "Institution"; ?>" disabled="disabled" required>
    <input name="from_period_education[]" id="from_period_education" type="text" value="<?php if($education_count!=0) {
        if(!is_null($education->start_date))
            echo $education->start_date;
        else echo "From";
    }
    else
        echo "From"; ?>" disabled="disabled">
    <input name="to_period_education[]" id="to_period_education" type="text" value="<?php if($education_count!=0) {
        if(!is_null($education->end_date))
            echo $education->end_date;
        else echo "To";
    }
    else
        echo "To"; ?>" disabled="disabled" >
    <input name="title[]" id="title" type="text" value="<?php if($education_count!=0) {
        if(!is_null($education->title->name))
            echo $education->title->name;
        else echo "Title";
    }
    else
        echo "Title"; ?>" disabled="disabled" required>

    <a class="delete_icon delete_btn"><i class="far fa-trash-alt"></i></a>
</div>
<div class="col-md-12 click_to_add experience" id="<?php if($experience_count!=0) {
    if(!is_null($experience->id))
        echo "experience_" . $experience->id;
    else echo "";
}
else
    echo ""; ?>">

    <div class="experience_div">
        <input name="company_position" id="position" placeholder="Position"
               value="<?php if($experience_count!=0) {
                   if(!is_null($experience->position->name))
                       echo $experience->position->name;} ?>" disabled="disabled" > <!--Position-->

        <input name="company_name" id="company"  disabled="disabled" placeholder="Company" value="<?php if($experience_count!=0) {
            if(!is_null($experience->company->company_name))
                echo $experience->company->company_name;} ?>" >

        <input name="from_period_experience" id="from_period_experience" type="text" placeholder="From" value="<?php if($experience_count!=0) {
            if(!is_null($experience->start_date))
                echo $experience->start_date;} ?>"  disabled="disabled">

        <input name="to_period_experience" id="to_period_experience" type="text" placeholder="To"
               value="<?php if($experience_count!=0) {
                   if(!is_null($experience->end_date))
                       echo $experience->end_date;} ?>" disabled="disabled">
        <textarea name="description" rows="1" cols="80" maxlength="450" id="position_description" class="expand" placeholder="Experience description" disabled="disabled"><?php if($experience_count!=0) {
                if(!is_null($experience->description))
                    echo $experience->description;} ?></textarea>

        <a class="delete_icon delete_btn"><i class="far fa-trash-alt"></i></a>

    </div>
    <div class="read_more_btn">
        <h6>read more</h6>
    </div>


</div>
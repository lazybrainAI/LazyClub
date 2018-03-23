<div class="col-md-12 click_to_add experience" id="<?php if($company_count!=0) {
    if(!is_null($company->id))
        echo "experience_" . $company->id;
    else echo "";
}
else
    echo ""; ?>">

    <div class="experience_div">
        <input name="company_position" id="position"
               value="<?php if($company_count!=0) {
                   if(!is_null($company->pivot->position))
                       echo $company->pivot->position;
                   else echo "Position";
               }
               else
                   echo "Position"; ?>" disabled="disabled"  disabled="disabled"> <!--Position-->

        <input name="company_name" id="company"  disabled="disabled" value="<?php if($company_count!=0) {
            if(!is_null($company->name))
                echo $company->name;
            else echo "Company name";
        }
        else
            echo "Company name"; ?>">

        <input name="from_period_experience" id="from_period_experience" type="text"  value="<?php if($company_count!=0) {
            if(!is_null($company->pivot->start_date))
                echo $company->pivot->start_date;
            else echo "From";
        }
        else
            echo "From"; ?>"  disabled="disabled">

        <input name="to_period_experience" id="to_period_experience" type="text"
               value="<?php if($company_count!=0) {
                   if(!is_null($company->pivot->end_date))
                       echo $company->pivot->end_date;
                   else echo "To";
               }
               else
                   echo "To"; ?>" disabled="disabled">
        <textarea name="description" rows="4" cols="100" id="position_description" disabled="disabled"><?php if($company_count!=0) {
                if(!is_null($company->pivot->description))
                    echo $company->pivot->description;
                else echo "Description";
            }
            else
                echo "Description"; ?></textarea>

        <a class="delete_icon delete_btn"><i class="far fa-trash-alt"></i></a>

    </div>
    <div class="read_more_btn">
        <h6>read more</h6>
    </div>


</div>
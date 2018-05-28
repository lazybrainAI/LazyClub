

@if($experience_count!=0)
    <div class="col-md-12 click_to_add experience" id="experience_{{$experience->id}}">

        <div class="experience_div">
            <input name="company_position" id="position" placeholder="Position" autocomplete="off" required
                   value="@if (!is_null($experience->position->name)){{$experience->position->name}}@endif"
                   disabled="disabled"> <!--Position-->

            <input name="company_name" id="company" disabled="disabled" placeholder="Company" autocomplete="off"
                   required
                   value="@if (!is_null($experience->company->company_name)){{$experience->company->company_name}}@endif">
            <div class="row">
                <div class="col-md-1">
                    <input name="from_period_experience" class="from_period_experience" type="text" placeholder="From"
                           autocomplete="off" required
                           value="@if (!is_null($experience->start_date)){{\Carbon\Carbon::parse($experience->start_date)->format('d.m.Y')}}@endif"
                           disabled="disabled">
                </div>

                <div class="col-md-1 to_period_div" style="margin-left: 2%">
                    <input name="to_period_experience" class="to_period_experience" type="text" placeholder="To"
                           autocomplete="off"
                           value="@if (!is_null($experience->end_date)){{\Carbon\Carbon::parse($experience->end_date)->format('d.m.Y')}}@endif"
                           disabled="disabled" id="to_period_experience_{{$experience->id}}">
                </div>
            </div>
            <div id="experience_{{$experience->div}}" style="display: none;" class="checkbox_div">
                <input type="checkbox" disabled="disabled" id="current_work_{{$experience->id}}" name="current_work"
                       class="current_work_chbox"
                       style="vertical-align: middle; display: inline-block;margin-right: 2%;">
                <label for="current_work">Current work</label></div>
            <textarea name="description" rows="5" cols="80" maxlength="450" id="position_description" class="expand"
                      required placeholder="Experience description"
                      disabled="disabled">@if (!is_null($experience->description)){{$experience->description}}
                @endif
            </textarea>

            <a class="delete_icon delete_btn"><i class="far fa-trash-alt"></i></a>

        </div>
        <div class="read_more_btn">
            <h6>read more</h6>
        </div>


    </div>
@endif

@extends ('layouts.app')

@section('title', 'Event')


@section('page_top_picture')
    @parent
    @include('/php/page_top_picture')
@endsection

@section('small_menu')
    @parent
    @include ('/php/small_sidebar_menu')
@endsection

@section('main')
    @parent

    <div class="container-fluid sidebar_section">
        <div class="row">
            <div class="col-sm-3 col-md-2 d-none d-sm-block">
               @include('/php/sidebar_menu')
            </div>
            <div class="col-sm-9 col-md-10  col-xs-12 main_content_section">

                <form id="event_form" method="post"  accept-charset="UTF-8">
                    <input type="hidden" name="action" value="event">


                    <div class="container  container-left-margin">
                    <div class="row">
                        <div class="col-5 col-sm-4 col-md-3  col-lg-2">
                            <h5 class="section_title" id="event">{{$event->name}}</h5>
                        </div>
                    </div>
                </div>

                <div class="container details_section" >
                    <div class="row justify-content-between no-gutters">
                        <div class="col-md-8 order-md-1 order-2">
                            <textarea name="event_description" maxlength="191" cols="80" rows="6" id="event_description" disabled="disabled" placeholder="Write something about event. Don't be lazy." style="position: relative; width: 50%"><?php if(!is_null($event->description)){ echo $event->description;} ?></textarea>
                            <p style="position: absolute; bottom: -15%; right: 50%; display: none; color: #025284" id="char_count_event_p"><span id="char_count_event" >
                                 @if(!is_null($event->description))
                                        {{strlen($event->description)}}
                                    @else
                                        0
                                    @endif

                             </span>/191</p>
                            <div class="read_more_btn">
                                <h6>read more</h6>
                            </div>

                        </div>
                        <div class=" col-md-3 order-md-2 order-1 details_div">
                            <h6>Event details:</h6>
                            <br>
                            <h6 class="h7" id="event_date">Date/ <input name="event_date"  type="date" disabled="disabled" required value={{$event->date}}> </h6>
                            <h6 class="h7" id="event_time">Time/ <input name="event_time"  type="time" disabled="disabled" required value= {{\Carbon\Carbon::parse($event->time)->format('H:i')}}> </h6>
                            <h6 class="h7" id="=event_loc">Location/ <input name="event_location" type="text" disabled="disabled" value="{{$location_name}}"></h6>
                            <h6 class="h7" id="=event_lang">Language/ <select name="event_language" form="event_form" required disabled="disabled">
                                    <option >{{$language_name}}</option>
                                    @if($language_name=="serbian")
                                        <option>english</option>
                                    @else
                                        <option>serbian</option>

                                    @endif
                                </select>
                            </h6>


                        </div>

                    </div>
                </div>




                <div class="container container-left-margin" >
                    <div class="row">
                        <div class="col-5 col-sm-4 col-md-3  col-lg-2">
                            <h5 class="section_title">Reviews</h5>
                        </div>
                    </div>
                </div>
                <div class="container review_section">
                    <div class="row align-items-center">
                        @if($reviews->isEmpty())
                            <div><p>No reviews for this event yet.</p></div>
                        @else
                            @foreach($reviews as $review)
                                <div class="col-md-4 col-sm-6">
                                    @include('/php/review_card')
                                </div>
                            @endforeach
                        @endif

                    </div>
                    @if($review_btn=="")
                        <button type="button" class="add_btn" id="add_review" data-toggle="modal" data-target="#review_modal">
                            <h6>Add review</h6>
                        </button>
                    @endif
                </div>


                    <div class="container container-left-margin" >
                        <div class="row">
                            <div class="col-5 col-sm-4 col-md-3 col-lg-2">
                                <h5 class="section_title">Attendees</h5>
                            </div>
                        </div>
                    </div>
                <?php $user = \Illuminate\Support\Facades\Auth::user();?>
                <div class="container attendees_section">
                    <div class="row align-items-center">
                        <div class="col-sm-12 col-md-4 organizer" id="{{$organizer_username}}">
                            <div class="container">
                                <div class="row align-items-center">
                                    <div class="col-xs-6 ">
                                        <img class="profile_img" src={{ URL::asset($organizer_photo) }} />
                                    </div>
                                    <div class="col-xs-6  personal_info">
                                        <h5>{{$organizer_name}} {{$organizer_surname}}</h5>
                                        <h6>{{$organizer_position}}</h6>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-8 attendees">

                                <div class="slide_btn" id="left_slide_arrow"><i class="fas fa-angle-left fa-2x"></i></div>
                                <div class="slide_btn" id="right_slide_arrow"><i class="fas fa-angle-right fa-2x"></i></div>


                                   @if($attendees->isEmpty())
                                       <div style="width:100%; text-align: center;" id="no_attendees_msg"><p>No attendees yet.</p></div>
                                   @else

                                        @foreach($attendees as $attendee)
                                            <div class="col-6 col-sm-4 event_attendee" >
                                                <div  style="margin-bottom:20px" id="attendee_{{$attendee->user->id}}">
                                                    <img class="attendees_img" src={{ URL::asset($attendee->user->photo_link) }} />
                                                    <div class="attendee_info">
                                                        <h6>{{$attendee->user->name}} {{$attendee->user->surname}}</h6>
                                                        <h6 class="h7">{{$attendee->user->position}}</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                    @endif


                        </div>
                    </div>

                </div>
                <div class="container event_btns" style="margin-left:25px" id="{{$user->id}}" >
                    <div class="row">
                        @if($goingAskOrg_btn=="")
                            @if($going=="going")
                                <div class="col-sm-5 col-md-3 col-xl-2">
                                    <div class="add_btn ungoing_btn" style="margin-bottom: 10px">
                                        <h6>Not going</h6>
                                    </div>
                                </div>
                            @else
                                <div class="col-sm-5 col-md-3 col-xl-2">
                                    <div class="add_btn going_btn" style="margin-bottom: 10px">
                                        <h6>Going</h6>
                                    </div>
                                </div>

                            @endif
                                <div class="col-sm-5 col-md-3 col-xl-2">
                                    <div class=" add_btn">
                                        <a href="mailto:{{$organizer_email}}"><h6>Ask organizer</h6></a>
                                    </div>
                                </div>
                        @endif



                    </div>
                </div>

                    <button class="save_btn" id="save_event" type="submit">
                        <h6>Save changes</h6>
                    </button>
                    <button class="cancel_btn" id="cancel_event" type="reset">
                        <h6>Cancel</h6>
                    </button>
                    <div id="msg"></div>


                </form>

                <div class="msg"></div>






            </div>



        </div>
    </div>


    {{--Modal--}}
    @include('/php/review_modal')

@endsection

@section('include_js')
    <script src={{ URL::asset('js/char_counter.js')}}></script>
@endsection













@extends ('layouts.app')

@section('title', 'Event')

@section('page_top_picture')
    @parent
    @include('/php/page_top_picture')
@endsection



@section('main')
    @parent

    <div class="container-fluid sidebar_section">
        <div class="row">
            <div class="col-sm-3 col-md-2 d-none d-sm-block">
               @include('/php/sidebar_menu')
            </div>
            <div class="col-sm-9 col-md-10  col-xs-12 main_content_section">
                <div class="container  container-left-margin">
                    <div class="row">
                        <div class="col-5 col-sm-4 col-md-3  col-lg-2">
                            <h5 class="section_title">Event</h5>
                        </div>
                    </div>
                </div>
                <div class="container details_section" >
                    <div class="row justify-content-between no-gutters">
                        <div class="col-md-8 order-md-1 order-2">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Ducimus enim fugit iure laboriosam nobis optio praesentium veritatis voluptatem.
                                Asperiores consectetur culpa, debitis facilis maxime quae quam quibusdam sit
                                ullam voluptatemLorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Ducimus enim fugit iure laboriosam nobis optio praesentium veritatis voluptatem.
                                Asperiores consectetur culpa, debitis facilis maxime quae quam quibusdam sit
                                ullam voluptatem
                            </p>
                            <div class="read_more_btn">
                                <h6>read more</h6>
                            </div>
                        </div>
                        <div class=" col-md-3 order-md-2 order-1 details_div">
                            <h6>Event details:</h6>
                            <br>
                            <h6 class="h7" id="event_date">Date/</h6>
                            <h6 class="h7" id="event_time">Time/</h6>
                            <h6 class="h7" id="=event_loc">Location/</h6>
                            <h6 class="h7" id="=event_lang">Language/</h6>


                        </div>

                    </div>
                </div>


                <div class="container container-left-margin">
                    <div class="row">
                        <div class="col-5 col-sm-4 col-md-3  col-lg-2">
                            <h5 class="section_title">Reviews</h5>
                        </div>
                    </div>
                </div>
                <div class="container review_section">
                    <div class="row align-items-center">
                        <div class="col-md-4 col-sm-6">
                            @include('/php/review_card')
                        </div>
                    </div>
                </div>


                <div class="container  container-left-margin">
                    <div class="row">
                        <div class="col-5 col-sm-4 col-md-3  col-lg-2">
                            <h5 class="section_title">Attendees</h5>
                        </div>
                    </div>
                </div>
                <div class="container attendees_section">
                    <div class="row align-items-center">
                        <div class="col-md-5 organizer">
                            <div class="container">
                                <div class="row align-items-center">
                                    <div class="col-xs-6 ">
                                        <img class="profile_img" src={{ URL::asset('img/teo.jpeg') }} />
                                    </div>
                                    <div class="col-xs-6  personal_info">
                                        <h5>Person Person</h5>
                                        <h6>Position</h6>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7  attendees">
                            <div class="container">
                                <div class="row">
                                    <div class="col-6 col-sm-4">
                                        <div  style="margin-bottom:20px">
                                            <img class="attendees_img" src={{ URL::asset('img/teo.jpeg') }} />
                                            <div class="attendee_info">
                                                <h6>Person Person</h6>
                                                <h6 class="h7">Position</h6>
                                            </div>
                                        </div>


                                        <div style="margin-bottom:20px">
                                            <img class="attendees_img" src={{ URL::asset('img/teo.jpeg') }} />
                                            <div class="attendee_info">
                                                <h6>Person Person</h6>
                                                <h6 class="h7">Position</h6>
                                            </div>
                                        </div>


                                        <div style="margin-bottom:20px">
                                            <img class="attendees_img" src={{ URL::asset('img/teo.jpeg') }} />
                                            <div class="attendee_info">
                                                <h6>Person Person</h6>
                                                <h6 class="h7">Position</h6>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-6 col-sm-4 personal_info">

                                        <div style="margin-bottom:20px">
                                            <img class="attendees_img" src={{ URL::asset('img/teo.jpeg') }} />
                                            <div class="attendee_info">
                                                <h6>Person Person</h6>
                                                <h6 class="h7">Position</h6>
                                            </div>
                                        </div>

                                        <div style="margin-bottom:20px">
                                            <img class="attendees_img" src={{ URL::asset('img/teo.jpeg') }} />
                                            <div class="attendee_info">
                                                <h6>Person Person</h6>
                                                <h6 class="h7">Position</h6>
                                            </div>
                                        </div>

                                        <div style="margin-bottom:20px">
                                            <img class="attendees_img" src={{ URL::asset('img/teo.jpeg') }} />
                                            <div class="attendee_info">
                                                <h6>Person Person</h6>
                                                <h6 class="h7">Position</h6>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-6 col-sm-4 personal_info">

                                        <div style="margin-bottom:20px">
                                            <img class="attendees_img" src={{ URL::asset('img/teo.jpeg') }} />
                                            <div class="attendee_info">
                                                <h6>Person Person</h6>
                                                <h6 class="h7">Position</h6>
                                            </div>
                                        </div>

                                        <div style="margin-bottom:20px">
                                            <img class="attendees_img" src={{ URL::asset('img/teo.jpeg') }} />
                                            <div class="attendee_info">
                                                <h6>Person Person</h6>
                                                <h6 class="h7">Position</h6>
                                            </div>
                                        </div>

                                        <div style="margin-bottom:20px">
                                            <img class="attendees_img" src={{ URL::asset('img/teo.jpeg') }} />
                                            <div class="attendee_info">
                                                <h6>Person Person</h6>
                                                <h6 class="h7">Position</h6>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="container" style="margin-left:25px">
                    <div class="row">
                        <div class="col-sm-5 col-md-3 col-xl-2">
                            <div class="add_btn" style="margin-bottom: 10px">
                                <h6>Going</h6>
                            </div>
                        </div>

                        <div class="col-sm-5 col-md-3 col-xl-2">
                            <div class=" add_btn">
                                <h6>Ask organizer</h6>
                            </div>
                        </div>

                    </div>
                </div>






            </div>



        </div>
    </div>

@endsection














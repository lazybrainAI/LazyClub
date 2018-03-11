
@extends ('layouts.app')

@section('title', 'Event')

@section('include_css')
    @parent
    <link rel="stylesheet" href= {{ URL::asset('css/main.css') }}>

@endsection


@section('page_top_picture')
    @parent



    <div id="page_top_picture">
        <div class="container-fluid p_t_button">
            <div class="row justify-content-center">
                <div class="col-sm-3 col-xs-4" id="page_title">
                    <h2>Club | LazyBrain</h2>
                </div>
            </div>
        </div>
    </div>
@endsection






@section('main')
    @parent

    <div class="container-fluid sidebar_section">
        <div class="row">
            <div class="col-sm-3 col-md-2 d-none d-sm-block">
                <ul id="sidebar_menu">
                    <li>
                        <a href="">
                            <h5>Home</h5>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <h5>Events</h5>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <h5>Projects</h5>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <h5>Review</h5>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <h5>Documents</h5>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <h5>Profile</h5>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <h5>Logout</h5>
                        </a>
                    </li>

                </ul>
            </div>
            <div class="col-sm-9 col-md-10  col-xs-12 user_info_section">
                <div class="container profile_details_section" >
                    <div class="row justify-content-between no-gutters">
                        <div class="col-md-4 ">
                            <h5 class="section_title">Event</h5>
                        </div>
                        <div class=" col-md-3 profile_details">
                            <h6>Event details:</h6>
                            <br>
                            <h6 class="h7" id="event_date">Date/</h6>
                            <h6 class="h7" id="event_time">Time/</h6>
                            <h6 class="h7" id="=event_loc">Location/</h6>
                            <h6 class="h7" id="=event_lang">Language/</h6>


                        </div>

                    </div>
                </div>



                <div class="container event_section">
                    <div class="row">
                        <div class="col-md-8">

                            <p style="padding-left: 15px">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
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
                    </div>
                </div>

                <h5 class="section_title">Attendees</h5>
                <div class="container attendees_section">
                    <div class="row align-items-center">
                        <div class="col-md-5 organizer">
                            <div class="container">
                                <div class="row align-items-center">
                                    <div class="col-sm-12 col-lg-6">
                                        <img class=" profile_img" src={{ URL::asset('img/teo.jpeg') }} />
                                    </div>
                                    <div class="col-sm-12 col-lg-6 personal_info">
                                        <h5>Person Person</h5>
                                        <h6>Position</h6>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7  attendees">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-4">
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
                                    <div class="col-sm-4 personal_info">

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
                                    <div class="col-sm-4 personal_info">

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
                <div class="container">
                    <div class="row">
                        <div class="col-sm-5 col-md-3 col-xl-2">
                            <div class=" add_btn">
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














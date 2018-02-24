
@extends ('layouts.app')

@section('title', 'Home')

@section('include_css')
 @parent
 <link rel="stylesheet" href= {{ URL::asset('css/app.css') }}>

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

<div class="container-fluid home_section">
    <div class="row">
        <div class="col-lg-6 left_section">
            <div class="container container-left-margin">
                <div class="row">
                    <div class="col-sm-4">
                        <h4 class="section_title">Events</h4>
                    </div>


                </div>
            </div>
            <div class="container">
                <div class="row no-gutters justify-content-between">
                    <div class="col-sm-6 col-md-5">
                                <div class="event_date">
                                </div>
                               <div class="p_e_card" id="p_e_card_1">
                                   <div class="p_e_img">
                                       <h5 class="section_title">Event name</h5>
                                   </div>
                                   <div class="p_e_info">
                                       <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>

                                       <div class="read_more_btn" style="display: inline-block">
                                           <h6 class="h7">Attend</h6>
                                       </div>
                                       <div class="read_more_btn" style="display: inline-block">
                                           <h6 class="h7">Time</h6>

                                       </div>
                                       <div class="read_more_btn" style="display: inline-block">
                                           <h6 class="h7">Date</h6>
                                       </div>
                                       <div class="read_more_btn" style="display: inline-block">
                                           <h6 class="h7">Location</h6>
                                       </div>

                                   </div>
                               </div>
                                <div class="event_date">
                                </div>

                                <div class="p_e_card" id="p_e_card_2">
                                <div class="p_e_img">
                                    <h5 class="section_title">Event name</h5>
                                </div>
                                <div class="p_e_info">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>

                                    <div class="read_more_btn" style="display: inline-block">
                                        <h6 class="h7">Attend</h6>
                                    </div>
                                    <div class="read_more_btn" style="display: inline-block">
                                        <h6 class="h7">Time</h6>

                                    </div>
                                    <div class="read_more_btn" style="display: inline-block">
                                        <h6 class="h7">Location</h6>

                                    </div>
                                    <div class="read_more_btn" style="display: inline-block">
                                        <h6 class="h7">Location</h6>

                                    </div>

                                </div>
                            </div>
                    </div>
                    <div class="col-sm-6 col-md-5">
                       <div class="p_e_card" id="p_e_card_3">
                           <div class="p_e_img">
                               <h5 class="section_title">Event name</h5>
                           </div>
                           <div class="p_e_info">
                               <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>

                               <div class="read_more_btn" style="display: inline-block">
                                   <h6 class="h7">Attend</h6>
                               </div>
                               <div class="read_more_btn" style="display: inline-block">
                                   <h6 class="h7">Time</h6>

                               </div>
                               <div class="read_more_btn" style="display: inline-block">
                                   <h6 class="h7">Date</h6>
                               </div>
                               <div class="read_more_btn" style="display: inline-block">
                                   <h6 class="h7">Location</h6>
                               </div>

                           </div>
                       </div>
                        <div class="event_date">
                        </div>
                        <div class="p_e_card" id="p_e_card_4">
                            <div class="p_e_img">
                                <h5 class="section_title">Event name</h5>
                            </div>
                            <div class="p_e_info">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>

                                <div class="read_more_btn" style="display: inline-block">
                                    <h6 class="h7">Attend</h6>
                                </div>
                                <div class="read_more_btn" style="display: inline-block">
                                    <h6 class="h7">Time</h6>

                                </div>
                                <div class="read_more_btn" style="display: inline-block">
                                    <h6 class="h7">Date</h6>
                                </div>
                                <div class="read_more_btn" style="display: inline-block">
                                    <h6 class="h7">Location</h6>
                                </div>

                            </div>
                        </div>
                        <div class="event_date">
                        </div>

                    </div>


                </div>
            </div>
        </div>
        <div class="col-lg-6 right_section">
            <div class="container container-left-margin">
                <div class="row">
                    <div class="col-sm-4">
                        <h4 class="section_title">Projects</h4>
                    </div>
                </div>
            </div>


            <div class="container">
                <div class="row">
                    <div class="col-sm-6 padding_left">
                        <div class="p_e_card">
                            <div class="p_e_img">
                                <h5 class="section_title">Project name</h5>
                                <ul>
                                    <li>
                                        <img class="profile_img" src={{ URL::asset('img/teo.jpeg') }} />
                                    </li>
                                    <li>
                                        <img class="profile_img" src={{ URL::asset('img/teo.jpeg') }} />

                                    </li>
                                </ul>
                            </div>
                            <div class="p_e_info">
                                <h5>About</h5>
                                <p>loremipsum </p>
                                <div class="read_more_btn">
                                    <h6 class="h7">view project</h6>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-sm-6 padding_left" >
                        <div class="p_e_card">
                            <div class="p_e_img">
                                <h5 class="section_title">Project name</h5>
                                <ul>
                                    <li>
                                        <img class="profile_img" src={{ URL::asset('img/teo.jpeg') }} />
                                    </li>
                                    <li>
                                        <img class="profile_img" src={{ URL::asset('img/teo.jpeg') }} />

                                    </li>
                                </ul>
                            </div>
                            <div class="p_e_info">
                                <h5>About</h5>
                                <p>loremipsum </p>
                                <div class="read_more_btn">
                                    <h6 class="h7">view project</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 padding_left">
                        <div class="p_e_card">
                            <div class="p_e_img">
                                <h5 class="section_title">Project name</h5>
                                <ul>
                                    <li>
                                        <img class="profile_img" src={{ URL::asset('img/teo.jpeg') }} />
                                    </li>
                                    <li>
                                        <img class="profile_img" src={{ URL::asset('img/teo.jpeg') }} />

                                    </li>
                                </ul>
                            </div>
                            <div class="p_e_info">
                                <h5>About</h5>
                                <p>loremipsum </p>
                                <div class="read_more_btn">
                                    <h6 class="h7">view project</h6>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-sm-6 padding_left">
                        <div class="p_e_card">
                            <div class="p_e_img">
                                <h5 class="section_title">Project name</h5>
                                <ul>
                                    <li>
                                        <img class="profile_img" src={{ URL::asset('img/teo.jpeg') }} />
                                    </li>
                                    <li>
                                        <img class="profile_img" src={{ URL::asset('img/teo.jpeg') }} />

                                    </li>
                                </ul>
                            </div>
                            <div class="p_e_info">
                                <h5>About</h5>
                                <p>loremipsum </p>
                                <div class="read_more_btn">
                                    <h6 class="h7">view project</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="read_more_btn" style="margin-bottom:70px">
                        <h6>View more</h6>
                    </div>
                </div>
            </div>


            <div class="container review_ppl_section">
                <div class="row">
                    <div class="col-sm-6 padding_left">
                        <div class="container container-left-margin">
                            <div class="row">
                                <div class="col-sm-5">
                                    <h5 class="section_title">Review</h5>
                                </div>
                            </div>
                        </div>

                        <div class="review">
                            <div class="select_field">
                                <input type="search" placeholder="Select project/event">
                            </div>
                            <div class="review_text">
                                <input type="text" placeholder="Your note">
                            </div>

                        </div>

                        <div class="read_more_btn" style="margin-bottom:70px">
                            <h6>View more</h6>
                        </div>



                    </div>
                    <div class="col-sm-6">
                        <div class="container container-left-margin">
                            <div class="row">
                                <div class="col-sm-5">
                                    <h5 class="section_title">People</h5>
                                </div>
                            </div>
                        </div>

                        <div class="container people_home_section">
                            <div class="row">
                                <div class="col-md-2">
                                    <img class="people_img" src={{ URL::asset('img/teo.jpeg') }} />
                                    <img class="people_img" src={{ URL::asset('img/teo.jpeg') }} />
                                    <img class="people_img" src={{ URL::asset('img/teo.jpeg') }} />
                                    <img class="people_img" src={{ URL::asset('img/teo.jpeg') }} />
                                </div>
                                <div class="col-md-2">
                                    <img class="people_img" src={{ URL::asset('img/teo.jpeg') }} />
                                    <img class="people_img" src={{ URL::asset('img/teo.jpeg') }} />
                                    <img class="people_img" src={{ URL::asset('img/teo.jpeg') }} />
                                    <img class="people_img" src={{ URL::asset('img/teo.jpeg') }} />
                                </div>
                            </div>
                        </div>

                        <div class="read_more_btn" style="margin-bottom:70px">
                            <h6>View more</h6>
                        </div>



                    </div>


                </div>
            </div>

        </div>

    </div>
</div>

 @endsection




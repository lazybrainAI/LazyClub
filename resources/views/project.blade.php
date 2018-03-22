
@extends ('layouts.app')

@section('title', 'Project')

@section('include_css')
    @parent
    <link rel="stylesheet" href= {{ URL::asset('css/main.css') }}>

@endsection


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
                <div class="container container-left-margin">
                    <div class="row no-gutters">
                        <div class="col-5 col-sm-4 col-md-3  col-lg-2">
                            <h5 class="section_title">{{$project->name}}</h5>
                        </div>
                    </div>
                </div>

                <div class="container details_section" >
                    <div class="row justify-content-between no-gutters">
                        <div class="col-md-8 order-md-1 order-2">

                                <p>{{$project->description}}
                                </p>
                                <div class="read_more_btn">
                                    <h6>read more</h6>
                                </div>

                        </div>
                        <div class=" col-md-3  order-md-2 order-1 details_div" style="height:300px">
                            <h6>Project details:</h6>
                            <br>
                            <h6 class="h7" id="project_lead">Lead/</h6>
                            <h6 class="h7" id="project_sector">Sector/</h6>
                            <br>
                            <h6 class="h7" id="project_start_date">Start date/  {{ \Carbon\Carbon::parse($project->start_date)->format('d.m.Y')}}</h6>
                            <h6 class="h7" id="project_end_date">End date/  {{ \Carbon\Carbon::parse($project->end_date)->format('d.m.Y')}}</h6>
                            <br>
                            <h6 class="h7" id="=project_loc">Location/</h6>
                            <h6 class="h7" id="=project_lang">Language/</h6>
                            <br>
                            <h6 class="h7" id="=project_positions">Open positions/</h6>


                        </div>

                    </div>
                </div>



                <div class="container container-left-margin">
                    <div class="row">
                        <div class="col-5 col-sm-4 col-md-3  col-lg-2">
                            <h5 class="section_title">Timeline</h5>
                        </div>
                    </div>
                </div>

              <div class="timeline_section">
                  <div  class="horizontal_line">

                      <div class="project_action">
                          <h6 id="action_name">Action name</h6>
                          <h6 class="h7" id="action_responsible">Responsible</h6>
                          <img class="action_responsible_img" src={{ URL::asset('img/teo.jpeg') }}>
                          <div class="vertical_line"></div>
                      </div>


                      <div class="project_action">
                          <h6 id="action_name">Action name</h6>
                          <h6 class="h7" id="action_responsible">Responsible</h6>
                          <img class="action_responsible_img" src={{ URL::asset('img/teo.jpeg') }}>
                          <div class="vertical_line"></div>

                      </div>

                      <div class="project_action">
                          <h6 id="action_name">Action name</h6>
                          <h6 class="h7" id="action_responsible">Responsible</h6>
                          <img class="action_responsible_img" src={{ URL::asset('img/teo.jpeg') }}>
                          <div class="vertical_line"></div>

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
                            {{--@include('/php/review_card')--}}
                        </div>
                    </div>
                </div>





                <div class="container container-left-margin">
                    <div class="row">
                        <div class="col-5 col-sm-4 col-md-3  col-lg-2">
                            <h5 class="section_title">Documents</h5>
                        </div>
                    </div>
                </div>
                <div class="container documents_section">
                    <div class="row align-items-center">
                        <div class="col-md-3 col-sm-6">
                            @include('/php/document')

                        </div>
                        <div class="col-md-3 col-sm-6">
                            @include('/php/document')

                        </div>
                        <div class="col-md-3 col-sm-6">
                            @include('/php/document')

                        </div>
                        <div class="col-md-3 col-sm-6">
                            @include('/php/document')

                        </div>
                    </div>
                </div>

                <h5 class="section_title">Team</h5>

                <div class="container container-left-margin">
                    <div class="row">
                        <div class="col-5 col-sm-4 col-md-3 col-lg-2">
                            <h5 class="section_title">Team</h5>
                        </div>
                    </div>
                </div>
                <div class="container attendees_section">
                    <div class="row align-items-center">
                        <div class="col-md-5 organizer">
                            <div class="container">
                                <div class="row align-items-center">
                                    <div class="col-xs-6 ">
                                        <img class=" profile_img" src={{ URL::asset('img/teo.jpeg') }} />
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
                                    <div class="col-sm-6 col-6 ">
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



                                    </div>
                                    <div class="col-sm-6 col-6 personal_info">

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
                            <div class=" add_btn">
                                <h6>Join us</h6>
                            </div>
                        </div>

                        <div class="col-sm-5 col-md-3 col-xl-2">
                            <div class=" add_btn">
                                <h6>Contact us</h6>

                            </div>
                        </div>

                    </div>
                </div>






            </div>



        </div>
    </div>

@endsection














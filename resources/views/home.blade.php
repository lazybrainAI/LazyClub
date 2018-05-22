@extends ('layouts.app')

@section('title', 'Home')

@section('id', 'body_home')

@section('page_top_picture')
    @include ('/php/page_top_picture')
@endsection

@section('main')
    @parent

    <div class="container-fluid home_section">
        <div class="row">

            <div class="col-lg-6 left_section">
                <div class="container container-left-margin">
                    <div class="row">
                        <div class="col-sm-4">
                            <h5 class="section_title">Events</h5>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="timeline_home_page">
                        @if(!empty($events) && count($events)>0)
                            <div class="timeline_vertical">
                                @foreach($events as $event)
                                    @if($loop->index%2==0)
                                        <div class="row no-gutters justify-content-between">
                                            <div class="col-sm-6 col-md-5">
                                                <div class="event_date_right">
                                                    <h6>@include('/php/date')</h6>
                                                </div>
                                            </div>
                                            @include('/php/event_card_right_home')
                                        </div>
                                    @else
                                        <div class="row no-gutters justify-content-between">
                                            @include('/php/event_card_right_home')
                                            <div class="col-sm-6 col-md-5 order-1 order-sm-2">
                                                <div class="event_date_left">
                                                    <h6>@include('/php/date')</h6>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                                @foreach($events as $event)
                                    <div class="timeline_circle" id="tml_crcl_{{$loop->index+1}}">
                                        @if($loop->index%2==0)
                                            <div class="horizontal_line_right"></div>
                                        @else
                                            <div class="horizontal_line_left"></div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                            <div class="see_more_btn no_home_events">
                                <a href="/events" ><h6>View more</h6></a>
                            </div>
                        @else

                            <div style="margin-bottom: 10%; margin-left: -1%; color: #07dd85">
                                There are no events at the moment.
                            </div>
                            <div class="see_more_btn no_home_events">
                                <a href="/events"><h6>Add new</h6></a>
                            </div>
                        @endif


                    </div>
                </div>
            </div>

            <div class="col-lg-6 right_section">
                <div class="container container-left-margin">
                    <div class="row">
                        <div class="col-sm-4">
                            <h5 class="section_title">Projects</h5>
                        </div>
                    </div>
                </div>

                <div class="container" id="projects_home">
                    <div class="row">
                        @if(!empty($projects) && count($projects)>0)
                            @foreach($projects as $project)
                                @include('/php/project_card_home')
                            @endforeach
                    </div>
                    <div class="see_more_btn view_all_pro_btn">
                        <a href="/projects"><h6>View more</h6></a>
                    </div>
                    @else
                        <div class="no_projects" id="no_home_projects" style="width: 100%; margin-left: -2%">
                            There are no projects at the moment.
                        </div>
                </div>
                <div class="see_more_btn view_all_pro_btn">
                    <a href="/projects"><h6>Add new</h6></a>
                </div>
                @endif

            </div>



            <div class="container review_ppl_section">
                <div class="row align-content-center">
                    <div class="col-sm-12">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-4">
                                    <h5 class="section_title">People</h5>
                                </div>
                            </div>
                        </div>

                        <div class="container people_home_section">
                            <div class="row">

                                @if($users->isEmpty())
                                    <div>No members in organization at the moment.</div>
                                @else
                                    @foreach($users as $user)
                                       @if($user->id!=1)
                                            <a href="/profile/{{$user->id}}">
                                                <div class="col-md-3">

                                                    <img class="people_img" src={{ URL::asset($user->photo_link) }} />

                                                </div>
                                            </a>
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="see_more_btn" style="margin-bottom:10px; margin-top:10px">
                            <a href="/people"><h6>View more</h6></a>
                        </div>


                    </div>


                </div>
            </div>

        </div>
    </div>
@endsection

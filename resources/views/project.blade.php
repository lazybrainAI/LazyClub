
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
                <form id="project_form" method="post"  accept-charset="UTF-8">

                <div class="container container-left-margin">
                    <div class="row no-gutters">
                        <div class="col-5 col-sm-4 col-md-3  col-lg-2">
                            <h5 class="section_title" id="project">{{$project->name}}</h5>
                        </div>
                    </div>
                </div>

                <div class="container details_section" >
                    <div class="row justify-content-between no-gutters">
                        <div class="col-md-8 order-md-1 order-2">

                            <textarea name="project_description" maxlength="450" cols="80"  id="project_description" disabled="disabled" placeholder="This is a place for project descripton, but MO is lazy."><?php if(!is_null($project->description)){ echo $project->description;} ?></textarea>

                            <!--       <div class="read_more_btn">
                                       <h6>read more</h6>
                                   </div> -->

                        </div>

                        <div class=" col-md-3  order-md-2 order-1 details_div" >
                            <h6>Project details:</h6>
                            <br>
                            <h6 class="h7" id="project_lead">Lead/ {{$lead->name . " " . $lead->surname}}</h6>
                            <h6 class="h7" id="project_sector">Sector/ <input name="project_sector" type="text" disabled value="{{$project->sector}}"> </h6>
                            <br>
                            <h6 class="h7" id="project_start_date">Start date/  <input name="project_start_date"  type="date" disabled="disabled" required value="{{ $project->start_date }}"> </h6>

                            <h6 class="h7" id="project_end_date">End date/  <input name="project_end_date"  type="date" disabled="disabled" required value="{{ $project->end_date}}">  </h6>
                            <br>
                            <h6 class="h7" id="=project_loc">Location/  <input name="project_location" type="text" disabled="disabled" value="{{$location_name}}"></h6>
                            <h6 class="h7" id="=project_lang">Language/ <select name="project_language" form="project_form" required disabled="disabled">
                                    <option >{{$language_name}}</option>
                                    @if($language_name=="serbian")
                                        <option>english</option>
                                    @else
                                        <option>serbian</option>

                                    @endif
                                </select></h6>
                            <br>
                            <h6 class="h7" id="=project_positions">Open positions/ @foreach($open_positions as $open_position)
                                    <div id="{{"open_position". $open_position->title}}" >{{$open_position->title}}</div>
                                                                                    @endforeach</h6>


                        </div>

                    </div>
                </div>


{{--
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



                  </div>
              </div> --}}


                <div class="container container-left-margin">
                    <div class="row">
                        <div class="col-5 col-sm-4 col-md-3  col-lg-2">
                            <h5 class="section_title">Reviews</h5>
                        </div>
                    </div>
                </div>
                <div class="container review_section">
                    <div class="row align-items-center">
                        @if($reviews->isEmpty())
                            <div><p>No reviews for this project yet.</p></div>
                        @else
                            @foreach($reviews as $review)
                                <div class="col-md-4 col-sm-6">
                                    @include('/php/review_card')
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <button type="button" class="add_btn" id="add_review" data-toggle="modal" data-target="#project_review_modal">
                        <h6>Add review</h6>
                    </button>
                </div>



<!--

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

                    </div>
                </div>   -->


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
                                        <img class=" profile_img" src={{ URL::asset($lead->photo_link) }} />
                                    </div>
                                    <div class="col-xs-6  personal_info">
                                        <h5>{{$lead->name . " ". $lead->surname}}</h5>
                                        <h6>Lead</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7  attendees">
                            <div class="container">
                                <div class="row">
                                    @foreach($existing_positions as $existing_position=>$user)
                                        <div class="col-sm-6 col-6 "> <!-- personal_info -->
                                            <div style="margin-bottom:20px">
                                                <img class="attendees_img not_clicked" src={{ URL::asset($user->photo_link) }} id="attendee_{{$existing_position}}"/>
                                                <div class="attendee_info">
                                                    <h6>{{$user->name . " " . $user->surname}}</h6>
                                                    <h6 class="h7">{{$existing_position}}</h6>
                                                </div>
                                            </div>
                                            <div id="application_{{$existing_position}}" class="applications">
                                              @if($applications[$existing_position]!=null)

                                                    @foreach($applications[$existing_position] as $user)
                                                        <div id="{{$existing_position."_".$user->id}}">{{$user->name." ".$user->surname}}</div>
                                                    @endforeach
                                                  @else
                                                  <p>No applications for this position yet!</p>
                                                  @endif
                                            </div>
                                        </div>
                                        @endforeach


                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="container" style="margin-left:25px">
                    <div class="row">

                        <button type="button" class="add_btn" id="join_us" data-toggle="modal" data-target="#signup_modal" style="background: transparent">
                            <h6>Join us</h6>
                        </button>

                        <button type="button" class="add_btn" id="contact_us" style="background: transparent">
                            <a href="mailto: {{$lead->email}}"><h6>Contact us</h6></a>
                        </button>



                    </div>
                </div>


                    <button class="save_btn" id="save_project" type="submit">
                        <h6>Save changes</h6>
                    </button>
                    <button class="cancel_btn" id="cancel_project" type="reset">
                        <h6>Cancel</h6>
                    </button>

                </form>

            </div>



        </div>
    </div>


    {{--Modal--}}
    @include('/php/project_review_modal')
    @include('/php/project_team_signup_form')

@endsection














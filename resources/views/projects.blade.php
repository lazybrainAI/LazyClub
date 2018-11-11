@extends ('layouts.app')
@section('title', 'Projects')
@section('page_top_picture')
    @parent
    @include ('/php/page_top_picture')
@endsection

@section('small_menu')
    @parent
    @include ('/php/small_sidebar_menu')
@endsection



@section('main')
    @parent

    @include('/php/custom_alert_window')
    
    <div class="container-fluid sidebar_section">
        <div class="row">
            {{--Side bar--}}
            <div class="col-sm-3 col-md-2 d-none d-sm-block">
                @include ('/php/sidebar_menu')
            </div>
            <div class="col-sm-9 col-md-10 col-xs-12 main_content_section projects_all_section">
                <div class="container container-left-margin">
                    <div class="row">
                        {{--Projects header--}}
                        <div class="col-sm-4">
                            <h4 class="section_title" id="all_projects_section_title">All projects</h4>
                        </div>
                        {{--Add new project button--}}
                        @if($add_new_project=="hr")
                            <div class="col-sm-4 offset-sm-4 div_btn_event_project">
                                <button class="add_new_project" data-toggle="modal" data-target="#projectModal">Add new</button>
                            </div>

                        @endif

                    </div>
                </div>
                {{--Projects section--}}
                <div class="container" id="projects_all">
                    <div class="row" id="all_projects">
                        @if(!empty($projects) && count($projects)>0)
                            @foreach($projects as $project)
                                @include('/php/project_card_all')
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="no_projects" id="no_projects_at_the_moment" style="width:150%; display: none">
                    There are no projects at the moment.
                </div>
            </div>
        </div>
    </div>
    {{--Modal--}}
    @include('/php/project_modal')


@endsection
@section('include_js')
    <script src={{ URL::asset('js/show_no_projects_div.js')}}></script>
    <script src={{ URL::asset('js/projects_add_new_project.js') }}></script>
    <script src={{ URL::asset('js/projects_delete_project.js') }}></script>
@endsection
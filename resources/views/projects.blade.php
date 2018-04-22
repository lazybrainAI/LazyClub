@extends ('layouts.app')

@section('title', 'Projects')


@section('page_top_picture')
    @parent
    @include ('/php/page_top_picture')
@endsection


@section('main')
    @parent

    <div class="container-fluid sidebar_section">
        <div class="row">
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
                        <div class="col-sm-4 offset-sm-2">
                            <button class="add_new_project" data-toggle="modal" data-target="#projectModal">Add new
                                project
                            </button>
                        </div>
                    </div>
                </div>

                {{--Project section--}}
                <div class="container" id="projects_all">
                    <div class="row" id="all_projects">
                        @if(!empty($projects))
                            @foreach($projects as $project)
                                @include('/php/project_card_all')
                            @endforeach
                        @else
                            <div style="margin-bottom: 10%;">
                                There are no projects at the moment.
                            </div>
                        @endif

                    </div>
                </div>
            </div>

        </div>
    </div>

    {{--Modal--}}
    @include('/php/project_modal')




@endsection
@section('include_js')
    <script src={{ URL::asset('js/projects_add_new_project.js') }}></script>
@endsection
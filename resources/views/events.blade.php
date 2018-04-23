@extends ('layouts.app')

@section('title', 'Events')


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

            <div class="col-sm-9 col-md-10 col-xs-12 main_content_section events_all_section">

                <div class="container container-left-margin">
                    <div class="row">
                        {{--Event header--}}
                        <div class="col-sm-4">
                            <h4 class="section_title" id="all_events_section_title">All events</h4>
                        </div>
                        {{--Add new event button--}}
                        <div class="col-sm-4 offset-sm-2">
                            <button class="add_new_event" data-toggle="modal" data-target="#myModal">Add new event
                            </button>
                        </div>
                    </div>
                </div>

                {{--Event section--}}
                <div class="container" id="events_all">
                    <div class="row" id="all_events">
                        @if(!empty($events))
                            @foreach($events as $event)
                                @include('/php/event_card_all')
                            @endforeach
                        @else
                            <div style="margin-bottom: 10%;">
                                There are no events at the moment.
                            </div>
                        @endif

                    </div>
                </div>
            </div>

        </div>
    </div>

    {{--Modal--}}
    @include('/php/modal')






@endsection
@section('include_js')
    <script src={{ URL::asset('js/events_add_new_event.js') }}></script>
@endsection
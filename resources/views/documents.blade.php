
@extends ('layouts.app')

@section('title', 'Documents')


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
            <div class="col-sm-9 col-md-10  col-xs-12 main_content_section">
            </div>
        </div>
    </div>
    @endsection
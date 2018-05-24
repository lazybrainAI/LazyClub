
@extends ('layouts.app')

@section('title', 'Documents')


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

    <div class="container-fluid sidebar_section">
        <div class="row">
            <div class="col-sm-3 col-md-2 d-none d-sm-block">
                @include ('/php/sidebar_menu')
            </div>
            <div class="col-sm-9 col-md-10  col-xs-12 main_content_section">

                <div class="container container-left-margin">
                    <div class="row">
                        {{--Document header--}}
                        <div class="col-sm-3">
                            <h4 class="section_title" id="all_people_section_title">Documents</h4>
                        </div>
                        {{--Add new document button--}}
                        <div class="col-sm-4 offset-sm-4 div_btn_event_project">
                            <button class="add_new_document" data-toggle="modal" data-target="#document_upload_modal">Add new document
                            </button>
                        </div>
                    </div>
                </div>
                {{-- Documents section --}}
                <div class="container all_documents_section">
                    <div class="row">
                        @if(!empty($documents) && count($documents)>0)
                            @foreach($documents as $document)
                                <div class="col-md-3 col-sm-6">
                                    @include('/php/document')
                                </div>
                            @endforeach
                            @else
                            <div style="margin-left:10px" id="no_docs">
                                There are no documents at the moment.
                            </div>
                        @endif
                    </div>
                </div>




            </div>
        </div>
    </div>


    {{--Document upload --}}
    @include('/php/document_modal')

    @endsection
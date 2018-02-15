
@extends ('layouts.app')

@section('title', '| Profile')

@section('page_top_picture')
 @parent

 <div id="page_top_picture"></div>
@endsection


@section('sidebar')
 @parent

 <div id="kk">This is appended to the master sidebar.</div>
@endsection



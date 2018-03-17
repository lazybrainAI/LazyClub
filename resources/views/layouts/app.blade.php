
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href= {{ URL::asset('css/bootstrap.min.css') }}>


    @section('include_css')
    @show

    <link rel="stylesheet" href= {{ URL::asset('css/app.css') }}>



    <link rel="stylesheet" href= {{ URL::asset('css/app.css') }}>


    <title>Lazy Club | @yield('title')</title>
</head>
<body id="@yield('id')">

@section('page_top_picture')
@show

@section('main')
@show


<script src={{ URL::asset('js/jquery-3.3.1.min.js') }}></script>
<script src={{ URL::asset('js/bootstrap.min.js') }}></script>
<script src={{ URL::asset('js/main.js') }}></script>
<script type="text/javascript">
    $(document).ready(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#review_form').submit(function (e) {
            e.preventDefault();
            e.stopPropagation();

            var description = $('#description').val();
            var project_event_select = $('#project_event_select').val();

            $.ajax({
                url: '/home',
                type: 'POST',
                data: {project_event_select: project_event_select, description:description},
                success: function () {
                    $('#description').val('');
                    $('#project_event_select').val('selected');
                    $('#uspesno_poslata').text('Your review has been saved!').show();
                    $('#uspesno_poslata').text('Your review has been saved!').delay(2000).fadeOut(1000);
                },
                error: function(data) {
                    $('#neuspesno_poslata').text('You have to pick project/event and enter your note!').show();
                    $('#neuspesno_poslata').text('You have to pick project/event and enter your note!').delay(2000).fadeOut(1000);

                }

            });


    });
    });

</script>


</body>
</html>
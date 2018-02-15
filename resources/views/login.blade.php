<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="">
    <link href="{{asset('/css/main.css')}}" type="text/css" rel="stylesheet">
    <link href="{{asset('/css/bootrstap.min.css')}}" type="text/css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/index.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <title>Lazy Club</title>
</head>
<style>
    ::placeholder
    {
        color: #025284;
        font-family: Roboto;
    }
</style>
<body background="{{asset('img/background.jpg')}}" style="background-position: center center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;">


<section style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); height:100%; width: 100%;">
    <div style="padding-top: 12%">

        <form style=" background: rgba(2, 82, 132, 0.8); border-radius: 10px; margin: auto; width: 45%; height: 100%; padding: 3%;">
            <div class="col-xs-12">
                <h2 style="font-size: 4.8em; color: white; padding-bottom: 3%; font-family: Roboto ">
                    Club | LazyBrain
                </h2>
            </div>
            <div class="col-xs-12">
                <input  id="username"  type="text" name="username" placeholder="username" style="width: 90%; height: 8%;padding: 10px 10px 10px 25px; border-radius: 15px; font-size: 2em; border-color: rgba(2, 82, 132, 0.8); margin-bottom: 4%;">
            </div>
            <div class="col-xs-12">
                <input type="password" name="password" placeholder="password" style="width:90%; margin-bottom: 5%;padding: 10px 10px 10px 25px; border-radius: 15px; height: 7.3%;  font-size: 2em;">
            </div>
            <div  class="text-center" style=""><button type="submit" class="btn btn-primary" style="width: 45%; border-radius: 15px; background-color: rgb(2, 82, 132); border-color: white; font-size: 2em">log in</button>
            </div>
        </form>
    </div>


</section>
</body>




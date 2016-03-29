<!doctype html>
<html>
<head>
 	<title>Weather Potato</title>

    <meta charset="utf-8" />
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

      <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<style>

    html, body {
        height: 100%;
    }

    .container {
        background-image: url(weatherpotato.jpg);
        width: 100%;
        height: 100%;
        background-size: cover;
        background-position: center;
        padding-top: 150px;
    }

    .jumbotron {
        background-color: rgba(255, 255, 255, 0.60);
    }

    .center {
        text-align: center; 
    }

    p {
        padding-top: 10px;
        padding-bottom: 10px;
    }

    button {
        margin-top: 15px;
    }

    .alert {
        margin-top: 15px;
        display: none;
    }

</style>

</head>

<body>

    <div class="container">

        <div class="jumbotron">

        <div class="row">

            <div class="col-md-6 col-md-offset-3 center">

                <h1>Weather Potato</h1>

                <p class="lead">Enter your city below to get the weather forecast.</p>

                <form>

                    <div class="form-group">

                        <input type="text" class="form-control" name="city" id="city" placeholder="Eg. San Francisco, London, Paris" />

                    </div> 

                    <button id="findWeather" class="btn btn-success btn-lg">Go Weather Potato!</button>

                </form>

                <div id="success" class="alert alert-success">Success!</div>

                <div id="failed" class="alert alert-danger">Could not find city. Please try again.</div>

                <div id="noCity" class="alert alert-danger">Please enter a city.</div>

            </div>

        </div>

        </div>

    </div>


    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

    <script>

        $(".container").css("padding-top",$(window).height()/7)

        $("#findWeather").click(function(event) {

            event.preventDefault();

            $(".alert").hide(); 

            if ($("#city").val() != "") {

                $.get("scraper.php?city=" + $("#city").val(), function(data) {

                    if (data == "") {

                        $("#failed").fadeIn();                        

                    } else {

                        $("#success").html(data).fadeIn();

                    }

                });

            } else {

                $("#noCity").fadeIn();

            }

        });

    </script>

</body>
</html>
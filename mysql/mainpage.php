<?

    session_start();

    include("connection.php");

    $query = "SELECT diary FROM users WHERE id='".$_SESSION['id']."' LIMIT 1";

    $result = mysqli_query($link, $query);

    $row = mysqli_fetch_array($result);

    $diary = $row['diary'];

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Secret Potato</title>

    <!-- Bootstrap -->

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"/>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link href="styles.css" type="text/css" rel="stylesheet">

  </head>
  <body data-spy="scroll" data-target=".navbar-collapse">


    <div class="navbar navbar-default navbar-fixed-top">

      <div class="container">

        <div class="navbar-header pull-left">

          <a class="navbar-brand">Secret Potato</a>

        </div>

        <div class="pull-right">

            <ul class="navbar-nav nav">
                <li><a href="index.php?logout=1">Log Out</a></li>
            </ul>

        </div>

      </div>

    </div>


    <div class="container contentContainer" id="home">

      <div class="jumbotron" id="jumbo">

        <div class="row">

          <div class="col-md-8 col-md-offset-2" id="topRow">

            <textarea class="form-control"><?php echo $diary; ?></textarea>

          </div>

        </div>

      </div>

    </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <script>

      $(".contentContainer").css("min-height", $(window).height());
      $(".jumbotron").css("margin-top",$(window).height()/7);
      $("textarea").css("height", $(window).height()-230);

      $("textarea").keyup(function() {

        $.post("updatediary.php", {diary:$("textarea").val()} );

      });

    </script>
  </body>
</html>
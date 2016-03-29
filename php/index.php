<?php

	if ($_POST["submit"]) {

		if (!$_POST["name"]) {

			$error="<br />Please enter your name.";

		}

		if (!$_POST["email"]) {

			$error.="<br />Please enter your email address.";

		}
		if (!$_POST["comment"]) {

			$error.="<br />Please enter your comment.";

		}

		if ($_POST["email"]!="" AND !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) { 
    		
    		$error.="<br />Please enter a valid email address";
		
		}

		if ($error) {

			$result='<div class="alert alert-danger"><strong>There were error(s) in your form:</strong> '.$error.'</div>';

		} else {

			if (mail("email_address", "Comment from website!", "
				Name: ".$_POST['name']."

				Email: ".$_POST['email']."

				Comment: ".$_POST['comment'])) {

				$result='<div class="alert alert-success"><strong>Thank you! I\'ll be in touch.</strong></div>';

				} else {

					$result='<div class="alert alert-danger"><strong>There was an error sending your message. Please try again later</strong></div>';

				}

		}

	}

?>

<!doctype html>
<html>
<head>
	<title>My First Email Form</title>

	<meta charset="utf-8" />
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<style>

	.emailForm {
		border: 1px solid gray;
		border-radius: 10px;
		margin-top: 20px;
	}

	form {
		padding-bottom: 20px;
	}

</style>

</head>

<body>

	<div class="container">

		<div class="row">

			<div class="col-md-6 col-md-offset-3 emailForm">

				<h1>My First Email Form</h1>

				<?php echo $result; ?>

				<p class="lead">Please get in touch - I'll get back to you as soon as I can.</p>

				<form method="post">

					<div class="form-group">

						<label for="name">Your Name:</label>
						<input type="text" name="name" class="form-control" placeholder="Your Name" value="<?php echo $$_POST['name']; ?>" />

					</div>

					<div class="form-group">

						<label for="email">Your Email:</label>
						<input type="email" name="email" class="form-control" placeholder="Your Email" value="<?php echo $$_POST['email']; ?>" />
						
					</div>

					<div class="form-group">

						<label for="comment">Your Comment:</label>
						<textarea class="form-control" name="comment" placeholder="Your Comment"><?php echo $$_POST['comment']; ?></textarea>
						
					</div>

					<input type="submit" name="submit" class="btn btn-success btn-lg" value="Submit" />

				</form>

			</div>

		</div>

	</div>


<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

</body>
</html>
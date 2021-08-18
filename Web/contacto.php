<!DOCTYPE html>
<html lang="en">

<head>
	<title>SIIT-CONTACTO</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Course Project">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="template/styles/bootstrap4/bootstrap.min.css">
	<link href="template/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="template/styles/contact_styles.css">
	<link rel="stylesheet" type="text/css" href="template/styles/contact_responsive.css">
</head>

<body>
	<div class="super_container">
		<?php include_once "template/Partials/navbar.php"; ?>

		<!-- Home -->

		<div class="home">
			<div class="home_background_container prlx_parent">
				<div class="home_background prlx" style="background-image:url(template/images/contact_background.jpg)"></div>
			</div>
			<div class="home_content">
				<h1>CONTACTO</h1>
			</div>
		</div>

		<!-- Contact -->

		<div class="contact">
			<div class="container">
				<div class="row">
					<div class="col-lg-8">

						<!-- Contact Form -->
						<div class="contact_form">
							<div class="contact_title">PQRSF</div>

							<div class="contact_form_container">
								<form action="post">
									<input id="contact_form_name" class="input_field contact_form_name" type="text" placeholder="Name" required="required" data-error="Name is required.">
									<input id="contact_form_email" class="input_field contact_form_email" type="email" placeholder="E-mail" required="required" data-error="Valid email is required.">
									<textarea id="contact_form_message" class="text_field contact_form_message" name="message" placeholder="Message" required="required" data-error="Please, write us a message."></textarea>
									<button id="contact_send_btn" type="button" class="contact_send_btn trans_200" value="Submit">send message</button>
								</form>
							</div>
						</div>

					</div>

					<div class="col-lg-4">
						<div class="about">
							<div class="about_title">Contáctanos</div>
							<p class="about_text">In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor fermentum. Etiam eu purus nec eros varius luctus. Praesent finibus risus facilisis ultricies. Etiam eu purus nec eros varius luctus.</p>

							<div class="contact_info">
								<ul>
									<li class="contact_info_item">
										<div class="contact_info_icon">
											<img src="template/images/placeholder.svg" alt="https://www.flaticon.com/authors/lucy-g">
										</div>
										Blvd Libertad, 34 m05200 Arévalo
									</li>
									<li class="contact_info_item">
										<div class="contact_info_icon">
											<img src="template/images/smartphone.svg" alt="https://www.flaticon.com/authors/lucy-g">
										</div>
										0034 37483 2445 322
									</li>
									<li class="contact_info_item">
										<div class="contact_info_icon">
											<img src="template/images/envelope.svg" alt="https://www.flaticon.com/authors/lucy-g">
										</div>hello@company.com
									</li>
								</ul>
							</div>

						</div>
					</div>

				</div>

				<!-- Google Map -->

				<div class="row">
					<div class="col">
						<div id="google_map">
							<div class="map_container">
								<div id="map"></div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>


		<?php
		include_once "template/Partials/footer.php";
		?>
	</div>

	<script src="template/js/jquery-3.2.1.min.js"></script>
	<script src="template/styles/bootstrap4/popper.js"></script>
	<script src="template/styles/bootstrap4/bootstrap.min.js"></script>
	<script src="template/plugins/greensock/TweenMax.min.js"></script>
	<script src="template/plugins/greensock/TimelineMax.min.js"></script>
	<script src="template/plugins/scrollmagic/ScrollMagic.min.js"></script>
	<script src="template/plugins/greensock/animation.gsap.min.js"></script>
	<script src="template/plugins/greensock/ScrollToPlugin.min.js"></script>
	<script src="template/plugins/scrollTo/jquery.scrollTo.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA"></script>
	<script src="template/plugins/easing/easing.js"></script>
	<script src="template/js/contact_custom.js"></script>

</body>

</html>
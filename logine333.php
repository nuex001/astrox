<?php
// session_start();
 require_once 'controller_user/process.php';
 require_once 'config/config.php';
?>

<!doctype html>
<html class="no-js" lang="zxx">



<!-- header start -->
<?php
require_once "includes/home-header.php";
?>
<!-- header end -->

<body>
	<div class="wrapper">

		<!-- header start -->
		<?php
		require_once "includes/navbar.php";
		?>
		<!-- header end -->

		<div class="main-content-wrapper" style="background-image:url(access-membership.jpg); background-position:top center; background-repeat:no-repeat;">
			<div class="inner-content-area pb--80">
				<div class="container">
					<div>&nbsp;</div>
					<div>&nbsp;</div>
					<div>&nbsp;</div>
					<div>&nbsp;</div>
					<div class="row">

						<div class="col-lg-7" style="border:1px solid #000; margin:auto; background-color: rgba(0, 0, 0, 0.9)" ;>
							<div class="login-box">

								<table width="95%" border="0" cellspacing="0" cellpadding="0" align="center">
									<tr>
										<td>&nbsp;</td>
									</tr>
									<tr>
										<td style="font-size:24px; font-weight:bold; text-align:center; color:#FFF;">Login</td>
									</tr>
									<tr>
										<td>&nbsp;</td>
									</tr>
								</table>
								<form name="reg-form" class="register-form" method="post" action="logine333.php">
									<input name="form_botcheck" class="form-control" type="hidden" value="1">
									<div class="form__group mb--20">
										<label class="form__label form__label--2" for="username_email" style="color:#FFF;">Email <span class="required">*</span></label>
										<input type="email" id="email" name="email" class="form__input" placeholder="email" style="height:50px !important;padding: 0 10px  !important;" required></div>
									<div class="form__group mb--20">
										<label class="form__label form__label--2" for="login_password" style="color:#FFF;">Password <span class="required">*</span></label>

										<input type="password" id="password" name="password" class="form__input" placeholder="password" style="height:50px !important;padding: 0 10px  !important;" required>

									</div>
									<div class="d-flex align-items-center mb--20">
										<div class="form__group mr--30"><button type="submit" name="btn_login" class="btn btn-colored btn-theme-colored btn-lg btn-flat" data-loading-text="Please wait...">Login Now</button></div>
									</div>
								</form>
							</div>
						</div>
						<div class="col-md-6">&nbsp;</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Footer Start-->
		<?php
		require_once 'includes/footer.php';
		?>

		<!-- Footer End-->

		<!-- jQuery -->
		<script src="popupform/js/jquery-3.1.1.min.html" type="text/javascript"></script>
		<!-- Bootstrap JS -->
		<script src="popupform/js/bootstrap.min.html" type="text/javascript"></script>


		<script>
			(function(i, s, o, g, r, a, m) {
				i['GoogleAnalyticsObject'] = r;
				i[r] = i[r] || function() {
					(i[r].q = i[r].q || []).push(arguments)
				}, i[r].l = 1 * new Date();
				a = s.createElement(o),
					m = s.getElementsByTagName(o)[0];
				a.async = 1;
				a.src = g;
				m.parentNode.insertBefore(a, m)
			})(window, document, 'script', '../www.google-analytics.com/analytics.js', 'ga');

			ga('create', 'UA-50306253-1', 'auto');
			ga('send', 'pageview');
		</script>
		<div class="fp-global-overlay"></div>
		<a class="scroll-to-top" href="#"><i class="fa fa-angle-up"></i></a>
	</div>
	<script src="assets/js/vendor.js"></script>
	<script src="assets/js/main.js"></script>
	<script src="assets/js/jquery.themepunch.tools.min.js"></script>
	<script src="assets/js/jquery.themepunch.revolution.min.js"></script>
	<script src="assets/js/revoulation/revolution.extension.actions.min.js"></script>
	<script src="assets/js/revoulation/revolution.extension.carousel.min.js"></script>
	<script src="assets/js/revoulation/revolution.extension.kenburn.min.js"></script>
	<script src="assets/js/revoulation/revolution.extension.layeranimation.min.js"></script>
	<script src="assets/js/revoulation/revolution.extension.migration.min.js"></script>
	<script src="assets/js/revoulation/revolution.extension.navigation.min.js"></script>
	<script src="assets/js/revoulation/revolution.extension.parallax.min.js"></script>
	<script src="assets/js/revoulation/revolution.extension.slideanims.min.js"></script>
	<script src="assets/js/revoulation/revolution.extension.video.min.js"></script>
	<script src="assets/js/revoulation.js"></script>
</body>



</html>
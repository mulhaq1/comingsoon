<?php 
	
	get_header(); 
	$setting = (array)json_decode( get_option( 'commingSoonSetting', false ) );
	require_once('inc/mailchimp/MCAPI.class.php');
	require_once 'inc/mailchimp/config.inc.php';
	$MailChimp = new MCAPI( $setting['mcApiKey'], false );
	$listId = $setting['mcListId'];
	if( isset( $_POST['btn_subscribe'] ) && !empty( $_POST['subscribe_email'] ) ){
		$result = $MailChimp->listSubscribe($listId, $_POST['subscribe_email'], null, 'html', false, false, true, false);
		if ($MailChimp->errorCode){
			if ($MailChimp->errorCode == 214){
				$msg = '<div style="color: #f00;">Failed - this email is already subscribed</div>';
			} else if($MailChimp->errorCode < 0){
				$msg = '<div style="color: #f00;">Failed - check your entered email address and try later</div>';
			} else{
				$msg = $MailChimp->errorMessage;
			}
		} else {
		    $msg = '<div style="color: #b9cc06;">'.$setting['subscribeMessage'].'</div>';
		}
	}
 ?>
<div class="landing-page-container" style="<?php if( !empty( $setting['bgImage'] ) ){ echo 'background-image: url('.$setting['bgImage'].')'; } ?>">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="landing-page">
					<div class="joint-venture-logos cf">
						<a href="<?php echo $setting['logo1url']; ?>">
							<img src="<?php echo $setting['logo1']; ?>" />
						</a>

						<a href="<?php echo $setting['logo2url']; ?>">
							<img src="<?php echo $setting['logo2']; ?>" />
						</a>
					</div>
					<div class="logo">
						<h1><?php echo stripslashes( $setting['heading2'] ); ?></h1>
					</div>
					<div class="landing-page-content">
						<h2><?php echo stripslashes( $setting['heading1'] ); ?></h2>
						<p><?php echo stripslashes( $setting['description'] ); ?></p>

						<div class="subscribe">
							<p><?php echo stripslashes( $setting['subscribeText'] ); ?></p>
							<form action="" method="post">
								<input type="email" name="subscribe_email" placeholder="Type your email address" required />
								<input type="submit" name="btn_subscribe" value="Subscribe" />
							</form>
							<?php
								if( !empty( $msg ) ){
									echo $msg;
								}
							?>
						</div>
						<ul class="social-icons">
							<?php if( !empty( $setting['facebook'] ) ){ ?>
								<li>
									<a href="<?php echo stripslashes( $setting['facebook'] ); ?>" class="ic-facebook">
										Facebook
									</a>
								</li>
							<?php } ?>
							<?php if( !empty( $setting['twitter'] ) ){ ?>
								<li>
									<a href="<?php echo stripslashes( $setting['twitter'] ); ?>" class="ic-twitter">
										Twitter
									</a>
								</li>
							<?php } ?>
							<?php if( !empty( $setting['linkedin'] ) ){ ?>
								<li>
									<a href="<?php echo stripslashes( $setting['linkedin'] ); ?>" class="ic-linkedin">
										LinkedIn
									</a>
								</li>
							<?php } ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>
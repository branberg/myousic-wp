<?php
/*
Template Name: Contact Page
*/

//response generation function
$response = "";

//function to generate response
function myousic_contact_form_generate_response($type, $message){

	global $response;

	if( $type == "success" ){
		$response = "<div class='success'>{$message}</div>";
	} else {
		$response = "<div class='error'>{$message}</div>";
	}

}

//response messages
$not_human       = "Human verification incorrect.";
$missing_content = "Please supply all information.";
$email_invalid   = "Email Address Invalid.";
$message_unsent  = "Message was not sent. Try Again.";
$message_sent    = "Thanks! Your message has been sent.";

//set this so we don't get error in theme customizer panel
global $wp_customize;

//user posted variables
if( (!empty($_POST)) && (!isset( $wp_customize )) ){

	$name = $_POST['message_name'];
	$email = $_POST['message_email'];
	$message = $_POST['message_text'];
	$human = $_POST['message_human'];

	//php mailer variables
	$to = get_option('admin_email');
	$subject = "Someone sent a message from ".get_bloginfo('name');
	$headers = 'From: '. $email . "rn" .
		'Reply-To: ' . $email . "rn";

	//do the logic
	if( !$human == 0 ){

		if( $human != 9 ){
			myousic_contact_form_generate_response( "error", $not_human );
		} else{

			//validate email
			if( !filter_var($email, FILTER_VALIDATE_EMAIL) ){
				myousic_contact_form_generate_response( "error", $email_invalid );
			} else {

				//validate presence of name and message
				if( empty($name) || empty($message) ){
					myousic_contact_form_generate_response( "error", $missing_content );
				} else {

					//send email
					$sent = wp_mail($to, $subject, strip_tags($message), $headers);

					if( $sent ){
						myousic_contact_form_generate_response( "success", $message_sent );
					} else {
						myousic_contact_form_generate_response( "error", $message_unsent );
					}

				}

			}

		}

	} elseif( $_POST['submitted'] ){
		myousic_contact_form_generate_response( "error", $missing_content );
	}

}

?>
<?php get_header(); ?>

	<div id="page_content" class="page_section contact_section content_padding">
		<div class="wrap">

			<?php echo $response; ?>
			
			<form class="contact_form" action="<?php the_permalink(); ?>" method="post">
				<ul>
					<li class="half">
						<label for="message_name">Name</label>
						<input name="message_name" type="text" placeholder="Johnny Depp" value="<?php echo( (!empty($_POST) && !isset( $wp_customize )) ? esc_attr($_POST['message_name']) : '' ); ?>" required />
					</li>
					<li class="half last">
						<label for="message_email">Email</label>
						<input name="message_email" type="email" placeholder="itdeppends@gmail.com" value="<?php echo( (!empty($_POST) && !isset( $wp_customize )) ? esc_attr($_POST['message_email']) : '' ); ?>" required />
					</li>
					<li class="full">
						<label for="message_text">Message</label>
						<textarea name="message_text" type="text" placeholder="I like movies, pirates, and windows nobody else knows about. I still don’t know who/what is eating Gilbert’s grapes."><?php echo( (!empty($_POST) && !isset( $wp_customize )) ? esc_attr($_POST['message_text']) : '' ); ?></textarea>
					</li>
					<li class="full hidden">
						<label for="message_human">Human - What is 2 + 7?</label>
						<input name="message_human" type="text" placeholder="Enter answer here..." value="<?php echo( (!empty($_POST) && !isset( $wp_customize )) ? esc_attr($_POST['message_human']) : '' ); ?>" required />
					</li>
					<input type="hidden" name="submitted" value="1">
					<li class="full">
						<input type="submit" value="Submit" />
					</li>
				</ul>
			</form>

		</div>
	</div>

<?php get_footer(); ?>
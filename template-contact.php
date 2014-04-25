<?php
/*
Template Name: Contact Page
*/
?>
<?php get_header(); ?>

	<div id="page_content" class="page_section contact_section content_padding">
		<div class="wrap">

			<form class="contact_form" method="post" action="/contact.php">
				<ul>
					<li class="half">
						<label for="name">Name</label>
						<input name="name" type="text" placeholder="Johnny Depp" required />
					</li>
					<li class="half last">
						<label for="email">Email</label>
						<input name="email" type="email" placeholder="itdeppends@gmail.com" required />
					</li>
					<li class="full">
						<label for="message">Message</label>
						<textarea name="message" type="textarea" placeholder="I like movies, pirates, and windows nobody else knows about. I still don’t know who/what is eating Gilbert’s grapes."></textarea>
					</li>
					<li class="full hidden">
						<label for="message">Human - What is 2 + 7?</label>
						<input name="human" type="text" placeholder="Enter answer here..." required />
					</li>
					<li class="full">
						<input type="submit" value="Submit" />
					</li>
				</ul>
			</form>

		</div>
	</div>

<?php get_footer(); ?>
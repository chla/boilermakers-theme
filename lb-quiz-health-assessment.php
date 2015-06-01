<div id="quiz-health-assessment" class="mpopup quiz fill">
	<div class="container">
		<?php 
			query_posts(array('post_type'=>'page','name'=>'health-assessment-quiz'));
			if (have_posts()):
			while (have_posts()): the_post(); 
			include "inc/quiz.php";
			endwhile;
			endif;
			wp_reset_query();
		?>
	</div>
</div>
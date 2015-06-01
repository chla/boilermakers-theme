<div class="columns medium-3 sidebar-for-blog">
	<h5>categories</h5>
	<ul class="clearfix">
		<?php 
			$url = $_SERVER['REQUEST_URI'];
			$tokens = explode('/', $url);
			if($tokens[sizeof($tokens)-2]=='blog'){ echo "<li class='current-cat'"; } else { echo "<li>";}
		?>
		<li><a href="<?php bloginfo('url'); ?>/category/blog">all</a></li>
		<?php wp_list_categories('orderby=id&use_desc_for_title=0&child_of=2&title_li=&hierarchical=0'); ?>
	</ul>
</div>
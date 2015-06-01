<?php
add_action('wp_ajax_foo','prefix_ajax_foo',10,2);
add_action('wp_ajax_nopriv_foo','prefix_ajax_foo',10,2);
function prefix_ajax_foo(){
	global $wp_query,$wp_rewrite;
	$place = $_GET['place'];
	$subject = $_GET['subject'];
	$offset = $_GET['offset'];
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$args=array(
		'offset'=>$offset,
		'post_type'=>'local-resource',
		'order'=>'ASC',
		'posts_per_page'=>9,
		'paged'=>$paged,
		'tax_query'=>array(
			'relation'=>'AND',
			array(
				'taxonomy'=>'category',
				'field'=>'slug',
				'terms'=>$place
			),
			array(
				'taxonomy'=>'category',
				'field'=>'slug',
				'terms'=>$subject
			)
		)
	);
	$wp_query=new WP_Query($args);
	// POSTLIST
	$list="";
	$gmapTag="";
	$linkTag="";
	$phoneTag="";
	if ($wp_query->have_posts()){
		while ($wp_query->have_posts()){
			$wp_query->the_post();
			$id=get_the_id();
			$title="<div class='title'><strong>".get_the_title()."</strong></div>";
			$content=str_replace("\r", "<br />", get_the_content(''));;
			$address="<div class='address'>$content</div>";
			$link=get_post_meta($id,'wpcf-resource-web-site',true);
			$blogurl=get_bloginfo('template_url');
			if($link!=''){
				$linkTag="
					<div class='link'>
						<a target='_blank' href='$link'>
							website
							<img src= '".$blogurl."/assets/img/links-arrow-footer.png'/>
						</a>
					</div>";
			}
			$phone=get_post_meta($id,'wpcf-resource-phone',true);
			if($phone!=''){
				$phoneTag="<div class='phone'>$phone</div>";
			}
			$gmap=get_post_meta($id,'wpcf-resource-address',true);
			if($gmap!=''){
			$gmapTag="<div class='gmap'><a target='_blank' href='http://maps.google.com/?q=$gmap'>Get Direction <i class='fa fa-map-marker'></i></a></div>";
			}
			$list .= "<li><div class='container'>".$title.$address.$linkTag.$phoneTag.$gmapTag."</div></li>";
		};
	};
	echo $list;
	exit();
};
?>
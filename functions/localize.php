<?php
function localize(){
	if (!is_admin()) {
		if ( is_user_logged_in() ) {
		    global $current_user;
		    get_currentuserinfo();
		    $id = $current_user->ID;
				$email = $current_user->user_email;
				$name = $current_user->display_name;
				wp_localize_script('miraculous','loc',array(
					'ajaxurl'=>admin_url('admin-ajax.php'),
					'userid'=>$id,
					'username'=>$name,
					'useremail'=>$email,
				));
		} else {
			wp_localize_script('miraculous','loc',array(
				'ajaxurl'=>admin_url('admin-ajax.php')
			));
		}
	}
};
add_action('wp_enqueue_scripts','localize');
?>
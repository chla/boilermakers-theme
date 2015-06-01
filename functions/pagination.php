<?php
function wp_corenavi(){
    global $wp_query, $wp_rewrite;  
    $pages = '';  
    $max = $wp_query->max_num_pages;  
    if (!$current = get_query_var('paged')) $current = 1;  
    $a['base'] = str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999)) );
    $a['total'] = $max;  
    $a['current'] = $current;    
    $total = 1; //1 - display the text "Page N of N", 0 - not display  
    $a['mid_size'] = 5; //how many links to show on the left and right of the current  
    $a['end_size'] = 1; //how many links to show in the beginning and end  
		//text of the "Previous page" link  
    $a['prev_text'] = '<div class="btn primary prev"><i class="fa fa-angle-left"></i>prev</div>'; 
		 //text of the "Next page" link  
    $a['next_text'] = '<div class="btn primary next">next <i class="fa fa-angle-right"></i></div>';
    if ($max > 1) echo '<div class="navigation">';  
    //if ($total == 1 && $max > 1) $pages = '<span class="pages">Page ' . $current . ' of ' . $max . '</span>'."\r\n";  
    echo $pages . paginate_links($a);  
    if ($max > 1) echo '</div>'; 
}
?>
<?php
function bfa_remove_word_private($string) {
$string=str_ireplace("private: ","",$string);
return $string;
}
add_filter('the_title','bfa_remove_word_private');
?>
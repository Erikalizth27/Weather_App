<?php
function get_clean ($u, &$v) {
    if ( !isset($_GET[$u]))
        {
            return false;
        
        }
$v = trim ($_GET[$u]);
$v = mysql_real_escape_string ($v);
return  true;
}
function is_in_user ($email)
{
    $s = "select *FROM users where email = '$email'";
    $t = mysql_query($s) or print mysql_error();

    return  mysql_num_rows($t);
}

?>
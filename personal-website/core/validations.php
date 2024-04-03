<?php 
function sanitizeValue($input)
{
    return htmlentities(trim($input));
}
function requireValue($input)
{
    if (empty($input)):
        return false;
    else:
        return true;
    endif;
}

function valEmail($input){
    if (filter_var($input, FILTER_VALIDATE_EMAIL)):
        return false;
    else:
        return true;
    endif;
}
function valImage($fileExt,$allowedExt,$fError,$fSize)
{
    if (!in_array($fileExt, $allowedExt)){
       return "Your File Not Allowed";
    }
    else if($fError !== 0){ 
       return "You Have An Error";
    }
    else if($fSize >1000000){
        return "Your File is too Big";
    }
    return false;
}



?>
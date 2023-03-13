<?php

namespace Core\Helpers;

use Core\Model\User;

class Helper
{
    
    public static function redirect(string $url): void
    {
        header("Location: $url");
    }


    

}
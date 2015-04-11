<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 4/10/2015
 * Time: 4:31 PM
 */

namespace App\Services;


class NavigationService {
    public static function adminNavigation($path = "admin")
    {
        $currentPath = explode('/', \Request::path());
        $linkPath = explode('/', $path);
        if(count($currentPath) < 2 || count($linkPath) < 2)
        {
            if(count($currentPath) < 2 && count($linkPath) < 2)
            {
                return "active";
            }

            return "";
        }
        if(strtolower($currentPath[1]) == strtolower($linkPath[1]))
        {
            return "active";
        }
        return "";
    }
}
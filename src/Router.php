<?php

namespace MVC\src;

class Router
{
    public static function parse(string $url,Request $request)
    {
        $url = trim($url);
        if ($url == "/mvc-remake/") {
            $request->controller = "tasks";
            $request->action = "index";
            $request->params = [];
        } else {
            $explode_url = explode('/', $url);
            $explode_url = array_slice($explode_url, 2);
            $request->controller = $explode_url[0];
            $request->action = $explode_url[1];
            $request->params = array_slice($explode_url, 2);
        }

    }
}

<?php

class Router
{
    protected $controller = 'home';
    protected $method = 'index';
    protected $params = array();

    public function __construct()
    {
        
        $url = $this->parseUrl();
        if ( !empty($url[1]) && ( file_exists('app/controllers/'. ucfirst(strtolower($url[1])) .'Controller.php')) )
        {
            $this->controller = ucfirst(strtolower($url[1]));

            require_once 'app/controllers/' . $this->controller . 'Controller.php';                 
            if ( isset($url[2]) && method_exists($this->controller .'Controller' , $url[2]))
            {
                $this->method = $url[2];
                if ( isset($url[3]) )
                {
                    $this->params = $url ? array_values($url) : array();
                }
            }
            call_user_func_array( array( $this->controller .'Controller', $this->method ), $this->params );
        } else
        {
            echo 'page not found';
            exit;
        }
    }

    public function parseUrl()
    {
        if( !isset($_SERVER['PATH_INFO']) && file_exists('app/controllers/'. ucfirst(strtolower($this->controller)) .'Controller.php'))
        {
            require_once 'app/controllers/' . ucfirst(strtolower($this->controller)) . 'Controller.php';
            call_user_func_array( array( $this->controller .'Controller', $this->method ), $this->params );
            exit;
        } elseif( isset($_SERVER['PATH_INFO']) )
        {
            $url = explode('/', filter_var( rtrim($_SERVER['PATH_INFO'], '/'), FILTER_SANITIZE_URL));
            return $url;
        } else
        {
            echo 'Page not Found';
            exit;
        }
    }
}


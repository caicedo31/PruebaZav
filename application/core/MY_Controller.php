<?php
class My_Controller extends CI_Controller
{
     // Theme Platilla
    protected $theme_view = 'application';
    protected $content_view = '';
    protected $view_data = array();
    
    public function __construct()
    {
        parent::__construct();
         
 
        $this->view_data['datetime'] = date('Y-m-d H:i', time());
 
        /* save current url */
        $url = explode('/', $this->uri->uri_string());
        $no_link = array('login', 'register', 'logout', 'language', 'forgotpass', 'postmaster', 'cronjob', 'agent', 'api');
        if (!in_array($this->uri->uri_string(), $no_link) && empty($_POST) && (!isset($url[1]) || $url[1] == "view")) {
            $link = '/'.$this->uri->uri_string();
            $cookie = array(
                       'name'   => 'fc2_link',
                       'value'  => $link,
                       'expire' => '500',
                   );

            $this->input->set_cookie($cookie);
        }
    }
    
    public function _output($output)
    {
        // set the default content view
        if ($this->content_view !== false && empty($this->content_view)) {
            $this->content_view = $this->router->class . '/' . $this->router->method;
        }
        //render the content view
        $yield = file_exists(APPPATH . 'views/plantilla/' . $this->content_view . EXT) ? $this->load->view('plantilla/' . $this->content_view, $this->view_data, true) : false;

        //render the theme
        if ($this->theme_view) {
            echo $this->load->view('plantilla/' .'theme/' . $this->theme_view, array('yield' => $yield), true);
        } else {
            echo $yield;
        }
        
        echo $output;
    }
}

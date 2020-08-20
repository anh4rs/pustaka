<?php
class Template{
    protected $_ci;
    
    function __construct(){
        $this->_ci = &get_instance();
    }
    
    function display($content, $data = NULL){

        $data['header'] = $this->_ci->load->view('backend/layout/header', $data, TRUE);
        $data['sidebar'] = $this->_ci->load->view('backend/layout/sidebar', $data, TRUE);
        $data['content'] = $this->_ci->load->view($content, $data, TRUE);
        $data['footer'] = $this->_ci->load->view('backend/layout/footer', $data, TRUE);
        
        $this->_ci->load->view('backend/layout/index', $data);
    }
}
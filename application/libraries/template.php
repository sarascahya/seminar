<?php
class Template{
    protected $_CI;
    function __construct(){
        $this->_CI=&get_instance();
    }
    
      
    function display($template,$data=null){
        $data['_sidebar_menu']=$this->_CI->load->view('panitia/sidebar',$data,true);
        $data['_header']=$this->_CI->load->view('panitia/header',$data,true);
        $data['_footer']=$this->_CI->load->view('panitia/footer',$data,true);
        $data['_page_content']=$this->_CI->load->view($template,$data,true);

        $this->_CI->load->view('/panitia/template_panitia.php',$data);
    }

    function display2($template,$data=null){
        $data['_sidebar_menu']=$this->_CI->load->view('peserta/sidebar',$data,true);
        $data['_header']=$this->_CI->load->view('peserta/header',$data,true);
        $data['_footer']=$this->_CI->load->view('peserta/footer',$data,true);
        $data['_page_content']=$this->_CI->load->view($template,$data,true);

        $this->_CI->load->view('/peserta/template_peserta.php',$data);
    }
}
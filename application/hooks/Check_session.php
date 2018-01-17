<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Check_session
{
        public function __construct()
        {
                $this->CI = &get_instance();
                $this->CI->load->library('session');
        }

        public function validate()
        {
            $exp=array('Auth');
            $ctrl=$this->CI->uri->segment(1);
            $var=$this->CI->session->userdata('pbbterpadu');

            if(!in_array($ctrl,$exp)){
                // echo $var;
                // exit;
                if ($var <>1 ) {
                    $this->CI->session->set_flashdata('notif','<div class="badge">
                        Silahkan login dengan username dan password anda.
                        </div>');
                    redirect('Auth');
                    die();
                }
            }        
        }
}
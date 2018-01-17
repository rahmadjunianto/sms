<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Menu {
	  var $CI;
    function __construct()
    {
        $this->CI = &get_instance();
        $this->CI->load->library('session');
    }

	 function load($pp,$kode_group){
              $var="<ul class=\"nav navbar-nav\">";
                      $qmenu0  =$this->CI->db->query("SELECT a.*
                                                      FROM p_menu a
                                                      JOIN p_role b on a.kode_menu=b.kode_menu
                                                      WHERE kode_group='$kode_group' AND status_role='1' AND parent_menu='$pp' ORDER BY sort_menu ASC")->result_array();
                      foreach ($qmenu0 as $row0) {
                        $parent  =$row0['KODE_MENU'];
                        $qmenu1  =$this->CI->db->query("SELECT a.*
                                                      FROM p_menu a
                                                      JOIN p_role b on a.kode_menu=b.kode_menu
                                                      WHERE kode_group='$kode_group' AND status_role='1' AND parent_menu='$parent' ORDER BY sort_menu ASC");
                        $cekmenu =$qmenu1->num_rows();
                        $dmenu1  =$qmenu1->result_array();
                          if($cekmenu>0){
                                $var .="<li class=\"dropdown\"><a href='".$row0['LINK_MENU']."' class=\"dropdown-toggle\" data-toggle=\"dropdown\">".ucwords($row0['NAMA_MENU'])."<span class=\"caret\"></span></a>";
                                $var .= "<ul class=\"dropdown-menu\" role=\"menu\">";
                                  foreach($dmenu1 as $row1){
                                      $var.="<li>".anchor($row1['LINK_MENU'],ucwords($row1['NAMA_MENU']))."</li>";
                                  }
                              $var.= "</ul></li>";
                              }else{
                               $var.="<li>".anchor($row0['LINK_MENU'],ucwords($row0['NAMA_MENU']))."</li>";
                            }
                          }
                    $var.="</ul>";
                    echo $var;
	}
}

/* End of file Template.php */
/* Location: ./system/application/libraries/Template.php */
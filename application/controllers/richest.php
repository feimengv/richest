<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Richest extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('richest_model');
	}
	public function index()
	{
		$this->load->view('index');
	}
	public function convert()
	{
		$this->load->view('convert');
	}
	public function update_sale()
	{
		$this->load->library("form_validation");
		$this->form_validation->set_rules('truename','真实姓名','required');
		$this->form_validation->set_rules('tel','电话','required');
		if($this->form_validation->run()==FALSE)
		{
			$data['tishi'] = '提交数据格式不正确';
			$this->load->view('convert',$data);
		}else{
			$data['sale'] = $this->input->post('sale');
			$data['truename'] = $this->input->post('truename');
			$data['tel'] = $this->input->post('tel');
			$data['times'] = $this->input->post('times');
			$data['addtime'] = time();
			if($data)
			{
				$result = $this->richest_model->save($data);
				if($result)
				{
					$array = array(
						'userid'=>$result,
					);
					$this->session->set_userdata($array);
					$array = array(
						'errno'=>200,
						'url'=>site_url('richest/share/'.$result),
					);
					echo json_encode($array);
				}
			}

		}
	}
	public function cny($ns) {
	    $cnums=array("零","壹","贰","叁","肆","伍","陆","柒","捌","玖");
	    $cnyunits=array("元","角","分");
	    $grees=array("拾","佰","仟","万","拾","佰","仟","亿"); 
	    @list($ns1,$ns2)=explode(".",$ns,2); 
	    $ns2=array_filter(array($ns2[1],$ns2[0])); 
	    $ret=array_merge($ns2,array(implode("",$this->_cny_map_unit(str_split($ns1),$grees)),""));
	    $ret=implode("",array_reverse($this->_cny_map_unit($ret,$cnyunits)));
	    return str_replace(array_keys($cnums),$cnums,$ret); 
	}
	public function _cny_map_unit($list,$units) { 
	    $ul=count($units); 
	    $xs=array(); 
	    foreach (array_reverse($list) as $x) { 
	        $l=count($xs); 
	        if ($x!="0" || !($l%4)) @$n=($x=='0'?'':$x).($units[($l-1)%$ul]); 
	        else @$n=is_numeric($xs[0][0])?$x:''; 
	        array_unshift($xs,$n); 
	    }
	    return $xs; 
	}
	public function share()
	{
		$userid = $this->session->userdata('userid');
		if($userid)
		{
			$data = $this->richest_model->share($userid);
			$data['my_userid'] = $userid;
			// echo $data['sale'];exit;
			$data['sale_check'] = $this->cny($data['sale']*1000000);
		}else
		{
			$userid = $this->uri->segment(3);
			$data = $this->richest_model->share($userid);
			$data['sale_check'] = $this->cny($data['sale']*1000000);
			$data['my_userid'] = 0;
		}
		$this->load->view('share',$data);	
	}
}
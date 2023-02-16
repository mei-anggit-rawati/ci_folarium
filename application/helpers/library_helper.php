<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function post($name,$security=TRUE){
	$CI =& get_instance();
	return $CI->input->post($name,$security);
}
function get($name,$security=TRUE){
	$CI =& get_instance();
	return $CI->input->get($name,$security);
}
function sess_set($session){
	$CI =& get_instance();
	return $CI->session->set_userdata($session);
}
function sess_get($key){
	$CI =& get_instance();
	return $CI->session->userdata($key);
}
function db_input($tb, $input){
	$CI =& get_instance();
	$CI->db->insert($tb,$input);
	return $CI->db->insert_id();
}
function db_get($tb){
	$CI =& get_instance();
	return $CI->db->get($tb);
}
function db_update($tb, $where, $update){
	$CI =& get_instance();
	return $CI->db->where($where)->update($tb,$update);
}
function db_where($tb, $where){
	$CI =& get_instance();
	return $CI->db->get_where($tb,$where);
}
function getNotif() {
	$CI =& get_instance();
	$where['tbl_user.tipe !='] = "ADMIN";
	$where['tbl_jadwal.flag'] = 0;
	$where['tbl_jadwal.status_rapat'] = "MENUNGGU";
	$stmt = $CI->db->join('tbl_user','tbl_user.id_user = tbl_jadwal.id_user')
		->get_where('tbl_jadwal',$where);
	if ($stmt->num_rows() > 0) {
		return '<span class="right badge badge-warning">'.$stmt->num_rows().'</span>';
	}
	return '';
}
function getBulan() {
	return array(1=>"Januari",2=>"Februari",3=>"Maret",4=>"April",5=>"Mei",6=>"Juni",7=>"Juli",8=>"Agustus",
		9=>"September",10=>"Oktober",11=>"November",12=>"Desember");
}
function getBulanNama($int) {
	$bulan = array("Semua Bulan", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
	return $bulan[$int];
}
function setRp($str) {
	return str_replace(",",".",number_format($str));
}
function changeRp($str) {
	return str_replace(".","",$str);
}
function setTglSurat($cdate=null) {
	if (empty($cdate) || $cdate == "0000-00-00") {
		return "";
	} else {
		$bulan = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
		$wkt_indo = strtotime($cdate);
		return date("j", $wkt_indo) . " " . $bulan[date("n", $wkt_indo)] . " " . date("Y", $wkt_indo);
	}
}
function setResponseJson($status,$data="",$message=""){
	$response = array('status'=>$status,'data'=>$data,'message'=>$message);
	$CI =& get_instance();
	$CI->output
		->set_status_header(200)
		->set_content_type('application/json', 'utf-8')
		->set_output(json_encode($response, JSON_PRETTY_PRINT))
		->_display();
	exit;
}
function setJSON($response)
{
	$CI =& get_instance();
	$CI->output
		->set_status_header(200)
		->set_content_type('application/json', 'utf-8')
		->set_output(json_encode($response, JSON_PRETTY_PRINT))
		->_display();
	exit;
}

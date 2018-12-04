<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class sendMail  extends CI_Model {

	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	function sendphpmail($to , $from, $subject , $data)
	{
		// To send HTML mail, the Content-type header must be set
		$headers[] = 'MIME-Version: 1.0';
		$headers[] = 'Content-type: text/html; charset=iso-8859-1';
	
		$body = $this->load->view('email_templates/halsblue', $data, true);
	//	echo $body;
		// Mail it
		return mail($to, $subject, $body, implode("\r\n", $headers));
	}

	function sendSMTP($to , $from, $subject , $message)
	{
		$this->load->library('email');
		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'mail.techieweb.in';
		$config['smtp_user'] = 'noreply@techieweb.in';
		$config['smtp_pass'] = 'Techieweb@123';
		$config['smtp_port'] = '25';
		$config['smtp_timeout'] = '10';
		$config['mailtype'] = 'html';
		$this->email->initialize($config);
		$this->email->from($from, 'techieweb.in');
		$this->email->to($to);
		$this->email->subject($subject);
		$message = sendMail::emailformat($message);
		$this->email->message('	<p>'.$message.'</p>');
		$resultval = $this->email->send();
		return $resultval;
		echo $this->email->print_debugger();
	}
	function emailformat($subject, $message, $email='techiewebsolutions@gmail.com')
	{
		$ci = get_instance();
		$ci->load->library('email');
		$config['protocol'] = "smtp";
		$config['smtp_host'] = "ssl://smtp.gmail.com";
		$config['smtp_port'] = "465";
		$config['smtp_user'] = "techiewebindia@gmail.com"; 
		$config['smtp_pass'] = "Techieweb@123";
		$config['charset'] = "utf-8";
		$config['mailtype'] = "html";
		$config['newline'] = "\r\n";
		$ci->email->initialize($config);
		$ci->email->from('techiewebsolutions@gmail.com', 'Techieweb');
		//$list = array('hr@techieweb.in', 'techiewebsolutions@gmail.com');
		$ci->email->to($email);
		$this->email->reply_to('info@techieweb.in', 'Techieweb');
		$ci->email->subject($subject);
		$msg = $this->emailtemplate($subject ,$message);
		//echo $msg;
		$ci->email->message($msg);
		$res = $ci->email->send();
		return $res;
	}
	
	function sendsms2($mobile, $text)
	{		
$url = "SMSURL here";
	    // is cURL installed yet?
    if (!function_exists('curl_init')){
        die('Sorry cURL is not installed!');
    }
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
	curl_setopt($ch, CURLOPT_TIMEOUT, 10);
	$httpCode = curl_getinfo($ch , CURLINFO_HTTP_CODE); // this results 0 every time
	$response = curl_exec($ch);
	if ($response === false) $response = curl_error($ch);
	//echo stripslashes($response);
	curl_close($ch);
	$ar = json_decode($response);
	return $ar->status;
		   
	}
	
	
}
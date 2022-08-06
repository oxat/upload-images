<?php
namespace Functions;

use Vendor\View;
use Vendor\Database;
use Classes\Page;
use Classes\Admin;
use Vendor\Header;
use Vendor\Validator;

class Home {
	
	protected $page;
	protected $user;
	
	public function __construct() {
		$this->page = new Page();    
		$this->user = new Admin();
		$this->sql = new Database();
	}
	
	public function index() {
		$submit		= (string) 	 \App::post('submit');
		$message	= ['success' => null, 'text' => null, 'error' => null, 'ref' => null];
		
		if(isset($submit)) {
			$image = $_FILES['file']['name'];

			$temp_name = $_FILES["file"]["tmp_name"];

			$file_ext=strtolower(end(explode('.',$_FILES['file']['name'])));
			$file_size =$_FILES['file']['size'];
			$expensions= array("jpeg","jpg","png","gif");
			if($submit){
				if($file_size > 10097152){
					$message['error'] = 'Extension not allowed, please choose a JPEG or PNG file.';
				}elseif(in_array($file_ext,$expensions)== false){
					$message['error'] = 'File size must be excately 10 MB';
				}else{
					$random = substr(md5(mt_rand()), 0, 10);
					$Delete = substr(md5(mt_rand()), 0, 22);
					$encode = $random . '.' . $file_ext;
					move_uploaded_file($temp_name,$_SERVER['DOCUMENT_ROOT']."/"."Upload/".$encode);
					$this->page->InsertData('pages', 
					[
						'id'		=> Null,
						'name'		=> $encode,
						'slug'		=> $random,
						'del_code'	=> $Delete,
						'ip'		=> $this->user->ipAddr()
					]);
					$message['success'] = 'Your file upload successfully.';
				}
			}
		}
		
		
		$getPage = View::get('home', [
			'code'		=> $random,
			'message'	=> $message
		]);
		
		return View::render('layout/main', [
				'title'			=> 'Home', 
				'page'			=> $this->page,
				'user'			=> $this->user,
				'html'			=> $getPage,
				'breadcrumb'	=> ['', ''],
		]);
	}
}

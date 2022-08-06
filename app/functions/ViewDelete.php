<?php
namespace Functions;

use Vendor\View;
use Classes\Page;
use Classes\Admin;
use Vendor\Header;
use Vendor\Database;

class ViewDelete {
    /**
     * Cache var
     */
    protected $page;
    /**
     * Cache var
     */
    protected $user;
	protected $sql;

    /**
     * Constructor
     * 
     * @param string $slug [Slug URL]
     * @return void
     */
    public function __construct(string $slug) {
        $this->page = new Page(); 
        $this->user = new Admin();
		$this->sql = new Database;

        $page = $this->page->getBySlug(strip_tags($slug));
        if (empty($page)) {
            return Header::location('/error404');
        }
		
		$Test		= (string) 	 \App::Get('code');
		$message	= ['true' => null, 'text' => null, 'error' => null, 'ref' => null];

		$breadcrumb = explode('/', \App::getUrl());
		
		$img = $this->sql->fetch_array("SELECT * FROM `pages` WHERE `id`=" . intval($page[0]['id']));
		
		if($page[0]['del_code'] == $Test){
			if($page[0]['ip'] == $this->user->ipAddr()){
				$this->user->ImgDel($page[0]['id']);
				unlink($_SERVER['DOCUMENT_ROOT'].'/'.'Upload/'.$page[0]['name']);
				$message['true'] = 'Img Delete';
			}else{
				$message['error'] = 'Error';
			}
		}else{
			$message['error'] = 'Cod invalid! Errorrr!';
		}
		
		$getPage = View::get('home', [
			'slug' => $page[0]['slug'],
			'data' => $page[0]['data'],
			'page' => $page[0]['name'],
			'message'	=> $message
		]);
        
        return View::render('layout/main', [
            'page'       => $this->page,
            'user'       => $this->user,
            'title'      => $page[0]['slug'],
            'html'       => $getPage,
            'breadcrumb' => $breadcrumb,
        ]);
    }
}

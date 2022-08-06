<?php
namespace Functions;

use Vendor\View;
use Classes\Page;
use Classes\Admin;
use Vendor\Header;

class ViewReport {
    /**
     * Cache var
     */
    protected $page;
    /**
     * Cache var
     */
    protected $user;

    /**
     * Constructor
     * 
     * @param string $slug [Slug URL]
     * @return void
     */
    public function __construct(string $slug) {
        $this->page = new Page(); 
        $this->user = new Admin();

        $page = $this->page->getBySlug(strip_tags($slug));
        if (empty($page)) {
            return Header::location('/error404');
        }
		
		$submit		= (string) 	 \App::post('submit');
		$email		= (string) 	 \App::post('email');
		$topic		= (string) 	 \App::post('topic');
		$message	= ['success' => null, 'text' => null, 'error' => null, 'ref' => null];

		$breadcrumb = explode('/', \App::getUrl());
		
		if(isset($submit)) {
			if($submit){
				$this->page->InsertData('report', 
						[
							'id'   		  => Null,
							'email'		  => $email,
							'topic' 	  => $topic,
							'images' 	  => $page[0]['slug']
						]);
				$message['success'] = 'The report was sent waiting for verification!';
			}
		}
		
		$getPage = View::get('report', [
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

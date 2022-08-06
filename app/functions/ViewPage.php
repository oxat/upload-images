<?php
namespace Functions;

use Vendor\View;
use Classes\Page;
use Classes\Admin;
use Vendor\Header;

class ViewPage {
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
        
        $breadcrumb = explode('/', \App::getUrl());
        $getPage = View::get('view', [
			'slug'		=> $page[0]['slug'],
			'data'		=> $page[0]['data'],
			'cod_del'	=> $page[0]['del_code'],
			'page'		=> $page[0]['name'],
			'ip_post'	=> $page[0]['ip'],
			'ip_addres'	=> $this->user->ipAddr()
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

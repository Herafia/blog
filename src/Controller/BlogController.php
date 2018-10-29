<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
	{
	/**
	 * @param string $slug
	 * @return \Symfony\Component\HttpFoundation\Response
	 ** @Route("/blog/{slug}", requirements={"slug"="[a-z0-9\-]+"}, name="Blog_show")
	 */
  
	public function show($slug = "Article sans titre")
	{
		$slug = str_replace("-", " ", $slug);
		$slug = ucwords($slug);
		return $this->render('blog/index.html.twig', ['slug' => $slug]);
	}
}



<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FirstContController extends AbstractController
{
    #[Route("/hello", name: 'first')]
    public function getHelloController(): Response
    {
        return new Response('Hello World');
    }

    #[Route('/hello/cont', name: 'app_first_cont')]
    public function index(): Response
    {
        return $this->render('hello/index.html.twig', [
            'controller_name' => 'FirstContController',
        ]);
    }

    #[Route('/1cinfo2', name: 'app_first_cont')]
    public function firstRednder()
    {
        return $this->render('firstfiletwig/1cinfo2.html.twig');
    }

    #[Route('/1cinfo2/{slug}', name: 'app_first_with_slug')]
    public function firstRednderWithSlug($slug)
    {
        return $this->render('firstfiletwig/1cinfo2.html.twig', [
            'slug' => $slug,
        ]);
    }

    #[Route('/hello/{name}', name: 'app_hello_name')]
    public function hello($name): Response
    {
        return new Response('Hello ' . $name);
    }

    #[Route('/hello/{name}/{color}', name: 'app_hello_name_color')]
    public function helloColor($name, $color): Response
    {
        return new Response('Hello ' . $name . ' ' . $color);
    }

    // fetch Authors array of authors 
    #[Route('/authors/{name}', name: 'app_authors')]
    public function getAuthors($name)
    {
        $authors = array(
            array('id' => 1, 'name' => 'Zied'),
            array('id' => 2, 'age' => 40),
            array('id' => 3, 'name' => 'Monta'),
            array('id' => 4, 'name' => 'Salah', 'age' => 60),
        );
        return $this->render('authors/index.html.twig', [
            'authors' => $authors,
            'name' => $name,
        ]);
    }
}

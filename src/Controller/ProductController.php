<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    #[Route('/product/', name: 'app_product')]
    public function index(): Response
    {
        return $this->render('product/index.html.twig', [
            'controller_name' => 'ProductController',
        ]);
    }

    #[Route("/product/products", name: "products")]
    public function fetchProducts(ProductRepository $productRepository): Response
    {
        $products = $productRepository->findAll();
        return $this->render('products/index.html.twig', [
            'products' => $products,
        ]);
    }

    #[Route("/product/add", name: "add_product")]
    public function addProduct(ProductRepository $productRepository): Response
    {
        $product = new Product();
        $product->setName('Product ' . rand(1, 100));
        $product->setQuantity(rand(1, 100));
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($product);
        $entityManager->flush();
        $products = $productRepository->findAll();
        return $this->render('products/index.html.twig', [
            'products' => $products,
        ]);
    }
}

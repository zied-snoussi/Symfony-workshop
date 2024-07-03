<?php

namespace App\Controller;

use App\Entity\Product;
use App\Form\ProductFormType;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;

class ProductController extends AbstractController
{

    #[Route("/products/", name: "products")]
    public function fetchProducts(ProductRepository $productRepository): Response
    {
        $products = $productRepository->findAll();
        return $this->render('products/index.html.twig', [
            'products' => $products,
        ]);
    }

    #[Route("/products/{id}", name: "product_detail", requirements: ["id" => "\d+"])]
    public function productDetail(Product $product): Response
    {
        return $this->render('products/productDetails.html.twig', [
            'product' => $product,
        ]);
    }

    #[Route("/products/add", name: "add_product")]
    public function addProduct(ManagerRegistry $doctrine, Request $request): Response
    {
        $product = new Product();
        $form = $this->createForm(ProductFormType::class, $product);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $doctrine->getManager();
            $entityManager->persist($product);
            $entityManager->flush();

            return $this->redirectToRoute('products');
        }

        return $this->render('products/addProduct.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route("/products/update/{id}", name: "edit_product", requirements: ["id" => "\d+"])]
    public function editProduct(ManagerRegistry $doctrine, Request $request, Product $product): Response
    {
        $form = $this->createForm(ProductFormType::class, $product);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $doctrine->getManager();
            $entityManager->flush();

            return $this->redirectToRoute('products');
        }

        return $this->render('products/updateProduct.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route("/products/delete/{id}", name: "delete_product", requirements: ["id" => "\d+"])]
    public function deleteProduct(ManagerRegistry $doctrine, Product $product): Response
    {
        $entityManager = $doctrine->getManager();
        $entityManager->remove($product);
        $entityManager->flush();

        $this->addFlash('success', 'Product deleted successfully.');

        return $this->redirectToRoute('products');
    }
}

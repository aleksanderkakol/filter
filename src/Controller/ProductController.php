<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Product;
use App\Entity\Category;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class ProductController extends AbstractController
{
    /**
     * @Route("/", name="product_list")
     * Method({"GET"})
     */
    public function index()
    {
        $products = $this->getDoctrine()->getRepository(Product::class)->findAll();
        return $this->render('products/index.html.twig', array(
            'products' => $products
        ));
    }


    /**
     * @Route("/filter", name="filter_list")
     * Method({"GET"})
     */
    public function filter()
    {
        $category = $this->getDoctrine()->getRepository(Category::class)->filter();
        $ids = [];
        foreach($category as $item) {
            array_push($ids, $item['id_produktu']);
        }
        $ids = join(",", $ids);
        $products = $this->getDoctrine()->getRepository(Product::class)->filtered($ids);
        return $this->render('products/filter.html.twig', array(
            'products' => $products
        ));
    }
}

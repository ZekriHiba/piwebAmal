<?php

namespace ShopBundle\Controller;

use ShopBundle\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ProductController extends Controller
{
    public function ShowProductAction()
    {
        $em=$this->getDoctrine()->getRepository(Product::class);
        $products=$em->findAll();

        return $this->render('ShopBundle:Product:show_product.html.twig', array(
            'products'=>$products,'rating', RatingType::class, [

                'stars' => 4,

            ]
        ));

    }

    public function ShowSingleProductAction($id)
    {

        $em=$this->getDoctrine()->getRepository(Product::class);
        $product=$em->find($id);
        return $this->render('ShopBundle:Product:show_single_product.html.twig', array(
            'product'=>$product,'rating', RatingType::class, [

                'stars' => 4,

            ]
        ));

    }
    public function AddProductAction(Request $request)
    {
        $product=new Product();
        $product->setDescription($request->request->get('description'));
        $product->setName($request->request->get('nom'));
        $product->setPrice($request->request->get('prix'));
        $product->setQuantity($request->request->get('quantite'));
        $product->setType($request->request->get('type'));
        $product->setImage($request->request->get('image'));

        if(isset($_POST['save']))
        {
            $em=$this->getDoctrine()->getManager();
            $em->persist($product);
            $em->flush();
            return $this->redirectToRoute('_show_stock');
        }
        return $this->render('ShopBundle:Product:add_product.html.twig', array(
            // ...
        ));
    }

    public function ShowStockAction()
    {
        $em=$this->getDoctrine()->getRepository(Product::class);
        $products=$em->findAll();

        return $this->render('ShopBundle:Product:show_stock.html.twig', array(
          'products'=>$products
        ));
    }

    public function DeleteProductAction($id)
    {
        $em=$this->getDoctrine()->getManager();
        $product=$em->getRepository(Product::class)->find($id);

        $em->remove($product);
        $em->flush();

        return $this->redirectToRoute('_show_stock');
    }

    public function UpdateProductAction()
    {
        return $this->render('ShopBundle:Product:update_product.html.twig', array(
            // ...
        ));
    }

}

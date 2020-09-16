<?php
namespace App\Controller; 

use Symfony\component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HelloController extends AbstractController{
    /**
     * @Route("/hello/world")
     */
    public function hello(){
        $date=date("d/m/Y H:i:s");
        //return new Response ("Hello World");
        return $this->render('hello/index.html.twig', [
            'date' => $date,]
        );
    }

}
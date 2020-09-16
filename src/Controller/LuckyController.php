<?php
namespace App\Controller;

use Symfony\component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LuckyController extends AbstractController
{
    /**
 * @route("/lucky/number")
 */
    public function number() :Response
    {
        $number = random_int(0,100);
        
        return $this->render('lucky/index.html.twig', [
            'number' => $number,
        ]
        );
      
    }
}
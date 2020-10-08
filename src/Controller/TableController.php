<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Form\TableChoiceType;
use App\Entity\Table;


class TableController extends AbstractController
{
    /**
     * @Route("/table", name="table")
     */
    public function index()
    {
        return $this->render('table/index.html.twig', [
            'controller_name' => 'TableController',
        ]);
    }
    /**
     * @Route("table/print", name="table_print")
     */
    public function print(Request $request)
    {

       
         $n = $request->get('n'); 
        dump($request);
        $table = new Table($n);
        $method = $request->getMethod();
        if ($method=='POST')
        {
        $table_choice = $request->get('table_choice');
        $n = $table_choice['table_number'];
        $compteur = $table_choice['compteur'];
        
        }
        else 
        {
            $n = $request->get('n');
            $compteur = $request->get('compteur');
        }    
        return $this->render('table/print.html.twig', [
            'n'     =>$n,   
           // 'min'   => $table->GetMin(),
           // 'max'   => $table->GetMax(),
            'values'=>$table->calcTable(),
            'compteur'=>$compteur,
            'method' => $request->getMethod(),
            ]);
    }

    /**
     * @Route("table/select", name="select")
     */
    public function select(Request $request)
    {
       
        $form=$this->createForm(TableChoiceType::class);
        $form->handleRequest($request);

            dump($request->getMethod());

        if ($form->isSubmitted()){
            $data = $form->getData();
            $ret['n'] = $data['table_number'];
            $ret['compteur'] =$data['compteur'];
            $response = $this->redirectToRoute('table_print',$ret);

        }

        else{
        $response = $this->render('table/select.html.twig' , [
            'formulaire' => $form->createView(),
        ]);
         }
         return $response;
 ;
    }
     /**
     * @Route("table/select2", name="select2")
     */
    public function select2(Request $request)
    {
       
        $form=$this->createForm(TableChoiceType::class,null,
        [
            'method'=> 'POST',
            'action'=> '/table/print'
        ]);

        $form->handleRequest($request);

        dump($request->getMethod());

        if ($form->isSubmitted()){
            $data = $form->getData();
            $ret['n'] = $data['table_number'];
            $ret['compteur'] =$data['compteur'];
            $response = $this->redirectToRoute('table_print',$ret);

        }

        else{
        $response = $this->render('table/select.html.twig' , [
            'formulaire' => $form->createView(),
        ]);
         }
         return $response;
 ;
    }
   
}

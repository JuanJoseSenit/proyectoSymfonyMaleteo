<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class SeriesController extends AbstractController

{
    /**
     * @Route("/createSerie", name="createSerie")
     */
    public function getSerie(Request $request){

        $titulo=$request->get('titulo');
        $descripcion=$request->get('description');
        $categoria=$request->get('categoria');


        return $this->render("/series.twig",
        ['title'=>$titulo,
        'description'=>$descripcion,
        'category'=>$categoria
        ]);
    }

}
<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


class FormularioController extends AbstractController{

    /**
     * @Route("/miformulario")
     */
    public function miformulario(Request $request)
    {
        $entrada=$request->get("datos");




        return $this->render("ejercicioGrupos/formulario.twig");
    }


}
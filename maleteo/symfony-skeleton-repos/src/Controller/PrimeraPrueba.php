<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class PrimeraPrueba extends AbstractController{
    
    /**
     * @Route("/Usuario")
     */
    public function homepage()
    {
        return $this->render("PrimeraPrueba/homepage.html.twig",
        [
            'nombre'=>'juanjo'

        ]
        );
    }

    /**
     * @Route("/Formulario")
     */
    public function formulario()
    {
        return $this->render("PrimeraPrueba/formulario.twig");
    }
    /**
     * @Route("/Yo")
    */
    public function descripcion()
    {
        return $this->render("PrimeraPrueba/descripcion.html.twig");
    }


}
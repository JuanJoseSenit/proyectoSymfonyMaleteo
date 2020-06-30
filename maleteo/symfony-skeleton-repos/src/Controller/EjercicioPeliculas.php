<?php



namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class EjercicioPeliculas extends AbstractController{
    /**
     * @Route("/")
     */
    function conexion(){
        return $this->render("pelis/ejercicioPeliculas.html.php"); 
    }
}
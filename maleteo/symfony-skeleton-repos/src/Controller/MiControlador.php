<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;   //sirve para incorporar el route que es para poner luego en el localhost esa ruta
                                                  //y que haga lo que se le diga . Escribir use  Route y escoger éste
use Symfony\Component\HttpFoundation\Response;    // hay que incorporar la Response buena que es esta

class MiControlador extends AbstractController{
    
    /**
     * @Route("espar/{numero}")
     */
    public function comprobadorDePares($numero)
    {
        return $this->render("base.html.twig");  //para usar el metodo render devuelve un objeto Response. Podemos usarlo porque hemos puesto
                                             //una extension abstract controller. No hay que especificarle la carpeta templates de twigs
        
        
         /*if($numero%2===0){
            return new Response("El numero $numero es par");    //La respuesta de la funcion tiene que ser un objeto Response
        
            
        }                                   
        else{
            return new Response("El número $numero es impar");
        }*/
        


    }


}
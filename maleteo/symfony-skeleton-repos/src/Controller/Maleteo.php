<?php

namespace App\Controller;

use App\Entity\MaleteoForm;
use App\Entity\OpinionesForm;
use App\Entity\Registro;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class Maleteo extends AbstractController
{ 
    /**
     * @Route("/formulario")
     */
    public function getFormulario(EntityManagerInterface $em){
        $repo = $em->getRepository(MaleteoForm::class);

        $datos = $repo->findAll();

        return $this->render('/maleteo/showMaleteo.html.twig',
            ['datos' => $datos]);
    }  
    /**
     * @Route ("/maleteo" , name="maleteo")
     */
    public function PagMaleteo(EntityManagerInterface $em, Request $request)
    {
        $nombre=$request->get("nombre");
        $email=$request->get("email");
        $ciudad=$request->get("seleccion");
        $privacidad=$request->get("checkbox");

        /*$repositorio = $em->getRepository(MaleteoForm::class);
        $usuario=$repositorio->find(1);
        $tipo=gettype($usuario);*/

        $consulta=$em->createQuery(
            'select m.email from App\Entity\MaleteoForm m'  //forma desde doctrine de hacer una consulta
                                                            //m sería la clase MaleteoForm. Accedes a sus
                                                            //atributos con m.
            
        );
        $resultado=$consulta->getResult();
        
        $comprobacion=true;
        for($i=0;$i<count($resultado);$i++){
            if($email===$resultado[$i]['email']){  //ni -> ni . para acceder a la propiedad del objeto
                $comprobacion=false;
            }

        }
       

        if($nombre && $email && $privacidad && $comprobacion){
            $maleteo=new MaleteoForm();
            $maleteo->setNombre($nombre);
            $maleteo->setCiudad($ciudad);
            $maleteo->setEmail($email);
            $maleteo->setPrivacidad($privacidad);
            
            $em->persist($maleteo);
            $em->flush();
            return $this->redirectToRoute("confirmacion");

        }
        if($comprobacion===false){
            return $this->redirectToRoute("rechazo");
        }

        $repo=$em->getRepository(OpinionesForm::class);
        $datos=$repo->findAll();
        
        $claves=array_rand($datos,3);
        $array=[];
        
        array_push($array, $datos[$claves[0]], $datos[$claves[1]], $datos[$claves[2]]);


        return $this->render('maleteo/maleteo.html.twig',
            ['datos'=>$array]);
    }
    /**
     * @Route ("/privacidad" , name="privacidad")
     */
    public function PoliPrivacidad()
    {
        return $this->render('/maleteo/privacidad.html.twig');
    }
    /**
     * @Route ("/opinion" , name="opinion")
     */
    public function opinion(EntityManagerInterface $em, Request $request)
    {
        $opinion=$request->get("opinion");
        $nombre=$request->get("nombreOpinion");
        $localizacion=$request->get("localizacion");
        

        if($opinion && $nombre && $localizacion){
            $opiniones=new OpinionesForm();
            $opiniones->setComentario($opinion);
            $opiniones->setNombre($nombre);
            $opiniones->setLocalizacion($localizacion);
            

            $em->persist($opiniones);
            $em->flush();
         
            return $this->redirectToRoute("maleteo");
        }
       
        return $this->render('maleteo/opinion.html.twig');
    }

    /**
     * @Route ("/confirmacion" , name="confirmacion")
     */
    public function confirmacion()
    {
        return $this->render('/maleteo/confirmacion.html.twig');
    }
    /**
     * @Route ("/rechazo" , name="rechazo")
     */
    public function rechazo()
    {
        return $this->render('/maleteo/rechazado.html.twig');
    }

    /**
     * @Route ("/login" , name="login")
     */
    public function login(EntityManagerInterface $em, Request $request)
    {
        $nombre=$request->get('nombreUsuario');
        $password=$request->get('passwordUsuario');
        $consulta=$em->createQuery(
            'select r.nombreUsuario, r.password from App\Entity\Registro r'  //forma desde doctrine de hacer una consulta
                                                            //m sería la clase MaleteoForm. Accedes a sus
                                                            //atributos con m.
            
        );
        $resultado=$consulta->getResult();
        $comprobacion=false;
        $mensaje="";
        for($i=0;$i<count($resultado);$i++){
            if($nombre===$resultado[$i]['nombreUsuario'] && $password===$resultado[$i]['password']){  //ni -> ni . para acceder a la propiedad del objeto
                $comprobacion=true;
                
                break;
            }

        }
        if($comprobacion){
            return $this->redirectToRoute("maleteo");
        }
        
        if($nombre &&  $password && $comprobacion===false){
            $mensaje="Datos erróneos. Por favor, vuelva a intentarlo."; 

        }



        return $this->render('/maleteo/login.html.twig',
                            ['mensaje'=>$mensaje]);
    }

    /** 
     * @Route ("/registro" , name="registro")
     */
    public function registro(EntityManagerInterface $em, Request $request)
    {
        $usuario=$request->get("nombreRegistro");
        $password=$request->get("passwordRegistro");
        $compPasword=$request->get("passwordValidarRegistro");

        $consulta=$em->createQuery(
            'select r.nombreUsuario from App\Entity\Registro r'  //forma desde doctrine de hacer una consulta
                                                            //m sería la clase MaleteoForm. Accedes a sus
                                                            //atributos con m.
            
        );
        $resultado=$consulta->getResult();
        $comprobacion=true;
        $mensaje="";
        for($i=0;$i<count($resultado);$i++){
            if($usuario===$resultado[$i]['nombreUsuario']){  //ni -> ni . para acceder a la propiedad del objeto
                $comprobacion=false;
                $mensaje="Nombre de usuario no disponible";
                break;
            }

        }

        

        if($usuario && $password && $compPasword && $comprobacion && $compPasword===$password){
            $registro=new Registro();
            $registro->setNombreUsuario($usuario);
            $registro->setPassword($password);
            
            

            $em->persist($registro);
            $em->flush();
            return $this->redirectToRoute("login");


        }


        return $this->render('/maleteo/registro.html.twig',
                            ['mensaje'=>$mensaje]);
    }


}
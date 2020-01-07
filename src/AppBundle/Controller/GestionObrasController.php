<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use AppBundle\Entity\Obra;
use AppBundle\Form\ObraType;

class GestionObrasController extends Controller
  
{

        /**
     * @Route("nuevaObra", name="nuevaObra")
     */
    public function nuevaObraAction(Request $request)
    {

        $obra = new Obra();
        $form = $this->createForm(ObraType::class, $obra);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $obra = $form->getData();

            $obra->setFoto("");
       
            $obra->setFechaCreacion(new \DateTime());

            $em = $this->getDoctrine()->getManager();
            $em->persist($obra);
            $em->flush();
            return $this->redirectToRoute('obra', array('id' => $obra->getId()));
        }

        return $this->render('gestionObras/nuevaObra.html.twig', array('form' => $form->createView()));
    }

}
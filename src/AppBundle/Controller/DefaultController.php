<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\Obra;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function homeAction(Request $request)
    {
        $ObraRepository = $this->getDoctrine()->getRepository(Obra::class);
        $Obra = $ObraRepository->findByTop(1);

        return $this->render('frontal/index.html.twig', array('Obra'=>$Obra));
    }



     /**
     * @Route("/nosotros", name="nosotros")
     */
    public function nosotrosAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('frontal/nosotros.html.twig');
    }

        /**
     * @Route("/obras{pagina}", name="obras")
     */
    public function obrasAction(Request $request, $pagina=1)

    {
        $numObras=8;
        $ObrasRepository = $this->getDoctrine()->getRepository(Obra::class);
        // $Obra = $ObraRepository->findAll();

        $query = $ObrasRepository->createQueryBuilder('t')
        ->where('t.top = 0')
        ->setFirstResult($numObras*($pagina-1))
        ->setMaxResults($numObras)
        ->getQuery();  

        $Obra = $query->getResult();   

            return $this->render('frontal/obras.html.twig', array('obras'=>$Obra));
        
        
        
    }


    /**
     * @Route("/obra{id}", name="obra")
     */
    public function obraAction(Request $request, $id=null)
    {
        if ($id!=null) {
            $obraRepository = $this->getDoctrine()->getRepository(Obra::class);
            $Obra = $obraRepository->find($id);
        }
            return $this->render('frontal/obra.html.twig', array("obra"=>$Obra));

        
    }

      /**
     * @Route("/revista", name="revista")
     */
    public function revistaAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('frontal/revista.html.twig'); 
    }

    
    /**
     * @Route("/eventos", name="eventos")
     */
    public function eventosAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('frontal/eventos.html.twig'); 
    }


    /**
     * @Route("/contacto", name="contacto")
     */
    public function contactoAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('frontal/contacto.html.twig'); 
    }

    //     /**
    //  * @Route("/obra/{id}", name="obradetail")
    //  */
    // public function obraDetailAction(Request $request, $id=null)
    // {
    //     if($id!=null){
    //         $obraRepository = $this->getDoctrine()->getRepository(Obra::class);
    //         $Obra = $obraRepository->find($id);
    //         return $this->render('frontal/obradetail.html.twig', array("obra"=>$Obra)); 

    //     }else{
    //         return $this->redirectToRoute('frontal/obradetail.html.twig');
    //     }
    //     // replace this example code with whatever you need
       
    // }

     /**
     * @Route("/cvoliver", name="cvoliver")
     */
    public function cvOliverAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('frontal/cvoliver.html.twig');
    }

         /**
     * @Route("/cvemilio", name="cvemilio")
     */
    public function cvEmilioAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('frontal/cvemilio.html.twig');
    }

    
         /**
     * @Route("/cvnuria", name="cvnuria")
     */
    public function cvNuriaAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('frontal/cvnuria.html.twig');
    }

     /**
     * @Route("/trabajaform", name="trabajaform")
     */
    public function trabajaFormAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('frontal/trabajaform.html.twig');
    }

}
 
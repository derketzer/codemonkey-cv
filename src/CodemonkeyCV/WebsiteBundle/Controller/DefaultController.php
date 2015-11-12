<?php

namespace CodemonkeyCV\WebsiteBundle\Controller;

use CodemonkeyCV\WebsiteBundle\Entity\Contacto;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $contacto = new Contacto();
        $form = $this->createFormBuilder($contacto)
                     ->setAction($this->generateUrl('codemonkey_cv_website_contacto'))
                     ->setMethod('POST')
                     ->add('enviar', 'submit', array('label' => $this->get('translator')->trans('katanastudios.title.enviar'), 'attr'=> array('class'=>'submit-button')))
                     ->add('Nombre', null, array('attr' => array('maxlength' => 255, 'class'=>'name', 'placeholder'=>$this->get('translator')->trans('katanastudios.title.nombre'), 'required'=>'required')))
                     ->add('Mail', null, array('attr' => array('maxlength' => 255, 'class'=>'email', 'placeholder'=>'Email', 'required'=>'required')))
                     ->add('Asunto', null, array('attr' => array('maxlength' => 255, 'class'=>'subject', 'placeholder'=>$this->get('translator')->trans('katanastudios.title.asunto'), 'required'=>'required')))
                     ->add('Mensaje', 'textarea', array('attr' => array('rows' => 20, 'cols' => 20, 'class'=>'message', 'placeholder'=>$this->get('translator')->trans('katanastudios.title.mensaje'), 'required'=>'required')))
                     ->getForm();

        return $this->render('CodemonkeyCVWebsiteBundle:Default:index.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function contactoAction(Request $request)
    {
        $respuesta = Array();
        $respuesta['error'] = "";

        echo json_encode($respuesta);

        return new Response();
    }
}
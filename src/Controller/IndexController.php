<?php

namespace App\Controller;

use App\Entity\Contact;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

class IndexController extends AbstractController
{
    /**
     * @Route("/{_locale}", requirements={"_locale" = "es|en|de"}, defaults={"_locale"="es"})
     * @param TranslatorInterface $translator
     * @param Request $request
     * @return Response
     */
    public function index(TranslatorInterface $translator, Request $request)
    {
        $contact = new Contact();
        $form = $this->createFormBuilder($contact)
                ->setMethod('POST')
                ->add('send', SubmitType::class, ['label' => 'katanastudios.title.enviar', 'attr'=> ['class'=>'submit-button']])
                ->add('name', TextType::class, ['attr' => ['maxlength' => 255, 'class'=>'name', 'placeholder'=>'katanastudios.title.nombre', 'required'=>'required']])
                ->add('email', TextType::class, ['attr' => ['maxlength' => 255, 'class'=>'email', 'placeholder'=>'katanastudios.title.email', 'required'=>'required']])
                ->add('subject', TextType::class, ['attr' => ['maxlength' => 255, 'class'=>'subject', 'placeholder'=>'katanastudios.title.asunto', 'required'=>'required']])
                ->add('message', TextareaType::class, ['attr' => ['rows' => 20, 'cols' => 20, 'class'=>'message', 'placeholder'=>'katanastudios.title.mensaje', 'required'=>'required']])
                ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contact = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($contact);
            $entityManager->flush();
        }

        return $this->render('index/index.html.twig', [
            'controller_name' => 'IndexController',
            'form' => $form->createView()
        ]);
    }
}

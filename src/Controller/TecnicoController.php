<?php

namespace App\Controller;

use App\Form\TecnicoType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\TbTecnicos;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TecnicoController extends AbstractController
{
    /**
     * @Route("lista/tecnicos", name="lista_tecnicos")
     */
    public function listaTecnicos() {
        $em = $this->getDoctrine()->getManager();

        $tecnicos = $em->getRepository(TbTecnicos::class)->findAll();

        return $this->render('tecnico/lista.html.twig',[
            'titulo' => 'Listagem de Técnicos',
            'tecnicos' => $tecnicos
        ]);
    }

    /**
     * @Route("cadastra/tecnico", name="cadastra_tecnico")
     *
     * @param Request $request
     * @return Response
     */
    public function cadastro(Request $request) {
        $tecnico = new TbTecnicos();

        $form = $this->createForm(TecnicoType::class, $tecnico);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($tecnico);
            $em->flush();

            $this->get('session')->getFlashBag()->set('success', 'Técnico cadastrado com sucesso');

            return $this->redirectToRoute('lista_tecnicos');
        }

        return $this->render('tecnico/cadastro.html.twig',[
            'titulo' => 'Cadastro de Técnico',
            'form' => $form->createView()
        ]);
    }
}

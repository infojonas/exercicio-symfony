<?php

namespace App\Controller;

use App\Form\ServicoType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\TbServicos;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ServicoController extends AbstractController
{
    /**
     * @Route("lista/servico", name="lista_servicos")
     */
    public function listaServicos() {
        $em = $this->getDoctrine()->getManager();

        $servicos = $em->getRepository(TbServicos::class)->findAll();

        return $this->render('servico/lista.html.twig',[
            'titulo' => 'Listagem de Serviços',
            'servicos' => $servicos
        ]);
    }

    /**
     * @Route("cadastra/servico", name="cadastra_servico")
     *
     * @param Request $request
     * @return Response
     */
    public function cadastro(Request $request) {
        $servico = new TbServicos();

        $form = $this->createForm(ServicoType::class, $servico);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($servico);
            $em->flush();

            $this->get('session')->getFlashBag()->set('success', 'Serviço cadastrado com sucesso');

            return $this->redirectToRoute('lista_servicos');
        }

        return $this->render('servico/cadastro.html.twig',[
            'titulo' => 'Cadastro de Serviço',
            'form' => $form->createView()
        ]);
    }
}

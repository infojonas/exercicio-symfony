<?php

namespace App\Controller;

use App\Form\ServicoType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\TbServicos;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
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

    /**
     * @Route("edita/servico/{id}", name="edita_servico")
     *
     * @param Request $request
     * @param $id
     * @return Response
     */
    public function update(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();

        $servico = $em->getRepository(TbServicos::class)->find($id);

        $form = $this->createForm(ServicoType::class, $servico);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($servico);
            $em->flush();

            $this->get('session')->getFlashBag()->set('success', 'Serviço editado com sucesso');

            return $this->redirectToRoute('lista_servicos');
        }

        return $this->render('servico/edicao.html.twig',[
            'titulo' => 'Edição de Serviços',
            'servico' => $servico,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("apaga/servico/{id}", name="apaga_servico")
     *
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    function delete(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();

        $servico = $em->getRepository(TbServicos::class)->find($id);

        if (!$servico) {
            $mensagem = 'Serviço não encontrado';
            $tipo = 'warning';
        } else {
            $em->remove($servico);
            $em->flush();

            $mensagem = 'Serviço excluído com sucesso';
            $tipo = 'success';
        }

        $this->get('session')->getFlashBag()->set($tipo, $mensagem);

        return $this->redirectToRoute('lista_servicos');
    }
}

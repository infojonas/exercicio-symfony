<?php

namespace App\Controller;

use App\Form\FerramentaType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\TbFerramentas;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;

class FerramentaController extends AbstractController
{
    /**
     * @Route("lista/ferramentas", name="lista_ferramentas")
     */
    public function listaFerramentas() {
        $em = $this->getDoctrine()->getManager();

        $ferramentas = $em->getRepository(TbFerramentas::class)->findAll();

        return $this->render('ferramenta/lista.html.twig',[
            'titulo' => 'Listagem de Ferramentas',
            'ferramentas' => $ferramentas
        ]);
    }

    /**
     * @Route("cadastra/ferramenta", name="cadastra_ferramenta")
     *
     * @param Request $request
     * @return Response
     */
    public function cadastro(Request $request) {
        $ferramenta = new TbFerramentas();

        $form = $this->createForm(FerramentaType::class, $ferramenta);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($ferramenta);
            $em->flush();

            $this->get('session')->getFlashBag()->set('success', 'Ferramenta cadastrada com sucesso');

            return $this->redirectToRoute('lista_ferramentas');
        }

        return $this->render('ferramenta/cadastro.html.twig',[
            'titulo' => 'Cadastro de Ferramenta',
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("edita/ferramenta/{id}", name="edita_ferramenta")
     *
     * @param Request $request
     * @param $id
     * @return Response
     */
    public function update(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();

        $ferramenta = $em->getRepository(TbFerramentas::class)->find($id);

        $form = $this->createForm(FerramentaType::class, $ferramenta);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($ferramenta);
            $em->flush();

            $this->get('session')->getFlashBag()->set('success', 'Ferramenta editada com sucesso');

            return $this->redirectToRoute('lista_ferramentas');
        }

        return $this->render('ferramenta/edicao.html.twig',[
            'titulo' => 'Edição de Ferramentas',
            'ferramenta' => $ferramenta,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("apaga/ferramenta/{id}", name="apaga_ferramenta")
     *
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    function delete(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();

        $ferramenta = $em->getRepository(TbFerramentas::class)->find($id);

        if (!$ferramenta) {
            $mensagem = 'Ferramenta não encontrada';
            $tipo = 'warning';
        } else {
            $em->remove($ferramenta);
            $em->flush();

            $mensagem = 'Ferramenta excluída com sucesso';
            $tipo = 'success';
        }

        $this->get('session')->getFlashBag()->set($tipo, $mensagem);

        return $this->redirectToRoute('lista_ferramentas');
    }
}

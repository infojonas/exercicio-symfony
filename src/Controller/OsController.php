<?php

namespace App\Controller;

use App\Entity\TbFerramentas;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Form\OsType;
use App\Entity\TbOs;
use App\Entity\TbTecnicos;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OsController extends AbstractController
{
    /**
     * @Route("lista/os", name="lista_os")
     */
    public function listaOs() {
        $em = $this->getDoctrine()->getManager();

        $os = $em->getRepository(TbOs::class)->findAll();

        return $this->render('os/lista.html.twig',[
            'titulo' => 'Listagem de OS',
            'os' => $os
        ]);
    }

    /**
     * @Route("cadastra/os", name="cadastra_os")
     *
     * @param Request $request
     * @return Response
     */
    public function cadastro(Request $request) {
        $os = new TbOs();

        $form = $this->createForm(OsType::class, $os);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();

            $os->setTecnico($_POST['os']['tecnico']);
            $os->setFerramenta($_POST['os']['ferramenta']);

            $em->persist($os);
            $em->flush();

            $idInserted = $os->getId();
            $sequence = str_pad($idInserted,4,0,STR_PAD_LEFT) . date('Ydm',time());

            $osUpd = $em->getRepository(TbOs::class)->findOneBy(['id' => $idInserted]);
            $osUpd->setSequence($sequence);

            $em->persist($osUpd);
            $em->flush();

            $this->get('session')->getFlashBag()->set('success', 'OS cadastrada com sucesso');

            return $this->redirectToRoute('lista_os');
        }

        $em = $this->getDoctrine()->getManager();

        $tecnicos = $em->getRepository(TbTecnicos::class)->findAll();
        $arrayTecnicos = [];

        foreach ($tecnicos as $tec) {
            $arrayTecnicos[$tec->getId()] = $tec->getNomeCompleto();
        }

        $ferramentas = $em->getRepository(TbFerramentas::class)->findAll();
        $arrayFerramentas = [];

        foreach ($ferramentas as $ferramenta) {
            $arrayFerramentas[$ferramenta->getId()] = $ferramenta->getNomeFerramenta() . ' - ' . $ferramenta->getMarcaFerramenta();
        }

        return $this->render('os/cadastro.html.twig',[
            'titulo' => 'Cadastro de OS',
            'form' => $form->createView(),
            'tecnicos' => $arrayTecnicos,
            'ferramentas' => $arrayFerramentas
        ]);
    }
}

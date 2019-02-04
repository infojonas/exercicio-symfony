<?php

namespace App\Form;

use App\Entity\TbServicos;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ServicoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('hidraulico',ChoiceType::class, [
                'label' => 'Hidráulico',
                'choices' => [
                    'Sim' => 1,
                    'Não' => 0,
                ],
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('eletrico',ChoiceType::class, [
                'label' => 'Elétrico',
                'choices' => [
                    'Sim' => 1,
                    'Não' => 0,
                ],
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('pintura',ChoiceType::class, [
                'label' => 'Pintura',
                'choices' => [
                    'Sim' => 1,
                    'Não' => 0,
                ],
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('descricao',TextType::class, [
                'label' => 'Descrição',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('tempo_medio',TextType::class, [
                'label' => 'Tempo Médio',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('enviar',SubmitType::class, [
                'label' => 'Enviar',
                'attr' => [
                    'class' => 'btn btn-primary'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => TbServicos::class,
        ]);
    }
}

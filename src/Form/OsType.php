<?php

namespace App\Form;

use App\Controller\TecnicoController;
use App\Entity\TbOs;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\ChoiceList\Loader\CallbackChoiceLoader;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('desconto',TextType::class, [
                'label' => 'Desconto',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('valor_total',TextType::class, [
                'label' => 'Valor Total',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('data_servico',DateType::class, [
                'label' => 'Data do serviço',
                'format' => 'dd-MM-yyyy',
                'placeholder' => [
                    'day' => 'Dia', 'month' => 'Mês', 'year' => 'Ano',
                ],
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('tecnico',ChoiceType::class, [
                'label' => 'Técnico',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('ferramenta',ChoiceType::class, [
                'label' => 'Ferramenta',
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
            'data_class' => TbOs::class,
        ]);
    }
}

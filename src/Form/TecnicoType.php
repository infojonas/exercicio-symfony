<?php

namespace App\Form;

use App\Entity\TbTecnicos;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TecnicoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('cpf',TextType::class, [
                'label' => 'CPF',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('nome_completo',TextType::class, [
                'label' => 'Nome',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('dt_nasc',BirthdayType::class, [
                'label' => 'Data de nascimento',
                'format' => 'dd-MM-yyyy',
                'placeholder' => [
                    'day' => 'Dia', 'month' => 'Mês', 'year' => 'Ano',
                ],
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('valor_hora',TextType::class, [
                'label' => 'Valor por hora',
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
            'data_class' => TbTecnicos::class,
        ]);
    }
}

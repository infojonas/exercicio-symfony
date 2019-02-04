<?php

namespace App\Form;

use App\Entity\TbFerramentas;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FerramentaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nome_ferramenta',TextType::class, [
                'label' => 'Nome da ferramenta',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('marca_ferramenta',TextType::class, [
                'label' => 'Marca da ferramenta',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('aluguel_hora',TextType::class, [
                'label' => 'Aluguel por hora',
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
            'data_class' => TbFerramentas::class,
        ]);
    }
}

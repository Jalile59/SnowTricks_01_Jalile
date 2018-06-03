<?php

namespace DJ\viewBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FiguresType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('figure_Name', \Symfony\Component\Form\Extension\Core\Type\TextType::class)
                ->add('figureDescription', \Symfony\Component\Form\Extension\Core\Type\TextareaType::class)
                ->add('videofigure', \Symfony\Component\Form\Extension\Core\Type\CollectionType::class, array(
                        'entry_type'   => VideosType::class,
                        'prototype' => true,
                        'by_reference'=> false,
                        'allow_add'    => true,    
                        'label'=>'Video:',
                        'allow_delete' => true
                      ))                
                ->add('picture', \Symfony\Component\Form\Extension\Core\Type\CollectionType::class, array(
                        'entry_type'   => PicturesType::class,
                        'prototype' => true,
                        'by_reference'=> false,
                        'allow_add'    => true,    
                        'label'=>'Image acceuil:',
                        'allow_delete' => true
                      ))
                ->add('save', \Symfony\Component\Form\Extension\Core\Type\SubmitType::class)
                ;
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DJ\viewBundle\Entity\Figures'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'dj_viewbundle_figures';
    }


}

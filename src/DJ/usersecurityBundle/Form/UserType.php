<?php

namespace DJ\usersecurityBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('username', \Symfony\Component\Form\Extension\Core\Type\TextType::class)
                ->add('userphoto', \Symfony\Component\Form\Extension\Core\Type\FileType::class)
                ->add('password', \Symfony\Component\Form\Extension\Core\Type\PasswordType::class)
                ->add('mail', \Symfony\Component\Form\Extension\Core\Type\EmailType::class)
                ->add('save', \Symfony\Component\Form\Extension\Core\Type\SubmitType::class);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DJ\usersecurityBundle\Entity\User'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'dj_usersecuritybundle_user';
    }


}

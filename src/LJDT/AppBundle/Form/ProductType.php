<?php

namespace LJDT\AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ProductType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)    
    {
        $builder
            ->setAction("#")
            ->add('name', TextType::class)
            ->add('description', TextType::class)
            ->add('photo', new PhotoType())
            ->add('save', SubmitType::class, array('label' => 'Valider'))
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'LJDT\AppBundle\Entity\Product'
        ));
    }
}

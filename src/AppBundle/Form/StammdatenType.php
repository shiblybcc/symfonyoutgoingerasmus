<?php

namespace AppBundle\Form;

use Doctrine\ORM\Mapping\Entity;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StammdatenType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nachname')
                ->add('matno')
                ->add('vertif', EntityType::class, array(
                    'class' => 'AppBundle:Vertif',
                    'choice_label' => 'name',
                ))
                ->add('course', EntityType::class, array(
                    'class' => 'AppBundle:Course',
                    'choice_label' => 'name',
                ))
                ->add('stdn', EntityType::class, array(
                    'class' => 'AppBundle:Stdn',
                    'choice_label' => 'name',
                ))
                ->add('addresses', AddressType::class, array(
                    'data_class'   =>  'AppBundle:Address',
                ))
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Stammdaten'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_stammdaten';
    }


}

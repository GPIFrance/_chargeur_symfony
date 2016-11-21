<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
          ->add('category', ChoiceType::class, array(
            'choices' => array(
              'CHARGEMENT' => 'chargement',
              'LIVRAISON' => 'livraison'
            )
          ))
          ->add('name', TextType::class, array(
            'attr' => array(
              'placeholder' => 'Nom'
            )
          ))
          ->add('addressCode', TextType::class, array(
            'attr' => array(
              'placeholder' => 'Code adresse'
            )
          ))
          ->add('address1', TextType::class, array(
            'attr' => array(
              'placeholder' => 'Adresse'
            )
          ))
          ->add('address2', TextType::class, array(
            'attr' => array(
              'placeholder' => 'Extension'
            )
          ))
          ->add('address3', TextType::class, array(
            'attr' => array(
              'placeholder' => 'Extension'
            )
          ))
          ->add('address4', TextType::class, array(
            'attr' => array(
              'placeholder' => 'Extension'
            )
          ))
          ->add('address5', TextType::class, array(
            'attr' => array(
              'placeholder' => 'Extension'
            )
          ))
          ->add('zipCode', NumberType::class, array(
            'attr' => array(
              'placeholder' => 'Code postal'
            )
          ))
          ->add('city', TextType::class, array(
            'attr' => array(
              'placeholder' => 'Ville'
            )
          ))
          ->add('country', TextType::class, array(
            'attr' => array(
              'placeholder' => 'Pays'
            )
          ))
          ->add('phone', TextType::class, array(
            'attr' => array(
              'placeholder' => 'Tel'
            )
          ))
          ->add('cellphone', TextType::class, array(
            'attr' => array(
              'placeholder' => 'Port'
            )
          ))
          ->add('fax', TextType::class, array(
            'attr' => array(
              'placeholder' => 'Fax'
            )
          ))
          ->add('comment', TextareaType::class, array(
            'attr' => array(
              'placeholder' => 'Obs'
            )
          ))
          ->add('def', CheckboxType::class, array(
            'attr' => array(
              'placeholder' => 'Défaut'
            )
          ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
          'data_class' => 'AppBundle\Entity\Address'
        ));
    }

    public function getName()
    {
        return 'app_bundle_address_type';
    }
}

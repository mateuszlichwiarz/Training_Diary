<?php
    
    namespace App\Form\Type;
    
    use App\Entity\ProgramTrening;
    use Symfony\Component\OptionsResolver\OptionsResolver;
    use Symfony\Component\Form\AbstractType;
    use Symfony\Component\Form\Extension\Core\Type\TextType;
    use Symfony\Component\Form\Extension\Core\Type\SubmitType;
    use Symfony\Component\Form\Extension\Core\Type\TextareaType;
    use Symfony\Component\Form\FormBuilderInterface;

    class NewType extends AbstractType
    {
        public function buildForm(FormBuilderInterface $builder, array $options)
        {
            $builder
            ->add('name', TextType::class, array('attr' => array('class' => 'form-control')))
            ->add('exercise', TextType::class, array('atrr' => array('class' => 'form-control')))
            ->add('save', SubmitType::class, array(
                'label' => 'save',
                'attr'  => array('class' => 'btn btn-success')
                ))
            ;
        }
    }
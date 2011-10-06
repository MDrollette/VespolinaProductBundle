<?php
/**
 * (c) Vespolina Project http://www.vespolina-project.org
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
namespace Vespolina\ProductBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class IdentifierSetType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('identifiers', 'collection', array(
                'type' => new IdentifierType(),
                'allow_add' => true,
                'by_reference' => false,
            ))
            ->add('options', new OptionSetType())
        ;
    }

    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'Vespolina\ProductBundle\Document\ProductIdentifierSet',
        );
    }
    
    function getName()
    {
        return 'vespolina_product_identifier_set';
    }
}

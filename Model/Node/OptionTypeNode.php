<?php
/**
 * (c) Vespolina Project http://www.vespolina-project.org
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
namespace Vespolina\ProductBundle\Model\Node;

use Vespolina\ProductBundle\Model\ProductNode;
use Vespolina\ProductBundle\Model\Node\OptionTypeNodeInterface;

/**
 * @author Richard D Shank <develop@zestic.com>
 */
class OptionTypeNode extends ProductNode implements OptionTypeNodeInterface
{
    /*
     * @inheritdoc
     */
    public function addOption(OptionNodeInterface $option)
    {
        if (!$this->name) {
            $this->name = $option->getType();
        }
        if ($this->name != $option->getType()) {
            throw new \UnexpectedValueException(sprintf('All OptionsNodes in this type must be %s', $this->name));
        }
        $this->addChild($option, $option->getValue());
    }

    /**
     * @inheritdoc
     */
    public function clearOptions()
    {
        $this->clearChildren();
    }

    /**
     * @inheritdoc
     */
    public function getOption($value)
    {
        return $this->getChild($value);
    }

    /**
     * @inheritdoc
     */
    public function getOptions()
    {
        return $this->getChildren();
    }

    /**
     * @inheritdoc
     */
    public function setOptions($options)
    {
        $this->setChildren($options);
    }

    /**
     * @inheritdoc
     */
    public function removeOption(OptionNodeInterface $option)
    {
        $this->removeChild($option->getName());
    }
}

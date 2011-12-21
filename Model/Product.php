<?php
/**
 * (c) Vespolina Project http://www.vespolina-project.org
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Vespolina\ProductBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use Vespolina\ProductBundle\Model\Feature\FeatureInterface;
use Vespolina\ProductBundle\Model\Identifier\IdentifierInterface;
use Vespolina\ProductBundle\Model\Identifier\ProductIdentifierSetInterface;
use Vespolina\ProductBundle\Model\Option\OptionInterface;
use Vespolina\ProductBundle\Model\Option\OptionGroupInterface;

/**
 * @author Richard D Shank <develop@zestic.com>
 * @author Daniel Kucharski <daniel@xerias.be>
 */
abstract class Product implements ProductInterface
{
    const PHYSICAL      = 1;
    const UNIQUE        = 2;
    const DOWNLOAD      = 4;
    const TIME          = 8;
    const SERVICE       = 16;

    protected $createdAt;
    protected $description;
    protected $features;
    protected $identifiers;
    protected $name;
    protected $options;
    protected $type;
    protected $updateAt;

    public function __construct($identifierSetClass)
    {
        $this->identifierSetClass = $identifierSetClass;
        $this->identifiers = new ArrayCollection();

        $this->identifiers->set('primary', new $this->identifierSetClass());
    }

    /**
     * @inheritdoc
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @inheritdoc
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @inheritdoc
     */
    public function addFeature(FeatureInterface $feature)
    {
        $type = strtolower($feature->getType());
        $searchTerm = strtolower($feature->getSearchTerm());
        $this->features[$type][$searchTerm] = $feature;
    }

    /**
     * @inheritdoc
     */
    public function setFeatures($features)
    {
        $this->features = $features;
    }

    /**
     * @inheritdoc
     */
    public function getFeatures()
    {
        return $this->features;
    }

    /**
     * @inheritdoc
     */
    public function setPrimaryIdentifierSet($identifiersSet)
    {
        $this->primaryIdentifierSet = $identifiersSet;
    }

    /**
     * @inheritdoc
     */
    public function getPrimaryIdentifierSet()
    {
        return $this->primaryIdentifierSet;
    }

    /**
     * @inheritdoc
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @inheritdoc
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @inheritdoc
     */
    public function addOptionGroup(OptionGroupInterface $optionGroup)
    {
        if (!$this->options instanceof Collection) {
            $this->options = new ArrayCollection();
        }
        $this->options->add($optionGroup);
    }

    /**
     * @inheritdoc
     */
    public function removeOptionGroup($name)
    {
        foreach ($this->options as $key => $option) {
            if ($option->getName() == $name) {
                $this->options->remove($key);
                return;
            }
        }
    }

    /**
     * @inheritdoc
     */
    public function setOptions($optionGroups)
    {
        $this->clearOptions();
        foreach ($optionGroups as $optionGroup) {
            $this->addOptionGroup($optionGroup);
        }
    }

    /**
     * @inheritdoc
     */
    public function clearOptions()
    {
       $this->options = new ArrayCollection();
    }

    /**
     * @inheritdoc
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @inheritdoc
     */
    public function getIdentifierSets()
    {
        return $this->identifiers;
    }

    /**
     * @inheritdoc
     */
    public function getIdentifierSet($target = null)
    {
        $key = $target ? $this->generateKeyFromOptions($target) : 'primary';
        return $this->identifiers->get($key);
    }

    /**
     * @inheritdoc
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @inheritdoc
     */
    public function getType()
    {
        return $this->type;
    }

    /*
     * @inheritdoc
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /*
     * @inheritdoc
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    public function incrementCreatedAt()
    {
        if (null === $this->createdAt) {
            $this->createdAt = new \DateTime();
        }
        $this->updatedAt = new \DateTime();
    }

    public function incrementUpdatedAt()
    {
        $this->updatedAt = new \DateTime();
    }
}

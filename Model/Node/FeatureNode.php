<?php
/**
 * (c) Vespolina Project http://www.vespolina-project.org
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
namespace Vespolina\ProductBundle\Model\Node;

use Vespolina\ProductBundle\Model\ProductNode;

/**
 * @author Richard D Shank <develop@zestic.com>
 */
class FeatureNode extends ProductNode implements FeatureNodeInterface
{
    protected $term;
    protected $type;

    /**
     * @inheritdoc
     */
    public function setSearchTerm($term)
    {
        $this->term = $term;
    }

    /**
     * @inheritdoc
     */
    public function getSearchTerm()
    {
        return $this->term;
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
}

<?php
/**
 * (c) Vespolina Project http://www.vespolina-project.org
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
namespace Vespolina\ProductBundle\Model\Node;

use Vespolina\ProductBundle\Model\ProductNodeInterface;

/**
 * @author Richard D Shank <develop@zestic.com>
 */
interface OptionTypeNodeInterface extends ProductNodeInterface
{
    /**
     * Add a option to this product options node.
     *
     * @param Vespolina\ProductBundle\Model\Node\OptionNodeInterface $option
     */
    public function addOption(OptionNodeInterface $option);

    /**
     * Clear all options from this product options
     */
    public function clearOptions();

    /**
     * Get a specific option by value
     *
     * @param string $value
     *
     * @return Vespolina\ProductBundle\Model\Node\OptionNodeInterface
     */
    public function getOption($value);

    /**
     * Add a collection of options
     *
     * @param array $options
     */
    public function setOptions($options);

    /**
     * Remove a option from this product options set
     *
     * @param OptionNodeInterface $option
     */
    public function removeOption(OptionNodeInterface $option);
}

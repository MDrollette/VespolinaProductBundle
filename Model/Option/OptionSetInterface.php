<?php
/**
 * (c) Vespolina Project http://www.vespolina-project.org
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
namespace Vespolina\ProductBundle\Model\Option;

use Vespolina\ProductBundle\Model\ProductNodeInterface;
use Vespolina\ProductBundle\Model\Option\OptionInterface;

/**
 * @author Richard D Shank <develop@zestic.com>
 */
interface OptionSetInterface extends ProductNodeInterface
{
    /**
     * Add a option to this product options node.
     *
     * @param Vespolina\ProductBundle\Model\Option\OptionInterface $option
     */
    public function addOption(OptionInterface $option);

    /**
     * Clear all options from this product options
     */
    public function clearOptions();

    /**
     * Return an option in this product
     *
     * @param $type
     * @param $value
     *
     * @return Vespolina\ProductBundle\Model\Option\OptionInterface or null
     */
    public function getOption($type, $value);

    /**
     * Return a specific option by the name
     *
     * @param string $name
     *
     * @return Vespolina\ProductBundle\Model\Option\OptionInterface or null
     */
    public function getOptionByName($name);

    /**
     * Add a collection of options
     *
     * @param array $options
     */
    public function setOptions($options);

    /**
     * Remove a option from this product options set
     *
     * @param OptionInterface $option
     */
    public function removeOption(OptionInterface $option);

    /**
     * Get the option set for a specific type
     *
     * @param string $type
     *
     * @return Vespolina\ProductBundle\Model\Option\OptionGroupInterface
     */
    public function getType($type);
}

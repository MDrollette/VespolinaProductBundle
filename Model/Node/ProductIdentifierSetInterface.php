<?php
/**
 * (c) Vespolina Project http://www.vespolina-project.org
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
namespace Vespolina\ProductBundle\Model\Node;

use Vespolina\ProductBundle\Model\ProductNodeInterface;
use Vespolina\ProductBundle\Model\Node\ProductIdentifierSetInterface;

/**
 * @author Richard D Shank <develop@zestic.com>
 */
interface ProductIdentifierSetInterface extends ProductNodeInterface
{
    /**
     * Set options when there are different identifiers with different option sets
     *
     * @param ProductOptionsInterface $options
     */
    public function setOptions(ProductOptionsInterface $options);

    /**
     * Return the options for this identifier
     *
     * @return ProductOptionsInterface $options
     */
    public function getOptions();

    /**
     * Remove the options for this identifier
     */
    public function removeOptions();

    /**
     * Add a identifier to this product identifiers node.
     *
     * @param Vespolina\ProductBundle\Model\Node\IdentifierNodeInterface $identifier
     */
    public function addIdentifier(IdentifierNodeInterface $identifier);

    /**
     * Clear all identifiers from this product identifiers
     */
    public function clearIdentifiers();

    /**
     * Return a collection of product identifiers
     *
     * @param array identifiers
     */
    public function getIdentifiers();

    /**
     * Add a collection of identifiers
     *
     * @param array $identifiers
     */
    public function setIdentifier($identifiers);

    /**
     * Remove a identifier from this product identifiers set
     *
     * @param IdentifierNodeInterface $identifier
     */
    public function removeIdentifier(IdentifierNodeInterface $identifier);
}

<?php
/**
 * (c) Vespolina Project http://www.vespolina-project.org
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
namespace Vespolina\ProductBundle\Model\Identifier;

use Vespolina\ProductBundle\Model\Identifier\ProductIdentifierSetInterface;

/**
 * @author Richard D Shank <develop@zestic.com>
 */
interface ProductIdentifierSetInterface
{
    /**
     * Add a identifier to this product identifiers node.
     *
     * @param Vespolina\ProductBundle\Model\Identifier\IdentifierNodeInterface $identifier
     */
    public function addIdentifier(IdentifierInterface $identifier);

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
    public function setIdentifiers($identifiers);

    /**
     * Remove a identifier from this product identifiers set
     *
     * @param IdentifierNodeInterface $identifier
     */
    public function removeIdentifier(IdentifierInterface $identifier);
}

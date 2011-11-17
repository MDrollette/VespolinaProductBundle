<?php
/**
 * (c) Vespolina Project http://www.vespolina-project.org
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
namespace Vespolina\ProductBundle\Model\Feature;

/**
 * @author Richard D Shank <develop@zestic.com>
 */
interface FeatureInterface
{
    /**
     * Set the search term for this feature
     *
     * @param $term
     */
    public function setSearchTerm($term);

    /**
     * Return the search term for this feature
     *
     * @return string term
     */
    public function getSearchTerm();

    /**
     * Set the type of feature. ie: title, brand
     *
     * @param $type
     */
    public function setType($type);

    /**
     * Return the type of feature
     *
     * @return string type
     */
    public function getType();

    /**
     * Set the name of this feature. ie: Sling Blade, Miramax
     *
     * @param $name
     */
    public function setName($name);

    /**
     * Get the name of this feature
     *
     * @return string name of node
     */
    public function getName();
}

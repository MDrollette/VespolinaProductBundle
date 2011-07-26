<?php
/**
* (c) 2011 Vespolina Project http://www.vespolina-project.org
*
* This source file is subject to the MIT license that is bundled
* with this source code in the file LICENSE.
*/
namespace Vespolina\ProductBundle\Form;

use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Vespolina\ProductBundle\Model\ProductManagerInterface;
/**
 * @author Richard Shank <develop@zestic.com>
 */
class ProductFormHandler
{
    protected $request;
    protected $productManager;
    protected $form;

    public function __construct(Form $form, Request $request, ProductManagerInterface $productManager)
    {
        $this->form = $form;
        $this->request = $request;
        $this->productManager = $productManager;
    }

    public function process()
    {
        $product = $this->productManager->createProduct();
        $this->form->setData($product);

        if ('POST' == $this->request->getMethod()) {
            $this->form->bindRequest($this->request);

            if ($this->form->isValid()) {
                $this->productManager->updateProduct($product);

                return true;
            }
        }

        return false;
    }
}

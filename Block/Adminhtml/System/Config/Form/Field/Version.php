<?php
namespace Expertsofttechsolution\Reindex\Block\Adminhtml\System\Config\Form\Field;

class Version extends \Magento\Config\Block\System\Config\Form\Field
{

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        array $data = []
    ) {
        parent::__construct($context, $data);
    }

   
    protected function _getElementHtml(\Magento\Framework\Data\Form\Element\AbstractElement $element)
    {
        return "1.0.0";
    }
}

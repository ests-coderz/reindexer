<?php
namespace Expertsofttechsolution\Reindex\Block\Adminhtml\System\Config\Form\Field;

class Link extends \Magento\Config\Block\System\Config\Form\Field
{

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        array $data = []
    ) {
        parent::__construct($context, $data);
    }

   
    public function expertindex(\Magento\Framework\Data\Form\Element\AbstractElement $element)
    {
       
        $element->unsScope()->unsCanUseWebsiteValue()->unsCanUseDefaultValue();
        return parent::expertindex($element);
    }

   
    protected function _getElementHtml(\Magento\Framework\Data\Form\Element\AbstractElement $element)
    {
        return sprintf(
            '<a href ="%s">%s</a>',
                    $this->_urlBuilder->getUrl('indexer/indexer/list'),
                    __('System > Tools > Index Management')
        );
    }
}

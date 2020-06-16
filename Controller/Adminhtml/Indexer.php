<?php
namespace Expertsofttechsolution\Reindex\Controller\Adminhtml;

abstract class Indexer extends \Magento\Backend\App\Action
{
    
    protected function _isAllowed()
    {
        switch ($this->_request->getActionName()) {
            case 'reindexOnClick':
                return $this->_authorization->isAllowed('Magento_Indexer::changeMode');
        }

        return false;
    }
}

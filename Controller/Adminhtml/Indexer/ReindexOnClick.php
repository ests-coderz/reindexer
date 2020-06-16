<?php
namespace Expertsofttechsolution\Reindex\Controller\Adminhtml\Indexer;

use Magento\Backend\App\Action\Context;

class ReindexOnClick extends \Expertsofttechsolution\Reindex\Controller\Adminhtml\Indexer
{

    protected $i_Factory;

    
    public function __construct(
        Context $context,
        \Magento\Indexer\Model\IndexerFactory $i_Factory
    ) {
        $this->indexerFactory = $i_Factory;
        parent::__construct($context);
    }

    public function execute()
    {
        $indexer_Ids = $this->getRequest()->getParam('indexer_ids');
        if (!is_array($indexer_Ids)) {
            $this->messageManager->addError(__('Please select indexers.'));
        } else {
            try {
                foreach ($indexer_Ids as $indexer_Id) {
                    $indexer = $this->indexerFactory->create();
                    $indexer->load($indexer_Id)->reindexAll();
                }

                $this->messageManager->addSuccess(
                    __('Reindex %1 indexer(s).', count($indexer_Ids))
                );
            } catch (\Magento\Framework\Exception\LocalizedException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addException(
                    $e,
                    __("We couldn't reindex by reason of errors.")
                );
            }
        }

        $this->_redirect('*/*/list');
    }
}

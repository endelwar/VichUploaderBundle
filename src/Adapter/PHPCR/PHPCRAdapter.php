<?php

namespace Vich\UploaderBundle\Adapter\PHPCR;

use Doctrine\Persistence\Event\LifecycleEventArgs;
use Vich\UploaderBundle\Adapter\AdapterInterface;

/**
 * @author Ben Glassman <bglassman@gmail.com>
 *
 * @internal
 */
final class PHPCRAdapter implements AdapterInterface
{
    public function recomputeChangeSet(LifecycleEventArgs $event): void
    {
        $object = $event->getObject();

        /** @var \Doctrine\ODM\PHPCR\DocumentManagerInterface $objectManager */
        $objectManager = $event->getObjectManager();
        $uow = $objectManager->getUnitOfWork();
        $uow->computeSingleDocumentChangeSet($object);
    }
}

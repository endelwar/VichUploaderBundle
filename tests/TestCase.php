<?php

namespace Vich\UploaderBundle\Tests;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase as BaseTestCase;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\String\Slugger\AsciiSlugger;
use Vich\UploaderBundle\FileAbstraction\ReplacingFile;
use Vich\UploaderBundle\Handler\UploadHandler;
use Vich\UploaderBundle\Mapping\PropertyMapping;
use Vich\UploaderBundle\Mapping\PropertyMappingFactory;
use Vich\UploaderBundle\Metadata\MetadataReader;
use Vich\UploaderBundle\Util\Transliterator;

abstract class TestCase extends BaseTestCase
{
    protected function getUploadedFileMock(): MockObject&UploadedFile
    {
        return $this->getMockBuilder(UploadedFile::class)
            ->setConstructorArgs(['lala', 'lala', null, 9, true])
            ->getMock();
    }

    protected function getReplacingFileMock(): MockObject&ReplacingFile
    {
        return $this->getMockBuilder(ReplacingFile::class)
            ->setConstructorArgs(['lala', false])
            ->getMock();
    }

    protected function getPropertyMappingMock(): MockObject&PropertyMapping
    {
        return $this->createMock(PropertyMapping::class);
    }

    protected function getPropertyMappingFactoryMock(): MockObject&PropertyMappingFactory
    {
        return $this->createMock(PropertyMappingFactory::class);
    }

    protected function getTransliterator(): Transliterator
    {
        return new Transliterator(new AsciiSlugger());
    }

    protected function getMetadataReaderMock(): MockObject&MetadataReader
    {
        return $this->createMock(MetadataReader::class);
    }

    protected function getUploadHandlerMock(): MockObject&UploadHandler
    {
        return $this->createMock(UploadHandler::class);
    }
}

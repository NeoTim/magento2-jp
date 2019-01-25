<?php
declare(strict_types=1);

namespace MagentoJapan\Pdf\Model\Filesystem\Directory;

use MagentoJapan\Pdf\Model\Filesystem\File\Read;
use Magento\Framework\Filesystem\DriverPool;
use Magento\Framework\Filesystem\Directory\PathValidator;
use Magento\Framework\Filesystem\File\ReadFactory as FileReadFactory;
use Magento\Framework\Filesystem\Directory\ReadFactory as BaseDirectoryReadFactory;

/**
 * File Read factory optimized for creating File Readers capable of overriding font loading operations.
 */
class ReadFactory extends BaseDirectoryReadFactory
{
    /**
     * @var DriverPool
     */
    private $driverPool;

    /**
     * @param DriverPool $driverPool
     */
    public function __construct(DriverPool $driverPool)
    {
        $this->driverPool = $driverPool;
        parent::__construct($driverPool);
    }

    /**
     * @inheritdoc
     */
    public function create($path, $driverCode = DriverPool::FILE)
    {
        $driver = $this->driverPool->getDriver($driverCode);
        $factory = new FileReadFactory($this->driverPool);

        return new Read(
            $factory,
            $driver,
            $path,
            new PathValidator($driver)
        );
    }
}

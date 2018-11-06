<?php

namespace Shoppy\Core;

use Illuminate\Filesystem\Filesystem;

/**
 * Class AbstractFileRepository
 * @package Shoppy\Core
 */
abstract class AbstractFileRepository
{
    /**
     * @var Filesystem
     */
    private $filesystem;

    /**
     * @var string
     */
    private $storagePath;

    /**
     * @var array
     */
    private $data = null;

    /**
     * FileProductRepository constructor.
     *
     * @param Filesystem $filesystem
     * @param string $storagePath
     */
    public function __construct(Filesystem $filesystem, string $storagePath)
    {
        $this->filesystem = $filesystem;
        $this->storagePath = $storagePath;
    }

    /**
     * @param AbstractEntity $abstractEntity
     *
     * @return bool
     * @throws \Exception
     */
    public function createEntity(AbstractEntity $abstractEntity): bool
    {
        if ($abstractEntity->id() !== null) {
            throw new \Exception('Entity is already create and has it\'s own ID');
        }

        $itemId = $this->getNextId();
        $entityData = $abstractEntity->getAllDataFields();
        $entityData[$abstractEntity->getPrimaryField()] = $itemId;

        $this->data[$itemId] = $entityData;
        $this->flushChangesToDisk();

        $abstractEntity->setId($itemId);
        $abstractEntity->flushChangedFields();

        return true;
    }

    /**
     * @param AbstractEntity $abstractEntity
     *
     * @return bool
     * @throws \Exception
     */
    public function updateEntity(AbstractEntity $abstractEntity): bool
    {
        if ($abstractEntity->id() === null) {
            throw new \Exception('Entity has no ID');
        }

        $changedFields = $abstractEntity->getChangedFields();
        if (!empty($changedFields)) {
            $entityData = $abstractEntity->getAllDataFields();
            $entityData[$abstractEntity->getPrimaryField()] = $abstractEntity->id();
            $this->data[$abstractEntity->id()] = $entityData;
            $this->flushChangesToDisk();
        }

        $abstractEntity->flushChangedFields();
        return true;
    }

    /**
     * @param AbstractEntity $abstractEntity
     *
     * @return bool
     * @throws \Exception
     */
    public function deleteEntity(AbstractEntity $abstractEntity): bool
    {
        $this->getData();
        if ($abstractEntity->id() === null) {
            throw new \Exception('Entity has no ID');
        }

        unset($this->data[$abstractEntity->id()]);
        $this->flushChangesToDisk();
        return true;
    }

    /**
     * @return array
     */
    protected function getData(): array
    {
        if ($this->data === null) {
            try {
                $data = $this->filesystem->get($this->storagePath . '/' . $this->getDatabaseName());

                if (empty($data)) {
                    $this->createEmptyDatabase();
                } else {
                    $this->data = json_decode($data, true);
                }
            } catch (\Exception $e) {
                $this->createEmptyDatabase();
            }
        }

        return $this->data;
    }

    private function createEmptyDatabase(): void
    {
        $this->data = [];
        $this->flushChangesToDisk();
    }

    private function flushChangesToDisk(): void
    {
        $this->filesystem->put(
            $this->storagePath . '/' . $this->getDatabaseName(),
            json_encode($this->data)
        );
    }

    /**
     * @return int
     */
    protected function getNextId(): int
    {
        $data = $this->getData();

        $ids = array_keys($data);
        if (!empty($ids)) {
            $lastId = max($ids);
            $itemId = $lastId + 1;
        } else {
            $itemId = 1;
        }

        return $itemId;
    }

    /**
     * @return string
     */
    abstract public function getDatabaseName(): string;
}

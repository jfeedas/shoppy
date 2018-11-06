<?php

namespace Shoppy\Core;

/**
 * Class AbstractEntity
 * @package Shoppy\Core
 */
abstract class AbstractEntity
{
    /**
     * @var array
     */
    private $changedFields = [];

    /**
     * @var array
     */
    private $dataFields = [];

    /**
     * @var array|Event[]
     */
    private $eventsQue = [];

    /**
     * @var null|int
     */
    private $id = null;

    /**
     * CommentEntity constructor.
     *
     * @param array $data
     * @param int|null $id
     */
    public function __construct(array $data, ?int $id = null)
    {
        if ($id !== null) {
            $this->setId($id);
        }

        $this->setAllDataFields($data);
    }

    /**
     * @param string $key
     * @param $value
     */
    private function changeField(string $key, $value): void
    {
        $this->changedFields[$key] = $value;
    }

    /**
     * @return array
     */
    public function getChangedFields(): array
    {
        return $this->changedFields;
    }

    public function flushChangedFields(): void
    {
        $this->changedFields = [];
    }

    /**
     * @param int $id
     *
     * @throws \Exception
     */
    public function setId(int $id): void
    {
        if ($this->id !== null) {
            throw new \Exception('Id already set');
        }

        $this->id = $id;
    }

    /**
     * @return null|int
     */
    public function id(): ?int
    {
        return $this->id;
    }

    /**
     * @return array
     */
    public function getAllDataFields(): array
    {
        return $this->dataFields;
    }

    /**
     * @param array $data
     */
    protected function setAllDataFields(array $data): void
    {
        unset($data[$this->getPrimaryField()]);

        $this->dataFields = $data;
        $this->flushChangedFields();
    }

    /**
     * @param string $key
     * @param $value
     */
    protected function setDataField(string $key, $value): void
    {
        $this->changeField($key, $value);
        $this->dataFields[$key] = $value;
    }

    /**
     * @param string $key
     *
     * @return mixed
     */
    protected function getDataField(string $key)
    {
        return $this->dataFields[$key] ?? null;
    }

    /**
     * @param Event $event
     */
    protected function setEvent(Event $event): void
    {
        array_push($this->eventsQue, $event);
    }

    /**
     * @return \Generator|Event[]
     */
    public function getEvents(): \Generator
    {
        while (true) {
            $event = array_pop($this->eventsQue);
            if (is_null($event)) {
                break;
            }

            yield $event;
        }
    }

    /**
     * @return string
     */
    public function getPrimaryField(): string
    {
        return 'id';
    }
}

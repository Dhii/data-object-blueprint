<?php

namespace Dhii\Blueprint;

use Dhii\Data\Object\ReadInterface;
use Dhii\Data\Object\WriteInterface;

/**
 * A blueprint implementation that uses an internal data set to manage build data.
 *
 * @author Miguel Muscat <miguelmuscat93@gmail.com>
 */
class DataObjectBlueprint implements BlueprintInterface, ReadInterface, WriteInterface
{
    /**
     * The internal data set.
     *
     * @var array
     */
    protected $data;

    /**
     * Constructs a new instance.
     */
    public function __construct()
    {
        $this->unsData();
    }

    /**
     * {@inheritdoc}
     */
    public function getBuildData()
    {
        return $this->data;
    }

    /**
     * {@inheritdoc).
     */
    public function getData($key = null, $default = null)
    {
        if (is_null($key)) {
            return $this->data;
        }

        return $this->hasData($key)
            ? $this->data[$key]
            : $default;
    }

    /**
     * {@inheritdoc).
     */
    public function hasData($key = null)
    {
        return (is_null($key) && !empty($this->data)) || isset($this->data[$key]);
    }

    /**
     * {@inheritdoc).
     */
    public function setData($key, $value = null)
    {
        $this->data[$key] = $value;

        return $this;
    }

    /**
     * {@inheritdoc).
     */
    public function unsData($key = null)
    {
        if (is_null($key)) {
            $this->data = [];
        } else {
            unset($this->data[$key]);
        }

        return $this;
    }
}

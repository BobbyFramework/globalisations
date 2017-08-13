<?php

namespace BobbyFramework\Globalisations;

/**
 * Class Manager
 *
 * @package BobbyFramework\Globalisations
 */
abstract class Manager
{
    /**
     * @var
     */
    protected $adapter;

    /**
     * @var
     */
    protected $default;

    /**
     * @var
     */
    protected $data;

    /**
     * @var
     */
    protected $current;

    /**
     *
     */
    const KEY = 'id';

    /**
     * Manager constructor.
     *
     * @param AdapterInterface $adapterInterface
     */
    public function __construct(AdapterInterface $adapterInterface)
    {
        $this->setAdapter($adapterInterface);

        $this->adapter->run($this);
    }

    /**
     *
     */
    public function initialize()
    {
        foreach ($this->getAll() as $language) {
            if (true === $language->isDefault()) {
                $this->setDefault($language);
                $this->setCurrent($language);
                break;
            }
        }
    }

    /**
     * @param AdapterInterface $adapterInterface
     */
    public function setAdapter(AdapterInterface $adapterInterface)
    {
        $this->adapter = $adapterInterface;
    }

    /**
     * @return mixed
     */
    public function getAdapter()
    {
        return $this->adapter;
    }

    /**
     * @param GlobalisationsInterface $globalisationsInterface
     */
    final public function add(GlobalisationsInterface $globalisationsInterface)
    {
        $this->data[$globalisationsInterface->getId()] = $globalisationsInterface;
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->data;
    }

    /**
     * @param $id
     */
    public function removeById($id)
    {
        unset($this->data[$id]);
    }

    /**
     *
     */
    public function clear()
    {
        $this->data = [];
    }

    /**
     * @param GlobalisationsInterface $globalisationsInterface
     */
    public function setDefault(GlobalisationsInterface $globalisationsInterface)
    {
        $this->default = $globalisationsInterface;
    }

    /**
     * @return mixed
     */
    public function getDefault()
    {
        return $this->default;
    }

    /**
     * @return mixed
     */
    public function getCurrent()
    {
        return $this->current;
    }

    /**
     * @param GlobalisationsInterface $globalisationsInterface
     */
    public function setCurrent(GlobalisationsInterface $globalisationsInterface)
    {
        $this->current = $globalisationsInterface;
    }

    /**
     * @param $value
     * @param $setKey
     * @param $default
     */
    protected function set($value, $setKey, $default)
    {
        #TODO verif function generate avec $key existe bien
        foreach ($this->getAll() as $elements) {
            if ($elements->{'get' . $default}() === $value) {
                $this->{'set' . $setKey}($elements);
                break;
            }
        }
    }

    /**
     * @param        $value
     * @param string $key
     */
    public function setDefaultByValue($value, $key = self::KEY)
    {
        $this->set($value, 'Default', $key);
    }

    /**
     * @param        $value
     * @param string $key
     */
    public function setCurrentByValue($value, $key = self::KEY)
    {
        $this->set($value, 'Current', $key);
    }
}
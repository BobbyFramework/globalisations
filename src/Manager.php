<?php
namespace BobbyFramework\Globalisations;

abstract class Manager
{
    protected $_adapter;
    protected $_default;
    protected $_data;
    protected $_current;
    const KEY = 'id';

    public function __construct(AdapterInterface $adapterInterface)
    {
        $this->setAdapter($adapterInterface);

        $this->_adapter->run($this);

    }

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

    public function setAdapter(AdapterInterface $adapterInterface)
    {
        $this->_adapter = $adapterInterface;
    }

    public function getAdapter()
    {
        return $this->_adapter;
    }

    final public function add(GlobalisationsInterface $globalisationsInterface)
    {
        $this->_data[$globalisationsInterface->getId()] = $globalisationsInterface;
    }

    public function getAll()
    {
        return $this->_data;
    }
    public function removeById($id)
    {
        unset($this->_data[$id]);
    }
    public function clear()
    {
        $this->_data = [];
    }

    public function setDefault(GlobalisationsInterface $globalisationsInterface)
    {
        $this->_default = $globalisationsInterface;
    }

    public function getDefault()
    {
        return $this->_default;
    }

    public function getCurrent()
    {
        return $this->_current;
    }

    public function setCurrent(GlobalisationsInterface $globalisationsInterface)
    {
        $this->_current = $globalisationsInterface;
    }

    protected function _set($value, $setKey, $default)
    {
        #TODO verif function generate avec $key existe bien
        foreach ($this->getAll() as $elements) {
            if ($elements->{'get' . $default}() === $value) {
                $this->{'set' . $setKey}($elements);
                break;
            }
        }
    }

    public function setDefaultByValue($value, $key = self::KEY)
    {
        $this->_set($value, 'Default', $key);
    }

    public function setCurrentByValue($value, $key = self::KEY)
    {
        $this->_set($value, 'Current', $key);
    }
}
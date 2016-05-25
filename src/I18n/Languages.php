<?php
namespace BobbyFramework\Globalisations\I18n;

class Languages
{
    protected $_languages;
    protected $_languageCurrent;
    protected $_languageDefault;
    protected $_adapter;

    public function __construct(AdapterInterface $adapterInterface)
    {
        $this->_adapter = $adapterInterface;

        $this->_adapter->run();

        foreach ($this->_adapter as $lg) {
            $this->add($lg);
        }

        foreach ($this->getAll() as $language) {
            if ($language->getIsDefault() == LanguageInterface::STATUS_ENABLED) {
                $this->setDefault($language);
                $this->setCurrent($language);
            }
        }
    }

    public function setAdapter(AdapterInterface $adapterInterface)
    {
        $this->_adapter = $adapterInterface;
    }

    public function getDefault()
    {
        return $this->_languageDefault;
    }

    public function getCurrent()
    {
        return $this->_languageCurrent;
    }

    public function add(LanguageInterface $language)
    {
        $this->_languages[$language->getId()] = $language;
    }

    public function getAll()
    {
        return $this->_languages;
    }

    public function setDefault(LanguageInterface $language)
    {
        $this->_languageDefault = $language;
    }

    public function setDefaultByValue($value, $key = 'isoCode')
    {
        #TODO verif function generate avec $key existe bien
        foreach ($this->_languages as $language) {
            if ($language->{'get' . $key}() === $value) {
                $this->setDefault($language);
                break;
            }
        }
    }

    public function setCurrent(LanguageInterface $language)
    {
        $this->_languageCurrent = $language;
    }

    public function setCurrentByValue($value, $key = 'isoCode')
    {
        #TODO verif function generate avec $key existe bien
        foreach ($this->_languages as $language) {
            if ($language->{'get' . $key}() === $value) {
                $this->setCurrent($language);
                break;
            }
        }
    }

    public function removeByKey($key)
    {
        unset($this->_languages[$key]);
    }

}

<?php
namespace Analysis;

class Translation
{
    public $translation = array();

    public function translate($msgid, array $values = NULL)
    {
        $string = isset($this->translation[$msgid]) ? $this->translation[$msgid] : $msgid;
        return empty($values) ? $string : strtr($string, $values);
    }
}
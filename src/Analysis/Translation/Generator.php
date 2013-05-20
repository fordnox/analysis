<?php
namespace Analysis\Translation;
use Analysis\Report;
use Analysis\Page;

class Generator extends Report
{
    public function generate()
    {
        $page = new Page();
        $page->setUrl('http://www.google.com');

        $out = '';

        $translations = array();
        foreach($this->_getMetrics() as $mc) {
            $metric = new $mc();
            $metric->setPage($page);
            $texts = $metric->getPassLevelTexts();
            $key = end(explode('\\', get_class($metric)));

            $translation_key = $key.'_title';
            $translations[$translation_key] = $metric->getTitle();

            foreach($texts as $k=>$t) {
                $translation_key =  $key.'_'.$k;
                $translations[$translation_key] = trim($t);
            }
        }

        var_export($translations);
    }

}
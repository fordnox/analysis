<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;

class UsabilityLanguage extends Metric
{
    protected $category         = 'Usability';
    protected $title            = 'Language';
    protected $impact_level     = 'high';
    protected $solve_level      = 'easy';
    protected $pass_level       = 'pass';

    private function getContentLanguage($declared)
    {
        $page = $this->getPage();
        $page->setRequestHeaders(array('Http-Accept-Language' => $declared));
        $lang = $page->getHeader('Content-Language');
        $dom = $page->getSimpleHtmlDomObject();
        $html = $dom->find('html', 0);
        $meta = $dom->find('meta[http-equiv="Content-Language"]');
        $lang = isset($meta->content) ? $meta->content : $lang;
        $lang = $html->{'xml:lang'} ? $html->{'xml:lang'} : $lang;
        $lang = $html->lang ? $html->lang : $lang;
        return $lang;
    }

    public function process()
    {
        $declare = 'en-US';
        $detect = $this->getContentLanguage($declare);
        if (!$detect) $detect = 'none';
        if ($declare == $detect) $this->setPassLevel('pass');
        $this->setOutput('Declared: '.$declare.' </br>Detected: '.$detect);
    }
}

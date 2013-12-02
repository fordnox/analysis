<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;
use Analysis\Page;

class UsabilityLanguage extends Metric
{
    protected $category         = 'Usability';
    protected $title            = 'Language';
    protected $impact_level     = 'high';
    protected $solve_level      = 'easy';
    protected $pass_level       = 'pass';

    private function getDeclaredLanguage()
    {
        $page = $this->getPage();
        $lang = $page->getHeader('Content-Language')?$page->getHeader('Content-Language'):'none';
        $dom = $page->getSimpleHtmlDomObject();
        $html = $dom->find('html', 0);
        $meta = $dom->find('meta[http-equiv="Content-Language"]');
        $lang = isset($meta->content) ? $meta->content : $lang;
        $lang = $html->{'xml:lang'} ? $html->{'xml:lang'} : $lang;
        $lang = $html->lang ? $html->lang : $lang;
        return $lang;
    }

    private function getContentLanguage()
    {
        $lang = 'unknown';
        $text = $this->getAnalyzer()->getPage()->getTextContent();
        $uri = 'http://translate.google.com/translate_a/t?client=t&sl=auto&tl=it&hl=lt&sc=2&ie=UTF-8&oe=UTF-8&uptl=it&alttl=en&pc=1&oc=1&otf=1&ssel=0&tsel=0&q='.rawurlencode(mb_substr($text, 0, 100));
        $page = new Page();
        $page->setUrl($uri);
        $content = $page->getContent();
        if (preg_match('/,,"([^"]+)",,/', $content, $matches)) {
            $lang = $matches[1];
        }
        return $lang;
    }

    public function process()
    {
        $declare = $this->getDeclaredLanguage();
        $detect = $this->getContentLanguage();
        if (!$detect) $detect = 'none';
        if ($declare == $detect) $this->setPassLevel('pass');
        $this->setOutput('Declared: '.$declare.' </br>Detected: '.$detect);
    }
}

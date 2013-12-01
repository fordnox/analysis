<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;

class SeoBacklinksDmoz extends Metric
{
    protected $category         = 'SEO Backlinks';
    protected $title            = 'DMOZ';
    protected $impact_level     = 'high';
    protected $solve_level      = 'very-hard';
    protected $pass_level       = 'pass';

    private function getBacklinks()
    {
        $url = $this->getPage()->getUrl();
        $p = new \Analysis\Page();
        $p->setUrl('http://www.dmoz.org/search?cat=all&type=next&all=no&start=0&q='.$url);
        $node = $p->getSimpleHtmlDomObject()->find('ol[start=1]',0);
        if (!$node) return 0;
        $n = 0;
        while(is_object($node) && $node->find('li', $n)) $n++;
        return $n;
    }

    public function process()
    {
        $backlinks = $this->getBacklinks();
        if ($backlinks == 0) {
            $this->setPassLevel('fail');
            $this->setOutput('No');
        } else {
            $this->setPassLevel('pass');
            $this->setOutput(sprintf('Backlinks on DMOZ: %d',$backlinks));
        }
    }
}

<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;

class UsabilityDublinCore extends Metric
{
    protected $category         = 'Usability';
    protected $title            = 'Dublin Core';
    protected $impact_level     = 'high';
    protected $solve_level      = 'hard';
    protected $pass_level       = 'pass';

    private function hasDublinCore()
    {
        $dom = $this->getPage()->getSimpleHtmlDomObject();
        $dc = $dom->find('meta[name^=dc.], meta[name^=DC.]', 0);
        return $dc;
    }

    public function process()
    {
        $dc = $this->hasDublinCore();
        if ($dc) {
            $output = 'Found Dublin Core tags!';
            $this->setPassLevel('pass');
        } else {
            $output = 'Dublin Core tags are missing!';
            $this->setPassLevel('fail');
        }
        $this->setOutput($output);
    }
}

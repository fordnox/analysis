<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;

class UsabilityOpenGraph extends Metric
{
    protected $category         = 'Usability';
    protected $title            = 'Open Graph';
    protected $impact_level     = 'high';
    protected $solve_level      = 'hard';
    protected $pass_level       = 'pass';

    private function containsOg(){
        $content = $this->getAnalyzer()->getPage()->getContent();
        return stripos($content, '<og:')!==false;
    }
    /**
     * @todo finish (style)
     */
    public function process()
    {
        if ($this->containsOg()){
            $this->setPassLevel('pass');
            $this->setOutput('Open Graph tags found');
        } else {
            $this->setPassLevel('fail');
            $this->setOutput('Missing');
        }
    }
}

<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;
use Mf2;

class UsabilityMicroformats extends Metric
{
    protected $category         = 'Usability';
    protected $title            = 'Microformats';
    protected $impact_level     = 'high';
    protected $solve_level      = 'hard';
    protected $pass_level       = 'pass';

    public function getMicroFormats()
    {
        $content = $this->getAnalyzer()->getPage()->getContent();
        $mf = Mf2\parse($content);
        return $mf;
    }

    public function process()
    {
        $microformats = $this->getMicroFormats();
        $items = count($microformats['items']);
        if (!$items) $this->setPassLevel('fail');
        $this->setOutput(sprintf('We found %d type(s) of Microformat', $items));
    }
}

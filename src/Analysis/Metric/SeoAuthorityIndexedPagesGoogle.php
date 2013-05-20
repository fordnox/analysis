<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;

class SeoAuthorityIndexedPagesGoogle extends Metric
{
    protected $category         = 'SEO Authority';
    protected $title            = 'Indexed Pages';
    protected $impact_level     = 'high';
    protected $solve_level      = 'hard';
    protected $pass_level       = 'pass';

    /**
     * @todo finish
     */
    public function process()
    {
        $indexed = $this->getAnalyzer()->getIndexedPagesGoogle();
        $this->setOutput('Indexed pages by google: '.$indexed);
    }
}

<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;

class SeoBasicsUnderscoresInUrls extends Metric
{
    protected $category         = 'SEO Basics';
    protected $title            = 'Underscores in the URLs';
    protected $impact_level     = 'medium';
    protected $solve_level      = 'easy';
    protected $pass_level       = 'fail';

    /**
     * @todo finish
     */
    public function process()
    {
        $this->setPassLevel('pass');
        $this->setOutput('No');
    }
}

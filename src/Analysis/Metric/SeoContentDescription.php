<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;

class SeoContentDescription extends Metric
{
    protected $category         = 'SEO Content';
    protected $title            = 'Description';
    protected $impact_level     = 'high';
    protected $solve_level      = 'easy';
    protected $pass_level       = 'fail';

    /**
     * @todo finish
     */
    public function process()
    {
        $this->setPassLevel('fail');
        $this->setOutput('Missing');
    }
}

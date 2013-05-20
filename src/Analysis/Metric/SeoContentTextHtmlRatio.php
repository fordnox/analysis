<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;

class SeoContentTextHtmlRatio extends Metric
{
    protected $category         = 'SEO Content';
    protected $title            = 'Text/HTML Ratio';
    protected $impact_level     = 'high';
    protected $solve_level      = 'easy';
    protected $pass_level       = 'fail';

    /**
     * @todo finish
     */
    public function process()
    {
        $ratio = 6.22;
        $this->setPassLevel('fail');
        $this->setOutput($ratio.'%');
    }
}

<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;

class SeoContentTitle extends Metric
{
    protected $category         = 'SEO Content';
    protected $title            = 'Title';
    protected $impact_level     = 'high';
    protected $solve_level      = 'easy';
    protected $pass_level       = 'fail';

    /**
     * @todo finish
     */
    public function process()
    {
        $length = 50;
        $this->setPassLevel('pass');
        $this->setOutput(sprintf('Length: %s character(s)', $length));
    }
}

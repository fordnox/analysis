<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;

class SeoContentBlog extends Metric
{
    protected $category         = 'SEO Content';
    protected $title            = 'Blog';
    protected $impact_level     = 'medium';
    protected $solve_level      = 'easy';
    protected $pass_level       = 'pass';

    /**
     * @todo finish
     */
    public function process()
    {
        $this->setPassLevel('pass');
        $this->setOutput('We found a Blog on this website.');
    }
}

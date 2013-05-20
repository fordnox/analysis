<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;

class SeoKeywordsCloud extends Metric
{
    protected $category         = 'SEO Keywords';
    protected $title            = 'Cloud';
    protected $impact_level     = 'high';
    protected $solve_level      = 'easy';
    protected $pass_level       = 'pass';

    /**
     * @todo finish
     */
    public function process()
    {
        $this->setOutput('sign email newsletters contact resources mailchimp policy press');
    }
}

<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;
use Patchwork\Utf8;

class SeoKeywordsCloud extends Metric
{
    protected $category         = 'SEO Keywords';
    protected $title            = 'Cloud';
    protected $impact_level     = 'high';
    protected $solve_level      = 'easy';
    protected $pass_level       = 'pass';

    public function process()
    {
        $cloud = $this->getAnalyzer()->getTagCloud(10);
        $tags = implode(' ', array_keys($cloud));
        $this->setOutput($tags);
    }
}

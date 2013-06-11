<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;

class UsabilityPageSize extends Metric
{
    protected $category         = 'Usability';
    protected $title            = 'Page Size';
    protected $impact_level     = 'medium';
    protected $solve_level      = 'easy';
    protected $pass_level       = 'fyi';

    public function process()
    {
        //@see https://developers.google.com/speed/articles/web-metrics
        $average = 477.26;

        $size = $this->getAnalyzer()->getPageSize();
        $out = $size . 'KB. ';
        if($size > $average) {
            $out .= "Your website is larger than the average web page size of $average KB. Reducing page size will lead to faster page load times.";
        } else {
            $out .= "Congratulations, your uncompressed HTML size is under the average web page size of $average KB. This helps lead to a faster than average page load time.";
        }
        $this->setOutput($out);
        return true;
    }
}

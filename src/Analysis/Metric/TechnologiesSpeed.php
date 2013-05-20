<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;

class TechnologiesSpeed extends Metric
{
    protected $category         = 'Technologies';
    protected $title            = 'Speed Tips';
    protected $impact_level     = 'low';
    protected $solve_level      = 'easy';
    protected $pass_level       = 'pass';

    /**
     * @todo finish
     */
    public function process()
    {
        $output='
        <p>Congratulations! Your websites speed is fully optimized.</p>
        <ul class="unstyled">
            <li><i class="icon-ok"></i> Perfect, your server is using a caching method to speed up page display. Perfect, your website does not use nested tables.</li>
            <li><i class="icon-ok"></i> Perfect, your website does not use inline styles.</li>
            <li><i class="icon-ok"></i> Perfect, your website has few CSS files.</li>
            <li><i class="icon-ok"></i> Perfect, your website has few JavaScript files.</li>
            <li><i class="icon-ok"></i> Perfect, your website takes advantage of gzip.</li>
        </ul>
        ';
        $this->setOutput($output);
    }
}

<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;

class TechnologiesTechnologies extends Metric
{
    protected $category         = 'Technologies';
    protected $title            = 'Technologies';
    protected $impact_level     = 'low';
    protected $solve_level      = 'easy';
    protected $pass_level       = 'fyi';

    /**
     * @todo finish
     */
    public function process()
    {
        $output='
        <ul class="unstyled">
            <li><i class="icon-ok"></i> Google Analytics</li>
            <li><i class="icon-ok"></i> Apache 2</li>
            <li><i class="icon-ok"></i> PHP 5.3</li>
            <li><i class="icon-ok"></i> jQuery</li>
            <li><i class="icon-ok"></i> RequireJS</li>
        </ul>
        ';
        $this->setOutput($output);
    }
}

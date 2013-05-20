<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;

class Usability404Page extends Metric
{
    protected $category         = 'Usability';
    protected $title            = '404 Page';
    protected $impact_level     = 'medium';
    protected $solve_level      = 'easy';
    protected $pass_level       = 'fail';

    /**
     * @todo finish
     */
    public function process()
    {
        $this->setPassLevel('fail');
        $this->setOutput('Your website does not have a custom 404 Error Page.');
    }
}

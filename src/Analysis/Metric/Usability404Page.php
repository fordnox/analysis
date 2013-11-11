<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;
use Analysis\Page;

class Usability404Page extends Metric
{
    protected $category         = 'Usability';
    protected $title            = '404 Page';
    protected $impact_level     = 'medium';
    protected $solve_level      = 'easy';
    protected $pass_level       = 'fail';

    private function hasCustomErrorPage()
    {
        $url = $this->getAnalyzer()->getPage()->getUrl();
        $p = new Page();
        $p->setUrl($url.'/path-that-shoul-not-exist');
        $contents = $p->getContent();
        return strpos($contents, "Additionally, a 404 Not Found\nerror was encountered while trying to use an ErrorDocument to handle the request.") === false;
    }

    public function process()
    {
        if ($this->hasCustomErrorPage()) {
            $this->setPassLevel('pass');
            $this->setOutput('Your website does have a custom 404 Error Page.');
        } else {
            $this->setPassLevel('fail');
            $this->setOutput('Your website does not have a custom 404 Error Page.');
        }
    }
}

<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;

class SeoContentDescription extends Metric
{
    protected $category         = 'SEO Content';
    protected $title            = 'Description';
    protected $impact_level     = 'high';
    protected $solve_level      = 'easy';
    protected $pass_level       = 'fail';

    public function getDescription()
    {
        $dom = $this->getPage()->getSimpleHtmlDomObject();
        $description = $dom->find('meta[name=description]', 0);
        return isset($description->content) ? $description->content : null;
    }

    public function process()
    {
        $description = $this->getDescription();
        if ($description) {
            $this->setPassLevel('pass');
            $this->setOutput(sprintf('<p>Great, there\'s description: %s</p>', $description));
        } else {
            $this->setPassLevel('fail');
            $this->setOutput('<p>Description is missing</p>');
        }


    }
}

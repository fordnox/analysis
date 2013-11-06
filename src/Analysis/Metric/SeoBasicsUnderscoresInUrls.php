<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;

class SeoBasicsUnderscoresInUrls extends Metric
{
    protected $category         = 'SEO Basics';
    protected $title            = 'Underscores in the URLs';
    protected $impact_level     = 'medium';
    protected $solve_level      = 'easy';
    protected $pass_level       = 'fail';

    private function getHrefUnderscore()
    {
        $dom = $this->getAnalyzer()->getPage()->getSimpleHtmlDomObject();
        $href = $dom->find('[href*=_]');
        $result = array();
        foreach ($href as $h)
        {
            if (substr($h->href, 0, 4) != 'http') $result[] = $h->href;
        }
        return $result;
    }

    /**
     * @todo finish
     */
    public function process()
    {
        $hrefs = $this->getHrefUnderscore();
        $total = count($hrefs);
        if ($total) {
            $this->setPassLevel('fail');
            $this->setOutput('Yes');
        } else {
            $this->setPassLevel('pass');
            $this->setOutput('No');
        }
    }
}

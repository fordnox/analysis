<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;

class SeoAuthorityPopularPages extends Metric
{
    protected $category         = 'SEO Authority';
    protected $title            = 'Popular Pages';
    protected $impact_level     = 'medium';
    protected $solve_level      = 'easy';
    protected $pass_level       = 'fyi';

    public function process()
    {
        $results = $this->getPopularPages();
        $output=implode('<br/>'."\n", $results);

        $this->setOutput($output);
    }

    private function getPopularPages($num = 5)
    {
        ini_set('user_agent', "NokiaN70/2.0 (04.12) MIDP-2.0 CLDC-1.1");
        $url = 'http://google.com/search?q=site:'.$this->getPage()->getUrl();
        $gp = new \Analysis\Page();
        $gp->setUrl($url);
        $dom = $gp->getSimpleHtmlDomObject();
        $list = $dom->find('div[style="clear:both"] a');
        $pages = array();
        $i = 0;
        foreach ($list as $item) {
            $pages[] = $item->text();
            if (++$i>=$num) break;
        }
        return $pages;
    }
}

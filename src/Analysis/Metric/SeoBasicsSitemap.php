<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;

class SeoBasicsSitemap extends Metric
{
    protected $category         = 'SEO Basics';
    protected $title            = 'XML Sitemap';
    protected $impact_level     = 'medium';
    protected $solve_level      = 'easy';
    protected $pass_level       = 'fail';

    public function process()
    {
        $url = $this->getPage()->getDomainLink().'/sitemap.xml';
        $has_sitemap = $this->getAnalyzer()->urlExists($url);

        if($has_sitemap) {
            $this->setPassLevel('pass');
            $this->setOutput(sprintf('Great. You have sitemap <a href="%s">%s</a>', $url,$url));
        } else {
            $this->setPassLevel('fail');
            $this->setOutput(sprintf('Create sitemap <a href="%s">%s</a>', $url,$url));
        }
    }

}

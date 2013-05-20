<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;

class SeoContentMetaKeywords extends Metric
{
    protected $category         = 'SEO Content';
    protected $title            = 'Meta Keywords';
    protected $impact_level     = 'low';
    protected $solve_level      = 'easy';
    protected $pass_level       = 'fyi';

    /**
     * @todo finish
     */
    public function process()
    {
        $keywords = "email, marketing, HTML newsletters, stats, resources, postcards, campaigns, list, listserv, distribution, subscription, tool, opt-in, unsubscribe, signup, forms, hosted, database, free, account";
        $length = strlen($keywords);
        $this->setOutput(sprintf('<p>%s</p><p>Length: <strong>%s</strong> character(s)</p>', $keywords, $length));
    }
}

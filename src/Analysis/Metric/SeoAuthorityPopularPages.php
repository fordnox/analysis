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

    /**
     * @todo finish
     */
    public function process()
    {
        $output="
        MailChimp Email Marketing Blog<br/>
        Geo Targeting - MailChimp<br/>
        Testimonials - Email Marketing and Email List Manager | MailChimp<br/>
        MailChimp Integrations Directory
        ";

        $this->setOutput($output);
    }
}

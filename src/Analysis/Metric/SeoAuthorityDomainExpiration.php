<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;

class SeoAuthorityDomainExpiration extends Metric
{
    protected $category         = 'SEO Authority';
    protected $title            = 'Domain expiration';
    protected $impact_level     = 'medium';
    protected $solve_level      = 'hard';
    protected $pass_level       = 'pass';

    public function process()
    {
        $date = $this->getAnalyzer()->getDomainExpirationDate();
        $this->setOutput($date);
    }
}

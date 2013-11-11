<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;

class SeoAuthorityDomainRegistration extends Metric
{
    protected $category         = 'SEO Authority';
    protected $title            = 'Domain 1st Registered';
    protected $impact_level     = 'medium';
    protected $solve_level      = 'hard';
    protected $pass_level       = 'pass';

    public function process()
    {
        $date = $this->getAnalyzer()->getDomainRegistrationDate();
        $this->setOutput($date);
    }
}

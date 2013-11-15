<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;

class SecurityDomainAvailability extends Metric
{
    protected $category         = 'Security';
    protected $title            = 'Domain Availability';
    protected $impact_level     = 'medium';
    protected $solve_level      = 'easy';
    protected $pass_level       = 'fyi';

    public function process()
    {
        $cdomain = $this->getPage()->getSldTld();
        $domains = $this->getAnalyzer()->getSimilarTldsDomainsWithAvailability();
        $output="
        <table class='table table-bordered'>
             <caption>{$cdomain} with popular TLDs</caption>
            <thead>
                <tr>
                    <th>Domain</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>
        ";

        foreach($domains as $domain => $available) {
            $a = ($available) ? 'Available' : 'Registered';
            $output .= "
                <tr>
                    <td>{$domain}</td>
                    <td>{$a}</td>
                </tr>
            ";
        }

        $output .= '
            </tbody>
        </table>
        ';

        $this->setOutput($output);
    }
}

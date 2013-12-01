<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;

class SecurityWot extends Metric
{
    protected $category         = 'Security';
    protected $title            = 'Trust indicators';
    protected $impact_level     = 'medium';
    protected $solve_level      = 'easy';
    protected $pass_level       = 'pass';

    private function getWot()
    {
        $api = 'http://api.mywot.com/0.4/public_link_json?hosts=';
        $domain = $this->getPage()->getDomainName();
        $page = new \Analysis\Page();
        $page->setUrl($api . $domain .'/');
        $result = json_decode($page->getContent(), true);
        return $result;
    }

    private function getReputation($wot)
    {
        $reputation = 'Very poor';
        if ($wot >= 20) $reputation = 'Poor';
        if ($wot >= 40) $reputation = 'Unsatisfactory';
        if ($wot >= 60) $reputation = 'Good';
        if ($wot >= 80) $reputation = 'Excellent';
        return $reputation;
    }

    public function process()
    {
        $wot = $this->getWot();
        $wot = reset($wot);
        $output = '<table>
        <tr><th></th><th>Reputation</th><th>Confidence</th></tr>
        <tr>
            <td>Trustworthiness</td><td>%s</td><td>%d%%</td>
        </tr>
        <tr>
            <td>Child safety</td><td>%s</td><td>%d%%</td>
        </tr>
        </table>';
        $output = sprintf($output, $this->getReputation($wot[0][0]), $wot[0][1],
                $this->getReputation($wot[4][0]), $wot[4][1]);
        $this->setOutput($output);
    }
}

<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;
use Analysis\SEMRushApi;

class SeoKeywordsCompetitorsGoogle extends Metric
{
    protected $category         = 'SEO Keywords';
    protected $title            = 'Competitors in Google';
    protected $impact_level     = 'high';
    protected $solve_level      = 'very-hard';
    protected $pass_level       = 'fyi';

    private function getCompetitors()
    {
        $sm = new SEMRushApi;
        $domain = $this->getPage()->getUrl();
        $sm->setDomain($domain);
        $sm->setLimit(10);
        return $competitors = $sm->getCompetitors();
    }

    public function process()
    {
        $competitors = $this->getCompetitors();
        $format = '
                <td>%d</td>
                <td>%s</td>';
        $output='
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>#</th>
                <th>Url</th>
            </tr>
            </thead>
            <tbody>
            <tr>';

                foreach ($competitors as $k=>$competitor) {
                    $output .= sprintf($format, $k+1, $competitor['Dn']);
                }

            $output .= '</tr>
            </tbody>
        </table>
        ';

        if (!$competitors) $output = 'No competitors found';

        $this->setOutput($output);
    }
}

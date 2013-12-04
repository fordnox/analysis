<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;
use Analysis\SEMRushApi;

class SeoKeywordsGoogleRanking extends Metric
{
    protected $category         = 'SEO Keywords';
    protected $title            = 'Google Ranking';
    protected $impact_level     = 'high';
    protected $solve_level      = 'very-hard';
    protected $pass_level       = 'pass';

    public function process()
    {
        try {
            $keywords = $this->getKeywords();
        } catch (\Exception $e) {
            error_log($e);
            return 'No keywords found';
        }

        $output='
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Keyword</th>
                <th>Rank</th>
                <th>Trend</th>
                <th>Url</th>
            </tr>
            </thead>
            <tbody>
            ';
                $format = '
<tr><td>%s</td>
                <td>%s</td>
                <td>%s%%</td>
                <td>%s</td>
                </tr>';

        foreach ($keywords as $keyword) {
            $trend = 0;
            if ($keyword['Td']) {
                $trends = explode(',',$keyword['Td']);
                $trend = abs(reset($trends) - end($trends)) * 100;
            }
            $output .= sprintf($format, $keyword['Ph'], $keyword['Po'], $trend, $keyword['Ur']);
        }

            $output .= '
            </tbody>
        </table>
        ';

        $this->setOutput($output);
    }

    private function getKeywords()
    {
        $domain = $this->getPage()->getDomainName();
        $sm = new SEMRushApi;
        $sm->setDomain($domain);
        $sm->setLimit(7);
        return $sm->getKeywords();
    }
}

<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;

class SeoKeywordsGoogleRanking extends Metric
{
    protected $category         = 'SEO Keywords';
    protected $title            = 'Google Ranking';
    protected $impact_level     = 'high';
    protected $solve_level      = 'very-hard';
    protected $pass_level       = 'pass';

    /**
     * @todo finish
     */
    public function process()
    {

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
            <tr>
                <td><i class="icon-minus"></i></td>
                <td><i class="icon-minus"></i></td>
                <td><i class="icon-minus"></i></td>
                <td><i class="icon-minus"></i></td>
            </tr>
            </tbody>
        </table>
        ';

        $this->setOutput($output);
    }
}

<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;

class SeoKeywordsCompetitorsGoogle extends Metric
{
    protected $category         = 'SEO Keywords';
    protected $title            = 'Competitors in Google';
    protected $impact_level     = 'high';
    protected $solve_level      = 'very-hard';
    protected $pass_level       = 'fyi';

    /**
     * @todo finish
     */
    public function process()
    {

        $output='
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>#</th>
                <th>Url</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><i class="icon-minus"></i></td>
                <td><i class="icon-minus"></i></td>
            </tr>
            </tbody>
        </table>
        ';

        $this->setOutput($output);
    }
}

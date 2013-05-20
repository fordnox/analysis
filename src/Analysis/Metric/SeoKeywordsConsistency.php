<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;

class SeoKeywordsConsistency extends Metric
{
    protected $category         = 'SEO Keywords';
    protected $title            = 'Consistency';
    protected $impact_level     = 'high';
    protected $solve_level      = 'easy';
    protected $pass_level       = 'moderate';

    /**
     * @todo finish
     */
    public function process()
    {

        $output='
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>&nbsp;</th>
                <th>Keywords</th>
                <th>Content</th>
                <th>Title</th>
                <th>Description</th>
                <th>H</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><i class="icon-info-sign"></i></td>
                <td>email</td>
                <td>1</td>
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

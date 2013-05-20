<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;

class SeoContentHeadings extends Metric
{
    protected $category         = 'SEO Content';
    protected $title            = 'Headings';
    protected $impact_level     = 'high';
    protected $solve_level      = 'easy';
    protected $pass_level       = 'pass';

    /**
     * @todo finish
     */
    public function process()
    {
        $this->setPassLevel('pass');

        $output='
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>H1</th>
                <th>H2</th>
                <th>H3</th>
                <th>H4</th>
                <th>H5</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1</td>
                <td>2</td>
                <td>1</td>
                <td>4</td>
                <td>3</td>
            </tr>
            </tbody>
        </table>

        <p><strong>[H1]</strong> MailChimp Email Marketing and Email List Manager, MailChimp.com [H1] Easy Email Newsletters</p>
        <p><strong>[H5]</strong>  About Us
        <p><strong>[H5]</strong>  Connect With Us
        <p><strong>[H5]</strong>  Contact Us [H5] Legal Info
        ';

        $this->setOutput($output);
    }
}

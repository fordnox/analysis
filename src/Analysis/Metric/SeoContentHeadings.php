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

    public function getHeadings()
    {
        $dom = $this->getPage()->getSimpleHtmlDomObject();
        $headings = array();
        for ($h = 1; $h<=6; $h++) {
            $i = 0;
            while ($data = $dom->find('h'.$h, $i++)) $headings['h'.$h][] = $data->text?:strip_tags($data);
        }
        return $headings;
    }

    public function process()
    {
        $this->setPassLevel('pass');

        $limit = 5;

        $headings = $this->getHeadings();

        $output='
        <table class="table table-bordered">
            <thead>
            <tr>';
        $names = array_keys($headings);
        foreach ($names as $name) $output .= sprintf('<th>%s</th>', strtoupper($name));
        $output .= '</tr>
            </thead>
            <tbody>
            <tr>';
        foreach ($headings as $heading) $output .= sprintf('<th>%d</th>', count($heading));
        $output .= '</tr>
            </tbody>
        </table>';

        $i = 0;
        foreach ($headings as $name => $heading) {
            foreach ($heading as $text) {
                $output .= sprintf('<p><strong>%s</strong> %s</p>', strtoupper($name), $text);
                if ($i++>$limit) break;
            }
        }

        $this->setOutput($output);
    }
}

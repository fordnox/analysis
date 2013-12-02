<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;
use Analysis\Page;

class VisitorsLocalization extends Metric
{
    protected $category         = 'Visitors';
    protected $title            = 'Visitors Localization';
    protected $impact_level     = 'low';
    protected $solve_level      = 'hard';
    protected $pass_level       = 'fyi';

    public function process()
    {

        $output = '<table>
        <tr>
        <th>Country</th>
        <th>Visitors</th>
        </tr>
        ';
        $info = $this->getInfo();
        foreach ($info as $item) {
            $country = str_replace(' &nbsp;', '', $item[0]);
            $output .= sprintf('
            <tr>
            <td>%s</td>
            <td>%s</td>
            </tr>
            ', $country, $item[1]);
        }
        $output .= '</table>';
        $this->setOutput($output);
    }

    private function getInfo() {
        $domain = $this->getPage()->getDomainName();
        $server = 'http://www.alexa.com/siteinfo/'.$domain;
        $page = new Page;
        $page->setUrl($server);
        $dom = $page->getSimpleHtmlDomObject();
        $table = $dom->find('#demographics_div_country_table tr');
        $result = array();
        foreach ($table as $i=>$row) {
            $cells = $row->find('td');
            foreach ($cells as $k=>$cell) {
                $result[$i][$k] = $cell->text();
            }
        }
        return $result;
    }
}

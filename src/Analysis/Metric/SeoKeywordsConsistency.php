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

    public function process()
    {

        $keywords = $this->getKeywords();
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
            <tbody>';
            $format = '<tr>
                <td><i class="icon-info-sign"></i></td>
                <td>%s</td>
                <td>%d</td>
                <td><i class="icon-%s"></i></td>
                <td><i class="icon-%s"></i></td>
                <td><i class="icon-%s"></i></td>
            </tr>';
        foreach ($keywords as $keyword) {
            $output .= sprintf($format,
                $keyword[0],
                $keyword[1],
                $keyword[2]?'ok':'minus',
                $keyword[3]?'ok':'minus',
                $keyword[4]?'ok':'minus'
            );
        }
            $output .= '</tbody>
        </table>
        ';

        $this->setOutput($output);
    }

    private function getKeywords()
    {
        $keywords = $this->getAnalyzer()->getTagCloud(5);
        $dom = $this->getPage()->getSimpleHtmlDomObject();
        $result = array();
        foreach ($keywords as $keyword=>$times) {
            $result[] = array(
                $keyword,
                $times,
                $this->inTitle($keyword, $dom),
                $this->inDescription($keyword, $dom),
                $this->inH($keyword, $dom),
            );
        }

        return $result;
    }

    private function inTitle($word, \simple_html_dom $dom) {
        return stripos($dom->find('title', 0)->text(), $word) !== false;
    }

    private function inDescription($word, \simple_html_dom $dom) {
        $desc = $dom->find('meta[name="description"]', 0);
        $description = isset($desc->content) ? $desc->content : '';
        if(stripos($description, $word) !== false) return true;
        return false;
    }

    private function inH($word, \simple_html_dom $dom) {
        $hs = $dom->find('h1,h2,h3,h4,h5,h6');
        foreach($hs as $h) {
            if (stripos($h->text(), $word) !== false) return true;
        }
        return false;
    }
}

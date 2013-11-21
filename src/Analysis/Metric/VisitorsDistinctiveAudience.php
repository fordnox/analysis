<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;
use Analysis\Page;

class VisitorsDistinctiveAudience extends Metric
{
    protected $category         = 'Visitors';
    protected $title            = 'Distinctive Audience';
    protected $impact_level     = 'low';
    protected $solve_level      = 'hard';
    protected $pass_level       = 'fyi';

    public function process()
    {
        $info = $this->getInfo();
        $output = 'This website tends to be popular amongst:';
        $output .= '<br/>';
        $output .= sprintf(
            '%s connecting from %s',
            $info['gender']=='f'?'Females':'Males',
            $info['place']
        );
        $this->setOutput($output);
    }

    private function getInfo() {
        $domain = $this->getAnalyzer()->getPage()->getDomainName();
        $server = 'http://www.alexa.com/siteinfo/'.$domain;
        $page = new Page;
        $page->setUrl($server);
        $dom = $page->getSimpleHtmlDomObject();

        $gender = $dom->find('.demo-gender .pybar-row');
        $place = $dom->find('.demo-location .pybar-row');

        $males = $this->extract($gender[0]);
        $females = $this->extract($gender[1]);

        $places = array(
            'home'   =>$this->extract($place[0]),
            'school' =>$this->extract($place[1]),
            'work'   =>$this->extract($place[2]));

        $data = array();

        $data['gender'] = $males>$females?'m':'f';

        arsort($places);
        reset($places);
        $data['place'] = key($places);

        return $data;
    }

    private function extract($node) {
        $data = $node->find('span[style*="width:"]');
        list(,$value) = explode(':', $data[0]->style);
        $value = str_replace(array('px', ';'), '', $value);
        if ($value == '0' || $value == '50') {
            list(,$value) = explode(':', $data[1]->style);
            $value = str_replace(array('px', ';'), '', $value);
        }
        return $value;
    }
}

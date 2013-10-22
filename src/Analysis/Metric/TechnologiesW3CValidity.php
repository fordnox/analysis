<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;

class TechnologiesW3CValidity extends Metric
{
    protected $category         = 'Technologies';
    protected $title            = 'W3C Validity';
    protected $impact_level     = 'low';
    protected $solve_level      = 'easy';
    protected $pass_level       = 'fail';

    private function getError()
    {
        $validator = $this->getAnalyzer()->getW3CValidator()->getSimpleHtmlDomObject();
        if ($error = $validator->find('#results', 0)) return trim($error->innerText());
        return false;
    }

    private function getResult()
    {
        $validator = $this->getAnalyzer()->getW3CValidator()->getSimpleHtmlDomObject();
        if ($error = $validator->find('td.invalid', 0)) return trim($error->innerText());
        if ($success = $validator->find('.valid', 0)){
            return trim($success->innerText()).' '.trim($validator->find('td.valid', 0)->innerText());
        }
        return 'Could not validate given site.';
    }

    public function process()
    {
        $output = '';
        if ($error = $this->getError()) {
            $this->setPassLevel('fail');
            $output.=$error.' ';
        } else {
            $this->setPassLevel('pass');
        }
        $output .= $this->getResult();
        $this->setOutput($output);
    }
}

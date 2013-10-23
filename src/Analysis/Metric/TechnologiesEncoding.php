<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;

class TechnologiesEncoding extends Metric
{
    protected $category         = 'Technologies';
    protected $title            = 'Encoding';
    protected $impact_level     = 'low';
    protected $solve_level      = 'easy';
    protected $pass_level       = 'pass';

    private function getEncoding()
    {
        $validator = $this->getAnalyzer()->getW3CValidator();
        if ($validator) $validator = $validator->getSimpleHtmlDomObject();
        $encoding = null;
        if ($validator) $encoding = $validator->find('#charset',0);
        if ($encoding) $encoding = $encoding->parent;
        if ($encoding) $encoding = $encoding->parent;
        if ($encoding) $encoding = $encoding->find('td', 0);
        if ($encoding) $encoding = $encoding->innerText();
        if (!$encoding) $encoding = 'Unknown';

        return $encoding;
    }

    public function process()
    {
        $encoding = $this->getEncoding();
        $this->setOutput(strtoupper($encoding));
    }
}

<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;

class TechnologiesDoctype extends Metric
{
    protected $category         = 'Technologies';
    protected $title            = 'Doctype';
    protected $impact_level     = 'low';
    protected $solve_level      = 'easy';
    protected $pass_level       = 'fyi';

    private function getDoctype()
    {
        $validator = $this->getAnalyzer()->getW3CValidator();
        if ($validator) $validator = $validator->getSimpleHtmlDomObject();
        $doctype = null;
        if ($validator) $doctype = $validator->find('#doctype',0);
        if ($doctype) $doctype = $doctype->parent;
        if ($doctype) $doctype = $doctype->parent;
        if ($doctype) $doctype = $doctype->find('td', 0);
        if ($doctype) $doctype = $doctype->innerText();
        if (!$doctype) $doctype = 'Unknown';

        return $doctype;
    }

    public function process()
    {
        $doctype = $this->getDoctype();
        $this->setOutput($doctype);
    }
}

<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;

class SeoContentImages extends Metric
{
    protected $category         = 'SEO Content';
    protected $title            = 'Images';
    protected $impact_level     = 'medium';
    protected $solve_level      = 'easy';
    protected $pass_level       = 'pass';

    public function getImagesCount()
    {
        $dom = $this->getAnalyzer()->getPage()->getSimpleHtmlDomObject();
        $i = 0;
        $n = 0;
        while($dom->find('img',$i++)) $n++;
        return $n;
    }
    /**
     * @todo finish
     */
    public function process()
    {
        $images = $this->getImagesCount();
        if (!$images) {
            $this->setOutput('No images found on this website.');
            $this->setPassLevel('fail');
        } else {
            $this->setOutput(sprintf('We found %d images on this website', $images));
            $this->setPassLevel('pass');
        }

    }
}

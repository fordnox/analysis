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
        $dom = $this->getPage()->getSimpleHtmlDomObject();
        $n = 0;
        $alt = 0;
        while($im=$dom->find('img',$n)){
            if (!$im->alt) $alt++;
            $n++;
        }
        return array($n, $alt);
    }

    public function process()
    {
        list($images, $alt) = $this->getImagesCount();
        if (!$images) {
            $output = 'No images found on this website.';
            $this->setPassLevel('fail');
        } else {
            $output = sprintf('We found %d images on this website', $images);
            $this->setPassLevel('pass');
        }
        if ($alt) $output .= '<br/>' . sprintf('We found that %d images have no alt attribute, or it is empty', $alt);
        $this->setOutput($output);

    }
}

<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;

class SecurityIframeRendering extends Metric
{
    protected $category         = 'Security';
    protected $title            = 'Render in iframe';
    protected $impact_level     = 'low';
    protected $solve_level      = 'easy';
    protected $pass_level       = 'pass';

    /**
     * @see https://developer.mozilla.org/en-US/docs/HTTP/X-Frame-Options
     */
    public function process()
    {
        $value = $this->getAnalyzer()->getIframeRenderingProtectionHeaderValue();
        if(!is_null($value)) {
            $this->setPassLevel('pass');
            $this->setOutput('Great. Your website has defined <iframe> rendering protection rules');
        }elseif($value == 'DENY') {
            $this->setPassLevel('pass');
            $this->setOutput('Great. Your website cannot be displayed in a frame, regardless of the site attempting to do so.');
        }elseif($value == 'SAMEORIGIN') {
            $this->setPassLevel('pass');
            $this->setOutput('Great. Your website can only be displayed in a frame on the same origin as the page itself.');
        }elseif(is_null($value)) {
            $this->setPassLevel('fail');
            $this->setOutput('Your website is allowed to be rendered in an iframe');
        }
    }
}

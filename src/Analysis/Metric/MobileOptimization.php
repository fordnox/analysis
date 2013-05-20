<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;

class MobileOptimization extends Metric
{
    protected $category         = 'Mobile';
    protected $title            = 'Mobile Optimization';
    protected $impact_level     = 'low';
    protected $solve_level      = 'easy';
    protected $pass_level       = 'fyi';

    /**
     * @todo finish
     */
    public function process()
    {
        $a = $this->getAnalyzer();
        $mobile_css = $a->getMobileHasCss();
        $apple_icon = $a->getMobileHasAppleIcon();
        $viewport_tag = $a->getMobileHasMetaViewportTag();
        $has_redirection = $a->getMobileHasRedirection();
        $has_flash = $a->hasFlash();

        $output = '<p>Great, your web page is super optimized for Mobile Visitors</p>';
        $output .= '<ul class="unstyled">';

        $li = '<li><i class="icon-%s"></i> %s</li>';

        $output .= $mobile_css ? sprintf($li, 'ok', 'Mobile CSS') : sprintf($li, 'remove', 'Mobile CSS');
        $output .= $apple_icon ? sprintf($li, 'ok', 'Apple Icon') : sprintf($li, 'remove', 'Apple Icon');
        $output .= $viewport_tag ? sprintf($li, 'ok', 'Meta Viewport Tag') : sprintf($li, 'remove', 'Meta Viewport Tag');
        $output .= $has_redirection ? sprintf($li, 'ok', 'Mobile Redirection') : sprintf($li, 'remove', 'Mobile Redirection');
        $output .= !$has_flash ? sprintf($li, 'ok', 'No Flash content') : sprintf($li, 'remove', 'Flash content');

        $output .= '</ul>';

        $this->setOutput($output);
    }


}

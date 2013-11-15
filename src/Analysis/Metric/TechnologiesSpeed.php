<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;

class TechnologiesSpeed extends Metric
{
    protected $category         = 'Technologies';
    protected $title            = 'Speed Tips';
    protected $impact_level     = 'low';
    protected $solve_level      = 'easy';
    protected $pass_level       = 'pass';

    public function process()
    {
        $optimal_css = 3;
        $optimal_js = 5;

        $cache = $this->hasCache();
        $inline = $this->hasInlineCss();
        $css = $this->countCssFiles();
        $js = $this->countJsFiles();
        $gz = $this->hasGzip();

        $output='';
        if ($cache && $inline && $css <= $optimal_css && $js <= $optimal_js && $gz)
            $output.='<p>Congratulations! Your websites speed is fully optimized.</p>';
        else
            $output.='<p>You should better optimise your website.</p>';
        $output.='<ul class="unstyled">';
        $output.=sprintf('<li><i class="icon-%s"></i> %s</li>',
            $cache?'ok':'minus',
            $cache?'Perfect, your server is using a caching method to speed up page display. Perfect, your website does not use nested tables.':'You should use cache to fasten your page loading.'
        );
        $output.=sprintf('<li><i class="icon-%s"></i> %s</li>',
            $inline?'minus':'ok',
            $inline?'Too bad, your site uses inline css styles. They should be put on a separate file to fasten the page loading.':'Perfect, your website does not use inline styles.'
        );
        $output.=sprintf('<li><i class="icon-%s"></i> %s</li>',
            $css <= $optimal_css?'ok':'minus',
            $css <= $optimal_css?'Perfect, your website has few CSS files.':'Too bad, your site has lots of CSS files.'
        );
        $output.=sprintf('<li><i class="icon-%s"></i> %s</li>',
            $js <= $optimal_js?'ok':'minus',
            $js <= $optimal_js?'Perfect, your website has few JavaScript files.':'Too bad, your site has lots of JavaScript files.'
        );
        $output.=sprintf('<li><i class="icon-%s"></i> %s</li>',
            $gz?'ok':'minus',
            $gz?'Perfect, your website takes advantage of gzip.':'Too bad, your site does not use gzip compression.'
        );

        $this->setOutput($output);
    }

    private function hasCache()
    {
        $cc = $this->getPage()->getHeader('Cache-Control');
        if (!$cc) return false;
        if (stripos($cc, 'no-cache') !== false) return false;
        if (stripos($cc, 'public') !== false) return true;
        if (stripos($cc, 'private') !== false) return true;
        if (stripos($cc, 'max-age') !== false) return true;
        return false;
    }

    private function hasInlineCss()
    {
        $dom = $this->getAnalyzer()->getPage()->getSimpleHtmlDomObject();
        if ($dom->find('[style]', 0)) return true;
        return false;
    }

    private function countCssFiles()
    {
        return $this->getAnalyzer()->getPage()->countSelector('style[src], link[rel=stylesheet]');
    }

    private function countJsFiles()
    {
        return $this->getAnalyzer()->getPage()->countSelector('script[src]');
    }

    private function hasGzip()
    {
        $ae = $this->getPage()->getHeader('Content-Encoding');
        return stripos($ae, 'gzip') !== false;
    }
}

<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;
use Analysis\Page;

class TechnologiesTechnologies extends Metric
{
    protected $category         = 'Technologies';
    protected $title            = 'Technologies';
    protected $impact_level     = 'low';
    protected $solve_level      = 'easy';
    protected $pass_level       = 'fyi';

    private function getPhpVersion()
    {
        $headers = $this->getAnalyzer()->getHeaders();
        return $headers['X-Powered-By'];
    }

    private function getJsCode()
    {
        $page = $this->getAnalyzer()->getPage();
        $dom = $page->getSimpleHtmlDomObject();

        $js = '';
        $scripts = $dom->find('script');
        foreach ($scripts as $script)
        {
            if ($script->innerText()) $js .= $script->innerText();
            if ($script->src) {
                $uri = $script->src;
                if ($uri[0].$uri[1] == '//') $uri = 'http:'.$uri;
                if ($uri[0] == '/') $uri = $page->getDomainLink().$uri;
                if (!strstr($uri, '://')) $uri = $page->getUrl().'/'.$uri;
                $p = new Page();
                $p->setUrl($uri);
                $js .= $p->getContent().' ';
            }
        }
        return $js;
    }

    private function containsJQuery($js)
    {
        return strpos($js,'.jQuery') !== false;
    }

    private function containsRequireJS($js)
    {
        return strpos($js, 'RequireJS') !== false;
    }

    public function process()
    {
        $server = $this->getAnalyzer()->getServer();
        $php = $this->getPhpVersion();
        $analytics = $this->getAnalyzer()->containsAnalytics();
        $js = $this->getJsCode();
        $jQuery = $this->containsJQuery($js);
        $require = $this->containsRequireJS($js);
        $output=sprintf('
        <ul class="unstyled">
            <li><i class="icon-%s"></i> %s</li>
            <li><i class="icon-%s"></i> %s</li>
            <li><i class="icon-%s"></i> %s</li>
            <li><i class="icon-%s"></i> %s</li>
            <li><i class="icon-%s"></i> %s</li>
        </ul>
        ',
        $analytics?'ok':'minus', 'Google Analytics',
        $server?'ok':'minus',    $server?$server:'Apache 2',
        $php?'ok':'minus',       $php?$php:'PHP 5.3',
        $jQuery?'ok':'minus',    'jQuery',
        $require?'ok':'minus',   'RequireJS');
        $this->setOutput($output);
    }
}

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
        $server = $this->getAnalyzer()->getServer();
        if($server && strpos($server, 'php')) {
            return $server;
        }
        return null;
    }

    private function getJsCode()
    {
        $page = $this->getPage();
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

        $item = '<li><i class="icon-ok"></i> %s</li>';
        $output='
        <ul class="unstyled">';

        $output.=  $analytics ?  sprintf($item, 'Google Analytics'):'';
        $output.=  $server    ?  sprintf($item, $server):'';
        $output.=  $php       ?  sprintf($item, $php):'';
        $output.=  $jQuery    ?  sprintf($item, 'jQuery'):'';
        $output.=  $require   ?  sprintf($item, 'RequireJS'):'';

        $output.='</ul>';

        $this->setOutput($output);
    }
}

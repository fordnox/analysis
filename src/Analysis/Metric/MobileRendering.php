<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;
use Analysis\Page;
use Buzz\Browser;

class MobileRendering extends Metric
{
    protected $category         = 'Mobile';
    protected $title            = 'Mobile Rendering';
    protected $impact_level     = 'medium';
    protected $solve_level      = 'hard';
    protected $pass_level       = 'fyi';

    public function generateScreenshot()
    {
        $image_path = sys_get_temp_dir().DIRECTORY_SEPARATOR;
        ini_set('user_agent', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_8_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/31.0.1650.57 Safari/537.36');
        $url = $this->getPage()->getUrl();
        $uri = $image_path.md5($url.date('Y-m-d-H')).'.png';
        if (file_exists($uri)) return $uri;

        $post_data = sprintf('url=%s&device_id=22&width=208', rawurlencode($url));
        $browser = new Browser;
        $data = array('status'=>'started');
        while($data['status'] && $data['status'] != 'finished') {
            $request = explode("\r\n\r\n", $browser->post('http://mobilito.net/screenshot/add', array(), $post_data));
            $data = json_decode($request[1], true);
            sleep(1);
        }

        if ($data['screenshot']) {
            $screenshot = $browser->get('http://mobilito.net'.$data['screenshot']);
            $screenshot = explode("\r\n\r\n", $screenshot, 2);
            file_put_contents($uri, $screenshot[1]);
            return $uri;
        }
        return false;

    }

    public function process()
    {
        $image = $this->generateScreenshot();

        $output = '<div class="part image iphone-thumb">
                    <img alt="Your website on an iPhone" itemprop="screenshot" src="%s">
                </div>';
        $output = $image ? sprintf($output, $image) : false;

        $this->setOutput($output);
    }
}

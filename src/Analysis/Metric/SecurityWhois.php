<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;

class SecurityWhois extends Metric
{
    protected $category         = 'Security';
    protected $title            = 'Whois Privacy';
    protected $impact_level     = 'medium';
    protected $solve_level      = 'easy';
    protected $pass_level       = 'fail';

    /**
     * @todo finish
     */
    public function process()
    {
        $whois = $this->getAnalyzer()->getWhois();
        $details = '';
        $contact_data = '';
        foreach ($whois['contacts'] as $role=>$owners) {
            foreach ($owners as $owner){
                $contact_data .= '<ul>';
                foreach ($owner as $name=>$data) {
                    if ($data) $contact_data .= '<li>'. ucfirst($name).': '.$data .'</li>';
                }
                $contact_data .= '</ul>';
            }
        }
        $registrar_data = '<ul>';
        foreach ($whois['registrar'] as $name=>$data) {
            if ($data) $registrar_data .= '<li>'. ucfirst($name).': '.$data .'</li>';
        }
        $registrar_data .= '</ul>';
        if ($contact_data) $details .= '<div><div class="title">Contact Data</div>'.$contact_data.'</div>';
        if ($registrar_data) $details .= '<div><div class="title">Registrar Data</div>'.$registrar_data.'</div>';
        if (!$details) $details = 'No whois data found';
        $this->setOutput($details);
    }
}

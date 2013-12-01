<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;

class UsabilityConversionForms extends Metric
{
    protected $category         = 'Usability';
    protected $title            = 'Conversion Forms';
    protected $impact_level     = 'high';
    protected $solve_level      = 'easy';
    protected $pass_level       = 'pass';

    public function process()
    {
        $max_inputs = 10;
        $input_count = $this->countInputs();
        $password_fields = $this->countPasswordFields();
        $captcha = $this->hasCaptcha();
        $conversion = $input_count <= $max_inputs && $password_fields < 2 && !$captcha;
        if ($conversion) {
            $output = 'Perfect, we found a Conversion Form on this page.';
            $this->setPassLevel('pass');
        } else {
            $output = 'We could not find a Conversion Form on this page.';
            $this->setPassLevel('fail');
        }

        $this->setOutput($output);
    }

    private function countInputs()
    {
        return $this->getPage()->countSelector('form input');
    }

    private function countPasswordFields()
    {
        return $this->getPage()->countSelector('input[type=password]');
    }

    private function hasCaptcha()
    {
        $dom = $this->getPage()->getSimpleHtmlDomObject();
        $cap = $dom->find('input[name=recaptcha_response_field],input[name=captcha],input[name=code],input[name=secret_code],input[name=answer],input[name=Turing],input[name=nucaptcha-answer],iframe[src*=recaptcha]', 0);
        if ($cap) return true;
        return false;
    }
}

<?php

namespace Analysis;


use Buzz\Browser;

class SEMRushApi {

    private $domain = null;
    private $display_limit = null;

    public function AdwordsTraffic()
    {
        return $this->_call('domain_rank', 'Ot,At');
    }

    public function getCompetitors()
    {
        return $this->_call('domain_organic_organic', 'Dn,Cr,Np,Or,Ot,Oc,Ad');
    }


    public function getKeywords()
    {
        return $this->_call('domain_organic', 'Ph,Po,Td,Ur');
    }

    private function _call($type = 'domain_rank', $columns='Dn,Rk,Or,Ot,Oc,Ad,At,Ac', $additional = array()) {
        $domain = $this->getDomain();
        if (is_array($columns)) $columns = implode(',', $columns);
        if (!defined('SM_API_KEY')) throw new Exception('Api key is not defined.', 101);

        if (!isset($additional['action'])) $additional['action'] = 'report';
        if (!isset($additional['export'])) $additional['export'] = 'api';
        $additional['type'] = $type;
        $additional['key'] = SM_API_KEY;
        $additional['export_columns'] = $columns;
        $additional['domain'] = $domain;
        if ($this->display_limit) $additional['display_limit'] = $this->display_limit;

        $api = 'http://us.api.semrush.com/?'.http_build_query($additional);

        $browser = new Browser;
        $headers = array();
        if (isset($_SERVER['REMOTE_ADDR'])) $headers['X-Real-IP'] = $_SERVER['REMOTE_ADDR'];
        list($headers,$data) = explode("\r\n\r\n", $browser->get($api, $headers));

        return $this->_parse($data, $columns);
    }

    public function setDomain($domain)
    {
        $this->domain = $domain;
    }

    public function setLimit($limit)
    {
        $this->display_limit = $limit;
    }

    private function getDomain()
    {
        if ($this->domain == null) throw new Exception('No domain is set.', 102);
        return $this->domain;
    }
    private function _parse($data, $columns)
    {
        if (substr($data, 0, 5) == 'ERROR') throw new Exception($data, 103);

        $list = explode("\n", $data);
        unset($list[0]);
        $i = 0;
        $result = array();
        $columns = explode(',', $columns);
        foreach ($list as $row) {
            if (!$row) continue;
            $cells = explode(';', $row);
            foreach ($cells as $k=>$cell) {
                $result[$i][trim($columns[$k])] = trim($cell);
            }
        $i++;
        }
        return $result;
    }
}
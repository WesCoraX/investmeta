<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    function data_banco($data_ruim)
    {
        $data = explode("/",$data_ruim);
        $data = array_reverse($data);
        $data = implode('-',$data);

        return $data;
    }

    function data_linda($data_ruim)
    {
        $data = explode("-",$data_ruim);
        $data = array_reverse($data);
        $data = implode('/',$data);
        return $data;
    }



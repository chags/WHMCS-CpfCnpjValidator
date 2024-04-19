<?php
/*
* WHMCS hoork - https://github.com/
*@author Chags
*@description: hoork de validaçãode CPF e CNPJ do WHMCS
*
*/

if (!defined('WHMCS')) {
    die('You cannot access this file directly.');
}

use WHMCS\Database\Capsule;

if (!function_exists("validaCPF")) {
    function validaCPF($cpf = null) {
        if (empty($cpf)) {
            return false;
        }

        $cpf = preg_replace("/[^0-9]/", "", $cpf);

        if (strlen($cpf) != 11 || preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }

        for ($i = 0, $sum = 0; $i < 9; $i++) {
            $sum += intval($cpf[$i]) * (10 - $i);
        }

        $digit1 = ($sum * 10) % 11;
        $digit1 = ($digit1 == 10) ? 0 : $digit1;

        if ($cpf[9] != $digit1) {
            return false;
        }

        for ($i = 0, $sum = 0; $i < 10; $i++) {
            $sum += intval($cpf[$i]) * (11 - $i);
        }

        $digit2 = ($sum * 10) % 11;
        $digit2 = ($digit2 == 10) ? 0 : $digit2;

        return ($cpf[10] == $digit2);
    }
}

if (!function_exists("validaCNPJ")) {
    function validaCNPJ($cnpj = null) {
        if (empty($cnpj)) {
            return false;
        }

        $cnpj = preg_replace("/[^0-9]/", "", $cnpj);

        if (strlen($cnpj) != 14 || preg_match('/(\d)\1{13}/', $cnpj)) {
            return false;
        }

        for ($i = 0, $sum = 0, $mult = 5; $i < 12; $i++) {
            $sum += intval($cnpj[$i]) * $mult;
            $mult = ($mult == 2) ? 9 : ($mult - 1);
        }

        $digit1 = ($sum % 11 < 2) ? 0 : (11 - $sum % 11);

        if ($cnpj[12] != $digit1) {
            return false;
        }

        for ($i = 0, $sum = 0, $mult = 6; $i < 13; $i++) {
            $sum += intval($cnpj[$i]) * $mult;
            $mult = ($mult == 2) ? 9 : ($mult - 1);
        }

        $digit2 = ($sum % 11 < 2) ? 0 : (11 - $sum % 11);

        return ($cnpj[13] == $digit2);
    }
}

add_hook('ClientDetailsValidation', 1, function ($vars) {

    $customfield_cpf_cnpj = 1;
    $mensagem_erro_invalido = "O CPF/CNPJ informado não é válido.";
    $mensagem_erro_duplicado = 'Já existe uma conta cadastrada com esse CPF/CNPJ. Por favor <a href="login.php">faça login</a>.';

    $return = [];

    if (isset($vars['customfield'][$customfield_cpf_cnpj])) {
        $cpf_cnpj = preg_replace("/[^0-9]/", "", $vars['customfield'][$customfield_cpf_cnpj]);

        if (!validaCPF($cpf_cnpj) && !validaCNPJ($cpf_cnpj)) {
            $return[] = $mensagem_erro_invalido;
        } else {
            if ($_SESSION["adminid"]) {
                $duplicated = Capsule::table('tblcustomfieldsvalues')
                    ->where('fieldid', $customfield_cpf_cnpj)
                    ->where('value', preg_replace("/[^0-9]/", "", $cpf_cnpj))
                    ->first();

                if ($duplicated) {
                    $return[] = $mensagem_erro_duplicado;
                }
            } elseif (isset($_SESSION["uid"])) {
                $id = $_SESSION["uid"];
                $duplicated = Capsule::table('tblcustomfieldsvalues')
                    ->where('fieldid', $customfield_cpf_cnpj)
                    ->where('value', preg_replace("/[^0-9]/", "", $cpf_cnpj))
                    ->where('relid', '!=', $id)
                    ->first();

                if ($duplicated) {
                    $return[] = $mensagem_erro_duplicado;
                }
            }
        }
    }

    return $return;
});

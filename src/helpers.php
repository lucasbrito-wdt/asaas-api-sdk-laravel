<?php

if (! function_exists('asaas')) {
    /**
     * Retorna a instância do SDK Asaas (quando usado em app Laravel).
     */
    function asaas(): \Asaas\Laravel\AsaasSdk
    {
        return app(\Asaas\Laravel\AsaasSdk::class);
    }
}

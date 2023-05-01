<?php

class Language
{
    const PAYMENT_METHOD_FFD         = 'PAYMENT_METHOD_FFD';
    const FULL_PREPAYMENT            = 'FULL_PREPAYMENT';
    const PREPAYMENT                 = 'PREPAYMENT';
    const ADVANCE                    = 'ADVANCE';
    const FULL_PAYMENT               = 'FULL_PAYMENT';
    const PARTIAL_PAYMENT            = 'PARTIAL_PAYMENT';
    const CREDIT                     = 'CREDIT';
    const CREDIT_PAYMENT             = 'CREDIT_PAYMENT';
    const PAYMENT_OBJECT_FFD         = 'PAYMENT_OBJECT_FFD';
    const COMMODITY                  = 'COMMODITY';
    const EXCISE                     = 'EXCISE';
    const JOB                        = 'JOB';
    const SERVICE                    = 'SERVICE';
    const GAMBLING_BET               = 'GAMBLING_BET';
    const GAMBLING_PRIZE             = 'GAMBLING_PRIZE';
    const LOTTERY                    = 'LOTTERY';
    const LOTTERY_PRIZE              = 'LOTTERY_PRIZE';
    const INTELLECTUAL_ACTIVITY      = 'INTELLECTUAL_ACTIVITY';
    const PAYMENT                    = 'PAYMENT';
    const AGENT_COMMISSION           = 'AGENT_COMMISSION';
    const COMPOSITE                  = 'COMPOSITE';
    const ANOTHER                    = 'ANOTHER';
    const EMAIL_COMPANY_PERSONAL     = 'EMAIL_COMPANY_PERSONAL';
    const EMAIL_COMPANY              = 'EMAIL_COMPANY';
    const PAYMENT_METHOD             = 'PAYMENT_METHOD';
    const ACTIVE                     = 'ACTIVE';
    const PAYMENT_METHOD_NAME        = 'PAYMENT_METHOD_NAME';
    const PAYMENT_METHOD_USER        = 'PAYMENT_METHOD_USER';
    const TINKOFF_BANK               = 'TINKOFF_BANK';
    const TERMINAL                   = 'TERMINAL';
    const SPECIFIED_PERSONAL         = 'SPECIFIED_PERSONAL';
    const PASSWORD                   = 'PASSWORD';
    const DESCRIPTION_PAYMENT_METHOD = 'DESCRIPTION_PAYMENT_METHOD';
    const PAYMENT_THROUGH            = 'PAYMENT_THROUGH';
    const ORDER_COMPLETION           = 'ORDER_COMPLETION';
    const AUTOMATIC_SUCCESSFUL       = 'AUTOMATIC_SUCCESSFUL';
    const SEND_DATA_CHECK            = 'SEND_DATA_CHECK';
    const DATA_TRANSFER              = 'DATA_TRANSFER';
    const TAX_SYSTEM                 = 'TAX_SYSTEM';
    const CHOOSE_SYSTEM_STORE        = 'CHOOSE_SYSTEM_STORE';
    const TOTAL_CH                   = 'TOTAL_CH';
    const SIMPLIFIED_CH              = 'SIMPLIFIED_CH';
    const SIMPLIFIED__COSTS          = 'SIMPLIFIED__COSTS';
    const SINGLE_IMPUTED_INCOME      = 'SINGLE_IMPUTED_INCOME';
    const UNIFIED_AGRICULTURAL_TAX   = 'UNIFIED_AGRICULTURAL_TAX';
    const PATENT_CH                  = 'PATENT_CH';
    const PAYMENT_LANGUAGE           = 'PAYMENT_LANGUAGE';
    const CHOOSE_PAYMENT_LANGUAGE    = 'CHOOSE_PAYMENT_LANGUAGE';
    const RUSSIA                     = 'RUSSIA';
    const ENGLISH                    = 'ENGLISH';
    const PAYMENT_SUCCESS            = 'PAYMENT_SUCCESS';
    const PAYMENT_NOT_SUCCESS        = 'PAYMENT_NOT_SUCCESS';
    const PAYMENT_THANK              = 'PAYMENT_THANK';
    const PAYMENT_ERROR              = 'PAYMENT_ERROR';
    const REQUEST_TO_PAYMENT         = 'REQUEST_TO_PAYMENT';
    const SETUP_OF_RECEIVING         = 'SETUP_OF_RECEIVING';
    const TINKOFF_DOES_NOT_SUPPORT   = 'TINKOFF_DOES_NOT_SUPPORT';
    const GATEWAY_IS_DISABLED        = 'GATEWAY_IS_DISABLED';
    const FFD_12                     = 'FFD_12';
    const FFD_12_DESCRIPTION         = 'FFD_12_DESCRIPTION';
    const FFD_12_ADVICE              = 'FFD_12_ADVICE';
    
    public $language = [];

    protected static $instance = null;

    public static function getInstance()
    {
        if (null === self::$instance)
        {
            self::$instance = new static();
        }
        return self::$instance;
    }

    private function __clone() {}

    public function __construct(){}

    public static function get($name)
    {
        $instance = RuLanguage::getInstance();

        if (!isset($instance->language[$name])) {
            return 'Error';
        }

        return $instance->language[$name];
    }
}

<?php

namespace App\Enums;

enum PaymentMethod: string
{
    case KBZ_PAY = 'KBZPay';
    case WAVE_MONEY = 'Wave Money';
    case CB_PAY = 'CB Pay';
    case AYA_PAY = 'AYA Pay';
    case PROMPT_PAY = 'PromptPay';
    case TRUE_MONEY_WALLET = 'TrueMoney Wallet';
    case AIR_PAY = 'AirPay';

    public function label(): string
    {
        return match ($this) {
            self::KBZ_PAY => 'KBZ Pay',
            self::WAVE_MONEY => 'Wave Money',
            self::CB_PAY => 'CB Pay',
            self::AYA_PAY => 'AYA Pay',
            self::PROMPT_PAY => 'Prompt Pay',
            self::TRUE_MONEY_WALLET => 'TrueMoney Wallet',
            self::AIR_PAY => 'AirPay',
        };
    }
}

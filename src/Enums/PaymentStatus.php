<?php

namespace Naimsolong\MayaPay\Enums;

use ArchTech\Enums\{
    InvokableCases, Names, Values
};

enum PaymentStatus: string {
    use InvokableCases, Names, Values;

    case PENDING_TOKEN = 'PENDING_TOKEN';
    case PENDING_PAYMENT = 'PENDING_PAYMENT';
    case FOR_AUTHENTICATION = 'FOR_AUTHENTICATION';
    case AUTHENTICATING = 'AUTHENTICATING';
    case AUTH_SUCCESS = 'AUTH_SUCCESS';
    case AUTH_FAILED = 'AUTH_FAILED';
    case PAYMENT_EXPIRED = 'PAYMENT_EXPIRED';
    case PAYMENT_PROCESSING = 'PAYMENT_PROCESSING';
    case PAYMENT_SUCCESS = 'PAYMENT_SUCCESS';
    case PAYMENT_FAILED = 'PAYMENT_FAILED';
    case PAYMENT_CANCELLED = 'PAYMENT_CANCELLED';
    case VOIDED = 'VOIDED';
    case REFUNDED = 'REFUNDED';
}
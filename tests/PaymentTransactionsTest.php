<?php

use Naimsolong\MayaPay\Datas\CaptureAmount;
use Naimsolong\MayaPay\Datas\TotalAmount;
use Naimsolong\MayaPay\Requests\CheckoutRequest;
use Naimsolong\MayaPay\Requests\PaymentTransactions\CancelRequest;
use Naimsolong\MayaPay\Requests\PaymentTransactions\CaptureRequest;
use Naimsolong\MayaPay\Requests\PaymentTransactions\RetrieveStatusRequest;
use Naimsolong\MayaPay\Requests\PaymentTransactions\RetrieveViaIDRequest;
use Naimsolong\MayaPay\Requests\PaymentTransactions\RetrieveViaRRNRequest;

test('CaptureRequest can return success response', function () {
    $request = new CheckoutRequest(
        totalAmount: new TotalAmount(value: 80, currency: 'PHP'),
        requestReferenceNumber: 'TEST123',
    );

    $response = $request->send();

    $data = $response->json();

    $request = new CaptureRequest(
        paymentId: $data['checkoutId'],
        captureAmount: new CaptureAmount(amount: 80, currency: 'PHP'),
        requestReferenceNumber: 'TEST123',
    );

    $response = $request->send();

    expect($response->ok())->toBeTrue();
    expect($response->json())->toHaveKeys([
        'checkoutId', 'redirectUrl',
    ]);
})->skip(true, 'Cannot make request, later check');

test('RetrieveViaIDRequest can return success response', function () {
    $request = new CheckoutRequest(
        totalAmount: new TotalAmount(value: 80, currency: 'PHP'),
        requestReferenceNumber: 'TEST123',
    );

    $response = $request->send();

    expect($response->ok())->toBeTrue();

    $data = $response->json();

    $request = new RetrieveViaIDRequest(
        paymentId: $data['checkoutId'],
    );

    $response = $request->send();

    expect($response->ok())->toBeTrue();
    expect($response->json())->toHaveKeys([
        'id',
        'isPaid',
        'status',
        'amount',
        'currency',
        'canVoid',
        'canRefund',
        'canCapture',
        'createdAt',
        'updatedAt',
        'requestReferenceNumber',

    ]);
});

test('RetrieveViaRRNRequest can return success response', function () {
    $reference_number = 'TEST'.rand(999, 888).'-'.(rand(10, 99) * 3);

    $request = new CheckoutRequest(
        totalAmount: new TotalAmount(value: 80, currency: 'PHP'),
        requestReferenceNumber: $reference_number,
    );

    $response = $request->send();

    $data = $response->json();

    $request = new RetrieveViaRRNRequest(
        rrn: $reference_number,
    );

    $response = $request->send();

    expect($response->ok())->toBeTrue();

    $data = $response->json();
    expect($response->ok())->toBeTrue();
    expect(count($data) > 0)->toBeTrue();
    expect($data[0])->toHaveKeys([
        'id',
        'isPaid',
        'status',
        'amount',
        'currency',
        'canVoid',
        'canRefund',
        'canCapture',
        'createdAt',
        'updatedAt',
        'requestReferenceNumber',
    ]);

    $request = new RetrieveViaRRNRequest(
        rrn: 'TEST123',
    );

    $response = $request->send();

    $data = $response->json();
    expect($response->ok())->toBeTrue();
    expect(count($data) > 0)->toBeTrue();

    $filtered_data = array_values(array_filter($data, function ($item) {
        return $item['status'] == 'PAYMENT_SUCCESS';
    }));

    expect($filtered_data[0])->toHaveKeys([
        'id',
        'isPaid',
        'status',
        'amount',
        'currency',
        'canVoid',
        'canRefund',
        'canCapture',
        'createdAt',
        'updatedAt',
        'description',
        'paymentTokenId',
        'fundSource' => [
            'type',
            'id',
            'description',
            'details' => [
                'scheme',
                'last4',
                'first6',
                'masked',
                'issuer',
            ],
        ],
        'receipt' => [
            'transactionId',
            'receiptNo',
            'approval_code',
            'approvalCode',
        ],
        'approvalCode',
        'receiptNumber',
        'requestReferenceNumber',
    ]);
});

test('RetrieveStatusRequest can return success response', function () {
    $reference_number = 'TEST'.rand(999, 888).'-'.(rand(10, 99) * 3);

    $request = new CheckoutRequest(
        totalAmount: new TotalAmount(value: 80, currency: 'PHP'),
        requestReferenceNumber: $reference_number,
    );

    $response = $request->send();

    expect($response->ok())->toBeTrue();

    $data = $response->json();

    $request = new RetrieveStatusRequest(
        paymentId: $data['checkoutId'],
    );

    $response = $request->send();

    expect($response->ok())->toBeTrue();
    expect($response->json())->toHaveKeys([
        'id',
        'status',
    ]);
})->skip(true, 'Cannot make request, later check');

test('CancelRequest can return success response', function () {
    $reference_number = 'TEST'.rand(999, 888).'-'.(rand(10, 99) * 3);

    $request = new CheckoutRequest(
        totalAmount: new TotalAmount(value: 80, currency: 'PHP'),
        requestReferenceNumber: $reference_number,
    );

    $response = $request->send();

    expect($response->ok())->toBeTrue();

    $data = $response->json();

    $request = new CancelRequest(
        paymentId: $data['checkoutId'],
    );

    $response = $request->send();

    expect($response->ok())->toBeTrue();
    expect($response->json())->toHaveKeys([
        'id',
        'isPaid',
        'status',
        'amount',
        'currency',
        'canVoid',
        'canRefund',
        'canCapture',
        'createdAt',
        'updatedAt',
        'description',
        'paymentTokenId',
        'fundSource' => [
            'type',
            'id',
            'description',
            'details' => [
                'scheme',
                'last4',
                'first6',
                'masked',
                'issuer',
            ],
        ],
        'receipt' => [
            'transactionId',
            'receiptNo',
            'approval_code',
            'approvalCode',
        ],
        'approvalCode',
        'receiptNumber',
        'requestReferenceNumber',
    ]);
})->skip(true, 'Cannot make request, this endpoint can only be called using the Production API.');

<?php

use Naimsolong\MayaPay\Datas\AmountDetails;
use Naimsolong\MayaPay\Datas\BasicBillingAddress;
use Naimsolong\MayaPay\Datas\BasicBuyer;
use Naimsolong\MayaPay\Datas\BasicShippingAddress;
use Naimsolong\MayaPay\Datas\ContactBuyer;
use Naimsolong\MayaPay\Datas\Item;
use Naimsolong\MayaPay\Datas\ItemAmount;
use Naimsolong\MayaPay\Datas\Items;
use Naimsolong\MayaPay\Datas\ItemTotalAmount;
use Naimsolong\MayaPay\Datas\KountBillingAddress;
use Naimsolong\MayaPay\Datas\KountBuyer;
use Naimsolong\MayaPay\Datas\KountShippingAddress;
use Naimsolong\MayaPay\Datas\MetaData;
use Naimsolong\MayaPay\Datas\PaymentFacilitator;
use Naimsolong\MayaPay\Datas\RedirectUrl;
use Naimsolong\MayaPay\Datas\TotalAmount;
use Naimsolong\MayaPay\Requests\CheckoutRequest;

it('can return success response', function () {
    $request = new CheckoutRequest(
        totalAmount: new TotalAmount(value: 80, currency: 'PHP'),
        requestReferenceNumber: 'TEST123',
    );

    $response = $request->send();

    expect($response->ok())->toBeTrue();
    expect($response->json())->toHaveKeys([
        'checkoutId', 'redirectUrl',
    ]);
});

it('can pass with array of items', function () {
    $request = new CheckoutRequest(
        totalAmount: new TotalAmount(value: 100, currency: 'PHP'),
        requestReferenceNumber: 'TEST123',
        items: new Items([
            new Item(name: 'Item #1', code: 'ITEM#1', quantity: 2, description: 'Ze description #1', amount: new ItemAmount(value: 30, details: new AmountDetails(subtotal: 27, tax: 3)), totalAmount: new ItemTotalAmount(value: 60)),
            new Item(name: 'Item #2', code: 'ITEM#2', quantity: 4, description: 'Ze description #2', amount: new ItemAmount(value: 10, details: new AmountDetails(subtotal: 9, tax: 1)), totalAmount: new ItemTotalAmount(value: 40)),
        ])
    );

    $response = $request->send();

    expect($response->ok())->toBeTrue();
    expect($response->json())->toHaveKeys([
        'checkoutId', 'redirectUrl',
    ]);
});

it('can pass with buyer infos', function () {
    $request = new CheckoutRequest(
        totalAmount: new TotalAmount(value: 100, currency: 'PHP'),
        requestReferenceNumber: 'TEST123',
        buyer: new BasicBuyer(
            firstName: 'Ze first name',
            middleName: 'Ze middle name',
            lastName: 'Ze last name',
            birthday: '1991-01-09',
            customerSince: '2023-06-03',
            sex: 'M',
            contact: new ContactBuyer(phone: '0123456789', email: 'test@email.com'),
            billingAddress: new BasicBillingAddress(line1: 'Road name', line2: 'Comunnity name', city: 'City name', state: 'State name', zipCode: '12345', countryCode: 'PH'),
            shippingAddress: new BasicShippingAddress(line1: 'Road name', line2: 'Comunnity name', city: 'City name', state: 'State name', zipCode: '12345', countryCode: 'PH', firstName: 'Ze first name', phone: '0123456789', email: 'test@email.com', shippingType: 'ST'),
        )
    );

    $response = $request->send();

    expect($response->ok())->toBeTrue();
    expect($response->json())->toHaveKeys([
        'checkoutId', 'redirectUrl',
    ]);

    $request = new CheckoutRequest(
        totalAmount: new TotalAmount(value: 100, currency: 'PHP'),
        requestReferenceNumber: 'TEST123',
        buyer: new KountBuyer(
            firstName: 'Ze first name',
            middleName: 'Ze middle name',
            lastName: 'Ze last name',
            birthday: '1991-01-09',
            customerSince: '2023-06-03',
            sex: 'M',
            contact: new ContactBuyer(phone: '0123456789', email: 'test@email.com'),
            billingAddress: new KountBillingAddress(line1: 'Road name', line2: 'Comunnity name', city: 'City name', state: 'State name', zipCode: '12345', countryCode: 'PH'),
            shippingAddress: new KountShippingAddress(line1: 'Road name', line2: 'Comunnity name', city: 'City name', state: 'State name', zipCode: '12345', countryCode: 'PH', firstName: 'Ze first name', phone: '0123456789', email: 'test@email.com', shippingType: 'ST'),
        )
    );

    $response = $request->send();

    expect($response->ok())->toBeTrue();
    expect($response->json())->toHaveKeys([
        'checkoutId', 'redirectUrl',
    ]);
});

it('can return with redirectUrl', function () {
    $request = new CheckoutRequest(
        totalAmount: new TotalAmount(value: 80, currency: 'PHP'),
        requestReferenceNumber: 'TEST123',
        redirectUrl: new RedirectUrl(
            success: 'https://www.example.com/success',
            failure: 'https://www.example.com/failure',
            cancel: 'https://www.example.com/cancel',
        )
    );

    $response = $request->send();

    expect($response->ok())->toBeTrue();
    expect($response->json())->toHaveKeys([
        'checkoutId', 'redirectUrl',
    ]);
});

it('can return with metaData', function () {
    $request = new CheckoutRequest(
        totalAmount: new TotalAmount(value: 80, currency: 'PHP'),
        requestReferenceNumber: 'TEST123',
        metaData: new MetaData(subMerchantRequestReferenceNumber: 'TEST123', pf: new PaymentFacilitator(
            smi: 'ID',
            smn: 'Name',
            mci: 'Location',
            mpc: 'PHP',
            mco: 'PH',
        ))
    );

    $response = $request->send();

    expect($response->ok())->toBeTrue();
    expect($response->json())->toHaveKeys([
        'checkoutId', 'redirectUrl',
    ]);
});

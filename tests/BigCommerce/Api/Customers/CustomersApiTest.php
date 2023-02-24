<?php

namespace BigCommerce\Tests\Api\Customers;

use BigCommerce\ApiV3\ResourceModels\Customer\AttributeValue;
use BigCommerce\ApiV3\ResourceModels\Customer\Customer;
use BigCommerce\ApiV3\ResourceModels\Customer\CustomerAddress;
use BigCommerce\Tests\BigCommerceApiTest;

class CustomersApiTest extends BigCommerceApiTest
{
    public function testCanGetCustomers()
    {
        $this->setReturnData('customers__get_all.json');
        $customersResponse = $this->getApi()->customers()->getAll();
        $customers = $customersResponse->getCustomers();
        $this->assertEquals(1, $customersResponse->getPagination()->total);
        $this->assertEquals('John', $customers[0]->first_name);
        $this->assertInstanceOf(CustomerAddress::class, $customers[0]->addresses[0]);
        $this->assertInstanceOf(AttributeValue::class, $customers[0]->attributes[0]);
        $this->assertEquals('California', $customers[0]->addresses[0]->state_or_province);
    }

    public function testCanGetAllPagesOfCustomers()
    {
        $this->setReturnData('customers__get_all.json');

        $customersResponse = $this->getApi()->customers()->getAll();

        $this->assertEquals(1, $customersResponse->getPagination()->total);
    }

    public function testCanGetCustomerByEmail()
    {
        $this->setReturnData('customers__get_all.json');
        $customer = $this->getApi()->customers()->getByEmail('john.smith@spam.me');

        $this->assertEquals('John', $customer->first_name);
    }

    public function testUnknownCustomerReturnsEmptyResult()
    {
        $this->setReturnData('customers__get_all_no_results.json');
        $customer = $this->getApi()->customers()->getByEmail('wade.wilson@spam.me');

        $this->assertNull($customer);
    }

    public function testCanGetCustomerById()
    {
        $this->setReturnData('customers__get_all.json');
        $customer = $this->getApi()->customers()->getById(1);

        $this->assertEquals('john.smith@spam.me', $customer->email);
    }

    public function testCanGetNullCustomerById()
    {
        $this->setReturnData('customers__get_all_no_results.json');
        $customer = $this->getApi()->customers()->getById(2);

        $this->assertNull($customer);
    }

    public function testCanCreateCustomers()
    {
        $customers = [
            new Customer((object)['first_name' => 'John', 'last_name' => 'Smith', 'email' => 'john.smith@spam.me']),
            new Customer((object)['first_name' => 'Joe', 'last_name' => 'Blogs', 'email' => 'joe@spam.me']),
        ];

        $this->setReturnData('customers__create.json');
        $customersResponse = $this->getApi()->customers()->create($customers);

        $this->assertCount(2, $customersResponse->getCustomers());
    }

    public function testCanDeleteCustomersIn()
    {
        $this->setReturnData('blank.json', 204);

        $this->assertTrue($this->getApi()->customers()->delete([1, 2]));
    }

    public function testCanValidateCredentials()
    {
        $this->setReturnData('customers__validate-credentials.json');

        $validation = $this->getApi()->customers()->validateCredentials('john.smith@example.com', 'Password123');

        $this->assertFalse($validation->getCredentialsValidation()->is_valid);
    }

    public function testCanGetStoredInstruments()
    {
        $this->setReturnData('customers__stored_instruments__get.json');

        $instruments = $this->getApi()->customer(1)->getStoredInstruments()->getStoredInstruments();

        $this->assertCount(3, $instruments);
        $this->assertEquals('VISA', $instruments[0]->brand);
    }
}

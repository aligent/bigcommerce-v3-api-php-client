<?php

namespace BigCommerce\Tests\Api\Customers;

use BigCommerce\ApiV3\ResourceModels\Customer\Customer;
use BigCommerce\Tests\BigCommerceApiTest;

class CustomersApiTest extends BigCommerceApiTest
{
    public function testCanGetCustomers()
    {
        $this->setReturnData('customers__get_all.json');
        $customersResponse = $this->getApi()->customers()->getAll();
        $this->assertEquals(1, $customersResponse->getPagination()->total);
        $this->assertEquals('Jan', $customersResponse->getCustomers()[0]->first_name);
    }

    public function testCanGetCustomerByEmail()
    {
        $this->markTestIncomplete();
    }

    public function testCanGetCustomerById()
    {
        $this->setReturnData('customers__get_all.json');
        $customer = $this->getApi()->customers()->getById(1);

        $this->assertEquals('jan.plank@aligent.com.au', $customer->email);
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
}

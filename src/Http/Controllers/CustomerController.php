<?php

namespace Smallaccounts\Core\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Smallaccounts\Core\Mail\CreateCustomerMailable;
use Smallaccounts\Core\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        return [
            [
                'name' => 'A Customer'
            ]
        ];
    }

    public function create()
    {
        $customer = new Customer();
        
        Mail::to(config('smallaccounts.emails.to'))
            ->send(new CreateCustomerMailable($customer));

        return 'created';
    }
}

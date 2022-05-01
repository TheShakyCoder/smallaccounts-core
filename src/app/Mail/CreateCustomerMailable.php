<?php

namespace Smallaccounts\Core\App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Smallaccounts\Core\App\Models\Customer;

class CreateCustomerMailable extends Mailable
{
    use Queueable, SerializesModels;

    private $customer;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('smallaccounts::emails.customer.create')
            ->with(['customer' => $this->customer]);
    }
}

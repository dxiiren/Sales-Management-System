<?php

namespace App\Listeners;

use App\Events\InvoiceCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class LogInvoiceCreated
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(InvoiceCreated $event): void
    {
        $message = sprintf(
            "date: %s, ref: %s, total: %s",
            $event->sale->invoice_date,
            $event->sale->ref_num,
            $event->sale->total
        );

        Log::channel('invoice')->info($message);
    }
}

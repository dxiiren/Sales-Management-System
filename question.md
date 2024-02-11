### Sale Model Definition

Define a Sale model that has the soft delete trait.

Step by step:
1- Create model ( php artisan make model)
2- use softdelete
3- declare table name & fillable (mass store)
4- create controller to store the sale

### Event Handling

- Broadcast `InvoiceCreated` event when a new sale is created and push it to the queue.
- Subscribe to the `InvoiceCreated` event and write a log into `invoice.log` for every `InvoiceCreated` event with the following details:
  - Date
  - Reference Number (ref_num)
  - Total

**Step by step:**
1) **EVENT CREATION**
- Create event (php artisan make event)
- Implement should queue to push it queue 
- Define sale model in construct class

* can do dispatch right in class or do it automatically by define the event in the sale model 

2) **JOB CREATION**
- php artisan queue:table
- php artisan migrate
- in config.php     'default' => env('QUEUE_CONNECTION', 'database'),
- or in .env        QUEUE_CONNECTION=database

3) **LISTENER**
- create listener (php artisan make listener)
- do handle function to receive event and log it invoice.log

4) **LOG CHANNEL CONFIGURATION**
- in logging.php         

```php
'invoice' => [
    'driver' => 'single',
    'path' => storage_path('logs/invoice.log'),
    'level' => 'info',
],
```

5) **Register event and listener in EventServiceProvider**

6) **Endpoint**

- using faker 
http://biztory.test/api/store-sale

- normal input
http://biztory.test/api/sales

```json
input body (json)
{
    "ref_num": "ABC123",
    "invoice_date": "2024-02-11",
    "payee": "John Doe",
    "payee_id": 123,
    "total": 500.00,
    "currency_total": 500.00,
    "paid": 500.00,
    "due": 0.00
}
```

### GraphQL Endpoint

Develop a GraphQL endpoint that will return:
- The result of daily total sales in amount within a given date range.
- Filter by `payment_status`, `payee_id`.

**Step by step**
1) **Install lighthouse**
https://lighthouse-php.com/6/getting-started/installation.html#install-via-composer

2) **Set mutation schema for daily total sales**

3) **Create custom mutation**
- php artisan lighthouse:mutation DailyTotalSales

4) **End Point**
http://biztory.test/graphql

- body (json format)
{
  "query": "mutation DailyTotalSales($startDate: Date!, $endDate: Date!, $paymentStatus: Int, $payeeId: ID) { DailyTotalSales(start_date: $startDate, end_date: $endDate, payment_status: $paymentStatus, payee_id: $payeeId) { amount, payment_status, payee_id } }",
  "variables": {
    "startDate": "2023-01-01",
    "endDate": "2023-06-30",
    "paymentStatus": 1,
    "payeeId": 506
  }
}



5) **Additional**
- endpoint
http://biztory.test/api/daily-sale

- body (json format)
```json
input body (json)
{
    "start_date": "2023-01-01",
    "end_date": "2023-06-30",
    "payee_id": "",
    "payment_status": ""
}
```
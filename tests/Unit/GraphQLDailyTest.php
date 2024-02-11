<?php

namespace Tests\Unit;

use Tests\TestCase;

class GraphQLDailyTest extends TestCase
{
    /**
     * A basic unit test example.
     */

     public function testDailyTotalSalesMutation(): void
    {
        // Define the request body
        $requestBody = [
            "query" => "mutation DailyTotalSales(\$startDate: Date!, \$endDate: Date!, \$paymentStatus: Int, \$payeeId: ID) { DailyTotalSales(start_date: \$startDate, end_date: \$endDate, payment_status: \$paymentStatus, payee_id: \$payeeId) { amount, payment_status, payee_id } }",
            "variables" => [
              "startDate"=> "2023-01-01",
              "endDate"=> "2023-06-30",
              "paymentStatus"=> 1,
              "payeeId"=> 506
            ]
        ];

        // Send the GraphQL request
        $response = $this->json('POST', 'http://biztory.test/graphql', $requestBody);

        // Assert the response status is 200 and the amount
        $response->assertStatus(200);
        $this->assertNotNull($response->json('data')['DailyTotalSales']['amount']);

        //output
        // {
        //     "data": {
        //         "DailyTotalSales": {
        //             "amount": "RM 550.00",
        //             "payment_status": 1,
        //             "payee_id": "506"
        //         }
        //     }
        // }
    }

}

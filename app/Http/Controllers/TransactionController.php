<?php

namespace App\Http\Controllers;
use App\Services\TransactionService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Exception;

class TransactionController extends Controller
{
    protected $transactionService;

    public function __construct(TransactionService $transactionService) 
    {
        $this->transactionService = $transactionService;
    }

    public function getTransactions()
    {
        $result = ['status' => 200, 'message' => 'Get vehicles success'];
        try {
            $result['data'] = $this->transactionService->getTransactions();
        } catch (RequestException $ex) {
            return response()->json([
                'status' => 401,
                'message' => 'Bad request',
            ]);
        }
        return response()->json($result, $result['status']);
    }

    public function createTransaction(Request $request, Response $response) 
    {
        $result = ['status' => 201, 'message' => 'Transaction created successfully'];
        $data = $request->only([
            'vehicleId',
            'paymentType',
            'price'
        ]);
        
        try {
            $result['data'] = $this->transactionService->saveTransaction($data);
        } catch (Exception $e) {
            $result = ['status' => 401, 'message' => 'Bad request'];
            
            return response()->json([
                'status' => 401,
                'message' => 'Bad request',
            ], $result['status']);
        }

        return response()->json($result, $result['status']);
    }

    
}
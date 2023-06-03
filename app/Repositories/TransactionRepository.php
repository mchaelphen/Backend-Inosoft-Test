<?php
namespace App\Repositories;
use App\Models\Transaction;

class TransactionRepository
{

    public function saveTransaction($data) 
    {
        $transaction = new Transaction;
        
        $transaction->transactionNo = $data['transactionNo'];
        $transaction->vehicleId = $data['vehicleId'];
        $transaction->paymentType = $data['paymentType'];
        $transaction->price = $data['price'];
        $transaction->transactionStatus = $data['transactionStatus'];
        $transaction->save();

        return $transaction->fresh();
    }

    public function getTransactions()
    {
        $transaction = Transaction::all();

        return $transaction;
    }
}
?>
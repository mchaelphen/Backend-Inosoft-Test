<?php
namespace App\Services;
use App\Models\Transaction;
use App\Repositories\TransactionRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Exception;
use InvalidArgumentException;
use Carbon\Carbon;

class TransactionService
{
    protected $transactionRepository;

    public function __construct(TransactionRepository $transactionRepository) 
    {
        $this->transactionRepository = $transactionRepository;
    }

    public function saveTransaction($data) 
    {
        $validator = Validator::make($data, [
            'vehicleId'=>'required',
            'paymentType'=>'required',
            'price'=>'required'
        ]);
        
        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }
       
        $data['transactionNo'] = "TRN".Carbon::now()->format('Ymdhis');
        
        switch($data['paymentType']) {
            case Transaction::PAYMENT_CREDIT:
                $data['transactionStatus'] = Transaction::TRX_ONGOING;
                break;
            case Transaction::PAYMENT_CASH:
                $data['transactionStatus'] = Transaction::TRX_DONE;
                break;
        }

        $result = $this->transactionRepository->saveTransaction($data);

        return $result;
    }

    public function getTransactions()
    {
        $result = $this->transactionRepository->getTransactions();

        return $result;
    }

}
?>
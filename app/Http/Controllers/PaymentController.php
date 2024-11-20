<?php

namespace App\Http\Controllers;

use App\Collections\PaymentsCollection;
use App\Http\Requests\PaymentsRequest;
use App\Http\Resources\PaymentsResource;
use App\Services\PaymentService;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    protected $PaymentService;
    public function __construct(){
        $this->PaymentService = new PaymentService();
    }

    public function index(Request $request){
        $filters = $request->only(['amount', 'payment_method', 'status']);
        $payment = $this->PaymentService->getFilteredPayment($filters);
        return new PaymentsCollection($payment);
    }

    public function show($id){
        $payment = $this->PaymentService->getPaymentById($id);
        return new PaymentsResource($payment);
    }

    public function store(PaymentsRequest $request)
    {
        $payment = $this->PaymentService->createPayment($request->validated());
        return new PaymentsResource($payment);
    }

    



}

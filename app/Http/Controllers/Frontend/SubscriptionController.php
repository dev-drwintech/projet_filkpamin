<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Models\Subscription;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use App\Models\Payment;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $uuid = auth()->id();

        $user = User::where('id' , $uuid)->first();
    
        if (!$user) {
            return view('frontend.subscription.index');
        }
    
        // Récupérer tous les paiements actifs de l'utilisateur
        $activePayments = Payment::where('user_id', $user->id)->get();
    
        foreach ($activePayments as $payment) {
            $payment->amount = number_format($payment->amount, 0, '.', ',');
        }
        return view('frontend.subscription.index' , compact('activePayments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|Factory|View|void
     */
    public function store(Request $request)
    {
        return view('frontend.subscription.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Subscription $subscription
     * @return Response
     */
    public function show(Subscription $subscription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Subscription $subscription
     * @return Response
     */
    public function edit(Subscription $subscription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Subscription $subscription
     * @return Response
     */
    public function update(Request $request, Subscription $subscription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Subscription $subscription
     * @return Response
     */
    public function destroy(Subscription $subscription)
    {
        //
    }
}

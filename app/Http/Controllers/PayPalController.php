<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;
use Srmklive\PayPal\Services\AdaptivePayments;
use Cart;
use App\Models\Order;

class PayPalController extends Controller
{

    public function create()
    {
        session()->push('id_bill',session('id'));
        $provider = new ExpressCheckout;
        $invoiceId = uniqid();
        $data = $this->cartData($invoiceId);
        $response = $provider->setExpressCheckout($data);

        $response = $provider->setExpressCheckout($data, true);
        
        return redirect($response['paypal_link']);
    }

    public function cancel()
    {
        dd('Sorry you payment is canceled');
    }

    public function success(Request $request)
    { 
        $provider = new ExpressCheckout;

        $token = $request->token;

        $PayerID = $request->PayerID;

        $response = $provider->getExpressCheckoutDetails($token);

        $invoiceId = $response['INVNUM'] ?? uniqid();

        $data = $this->cartData($invoiceId);

        $response = $provider->doExpressCheckoutPayment($data, $token, $PayerID);

        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
            $id_bill = session('id_bill');
            $order = Order::find($id_bill);
            if($order[0]->status == 0 ){
                $order[0]->update(['status' => 1]);
            }
            Cart::destroy();
            session()->forget('id_bill');
            return redirect('/')->with('message', 'order successful');
        }
        return redirect('/')->with('alert-type', 'error')->with('message', 'Create order failed');
    }

    protected function cartData($invoiceId)
    {
        $data = [];
        $data['items'] = [];
        foreach (Cart::content() as $item) {
            $item_product = [
                "name" => $item->name,
                "price" => $item->price,
                "qty" => $item->qty
            ];

            $data['items'][] = $item_product;
        }

        $data['invoice_id'] = $invoiceId;
        $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
        $data['return_url'] = route('payment.success');
        $data['cancel_url'] = route('payment.cancel');
        $data['total'] = Cart::total();
        return $data;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Donation;
use App\Models\Donator;
use App\Models\Order;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Paystack;

class PaymentController extends Controller
{


    public $prods = [];

    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway(Request $request)
    {

        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'country' => 'required|string',
            'street_address' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'postcode' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'amount' => 'required',
        ]);

        foreach ($request->session()->get('cart') as $itemArray) {
            foreach ($itemArray as $item) {
                $product = Product::findOrFail($item->id);
                if ($product->amount != ($item->price)) {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'error',
                        'errors' => ["Something went wrong, Your Order couldn't go through"],
                    ], 401);
                } else {
                    if ($product->qty > $item->qty + 0) {
                        $request->session()->put('billingDetails', [
                            'first_name' => $request->first_name,
                            'last_name' => $request->last_name,
                            'country' => $request->country,
                            'street_address' => $request->street_address,
                            'city' => $request->city,
                            'state' => $request->state,
                            'postcode' => $request->postcode,
                            'phone' => $request->phone,
                            'email' => $request->email,
                            'amount' => $request->amount,
                        ]);

                        try {
                            return Paystack::getAuthorizationUrl()->redirectNow();
                        } catch (\Exception $e) {
                            return Redirect::back()->withMessage(['msg' => 'The paystack token has expired. Please refresh the page and try again.', 'type' => 'error']);
                        }
                    } else {
                        return response()->json([
                            'status' => 'error',
                            'message' => 'error',
                            'errors' => ['Quantity requested is not available'],
                        ], 401);
                    }
                }
            };
        };
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback(Request $request)
    {
        $paymentDetails = Paystack::getPaymentData();
        $data = $paymentDetails['data'];

        if ($request->session()->get('donation_to')) {
            $d_to = $request->session()->get('donation_to');
            $donator = new Donator;
            $donator->donation_id = $d_to['id'] + 0;
            $donator->first_name = $data['customer']['first_name'];
            $donator->last_name = $data['customer']['last_name'];
            $donator->email = $data['customer']['email'];
            $donator->amount = $data['amount'] / 100;
            $donator->transaction_ref = $data['reference'];
            $donator->save();
            $raised = Donation::whereId($d_to['id'] + 0)->first();
            $raised->amount_raised = $raised->amount_raised + ($donator->amount);
            $raised->update();
            $request->session()->forget('donation_to');
            return redirect()->route('single.donation', $d_to['slug'])->with('successdonate', 'Donation was succesful');
        } else {
            if ($request->session()->get('cart')) {
                foreach ($request->session()->get('cart') as $itemArray) {
                    foreach ($itemArray as $item) {
                        $this->prods[] = $item->id;
                    }
                }
    
                $billDetails = $request->session()->get('billingDetails');
                if ($paymentDetails) {
                    if ($data['status'] === "success") {
                        $order = new Order;
                        if (Auth::user()) {
                            $order->user_id = Auth::id();
                        }
                        $order->trans_id = $data['id'];
                        $order->trans_ref = $data['reference'];
                        $order->first_name = $billDetails['first_name'];
                        $order->last_name = $billDetails['last_name'];
                        $order->country = $billDetails['country'];
                        $order->street_address = $billDetails['street_address'];
                        $order->city = $billDetails['city'];
                        $order->state = $billDetails['state'];
                        $order->postcode = $billDetails['postcode'];
                        $order->phone = $billDetails['phone'];
                        $order->email = $billDetails['email'];
                        $order->amount = $data['amount'];
                        $order->products = json_encode($this->prods);
                        $order->save();
                        Cart::destroy();
                        return redirect()->route('shop')->with('successpayment', 'Order successfully placed');
                    } else {
                        return redirect()->route('checkout')->with('errorpayment', 'Your payment was unsuccessful, consider contacting our customer support if you have been deducted');
                    }
                } else {
                    return redirect()->route('checkout')->with('errorpayment', 'Your payment was unsuccessful, consider contacting our customer support if you have been deducted');
                    /* return Redirect::back()->withMessage(['msg' => 'Your payment was unsuccessful, consider contacting our customer support if you have been deducted', 'type' => 'error']); */
                }
            } else {
                return redirect()->route('index');
            }
            
        }

        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }





    public function makeDonation(Request $request, $id)
    {
        $d = Donation::whereId($id)->first();
        $request->session()->put('donation_to', [
            'id' => $id,
            'slug' => $d->slug,
        ]);
        $request->validate(
            [
                'first_name' => 'required|string',
                'last_name' => 'required|string',
                'email' => 'required|email',
                'amount' => 'required|integer|min:1',
            ],
            [
                'amount.integer' => 'The amount field must be a value'
            ]
        );
        try {
            return Paystack::getAuthorizationUrl()->redirectNow();
        } catch (\Exception $e) {
            return Redirect::back()->withMessage(['msg' => 'The paystack token has expired. Please refresh the page and try again.', 'type' => 'error']);
        }
    }



}

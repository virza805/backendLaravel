<?php

namespace App\Http\Controllers;

use App\Models\Order;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use Stripe\StripeClient;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    public function stripeOrder(Request $request) {

        $validator = Validator::make($request->all(), [
            'card_no' => 'required',
            'card_expiry_date' => 'required',
            'card_ccv' => 'required',
            'totall_price' => 'required', // |integer
            'payment_method' => 'required',
            'address' => 'required',
            'cart_product' => 'required',
            
        ]);

        
        // validator fails
        if($validator->fails()) {
            return response()->json([
                'err_message' => 'Please fill all the fields',
                'data' => $validator->errors(),
            ], 422);
            // flash()->addWarning('Please fill all the fields');
        } else {
            $stripe = new StripeClient(env('STRIPE_SECRET'));

            // try catch stripe token
            try {
                $token = $stripe->tokens->create([
                    'card' => [
                        'number' => $request->card_no,
                        'exp_month' => explode('/', $request->card_expiry_date)[0],
                        'exp_year' => explode('/', $request->card_expiry_date)[1],
                        'cvc' => $request->card_ccv,
                    ],
                ]);
            } catch (\Exception $e) {
                flash()->addWarning('Invalid card details');
                return redirect()->back();
            }

            $charge = $stripe->charges->create([
                'amount' => intval($request->totall_price * 100),
                'currency' => 'usd',
                'description' => 'Order for invoice #' . $request->payment_method,
                'source' => $token->id,
            ]);

            $orders = Order::create([
                'totall_price' => $request->totall_price,
                'transaction_id' => $charge->id,
                'payment_method' => $request->payment_method,
                'address' => $request->address,
                'cart_product' => $request->cart_product,
            ]);
            // flash()->addSuccess('Order successful');
        }
        // return redirect()->back();
        
        $orders['user_id'] = Auth::user()->id;
        $orders['due_price'] = 0;
        $orders['status'] = 'Prosasing';
        $orders->save();

        return response()->json([
            'err_message' => 'Your Order successfully Done :)',
            'data' => $orders,
        ], 200);

    }
    
    /**
     * Display a Task data in field listing as paginate from the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showInvoice($id)
    {
        // $book = Order::find($id);
        // $invoice = Order::findOrFail($id);
        // $invoice = Order::with('user')->findOrFail($id);

        /*
        $invoice = DB::table('orders as a')
                ->select('a.*',
                    DB::raw('CONCAT("[", GROUP_CONCAT(DISTINCT CONCAT("{
                        \"id\":", b.id, ",
                        \"name\":\"", b.name, "\",
                        \"role\":\"", b.role, "\",
                        \"email\":\"", b.email, "\"
                    }")), "]") as users')
                )
                ->join('users as b', DB::raw('FIND_IN_SET(b.id, a.user_id)'), '>', DB::raw('0'))
                ->where('a.id', '=', $id)
                ->groupBy('a.id')
                ->first();
                    
        */
        $invoice = DB::table('orders')
                ->select('orders.*', 'users.name', 'users.role', 'users.email')
                ->join('users', 'orders.user_id', '=', 'users.id')
                ->where('orders.id', '=', $id)
                ->first();
    

        return response()->json($invoice, 200);
    }

     /**
     * Display the specified resource.
     *Order $Order
     * @param  \App\Models\Order  $Order
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user_id = Auth::user()->id;

        if($user_id === 1){
            $order_list = Order::orderBy('id', 'DESC')->paginate(10);
        } else {
            $order_list = Order::where('user_id', $user_id)->orderBy('id', 'DESC')->paginate(10);
        }
        return response()->json($order_list, 200);
    }


    public function generateInvoice( int $orderId) {
        $order = Order::findOrFail($orderId);
        $data  = ['order' => $order];

        $pdf   = Pdf::loadView('pdf.invoice', $data);
        return $pdf->download('invoice.pdf');
    }
}




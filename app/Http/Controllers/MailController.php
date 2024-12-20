<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mail;
use App\Models\Product;
use App\Models\cart;
use Illuminate\Support\Facades\Auth;

class MailController extends Controller
{
    public function mailReceived(Request $request)
    {
        if(Auth::check()){
            $user = Auth::user();
            $includeView = 'layouts.mailBody';
            $receivedMails = Mail::where('recipient_email',$user->email)->get();

            return view('layouts.Mail', compact('receivedMails', 'includeView'));
        }
        else{
            $includeView = 'layouts.loginWarning';

            return view('layouts.Mail', compact('includeView'));
        }

        
    }

    public function sendMail(Request $request)
    {
        // Ambil data user yang sedang login
        $user = Auth::user();
        $carts = Cart::all();

        // Buat instance Mail
        foreach ($carts as $cart) {
            $mail = new Mail();
            $mail->subject = 'Order';
            $mail->body = $request->body;
            $mail->recipient_email = $cart->product->product_owner;
            $mail->sender_email = $user->email;
            $mail->pname = $cart->item_name;
            $mail->quantity = $cart->quantity;

            $mail->save();

            Cart::destroy($cart->id);
        }
        
        return redirect()->route('Product');
    }

}

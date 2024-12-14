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
        $user = Auth::user();

        $receivedMails = Mail::all();
        
        return view('layouts.Mail', compact('receivedMails'));
    }

    public function sendMail(Request $request)
    {
        // Ambil data user yang sedang login
        $user = Auth::user();
        $product = Product::all();
        $carts = Cart::with('product')->where('product_name', $product->id)->get();

        // Buat instance Mail
        foreach ($carts as $cart) {
            $mail = new Mail();
            $mail->subject = 'Order';
            $mail->body = $cart->product->product_name;
            $mail->recipient_email = $request->recipient_email;
            $mail->sender_email = $user->email;
            $mail->body = $cart->quantity;

            $mail->save();
        }
        
        return redirect()->route('Product');
    }

}

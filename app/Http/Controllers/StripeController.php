<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use Carbon\Carbon;

class StripeController extends Controller
{
    /**
     * Create a Stripe session for rental booking.
     */
    public function session(Request $request)
    {
        \Log::info('Stripe session hit.', $request->all());
        \Log::info('User ID:', [Auth::id()]);
        
        // Validate input
        $data = $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);
        \Log::info('Validation passed.');

        $startDate = Carbon::parse($data['start_date'])->format('Y-m-d');
        $endDate = Carbon::parse($data['end_date'])->format('Y-m-d');
        $userId = Auth::id();

        // Check for conflicting bookings
        if ($this->isBookingConflict($startDate, $endDate)) {
            return redirect()->back()->with('error', 'The villa is already rented for the selected dates.');
        }

        // Calculate rental price
        $pricePerMonth = config('app.price_per_month', 2000); // From config
        $totalPrice = $this->calculateRentalPrice($startDate, $endDate, $pricePerMonth);

        try {
            \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

            // Create Stripe checkout session
            $checkoutSession = \Stripe\Checkout\Session::create([
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'mad', // Moroccan dirham
                        'product_data' => [
                            'name' => 'Villa Rental',
                        ],
                        'unit_amount' => $totalPrice * 100, // Convert to cents
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'metadata' => [
                    'user_id' => $userId,
                    'start_date' => $startDate,
                    'end_date' => $endDate,
                ],
                'success_url' => route('stripe.success'),
                'cancel_url' => route('stripe.cancel'),
            ]);

            // Store metadata in session
            session([
                'stripe_metadata' => [
                    'start_date' => $startDate,
                    'end_date' => $endDate,
                ]
            ]);

            return redirect()->away($checkoutSession->url);
        } catch (\Throwable $th) {
            \Log::error('Stripe session creation failed: ' . $th->getMessage());
            return redirect()->back()->with('error', 'Error creating Stripe session.');
        }
    }

    /**
     * Handle successful payment.
     */
    public function success()
    {
        DB::beginTransaction();

        try {
            // Verify payment with Stripe if necessary (e.g., via webhook or session metadata)
            $userId = Auth::id();

            // Retrieve metadata from session
            $metadata = session('stripe_metadata');

            if (!$metadata || !isset($metadata['start_date'], $metadata['end_date'])) {
                throw new \Exception('Missing metadata in session.');
            }

            $startDate = $metadata['start_date'];
            $endDate = $metadata['end_date'];

            // Create a new order
            Order::create([
                'idUser' => $userId,
                'date_debut' => $startDate,
                'date_fin' => $endDate,
                'is_accept' => true, // Mark as accepted after payment
            ]);

            DB::commit();
            return view('stripe.success')->with('success', 'Payment successful! Your villa has been reserved.');
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Stripe session error:', ['message' => $e->getMessage()]);
            return redirect()->back()->with('error', 'Error completing the payment: ' . $e->getMessage());
        }
    }

    /**
     * Handle payment cancellation.
     */
    public function cancel()
    {
        return redirect()->route('stripe/cancel')->with('error', 'Payment was canceled.');
    }

    /**
     * Check for conflicting bookings.
     */
    private function isBookingConflict($startDate, $endDate)
    {
        return DB::table('orders')
            ->where('date_fin', '>=', $startDate)
            ->where('date_debut', '<=', $endDate)
            ->exists();
    }

    /**
     * Calculate rental price based on duration.
     */
    private function calculateRentalPrice($contentstartDate, $endDate, $pricePerMonth)
    {
        // Parse the dates
        $start = Carbon::parse($startDate);
        $end = Carbon::parse($endDate);

        // Calculate the total number of days
        $totalDays = $start->diffInDays($end);

        // Convert days to months assuming 30 days per month
        $months = ceil($totalDays / 30);

        // Return the total rental price
        return $months * $pricePerMonth;
    }
}

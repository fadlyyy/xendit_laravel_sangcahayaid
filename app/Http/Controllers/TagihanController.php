<?php

namespace App\Http\Controllers;

use App\Models\Tagihan;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class TagihanController extends Controller
{
    /**
     * mengakses halaman list tagihan nya
     */
    public function index()
    {
        $data = Tagihan::all();

        return view('tagihan_list', compact('data'));
    }

    /**
     * halaman form create baru tagihan
     */
    public function create()
    {
        return view('tagihan_create');
    }

    /**
     * proses penyimpanan data tagihan
     */
    public function store()
    {
        $secret_key = 'Basic ' . config('xendit.key_auth');
        $external_id = Str::random(10);

        $data_request = Http::withHeaders([
            'Authorization' => $secret_key
        ])->post('https://api.xendit.co/v2/invoices', [
            'external_id' => $external_id,
            'amount' => request('amount'),
            'payment_methods' => [
                'BCA', 'QRIS', 'OVO'
            ]
        ]);

        $response = $data_request->object();

        Tagihan::create([
            'doc_no' => $external_id,
            'amount' => request('amount'),
            'description' => request('description'),
            'payment_status' => $response->status,
            'payment_link' => $response->invoice_url
        ]);

        return redirect()->route('tagihan.list');
    }

    public function callback()
    {
        $data = request()->all();

        $status = $data['status'];
        $external_id = $data['external_id'];

        Tagihan::where('doc_no', $external_id)->update([
            'payment_status' => $status
        ]);

        return response()->json($data);
    }
}

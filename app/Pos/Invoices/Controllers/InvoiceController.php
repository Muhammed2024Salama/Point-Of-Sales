<?php

namespace Pos\Invoices\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Pos\Categories\Models\Category;
use Pos\Invoices\Models\Invoice;
use Pos\Invoices\Models\Invoices_details;
use Pos\Products\Models\Product;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invoices = Invoice::all();
        return view('Backend.invoices.index',compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('Backend.invoices.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        try {

            $invoice = invoice::create([
                'invoice_number' => $request->invoice_number,
                'invoice_date' => $request->invoice_date,
                'category_id' => $request->category_id,
                'product_id' => $request->product_id,
                'price' => $request->price,
                'discount' => $request->discount,
                'tax_rate' => $request->tax_rate,
                'tax_value' => $request->tax_value,
                'total' => $request->total,
                'status' => 1,
                'notes' => $request->notes,
            ]);

//             invoice_details connection
            Invoices_details::create([
                'invoice_id'=>$invoice->id,
                'status'=>1,
                'user_id'=>auth()->user()->id,
            ]);

            DB::commit();
            session()->flash('Add', trans('Backend/invoices.Invoice added successfully'));
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $invoice = Invoice::findorFail($id);
        $categories = Category::all();
        return view('Backend.invoices.edit', compact('categories', 'invoice'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {

            $invoice = Invoice::findorFail($id);

            $invoice->update([
                'invoice_number' => $request->invoice_number,
                'invoice_date' => $request->invoice_date,
                'category_id' => $request->category_id,
                'product_id' => $request->product_id,
                'price' => $request->price,
                'discount' => $request->discount,
                'tax_rate' => $request->tax_rate,
                'tax_value' => $request->tax_value,
                'total' => $request->total,
                'status' => 1,
                'notes' => $request->notes,
            ]);
            session()->flash('Edit', trans('Backend/invoices.The invoice has been modified successfully'));
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try {
            Invoice::destroy($request->invoice_id);
            session()->flash('Deleted', trans('Backend/invoices.The invoice has been successfully deleted'));
            return redirect()->back();

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getProduct($id)
    {
        $products = Product::where('category_id', $id)->pluck('name','id');
        return $products;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getPrice($id)
    {
        $price = Product::where('id', $id)->first()->price;
        return $price;
    }

    public function payment_statusChange(Request $request)
    {
        DB::beginTransaction();
        try {

            $invoice= invoice::findorFail($request->invoice_id);
            $invoice->update([
                'status'=>$request->status,
            ]);

            Invoices_details::create([
                'invoice_id'=>$request->invoice_id,
                'status'=>$request->status,
                'payment_date'=>$request->payment_date,
                'user_id'=>auth()->user()->id,
            ]);

            DB::commit();
            session()->flash('Add', trans('backend/invoices.Invoice status changed successfully'));
            return redirect()->back();

        }
        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


}

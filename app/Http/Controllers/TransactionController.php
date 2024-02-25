<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Facades\Validator;

use App\Models\Customer;
use App\Models\Employe;
use App\Models\Product;
use App\Models\TypeMovement;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $transactions = Transaction::getAll();

        $headersTable = ["Fecha", "Mes", "# Empleado", "Vendedor", "Categoría", "Producto", "Cantidad", "Movimiento", "Precio", "Cliente", ""];
        $title = "Transacciones";

        return view('transaction.index')->with([
            'title' => $title,
            'headersTable' => $headersTable,
            'transactions' => $transactions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Customer::all();
        $employees = Employe::all();
        $products = Product::all();
        $typesMovements = TypeMovement::all();

        return view('transaction.create')->with(
            [
                'catalogs' => [
                    'customers' => $customers,
                    'employees' => $employees,
                    'products' => $products,
                    'typesMovements' => $typesMovements
                ]
            ]
        );
    }

    // como agrego botones dinamicos que al hacer click, salga un confirm y si es 
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), 
        [
            'transaction_product_id' => 'required|integer',
            'transaction_employe_id' => 'required|integer',
            'transaction_customer_id' => 'required|integer',
            'transaction_type_movement_id' => 'required|integer',
            'transaction_amount' => 'required|integer',
            'transaction_price' => 'required',
            'transaction_date' => 'required',
        ]);
        
        if($validator->fails()) {
            return redirect()->route('create')->withErrors($validator)
            ->withInput();
        }

        $transaction = new Transaction();

        $transaction->transaction_product_id = $request->input('transaction_product_id');
        $transaction->transaction_employe_id = $request->input('transaction_employe_id');
        $transaction->transaction_customer_id = $request->input('transaction_customer_id');
        $transaction->transaction_type_movement_id = $request->input('transaction_type_movement_id');
        $transaction->transaction_amount = $request->input('transaction_amount');
        $transaction->transaction_price = $request->input('transaction_price');
        $transaction->transaction_date = $request->input('transaction_date');

        $transaction->save();
        
        return redirect()->route('home')->with('success', 'El registro se ha guardado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customers = Customer::all();
        $employees = Employe::all();
        $products = Product::all();
        $typesMovements = TypeMovement::all();

        $transaction = Transaction::getFirst($id);
        //404
        if(!$transaction)
            return redirect()->route('home');

        
        return view('transaction.edit')->with([
            'transaction' => $transaction,
            'catalogs' => [
                'customers' => $customers,
                'employees' => $employees,
                'products' => $products,
                'typesMovements' => $typesMovements
            ]
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), 
            [
                'transaction_product_id' => 'required|integer',
                'transaction_employe_id' => 'required|integer',
                'transaction_customer_id' => 'required|integer',
                'transaction_type_movement_id' => 'required|integer',
                'transaction_amount' => 'required|integer',
                'transaction_price' => 'required',
                'transaction_date' => 'required',
            ]);
           
        if($validator->fails()) {
            return redirect()->route('edit', $id)->withErrors($validator)
            ->withInput();
        }
        $transaction = Transaction::getFirst($id);
        //404
        if(!$transaction)
            return redirect()->route('home');

        $transaction->transaction_product_id = $request->input('transaction_product_id');
        $transaction->transaction_employe_id = $request->input('transaction_employe_id');
        $transaction->transaction_customer_id = $request->input('transaction_customer_id');
        $transaction->transaction_type_movement_id = $request->input('transaction_type_movement_id');
        $transaction->transaction_amount = $request->input('transaction_amount');
        $transaction->transaction_price = $request->input('transaction_price');
        $transaction->transaction_date = $request->input('transaction_date');

        $transaction->save();

        return redirect()->route('home')->with('success', 'El registro se ha guardado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transaction = Transaction::find($id);

        if($transaction->transaction_delete == 1)
            return redirect()->route('home')->with('success', 'Registro ya esta eliminado');
        
        $transaction->transaction_delete = 1;
        $transaction->save();
        return redirect()->route('home')->with('success', 'Registro Eliminado Correctamente');
    }
}

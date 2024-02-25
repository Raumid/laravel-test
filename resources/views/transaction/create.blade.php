@extends('layouts.template')

@section('content')

    @if ($errors->any())
        <div class="row mt-2">
            <div class="alert alert-danger alert-dismissible fade show d-flex justify-content-between" role="alert">
                <div>
                    <strong>Error!</strong>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </div>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-12">
            <h4 class="page-title">Agregar</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action=" {{ route('saveCreate') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="mb-3">
                                        <label for="transaction_date" class="form-label">Fecha</label>
                                        <input id="transaction_date" name="transaction_date" type="date"
                                            class="form-control" value="{{ old('transaction_date') }}" />
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="mb-3">
                                        <label for="transaction_customer_id" class="form-label">Cliente</label>
                                        <select id="transaction_customer_id" name="transaction_customer_id"
                                            class="form-select">
                                            @foreach ($catalogs['customers'] as $customer)
                                                <option value="{{ $customer->customer_id }}"
                                                    {{ old('transaction_customer_id') == $customer->customer_id ? 'selected' : '' }}>
                                                    {{ $customer->customer_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="mb-3">
                                        <label for="transaction_employe_id" class="form-label">Empleado</label>
                                        <select id="transaction_employe_id" name="transaction_employe_id"
                                            class="form-select">
                                            @foreach ($catalogs['employees'] as $employe)
                                                <option value="{{ $employe->employe_id }}"
                                                    {{ old('transaction_employe_id') == $employe->employe_id ? 'selected' : '' }}>
                                                    {{ $employe->employe_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="mb-3">
                                        <label for="transaction_type_movement_id" class="form-label">Movimiento</label>
                                        <select id="transaction_type_movement_id" name="transaction_type_movement_id"
                                            class="form-select">
                                            @foreach ($catalogs['typesMovements'] as $mov)
                                                <option value="{{ $mov->type_movement_id }}"
                                                    {{ old('transaction_type_movement_id') == $mov->type_movement_id ? 'selected' : '' }}>
                                                    {{ $mov->type_movement_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="mb-3">
                                        <label for="transaction_product_id" class="form-label">Producto</label>
                                        <select id="transaction_product_id" name="transaction_product_id"
                                            class="form-select">
                                            @foreach ($catalogs['products'] as $product)
                                                <option value="{{ $product->product_id }}"
                                                    {{ old('transaction_product_id') == $product->product_id ? 'selected' : '' }}>
                                                    {{ $product->product_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="mb-3">
                                        <label for="transaction_amount" class="form-label">Cantidad</label>
                                        <input id="transaction_amount" name="transaction_amount" type="number"
                                            class="form-control" value="{{ old('transaction_amount') }}" />
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="mb-3">
                                        <label for="transaction_price" class="form-label">Precio</label>
                                        <input id="transaction_price" name="transaction_price" type="number"
                                            class="form-control" value="{{ old('transaction_price') }}" />
                                    </div>
                                </div>
                            </div>

                            <a type="button" class="btn btn-danger" href="{{ route('home') }}">Cancelar</a>
                            <button type="submit" class="btn btn-success">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

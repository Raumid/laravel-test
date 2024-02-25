@extends('layouts.template')

@section('css')
    <link href="https://cdn.datatables.net/2.0.0/css/dataTables.dataTables.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/3.0.0/css/responsive.dataTables.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="bower_components/sweetalert2/dist/sweetalert2.min.css">
@endsection

@section('content')
    @if ($errors->any())
        <div class="row mt-2">
            <div class="alert alert-danger alert-dismissible fade show d-flex justify-content-between" role="alert">
                <div>
                    <strong>Error!</strong> 
                    {{ $errors->first() }}
                </div>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    @endif

    @if(session('success'))
        <div class="row mt-2">
            <div class="alert alert-success alert-dismissible fade show d-flex justify-content-between" role="alert">
                <div>
                    <strong>Exito!</strong> 
                    {{ session('success') }}
                </div>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
        </div>
    @endif

    <div class="row mt-4">
        <div class="col-12">
            <h4 class="page-title">Transacciones</h4>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12 text-start">
            <a href="{{ route('create') }}" type="button" class="btn btn-primary">Crear Nuevo</a>
        </div>
    </div>

    <div class="row mt-2">
        <table id="transactions" class="table table-centered mb-0">
            <thead>
                <tr>
                    @foreach ($headersTable as $header)
                        <th scope="col">{{ $header }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                    <tr>
                        <th scope="row">{{ $transaction->transaction_date }}</th>
                        <td>{{ \Carbon\Carbon::createFromDate($transaction->transaction_date)->translatedFormat('F') }}</td>
                        <td>{{ $transaction->transaction_employe_id }}</td>
                        <td>{{ $transaction->employe->employe_name }}</td>
                        <td>{{ $transaction->product->productCategory->product_category_name }}</td>
                        <td>{{ $transaction->product->product_name }}</td>
                        <td>{{ $transaction->transaction_amount }}</td>
                        <td>{{ $transaction->movement->type_movement_name }}</td>
                        <td>{{ $transaction->transaction_price }}</td>
                        <td>{{ $transaction->customer->customer_name }}</td>
                        <td>
                            <a class="btn btn-danger" title="Eliminar" data-transaction-id="{{ $transaction->transaction_id }}">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                                Eliminar
                            </a>
                            <a class="btn btn-primary" title="Editar"
                                href="{{ route('edit', $transaction->transaction_id) }}">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                Editar
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection


@section('js')
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.0/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.0/js/responsive.dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        let table = new DataTable('#transactions', {
            responsive: true
        });
    </script>

    <script>
        const btnDeletes = document.querySelectorAll('[data-transaction-id]');

        btnDeletes.forEach(btnDelete => {
            btnDelete.addEventListener('click', async () => {
                const transactionId = btnDelete.getAttribute('data-transaction-id');
                Swal.fire({
                    icon: "warning",
                    title: "Eliminar registro",
                    text: '¿Seguro que deseas eliminar este registro?',
                    showConfirmButton: true,
                    showCancelButton: true,
                    confirmButtonText: 'Si, eliminar',
                    cancelButtonText: 'No, Salir'
                }).then((result) => {
                    console.log("the result alert", result);

                    if (result.isConfirmed)
                        window.location.href = '{{ route('delete', ':id') }}'.replace(':id', transactionId);
                });

            })
        });

        
    </script>
@endsection

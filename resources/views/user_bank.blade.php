@extends('layouts.app')

<?php
$page = 'Transaksi Bank';
?>

@section('content')
    <div class="container mt-4">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center mb-4">Transaksi User</h2>
            </div>
        </div>

        <div class="row">
            @foreach ($transaksis as $key => $transaksi)
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">{{ $transaksi->user->name }}</h5>
                            <p class="card-text">
                                <strong>Invoice ID:</strong> {{ $transaksi->invoice_id }}<br>
                                <strong>Status:</strong>
                                @switch($transaksi->status)
                                    @case(1)
                                        <span class="badge bg-warning text-dark">ON CART</span>
                                        @break
                                    @case(2)
                                        <span class="badge bg-info text-dark">PENDING</span>
                                        @break
                                    @case(3)
                                        <span class="badge bg-success">COMPLETED</span>
                                        @break
                                    @case(4)
                                        <span class="badge bg-secondary">FINISHED</span>
                                        @break
                                    @case(5)
                                        <span class="badge bg-secondary">FAILED</span>
                                        @break
                                    @default
                                @endswitch
                            </p>
                            <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#detail-{{ $transaksi->invoice_id }}">View Details</a>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="detail-{{ $transaksi->invoice_id }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Detail Transaksi #{{ $transaksi->invoice_id }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p><strong>User:</strong> {{ $transaksi->user->name }}</p>
                                <p><strong>Status:</strong>
                                    @switch($transaksi->status)
                                        @case(1)
                                            ON CART
                                            @break
                                        @case(2)
                                            PENDING
                                            @break
                                        @case(3)
                                            COMPLETED
                                            @break
                                        @case(4)
                                            FINISHED
                                            @break
                                        @case(5)
                                            FAILED
                                            @break
                                        @default
                                    @endswitch
                                </p>
                            </div>
                            <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Jumlah</th>
                                            <th>Jenis</th>
                                            <th>Saldo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ number_format($transaksi->jumlah, 0, ',', '.') }}</td>
                                            <td>
                                                @if (Str::startsWith($transaksi->invoice_id, 'SAL_'))
                                                    Topup
                                                @else
                                                    Tarik Tunai
                                                @endif
                                            </td>
                                            <td>{{ number_format($transaksi->user->saldo->saldo, 0, ',', '.') }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Close</button>
                                    <div class="footer m-3">
                                        <button type="button" class="btn btn-primary" onclick="window.print()">
                                            PRINT
                                        </button>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

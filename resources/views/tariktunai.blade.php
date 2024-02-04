@extends('layouts.app')

<?php
$page ='Tarik Tunai';
?>

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="border-radius: 20px">
                    <div class="card-header" style="background-color: #EBD9B4; border-radius: 10px">Tarik Tunai</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <h4>SALDO : <b>{{ $saldo->saldo }}</b></h4>

                        <form method="POST" action="{{ route('transaksi.tariktunai') }}">
                            @csrf
                            <div class="form-group mt-4">
                                <label>Amount</label>
                                <input type="number" name="jumlah" class="form-control" placeholder="Nominal Input">
                                <input type="hidden" name="type" value="1">
                            </div>
                            <button class="btn btn-primary mt-5" type="submit">Tarik Tunai</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
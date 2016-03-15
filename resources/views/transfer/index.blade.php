@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                <table class="table table-hover">
                    <tr>
                        <td>Nama</td>
                        <td>Jenis</td>
                        <td>Jumlah</td>
                        <td>Saldo</td>
                        <td>Tanggal</td>
                        <td>Deskripsi</td>
                        <td>Actions</td>
                    </tr>
                    <?php
                        $income = 0;
                        $outcome = 0;
                    ?>
                    @foreach($transfers as $transfer)
                    <tr>
                        <td>{{ $transfer->title }}</td>
                            <?php 
                                if($transfer->category == 'debet'){
                                    $income += $transfer->amount;
                                }else{
                                    $outcome += $transfer->amount;
                                }
                            ?>      
                        <td>{{ $transfer->category }}</td>         
                        <td>{{ $transfer->amount }}</td>         
                        <td>{{ $transfer->saldo_temporary }}</td>         
                        <td>{{ $transfer->created_at->diffForHumans() }}</td>         
                        <td>{{ $transfer->description }}</td>         
                        <td>
                            <form method="post" action="{{ url('/'.$transfer->id) }}">
                                {{ csrf_field() }}  
                                <input name="_method" type="hidden" value="DELETE">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>         
                    </tr>
                    @endforeach
                </table>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ Auth::user()->name }}</div>

                <div class="panel-body">
                    Saldo : {{ Auth::user()->saldo }}
                    <br>Pemasukkan : {{ $income }}
                    <br>Pengeluaran : {{ $outcome }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

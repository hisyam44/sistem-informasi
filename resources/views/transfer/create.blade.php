@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Nama Pembayaran</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="title" value="{{ old('title') }}">

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Jenis Pembayaran</label>

                            <div class="col-md-6">
                                <select class="form-control" name="category" value="{{ old('category') }}">
                                <option value="credit">Kredit</option>
                                <option value="debet">Debit</option>
                                </select>
                                @if ($errors->has('category'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Jumlah Pembayaran</label>

                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon">Rp.</span>
                                    <input type="text" class="form-control" name="amount">
                                </div>

                                @if ($errors->has('amount'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('amount') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Deskripsi</label>

                            <div class="col-md-6">
                                <textarea class="form-control" name="description" placeholder="Masukkan Deskripsi" rows="4s"></textarea>
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('published_at') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Tanggal Pembayaran</label>

                            <div class="col-md-6">
                                <input type="date" class="form-control" name="published_at" value="now()"></input>
                                @if ($errors->has('published_at'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('published_at') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Post
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

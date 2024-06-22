@extends('layouts.app')
@section('title', 'Detail Produk')
@section('detailproduk', 'active')

@section('section_header')
<h1>Detail Produk</h1>
<div class="section-header-breadcrumb">
  <div class="breadcrumb-item active"><a href="{{ route('detailproduk.index') }}">Back</a></div>
</div>
@endsection

@section('wrap_content')
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>ID :</strong>
            {{ $detailproduk->id }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Kode Produk :</strong>
            {{ $detailproduk->kodeproduk }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Gambar 1 :</strong>
            {{ $detailproduk->gambar1 }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Gambar 2 :</strong>
            {{ $detailproduk->gambar2 }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Gambar 3 :</strong>
            {{ $detailproduk->gambar3 }}
        </div>
    </div>
</div>

@endsection

@extends('layouts.app')
@section('title', 'Kategori')
@section('kategori', 'active')

@section('section_header')
<h1>Detail Kategori Produk</h1>
<div class="section-header-breadcrumb">
  <div class="breadcrumb-item active"><a href="{{ route('kategori.index') }}">Back</a></div>
</div>
@endsection

@section('wrap_content')
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>ID :</strong>
            {{ $kategori->id }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Keterangan :</strong>
            {{ $kategori->keterangan }}
        </div>
    </div>
</div>

@endsection

@extends('layout.main')
@section('title', 'QR Label')
@section('content')
<div class="container text-center mt-5">
    <h4>Label Barang Bukti</h4>
    <p><strong>{{ $item->barang_bukti }}</strong></p>
    <div>{!! $qrCode !!}</div>
    <p class="mt-3">Scan untuk melihat data barang bukti.</p>
</div>
@endsection

@extends('layouts.layouts')

@section('sidebar')
    <li class="sidebar-item"><a class="sidebar-link" href="{{ route('dashboard.index') }}"> 
        <svg class="svg-icon svg-icon-sm svg-icon-heavy">
            <use xlink:href="#real-estate-1"> </use>
        </svg><span>Home </span></a></li>
    <li class="sidebar-item"><a class="sidebar-link" href="{{ route('barang.index') }}"> 
        <svg class="svg-icon svg-icon-sm svg-icon-heavy">
            <use xlink:href="#survey-1"> </use>
        </svg><span>Barang </span></a></li>
    <li class="sidebar-item active"><a class="sidebar-link" href="#exampledropdownDropdown" data-bs-toggle="collapse"> 
        <svg class="svg-icon svg-icon-sm svg-icon-heavy">
            <use xlink:href="#browser-window-1"> </use>
        </svg><span>Management Barang </span></a>
    <ul class="collapse list-unstyled " id="exampledropdownDropdown">
        <li><a class="sidebar-link" href="{{ route('barangmasuk.index') }}">Barang Masuk</a></li>
        <li><a class="sidebar-link" href="{{ route('barangkeluar.index') }}">Barang Keluar</a></li>
    </ul>
    </li>

    </ul><span class="text-uppercase text-gray-600 text-xs mx-3 px-2 heading mb-2">Administrator</span>
        <ul class="list-unstyled">
            <li class="sidebar-item"><a class="sidebar-link" href="{{ route('kategori.index') }}"> 
                <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                    <use xlink:href="#imac-screen-1"> </use>
                </svg><span>Kategori </span></a></li>
@endsection

@section('content')
<div class="bg-dash-dark-2 py-4">
    <div class="container-fluid">
        <h2 class="h5 mb-0">Edit Barang Keluar</h2>
    </div>
</div>
</br>

    <div class="container-fluid">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('barangkeluar.update', $barangkeluar->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="tgl_keluar">Tanggal Keluar:</label>
                        <input type="date" name="tgl_keluar" id="tgl_keluar" class="form-control text-gray-100" value="{{ $barangkeluar->tgl_keluar }}" required>
                    </div>

                    <div class="form-group">
                        <label for="qty_keluar">Jumlah Keluar:</label>
                        <input type="number" name="qty_keluar" id="qty_keluar" class="form-control text-gray-100" value="{{ $barangkeluar->qty_keluar }}" required>
                    </div>

                    <!-- Jika ingin mengganti barang yang keluar -->
                    <div class="form-group">
                        <label for="barang_id">Barang:</label>
                        <select name="barang_id" id="barang_id" class="form-control text-gray-100" required>
                            @foreach ($barangs as $barang)
                                <option value="{{ $barang->id }}" {{ $barangkeluar->barang_id == $barang->id ? 'selected' : '' }}>
                                    {{ $barang->merk }} - {{ $barang->seri }}
                                </option>
                            @endforeach
                        </select>
                    </div>
</br>
                    <a href="{{ route('barangkeluar.index') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
@endsection
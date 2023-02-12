@extends('home.layouts.master')
@extends('home.layouts.navbar')
@section('content')
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-6 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Alamat Settings</h4>
                </div>
                <div class="row mt-3">
                    <form action="/profile/account/post" method="post">
                        <input type="hidden" name="id" value="{{ $address->id }}">
                        <div class="col-md-12"><label class="labels">kota</label><select name="" class="form-control" id=""><option value="0">-- Silahkan Pilih --</option></select></div>
                        <div class="col-md-12"><label class="labels">Provinsi</label><select name="" class="form-control" id=""><option value="0">-- Silahkan Pilih --</option></select></div>
                        <div class="col-md-12"><label class="labels">Alamat Lengkap</label><input type="text" class="form-control" value="{{ $address->email }}"></div>
                        <div class="col-md-12"><label class="labels">kode pos</label><input type="number" class="form-control" value="{{ $address->no_hp }}"></div>

                </div>

                <div class="mt-5 text-center"><button type="submit" onclick="return confirm('yakin update profile?')" class="btn btn-primary profile-button" type="button">Save Alamat</button></div>
                </form>
            </div>
        </div>
    </div>
</div>
<br>

@endsection

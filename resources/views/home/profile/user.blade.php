@extends('home.layouts.master')
@extends('home.layouts.navbar')
@section('content')
{{-- <div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-4 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold">{{$user->name}}</span><span class="text-black-50">{{$user->email}}</span><span> </span></div>
        </div>
        <div class="col-md-7 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <div class="row mt-3">
                    <form action="/profile/account/post" method="post">
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <div class="col-md-12"><label class="labels">Nama lengkap</label><input type="text" name="name" class="form-control" value="{{ $user->name }}"></div>
                        <div class="col-md-12"><label class="labels">Username</label><input type="text" disabled class="form-control" value="{{ $user->username }}"></div>
                        <div class="col-md-12"><label class="labels">Email</label><input type="email" disabled class="form-control" value="{{ $user->email }}"></div>
                        <div class="col-md-12"><label class="labels">no Telp</label><input type="text" disabled class="form-control" value="{{ $user->no_hp }}"></div>

                </div>

                <div class="mt-5 text-center"><button type="submit" onclick="return confirm('yakin update profile?')" class="btn btn-primary profile-button" type="button">Save Profile</button></div>
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center experience"><span>Edit Address</span><span class="border px-3 p-1 add-experience"><i class="fa fa-plus"></i>&nbsp;Experience</span></div><br>
                <div class="col-md-12"><label class="labels">Experience in Designing</label><input type="text" class="form-control" placeholder="experience" value=""></div> <br>
                <div class="col-md-12"><label class="labels">Additional Details</label><input type="text" class="form-control" placeholder="additional details" value=""></div>
            </div>
        </div>
    </div>
</div> --}}
<section>
    <div class="container py-5">

      <div class="row">
        <div class="col-lg-4">
          <div class="card mb-4">
            <div class="card-body text-center">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
                class="rounded-circle img-fluid" style="width: 150px;">
              <h5 class="my-3">{{ $user->name }}</h5>
              <p class="text-muted mb-1">{{ $user->email }}</p>

            </div>
          </div>
        </div>

        <div class="col-lg-8">
          <div class="card mb-4">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Nama Lengkap</p>
                </div>
                <div class="col-sm-9">
                    <form action="{{ url('profile/account/post') }}" method="POST">
                  <p class="text-muted mb-0"><input style=" background: transparent;border: none;" type="text" class="form-control" value="{{$user->name}}"></p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">username</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{$user->username}}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Email</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{$user->email}}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">No Telp</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{$user->no_hp}}</p>
                </div>
              </div>
              <hr>
              <div class="row text-end">
                <div class="col-sm-3">
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0"><button class="btn btn-primary" type="submit">Save Profile</button></p>
                  <form action="{{ url('profile/account/post') }}" method="POST">
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
</section>
<br>
<br>
@endsection

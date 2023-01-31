<form method="POST" action="/register">
    @csrf
    <div class="form-floating mb-3">
      <input name="username" type="text" class="form-control" id="floatingInput" placeholder="name@example.com" required>
      <label for="floatingInput">Username</label>
    </div>

    <div class="form-floating mb-3">
        <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password" required>
        <label for="floatingPassword">Password</label>
    </div>

    <div class="form-floating mb-3">
        <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
        <label for="floatingInput">Email</label>
    </div>

    <div class="form-floating mb-3">
        <input name="name" type="text" class="form-control" id="floatingInput" placeholder="name@example.com" required>
        <label for="floatingInput">Nama Lengkap</label>
    </div>

    <div class="form-floating mb-3">
        <input name="no_hp" type="number" class="form-control" id="floatingInput" placeholder="name@example.com" required>
        <label for="floatingInput">No Hp</label>
    </div>

    {{-- <div class="form-floating mb-3">
        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
        <label for="floatingInput"></label>
    </div> --}}


    <div class="d-grid">
      <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit">Sign up</button>
    </div>
</form>

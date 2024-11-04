<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

<section class="vh-100" style="background-color: #9A616D;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
          <div class="card" style="border-radius: 1rem;">
            <div class="row g-0">
              <div class="col-md-6 col-lg-5 d-none d-md-block">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/img1.webp"
                  alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
              </div>
              <div class="col-md-6 col-lg-7 d-flex align-items-center">
                <div class="card-body p-4 p-lg-5 text-black">
                  @if(Session::has('success'))
                    <div class="alert alert-success">
                      {{ Session::get('success') }}
                    </div>
                  @endif
                  <form method="POST" action="{{ route('authenticate') }}">
                    @csrf
                    <div class="d-flex align-items-center mb-3 pb-1">
                        <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                        <span class="h1 fw-bold mb-0">Logo</span>
                    </div>
                
                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>
                    <div class="form-outline mb-4">
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input type="email" id="form2Example17" name="email" class="form-control form-control-lg" />
                        <label class="form-label" for="form2Example17">Email address</label>
                    </div>
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input type="password" id="form2Example27" name="password" class="form-control form-control-lg" />
                        <label class="form-label" for="form2Example27">Password</label>
                    </div>
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                
                        <button data-mdb-button-init data-mdb-ripple-init class="btn btn-dark btn-lg btn-block" type="submit">Login</button>
                        <a href="{{ route('home') }}" class="btn btn-dark btn-lg btn-block">Back</a>
                    </div>
                </form>  
                @error('any')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror              
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
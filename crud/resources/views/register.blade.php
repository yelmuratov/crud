{{-- bootstrap --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Section: Design Block -->
<section class="text-center text-lg-start">
    <style>
      .cascading-right {
        margin-right: -50px;
      }
  
      @media (max-width: 991.98px) {
        .cascading-right {
          margin-right: 0;
        }
      }

      .card {
        border-radius: 1rem;
      }

      .form-outline {
        margin-bottom: 1.5rem;
      }

      .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
      }
    </style>
  
    <!-- Jumbotron -->
    <div class="container py-4">
      <div class="row g-0 align-items-center">
        <div class="col-lg-6 mb-5 mb-lg-0">
          <div class="card cascading-right bg-body-tertiary" style="
              backdrop-filter: blur(30px);
              ">
            <div class="card-body p-5 shadow-5 text-center">
              <h2 class="fw-bold mb-5">Sign up now</h2>
              <form method="POST" action="{{route('Userstore')}}">
                @csrf
                <div class="row">
                    <div class="col-md- mb-4">
                        <div data-mdb-input-init class="form-outline">
                            <input type="text" id="form3Example1" class="form-control" name="name" />
                            <label class="form-label" for="form3Example1">Name</label>
                        </div>
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            
                <!-- Email input -->
                <div data-mdb-input-init class="form-outline mb-4">
                    <input type="email" id="form3Example3" class="form-control" name="email" />
                    <label class="form-label" for="form3Example3">Email address</label>
                </div>
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            
                <!-- Password input -->
                <div data-mdb-input-init class="form-outline mb-4">
                    <input type="password" id="form3Example4" class="form-control" name="password" />
                    <label class="form-label" for="form3Example4">Password</label>
                </div>
                @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            
                <!-- Confirm Password input -->
                <div data-mdb-input-init class="form-outline mb-4">
                    <input type="password" id="form3Example5" class="form-control" name="password_confirmation" />
                    <label class="form-label" for="form3Example5">Confirm Password</label>
                </div>
                @error('password_confirmation')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            
                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-lg btn-block">Register</button>
                <p class="mb-5 pb-lg 2" style="color: #393f81;">Already have an account? <a href="{{ route('login') }}" style="color: #393f81;">Login here</a></p>
            </form>
            
            </div>
          </div>
        </div>
  
        <div class="col-lg-6 mb-5 mb-lg-0">
          <img src="https://mdbootstrap.com/img/new/ecommerce/vertical/004.jpg" class="w-100 rounded-4 shadow-4" alt="" />
        </div>
      </div>
    </div>
    <!-- Jumbotron -->
  </section>
  <!-- Section: Design Block -->
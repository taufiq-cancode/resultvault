@extends('template.template-master')
@section('content')

<div class="container-fluid pt-3">
    <div class="row removable">

        <h2>Welcome, {{ Auth::user()->name }}!</h2>
        <!-- Check if user role is user then display the school create form-->
        @if(auth()->user()->role == 'user')
            <p>You have no schools attached to your account. Kindly fill the form below to register a school. </p>

            <hr style="margin: 20px 0 20px 0">

                <div class="container py-4">
                  <div class="row">
                    <div class="col-lg-7 d-flex flex-column">
                      <h3 class="text-left">Fill in school details</h3>
                      
                      <form role="form" id="contact-form" action="{{ route('school.store') }}" method="POST" autocomplete="off">
                        @csrf

                        <div class="card-body">
                          <div class="row">
                            <div class="mb-4">
                              <label>School Name</label>
                              <div class="input-group">
                                <input type="text" name="name" class="form-control" placeholder="" aria-label="Last Name..." >
                              </div>
                            </div>
                          </div>
                          <div class="mb-4">
                            <label>School Phone Number</label>
                            <div class="input-group">
                              <input type="text" name="phone" class="form-control" placeholder="" >
                            </div>
                          </div>
                          <div class="mb-4">
                            <label>School Email Address</label>
                            <div class="input-group">
                              <input type="email" name="email" class="form-control" placeholder="" >
                            </div>
                          </div>
                          <input type="hidden" name="admin_id" value="{{ Auth::user()->id }}" >
                         
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-check form-switch mb-4">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" checked="">
                                <label class="form-check-label" for="flexSwitchCheckDefault">I agree to the <a href="javascript:;" class="text-dark"><u>Terms and Conditions</u></a>.</label>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <button type="submit" class="btn bg-gradient-dark w-100">Submit</button>
                            </div>
                          </div>
                        </div>
                      </form>

                    </div>
                  </div>
                </div>
        @endif

        @if(auth()->user()->role == 'admin')
            
        @endif

        
        
        
        @if(auth()->user()->role == 'admin')
            <div class="col-xl-3 col-sm-6">
                <div class="card bg-gradient-dark mb-4">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize text-white font-weight-bold">Total students</p>
                                    <h5 class="font-weight-bolder text-white mb-0">
                                    <?php //echo $totalRecords; ?>
                                        <span class="text-success text-sm font-weight-bolder">+5</span>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-sm-6">
                <div class="card bg-gradient-dark mb-4">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize text-white font-weight-bold">Total Classes</p>
                                    <h5 class="font-weight-bolder text-white mb-0">
                                        <?php //echo $totalClasses; ?>
                                        <span class="text-success text-sm font-weight-bolder"></span>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-sm-6">
                <div class="card bg-gradient-dark mb-4">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize text-white font-weight-bold">Results Declared</p>
                                    <h5 class="font-weight-bolder text-white mb-0">
                                        3462
                                        <span class="text-danger text-sm font-weight-bolder">-3</span>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-sm-6">
                <div class="card bg-gradient-dark mb-4">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize text-white font-weight-bold">Results undeclared</p>
                                    <h5 class="font-weight-bolder text-white mb-0">
                                        430
                                        <span class="text-success text-sm font-weight-bolder">+5</span>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif    
        
    </div>
   

     <!-- Last card  -->

</div>

@endsection

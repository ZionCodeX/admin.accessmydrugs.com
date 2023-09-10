@extends('layouts.base_auth')

@section('title', 'Company Registration')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b>C O M P A N Y  &nbsp;&nbsp;  R E G I S T R A T I O N</b></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf


                        <input type="hidden" name="account_type" value="COMPANY" required/>


                        <div class="form-group row">
                            <label class="col-3">{{ __('Company Name') }}</label>
                            <div class="col-9">
                              <input type="text" name="company_name" id="company_name" class="form-control @error('company_name') is-invalid @enderror" value="{{ old('company_name') }}" autocomplete="company_name" placeholder="Company Name" autofocus required>
                              @error('company_name')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                            </div>
                          </div>
                  

                  


                          <div class="form-group row">
                            <label class="col-3">{{ __('Official Email') }}</label>
                            <div class="col-9">
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                    <i class="la la-at"></i>
                                  </span>
                                </div>
                                <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" autocomplete="email" placeholder="Email Address" autofocus required>
                              </div>
                              <!--<span class="form-text text-muted">We'll never share your email with anyone else.</span>-->
                            </div>
                          </div>
                  
        
                          <div class="form-group row">
                            <label class="col-3">{{ __('Official Phone') }}</label>
                            <div class="col-9">
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                    <i class="la la-phone"></i>
                                  </span>
                                </div>
                                <input type="number" name="company_phone" id="company_phone" class="form-control @error('company_phone') is-invalid @enderror" value="{{ old('company_phone') }}" autocomplete="company_phone" placeholder="Company Phone Number" autofocus required>
                                    @error('company_phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            </div>
                          </div>


                          <div class="form-group row">
                            <label class="col-3">{{ __('Company Fax') }}</label>
                            <div class="col-9">
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                    <i class="la la-fax"></i>
                                  </span>
                                </div>
                                <input type="number" name="company_fax" id="company_fax" class="form-control @error('company_fax') is-invalid @enderror" value="{{ old('company_fax') }}" autocomplete="company_fax" placeholder="Company Fax" autofocus>
                                    @error('company_fax')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            </div>
                          </div>


                          <div class="form-group row">
                            <label class="col-3">{{ __('Company Website') }}</label>
                            <div class="col-9">
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                    <i class="la la-globe"></i>
                                  </span>
                                </div>
                                <input type="text" name="company_website" id="company_website" class="form-control @error('company_website') is-invalid @enderror" value="{{ old('company_website') }}" autocomplete="company_website" placeholder="Company Website" autofocus>
                                    @error('company_website')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            </div>
                          </div>




                            <div class="form-group row">
                                <label class="col-form-label text-right col-lg-3 col-sm-12">{{ __('Objective of Business') }}</label>
                                    <div class="col-lg-9 col-md-9 col-sm-12">
                                        <div class="typeahead">
                                            <textarea name="company_objective" class="form-control"rows="3"></textarea>
                                            </div>
                                            <div class="form-text text-muted">
                                        <!--hint-->
                                        </div>
                                    </div>
                            </div>
                  
                  

                  
                  
                          <div class="form-group row">
                            <label class="col-3">{{ __('Password') }}</label>
                            <div class="col-9">
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                    <i class="la la-key"></i>
                                  </span>
                                </div>
                               
                                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            </div>
                          </div>
                  
                  
                          <div class="form-group row">
                            <label class="col-3">{{ __('Confirm Password') }}</label>
                            <div class="col-9">
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                    <i class="la la-key"></i>
                                  </span>
                                </div>
                                <input type="password" name="password_confirmation" id="password-confirm" class="form-control" required autocomplete="new-password">
                              </div>
                            </div>
                          </div>
                  
                  
                          <div class="form-group row">
                            <label class="col-3"></label>
                            <div class="col-9">
                              <div class="checkbox-inline">
                                <label class="checkbox">
                                <input type="checkbox" required>
                                <span></span>Agree to <a href="">&nbsp; Terms</a> </label>
                              </div>
                            </div>
                          </div>




                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Pay | Register') }}
                                </button>
                            </div>
                        </div>
                    </form>

                    <hr>

                    <a class="btn btn-link" href="{{ route('login') }}">
                        <b>Login &nbsp;</small></b>
                    </a>

                    |

                    <a class="btn btn-link" href="{{ route('register') }}">
                        <b>&nbsp; Register </b>
                    </a>


                </div>
            </div><br><br>
        </div>
    </div>
</div>
@endsection

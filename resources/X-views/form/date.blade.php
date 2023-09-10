
<!--FORM :: ELEMENT :: DATE :: name --> 
<div class="form-group row">
  <label class="col-form-label text-right col-lg-3 col-sm-12">{{$label}}</label>
  <div class="col-lg-6 col-md-9 col-sm-12">
    <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text">
                <i class="{{$icon}}"></i>
            </span>
          </div>
      <input class="form-control" name="{{$name}}" id="{{$id}}" type="date" value="{{$value}}" {{$required}}/>
    </div>
    <div class="form-text text-muted">
      {{$hint}}
    </div>
  </div>
  </div>
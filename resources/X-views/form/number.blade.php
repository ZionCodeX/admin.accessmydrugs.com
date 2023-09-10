

<!--FORM :: ELEMENT :: TEXT-INPUT :: name --> 
<div class="form-group row">
  <label class="col-form-label text-right col-lg-3 col-sm-12">{{$label}}</label>
  <div class="col-lg-5 col-md-9 col-sm-12">
      <div class="input-group">
          <div class="input-group-prepend">
              <span class="input-group-text">
                  <i class="{{$icon}}"></i>
              </span>
          </div>
          <input type="number" id="{{$id}}" name="{{$name}}" value={{$value}} class="form-control" maxlength="{{$maxlength}}" name="url" placeholder="{{$placeholder}}" {{$required}}>
      </div>
      <div class="form-text text-muted">
        {{$hint}}
      </div>
  </div>
 </div>
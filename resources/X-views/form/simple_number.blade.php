

<!--FORM :: ELEMENT :: TEXT-INPUT :: name --> 
<div class="form-group row">
  <label class="col-form-label text-right col-lg-3 col-sm-12">{{$label}}</label>
  <div class="col-lg-10 col-md-10 col-sm-10">
      <div class="input-group">
          <input type="number" id="{{$id}}" name="{{$name}}" value="{{$value}}" class="form-control" maxlength="{{$maxlength}}" name="url" placeholder="{{$placeholder}}" {{$required}}>
      </div>
      <div class="form-text text-muted">
        {{$hint}}
      </div>
  </div>
 </div>
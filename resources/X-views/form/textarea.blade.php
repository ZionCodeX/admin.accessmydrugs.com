

<!--FORM :: ELEMENT :: TEXTAREA :: name --> 
   <div class="form-group row">
    <label class="col-form-label text-right col-lg-3 col-sm-12">{{$label}}</label>
    <div class="col-lg-6 col-md-9 col-sm-12">
      <div class="typeahead">
        <textarea class="form-control" id="{{$id}}" name="{{$name}}" rows="{{$rows}}" maxlength="{{$maxlength}}" placeholder="{{$placeholder}}" {{$required}}>{{$value}}</textarea>
      </div>
     <div class="form-text text-muted">
      {{$hint}}
     </div>
    </div>
   </div>

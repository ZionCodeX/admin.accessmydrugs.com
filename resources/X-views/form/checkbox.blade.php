
    
<!--FORM :: ELEMENT :: CHECKBOX :: name -->  
<div class="form-group row">
  <label class="col-form-label text-right col-lg-3 col-sm-12">{{$label}}</label>
  <div class="col-lg-6 col-md-9 col-sm-12">
   <div class="typeahead">
            <div class="checkbox-list">
              <label class="checkbox">
                  <input type="checkbox" name="{{$name}}" id="{{$id}}" value="{{$value}}" {{$required}}/>
                  <span></span>
                  {{$info}}
              </label>
          </div>
   </div>
   <div class="form-text text-muted">
    {{$hint}}
   </div>
  </div>
 </div>
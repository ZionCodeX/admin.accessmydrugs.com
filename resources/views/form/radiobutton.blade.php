
<!--FORM :: ELEMENT :: RADIO BUTTON OPTION :: name --> 
   <div class="form-group row">
    <label class="col-form-label text-right col-lg-3 col-sm-12">{{$label}}</label>
    <div class="col-lg-6 col-md-9 col-sm-12">
     <div class="typeahead">
        <div class="form-check radio-inline">
            <label class="radio radio-outline">
            <input type="radio" name="{{$name}}" id="{{$id}}" value="{{$value1}}" {{$required}}/>
            <span></span>
            {{$title1}}
            </label>
            <label class="radio radio-outline">
            <input type="radio" name="{{$name}}" id="{{$id}}" value="{{$value2}}" {{$required}}/>
            <span></span>
            {{$title2}}
            </label>
        </div>
     </div>
     <div class="form-text text-muted">
      {{$hint}}
     </div>
    </div>
   </div>



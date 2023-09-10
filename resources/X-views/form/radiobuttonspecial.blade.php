

 <!--FORM :: ELEMENT :: RADIO-BUTTON-SPECIAL :: name --> 
 <div class="form-group row">
    <label class="col-form-label text-right col-lg-3 col-sm-12">{{$label}}</label>
    <div class="col-lg-6 col-md-9 col-sm-12">
  
  
    <div class="mb-2">
     <div class="form-group">
      <div class="row">
  
  
       <div class="col-lg-6">
        <label class="option">
         <span class="option-control">
          <span class="radio radio-outline">
           <input type="radio" name="{{$name}}" value="{{$value1}}" {{$required}}/>
           <span></span>
          </span>
         </span>
         <span class="option-label">
          <span class="option-head">
           <span class="option-title">
            {{$title1}}
           </span>
          </span>
          <span class="option-body">
            {{$subtitle1}}
          </span>
         </span>
        </label>
       </div>
  
  
       <div class="col-lg-6">
        <label class="option">
         <span class="option-control">
          <span class="radio radio-outline">
           <input type="radio" name="{{$name}}" value="{{$value2}}" {{$required}}/>
           <span></span>
          </span>
         </span>
         <span class="option-label">
          <span class="option-head">
           <span class="option-title">
            {{$title2}}
           </span>
          </span>
          <span class="option-body">
            {{$subtitle2}}
          </span>
         </span>
        </label>
       </div>
      </div>
  
      <div class="form-check"></div>
      <div class="form-text text-muted">
        {{$hint}}
      </div>
     </div>
    </div>
  
  </div></div>
   <!--Radio Button Special :: ends-->
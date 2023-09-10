
    <!--FORM :: ELEMENT :: DATE-RANGE :: name --> 
    <div class="form-group row">
        <label class="col-form-label text-right col-lg-3 col-sm-12">{{$label}}</label>
        <div class="col-lg-6 col-md-9 col-sm-12">
         <div class="typeahead">
            <div class="input-daterangex input-group" id="kt_datepicker_5x">
              <input type="text" class="form-control" name="{{$name1}}" id="{{$id1}}" type="date" value="{{$value1}}" {{$required}}/>
              <div class="input-group-append">
              <span class="input-group-text"><i class="la la-ellipsis-h"></i></span>
              </div>
              <input type="text" class="form-control" name="{{$name2}}" id="{{$id2}}" type="date" value="{{$value2}}" {{$required}}/>
            </div>
         </div>
         <div class="form-text text-muted">
            {{$hint}}
         </div>
        </div>
       </div>
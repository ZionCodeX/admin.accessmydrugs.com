
 <!--FORM :: ELEMENT :: FILE-UPLOAD :: name --> 
 <div class="form-group row">
    <label class="col-form-label text-right col-lg-3 col-sm-12">{{$label}}</label>
    <div class="col-lg-5 col-md-9 col-sm-12">
      <div class="custom-file" style="overflow: hidden;" >
        <input type="file" class="custom-file-input" id="{{$id}}" name="{{$name}}" value="{{$value}}" {{$required}} style="overflow: hidden;" />
        <label class="custom-file-label" for="customFile">{{$title}}</label>
      </div>
     <div class="form-text text-muted">
        {{$hint}}
     </div>
    </div>
   </div>
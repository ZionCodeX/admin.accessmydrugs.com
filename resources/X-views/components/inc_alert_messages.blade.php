  <!---------- FLASH ALERT MESSAGE STARTS ---------->
  <div class="container">
    @if ($message = Session::get('success'))
        <div class="round alert remove alert-success alert-block" id="messagex">
            <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
        </div>
    @endif 

    @if ($message = Session::get('failed'))
        <div class="round alert remove alert-warning alert-block" id="messagex">
            <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
        </div>
    @endif

    <!--form process alert all message-->    
    @if (count($errors) > 0)
        <div class="alert remove alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <script>
        //hide alert message
        window.setTimeout(function() {
            $(".remove").fadeTo(600, 0).slideUp(600, function(){
                $(this).remove(); 
            });
        }, 12000);
    </script>
</div>
<!---------- ALERT MESSAGE ENDS ---------->

@extends('layouts.base')


@section('title', 'Dashboard')


@section('header_links')
    @parent
@endsection


@section('alert_messages')
    @parent
@endsection


@section('sidebar')
    @parent
@endsection

 
<!-- MAIN PAGE CONTENT STARTS -->
@section('content')
    <!---------------------------------------------------------->
    <div class="card card-custom gutter-b">
      <div class="card-header">
       <div class="card-title">
        <h3 class="card-label">
         Bank Payment
         <small></small>
        </h3>
       </div>
      </div>
      <div class="card-body">
<!--::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->


<form action="https://dashboard.spreaditglobal.com/ps/bank-payment-procurement-and-shipping" enctype="multipart/form-data" method="post" accept-charset="utf-8">
							
							
    <div class="form-body">

                <h3 class="form-section">
                    <i class="ft-shopping-cart"></i> 
                    <b>Office Chairs</b>
                </h3> 
                <h6>
                    ORDER ID: <b>6531635</b> 
                </h6><hr>
        
        
        <div class="form-group row">
                    <label class="col-md-3 label-control" for="projectinput1"><b>Bank Details 1: </b></label>
                    <div class="col-md-9">
                    <b>ACCOUNT NAME: </b> SPREADIT LIMITED<br>
                    <b>BANK NAME: </b> GTBank<br>
                    <b>ACCOUNT NUMBER: </b> 0449334088<br>	
                    </div>
            
                </div>
        
        <div class="form-group row">
                    <label class="col-md-3 label-control" for="projectinput1"><b>Bank Details 2: </b></label>
                    <div class="col-md-9">
                    <b>ACCOUNT NAME: </b> SPREADIT LIMITED<br>
                    <b>BANK NAME: </b> Zenith Bank<br>
                    <b>ACCOUNT NUMBER: </b> 1016797924<br>	
                    </div>
            
                </div>
        
        <!--<div class="form-group row">
                    <label class="col-md-3 label-control" for="projectinput1"><b>Bank Details 2: </b></label>
                    <div class="col-md-9">
                    <b>ACCOUNT NAME: </b> SPREADIT LIMITED<br>
                    <b>BANK NAME: </b> Access Bank<br>
                    <b>ACCOUNT NUMBER: </b> 0766818624<br>	
                    </div>
            
                </div>-->
        
        <hr>
        
        
        <div class="form-group row">
             
            <label class="col-md-3 label-control" for="projectinput1">

                <b>Pay by Direct Bank Transfer:: </b><br><small>(For payments outside Nigeria)</small>
            
            </label>
                    <div class="col-md-9">
                    <b>ACCOUNT NAME: </b> SPREADIT LIMITED<br>
                    <b>BANK NAME: </b> Guaranty Trust Bank Ltd<br>
                    <b>ACCOUNT NUMBER: </b> 0449334095<br>	
                    <b>SWIFT CODE: </b> GTBINGLA<br>
                    <b>ROUTING NUMBER: </b> 058-152609<br>
                    <b>BANK ADDRESS: </b> GTBank, 1 obediyi close, off St. Gregory, Ikoyi, Lagos<br>
                    <b>SPREADIT LIMITED ADDRESS: </b> 5 Olutosin Ajayi Street, Ajao Estate, 100263, Lagos, Nigeria.<br>
                    </div>
            
                </div>
        
        <hr>
        
        <div class="form-group row">
             
            <label class="col-md-3 label-control" for="projectinput1">
                
                <b>Pay via Flutterwave:: </b><br><small>(Recommended)</small>
            
            </label>
                    <div class="col-md-9">
                    <b>Follow Link: </b><a href="https://flutterwave.com/pay/spreaditglobal" target="_blank">https://flutterwave.com/pay/spreaditglobal</a><br>	
                    </div>
            
                </div>
        
        <hr>
        
<!--						<div class="form-group row">
                    <label class="col-md-3 label-control" for="projectinput1"><b>Shipping Plan</b></label>
                    <div class="col-md-9">
                                                            </div> 
                </div>-->
        

        
        <div class="form-group row">
                    <label class="col-md-3 label-control" for="projectinput1"><b>Amount to Pay</b></label>
            <div class="col-md-9">

                
                

<span style="font-size:20px; color:#069;"><b>
$471.12 Dollar</b>
</span>									
                

&nbsp;&nbsp; or &nbsp;&nbsp;
<span style="font-size:20px; color:#007F3A;"><b>
₦244,037.67 Naira</b>
</span>
                

                
                </div>
             </div>

        
        
        
        <hr>
        
        
<div class="form-group row">
                    <label class="col-md-3 label-control" for="projectinput2"><b>Transaction Bank / Card<span style="color:red;">*</span></b></label>
                    <div class="col-md-9">
                        <label class="sr-only" for="projectinput7">Bank </label>
                        <select id="pid_bank" name="pid_bank" class="form-control round" required="">
                        <option value=""> -Select Bank / Payment Method used- </option>	
                            

                
            <option myid="BKID-ABCDE-12345678" value="BKID-ABCDE-12345678">GT Bank (Local) (0449334088)</option>
                     
            
            <option myid="BKID-ABCDE-123456777" value="BKID-ABCDE-123456777">Zenith Bank (1016797924)</option>
                     
            
            <option myid="BKID-ABCDE-12345670" value="BKID-ABCDE-12345670">GT Bank (Int'l) (0449334095)</option>
                     
            
            <option myid="BKID-ABCDE-12345679" value="BKID-ABCDE-12345679">FLUTTERWAVE (Card Payment)</option>
                     

                            
                    </select>
                </div>
            </div>	
                            
        
        
        <hr>

                
               <div class="form-group row">
                    <label class="col-md-3 label-control" for="projectinput1"><b>Depositor's Full Name.<span style="color:red;">*</span></b></label>
                    <div class="col-md-9">
                        <input type="text" id="depositor_name" name="depositor_name" class="form-control round" placeholder="Provide Depositor's full name" required="">
                    </div>
                </div>
        
        
                <!--<div class="form-group row">
                    <label class="col-md-3 label-control" for="projectinput1"><b>Teller / Trx / Ref No.<span style="red;">*</span></b></label>
                    <div class="col-md-9">
                        <input type="text" id="trx_number" name="trx_number" class="form-control round" placeholder="Provide Bank Deposit Transaction Number" required>
                    </div>
                </div>-->
        
        
        
        

                
            <div class="form-actions center">
                <!--<button type="button" class="btn btn-warning mr-1">
                    <i class="ft-x"></i> Cancel
                </button>-->
                
<p class="warning">Please, you must have paid for this <b>order</b> to any of the accounts above <br> or using the Flutterwave link provided for Non-Nigerian customers before clicking the <b>Submit Payment Details</b> button below. <br><b>Please Do NOT submit the same payment details more than once</b>.</p>
                
                
               <div class="form-group">
                    
                        <div class="form-group">
                            
<input type="hidden" name="pid_order" value="PSD-VD9TN-1556531635">
<input type="hidden" name="order_name" value="ADMIN TEST ORDER 2">
<input type="hidden" name="status" value="saved">
<input type="hidden" name="amount" value="244037.6664">

                              
    <button type="submit" class="btn mb-1 btn-light btn-lg btn-block round" id="buttonx" name="bank_payment" value="bank_payment">
        <span class="la la-bank"></span> Submit <b>Payment </b> details
    </button>
                            
                            
    <!--ADD CANCEL / BACK BUTTON-->
    <hr>
    <center>
    <a href="{{ url()->previous() }}">
    <button type="button" class="btn btn-danger round btn-min-width mr-1 mb-1">Cancel / Back </button></a>
    </center>						

                            
                        </div>
                    
                </div>
                
                
                
            </div>
                
         </div></form>


<!--::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->
      </div>
     </div>
    <!---------------------------------------------------------->
@endsection 
<!-- MAIN PAGE CONTENT STOPS -->


@section('footer')
    @parent
@endsection 



@section('footer_scripts')
    @parent
@endsection  
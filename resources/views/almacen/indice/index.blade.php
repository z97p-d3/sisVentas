@extends ('layouts.admin')
@section ('contenido')
<div class="row">




  <div class="col-lg-12 clo-md-12 col-12">
	
<!-- Flexbox container for aligning the toasts -->
<div id="empresa" aria-live="polite" aria-atomic="true" class="d-flex justify-content-center align-items-center back" style="min-height: 200px;">

  <!-- Then put toasts within -->
  <div  class="toast " role="alert" aria-live="assertive" aria-atomic="true" id="animar">
    <div class="toast-header">
   
      <h2><strong class="mr-auto" >Bienvenidos</strong></h2>
      <small>A soluciones informaticas</small>

    </div>
    <div class="toast-body">
       Go Trade
    </div>
  </div>
</div>
 
 

</div>



@endsection
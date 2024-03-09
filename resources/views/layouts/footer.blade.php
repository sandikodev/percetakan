

<footer class="footer-wrapper">
  <div class="footer-wrapper__inside">
     <div class="container-fluid">
        <div class="row">
           <div class="col-md-6">
              <div class="footer-copyright">
              </div>
           </div>
           <div class="col-md-6">
              <div class="footer-menu text-end">
                 <p><span>All rights reserved © {{ date('Y') }} , made with ❤️ by </span><a href="https://bikinweeb.com">Bikinweeb</a></p>
              </div>
           </div>
        </div>
     </div>
  </div>
</footer>
</main>
<div id="overlayer">
<div class="loader-overlay">
  <div class="dm-spin-dots spin-lg">
     <span class="spin-dot badge-dot dot-primary"></span>
     <span class="spin-dot badge-dot dot-primary"></span>
     <span class="spin-dot badge-dot dot-primary"></span>
     <span class="spin-dot badge-dot dot-primary"></span>
  </div>
</div>
</div>
<div class="overlay-dark-sidebar"></div>
<div class="customizer-overlay"></div>


<script src="{{ asset('percetakan/js/plugins.min.js') }}"></script>
<script src="{{ asset('percetakan/js/script.min.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="{{asset('percetakan/sweetalert2/sweetalert2.js')}}"></script>
<script src="{{asset('percetakan/select2/select2.js')}}"></script>

<script>
$(document).ready(function(){
  new DataTable('#datatables');
  new DataTable('#datatables2');
  new DataTable('#datatables3');
  new DataTable('#datatables4');
  new DataTable('#datatables5');
  new DataTable('#datatables6');
  new DataTable('#datatables7');
});

$(function(){
  $("#select2").select2();
  $("#select3").select2();
  $("#select4").select2();
  $("#select5").select2();
});
</script>
{{-- <x-notify::notify /> --}}
@notifyJs
</body>
</html>
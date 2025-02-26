<!-- latest jquery-->
<script src="{{ asset('backend/assets/js/jquery.min.js') }}" defer></script>

<!-- Bootstrap js-->
<script src="{{ asset('backend/assets/js/bootstrap/bootstrap.bundle.min.js') }}" defer></script>

<!-- feather icon js-->
<script src="{{ asset('backend/assets/js/icons/feather-icon/feather.min.js') }}" defer></script>
<script src="{{ asset('backend/assets/js/icons/feather-icon/feather-icon.js') }}" defer></script>

<!-- scrollbar js-->
<script src="{{ asset('backend/assets/js/scrollbar/simplebar.js') }}" defer></script>
<script src="{{ asset('backend/assets/js/scrollbar/custom.js') }}" defer></script>

<!-- Sidebar jquery-->
<script src="{{ asset('backend/assets/js/config.js') }}" defer></script>

<!-- Plugins JS start-->
<script src="{{ asset('backend/assets/js/sidebar-menu.js') }}" defer></script>
{{-- <script src="{{ asset('backend/assets/js/sidebar-pin.js') }}" defer></script> --}}
<script src="{{ asset('backend/assets/js/slick/slick.min.js') }}" defer></script>
<script src="{{ asset('backend/assets/js/slick/slick.js') }}" defer></script>
<script src="{{ asset('backend/assets/js/header-slick.js') }}" defer></script>
{{-- <script src="{{ asset('backend/assets/js/chart/apex-chart/apex-chart.js') }}" defer></script>
<script src="{{ asset('backend/assets/js/chart/apex-chart/stock-prices.js') }}" defer></script> --}}

<!-- Range Slider js-->
{{-- <script src="{{ asset('backend/assets/js/range-slider/rSlider.min.js') }}"defer></script> --}}
{{-- <script src="{{ asset('backend/assets/js/rangeslider/rangeslider.js') }}" defer></script> --}}
<script src="{{ asset('backend/assets/js/prism/prism.min.js') }}" defer></script>
<script src="{{ asset('backend/assets/js/clipboard/clipboard.min.js') }}" defer></script>
<script src="{{ asset('backend/assets/js/counter/jquery.waypoints.min.js') }}" defer></script>
<script src="{{ asset('backend/assets/js/counter/jquery.counterup.min.js') }}" defer></script>
<script src="{{ asset('backend/assets/js/counter/counter-custom.js') }}" defer></script>
{{-- <script src="{{ asset('backend/assets/js/custom-card/custom-card.js') }}" defer></script> --}}

<!-- calendar js-->
{{-- <script src="{{ asset('backend/assets/js/calendar/fullcalender.js') }}" defer></script>
<script src="{{ asset('backend/assets/js/calendar/custom-calendar.js') }}" defer></script> --}}
{{-- <script src="{{ asset('backend/assets/js/dashboard/dashboard_2.js') }}" defer></script> --}}
<script src="{{ asset('backend/assets/js/animation/wow/wow.min.js') }}" defer></script>
<script src="{{ asset('backend/assets/js/datatable/datatables/jquery.dataTables.min.js') }}" defer></script>
<script src="{{ asset('backend/assets/js/datatable/datatables/datatable.custom.js') }}" defer></script>
<!-- Plugins JS Ends-->

<!-- Theme js-->
<script src="{{ asset('backend/assets/js/script.js') }}" defer></script>
{{-- <script src="{{ asset('backend/assets/js/theme-customizer/customizer.js') }}" defer></script> --}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js" defer></script>

{{-- Summernote Js --}}
<script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js" defer></script>


<script>
    @if (Session::has('success'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.success("{{ session('success') }}");
    @endif

    @if (Session::has('error'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.error("{{ session('error') }}");
    @endif

    @if (Session::has('info'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.info("{{ session('info') }}");
    @endif

    @if (Session::has('warning'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.warning("{{ session('warning') }}");
    @endif
</script>


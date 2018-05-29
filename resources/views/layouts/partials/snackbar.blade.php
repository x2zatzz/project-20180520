<div id="snackbar" class="@isset($snackbar){{$snackbar}}@endisset">
  <span>@isset($message){{$message}}@endisset</span>
</div>
  @php session()->forget('snackbar')@endphp

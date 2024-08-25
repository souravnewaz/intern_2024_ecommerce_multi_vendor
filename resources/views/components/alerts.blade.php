@if($message = session()->get('error'))
<div class="alert alert-danger mt-3" role="alert">
    {{ $message }}
</div>
@endif

@if($message = session()->get('success'))
<div class="alert alert-success mt-3" role="alert">
    {{ $message }}
</div>
@endif

@if($message = session()->get('errors'))
<div class="alert alert-success mt-3" role="alert">
    {{ $message }}
</div>
@endif
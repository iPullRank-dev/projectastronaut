@extends('layouts.report-auth')

@section('pagetitle','{{Company Name}} Report')

@section('passdata')

<script>
        var hash = <?php echo json_encode($hash); ?>;
</script>

@endsection

@section('pagejs')

    <script src="http://cdn.jsdelivr.net/fingerprintjs2/0.7.0/fingerprint2.min.js"></script>
    <script src="../resources/assets/customjs/report.js"></script>

@endsection

@extends('layouts.report-temp')

@section('pagetitle','{{Company Name}} Report')


@section('grade')
<?php echo $data[0]->final_score ?>
@endsection


@section('pagejs')

@endsection

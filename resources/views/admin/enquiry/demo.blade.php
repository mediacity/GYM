@extends('layouts.master')
@section('title',__('All Demo'))
@section('breadcum')
<div class="breadcrumbbar breadcrumbbar-one">
    <div class="row align-items-center">
        <div class="col-lg-4 col-md-6">
            <h4 class="page-title">{{ __("Demo") }}</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('Dashboard') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ __('All Demo') }}
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection
@section('maincontent')
<!-- Start Contentbar -->
<div class="mb-5">
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h5 class="card-title mb-0">{{ __("All Demo") }}</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-borderd">
                            <thead>
                                <tr>
                                    <th> </th>
                                    <th>#</th>
                                    <th>{{ __("Enquiry Date") }}</th>
                                    <th>{{ __("Enquiry ID") }}</th>
                                    <th>{{ __("Name") }}</th>
                                    <th>{{ __("Email") }}</th>
                                    <th>{{ __("Mobile No.") }}</th>
                                    <th>{{ __("Purpose") }}</th>
                                    <th>{{ __("Age") }}</th>
                                    <th>{{ __("Occupation") }}</th>
                                    <th>{{ __("Cost") }}</th>
                                    <th>{{ __("Health Issue") }}</th>
                                    <th>{{ __("Status") }}</th>

                                </tr>
                            </thead>
                            @if (isset($enquiry))
                            <tbody>
                                @foreach($enquiry as $key => $list)
                                <tr>
                                    <td></td>
                                    <td>{{$key+1}}</td>
                                    <td>{{$list -> created_at}}</td>
                                    <td>{{$list -> enid}}</td>
                                    <td>{{ucfirst($list->name) }} </td>
                                    <td>{{$list -> email}}</td>
                                    <td>{{$list -> mobile }}</td>
                                    <td>{{$list -> purpose}}</td>
                                    <td>{{$list -> age}}</td>
                                    <td>{{$list -> occupation['occupation'] ?? '-'}}</td>
                                    <td>{{$list -> cost['cost'] ?? '-'}}</td>
                                    <td>
                                        @if($list->issue)
                                        @foreach($list->issue as $key => $d)
                                        @if($d == 'NO')
                                        <span class="badge badge-success">{{ __("NO Health Issues") }}</span>
                                        @else
                                        @php
                                         $issue = App\Enquiryhealth::find($d);
                                         @endphp
                                         @if(isset($issue))
                                         <span class="badge badge-primary">{{ ucfirst($issue->issue) }}</span>
                                         @endif
                                        @endif
                                        @endforeach
                                        @endif
                                    </td>
                                    <td>
                                        @if($list->status == 'demo') <span
                                            class="badge badge-primary">{{ $list->status == 'demo' ? "Demo" : "" }}</span>
                                             @elseif($list->status == 'close') <span
                                            class="badge badge-danger">{{ $list->status == 'close' ? "Close" : "" }}</span>
                                            @elseif($list->status == 'pending') <span
                                            class="badge badge-secondary">{{ $list->status == 'pending' ? "Pending" : "" }}</span>
                                            @elseif($list->status == 'join') <span
                                            class="badge badge-success">{{ $list->status == 'join' ? "Join" : "" }}</span>
                                        @else
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
             @endsection
             <!-- End Contentbar -->

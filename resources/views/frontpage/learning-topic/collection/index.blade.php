@extends('layouts.home-template')

@section('title')
{{ __('section-title.my_topic_collection')}}
@endsection

@section('before-styles')
<!-- Treeview Gijgo CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/gijgo/1.9.13/combined/css/gijgo.min.css">
@endsection

@section('content')
<div id="main" class="content">
    <div class="container">
        <div class="row">
            <div id="course-side-nav" class="col-md-3 col-sm-12">
                <h4 class="font-weight-bold">{{ __('section-title.topic_index')}}</h4>
                @include('frontpage.topic-sidebar')
            </div>
            <div class="col-md-9 col-sm-12">
                <h2 class="title">{{ __('section-title.my_topic_collection')}}</h2>
                @include('frontpage.learning-topic.content')
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<!-- Treeview Gijgo -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gijgo/1.9.13/combined/js/gijgo.min.js"></script>
<!-- Sweet Alert -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endpush

@push('after-scripts')
<script>
    $('.btn-remove-collection').on('click', function(){

        const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content')
        let topic_id = $(this).data('topic-id')
        let button = $(this)

        $.ajax({
            headers : {
                'X-CSRF-TOKEN' : CSRF_TOKEN
            },
            url: '{!! \LaravelLocalization::localizeURL("/") !!}/my-topics/'+topic_id,
            type: 'delete',
            dataType: 'json',
            success: function(response){
                button.parent().parent().parent().remove()
            },
            error: function(response){
                swal({
                    text: "{!! __('messages.topic_fail_removed') !!}",
                    icon: "error",
                });
            },
        });
    });
</script>
@endpush
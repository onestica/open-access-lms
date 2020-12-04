@if(sizeof($topics) == 0)
    <div class="text-center">
        <h3 class="text-secondary">{{ __('label.no_data')}} <i class="fas fa-folder-open ml-2"></i></h3>
    </div>
@else
    <div id="topic-list-wrapper">
        @foreach($topics as $topic)
        <div class="card card-topic row">
            <div class="col-lg-2 text-center">
                <img lazy="loading" src="{{ $topic->user->avatar ? asset('storage/'.$topic->user->avatar) : asset('img/avatar/default-user.jpg') }}" class="rounded-circle avatar-size" alt="teacher-img">
            </div>
            <div class="col-lg-5">
                <p class="text-soft-red">{{$topic->subject->name}}</p>
                <h6 class="font-weight-bold mb-0">{{$topic->name}}</h6>
                <p>{{ __('label.teacher')}}: {{$topic->user->name}}</p>
            </div>
            <div class="col-lg-2">
                <button class="btn btn-link btn-lg" data-container="body" data-toggle="popover" data-placement="top" data-content="{!! $topic->getBasicCompetency() !!}">{{ __('button-label.competency_show')}}</button>
            </div>
            <div class="col-lg-3 topic-action">
                @hasrole("Siswa")
                <div class="btn-group mb-3 text-center" role="group">
                    @if($topic->collectors->contains(Auth::id()))
                        <button class="w-100 btn btn-link btn-lg btn-remove-collection text-danger" data-topic-id="{{$topic->id}}"><i class="fas fa-heart"></i> {{ __('button-label.added_my_topic')}}</button>
                        <button class="hide w-100 btn btn-link btn-lg btn-add-collection text-danger" data-topic-id="{{$topic->id}}"><i class="far fa-heart"></i> {{ __('button-label.add_my_topic')}}</button>
                    @else
                        <button class="hide w-100 btn btn-link btn-lg btn-remove-collection text-danger" data-topic-id="{{$topic->id}}"><i class="fas fa-heart"></i> {{ __('button-label.added_my_topic')}}</button>
                        <button class="w-100 btn btn-link btn-lg btn-add-collection text-danger" data-topic-id="{{$topic->id}}"><i class="far fa-heart"></i> {{ __('button-label.add_my_topic')}}</button>
                    @endif
                </div>
                @endhasrole
                <div class="btn-group mb-3" role="group">
                    {{-- <button class="btn btn-lg bg-light-green text-green action-icon"><i class="fas fa-file-alt"></i></button> --}}
                    <a href="{{\LaravelLocalization::localizeURL('topics/'.$topic->id)}}" class="btn btn-lg btn-pastel-orange w-100"><i class="fas fa-file-alt mr-2"></i> {{ __('label.topic')}}</a>
                </div>
                <div class="btn-group" role="group">
                    {{-- <button class="btn btn-lg bg-light-orange text-orange action-icon"><i class="fas fa-paste"></i></button> --}}
                    <a href="{{\LaravelLocalization::localizeURL('topics/'.$topic->id.'/tasks')}}" class="btn btn-lg btn-outline-pastel-orange w-100"><i class="fas fa-paste mr-2"></i> {{ __('label.task')}}</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endif
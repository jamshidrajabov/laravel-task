<link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    @if (auth()->user()->role_id==1)
                    <p class="fs-3 text-center">Kelib tushgan arizalar</p>
                    <div class="row row-cols-1 row-cols-md-1 g-4 mt-1">
                        @foreach ($applications as $application)
                        <div class="col">
                            <div class="card h-100">
                              <div class="card-body">
                                  <p class="fs-3">{{$application->user->name}}</p>
                                  <samp > {{$application->user->email}}</samp>
                                  <hr class="border border-danger border-2 opacity-50 mb-2 mt-1">
                                <h5 class="card-title fs-2 ">{{$application->subject}}</h5>
                                <p class="card-text mb-4">{{$application->message}}</p>
                              </div>
                              <div class="card-footer">
                                  <small class="text-body-secondary">{{$application->created_at}}</small>
                                  <p class="btn btn-outline-primary">id: {{$application->id}}</p>
                              </div>
                            </div>
                          </div>
                        @endforeach
                        
                        {{ $applications->links() }}

                          
                    </div>
                                     
                    @else
                            @if(session('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session('error') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                        <form class="form" action="{{route('applications.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <p class=" fs-3 text-center">Ariza yuborish formasi</p>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Subject</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="subject" >
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Message</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="message" rows="5"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">file yuklang</label>
                            <input class="form-control" type="file" name="file" id="formFile">
                          </div>
                          <div class="d-grid">
                            {{-- <button class="btn btn-primary" type="submit">Yuborish</button> --}}
                            <input class="btn btn-primary" type="submit" value="Yuborish" >
                          </div>
                          
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

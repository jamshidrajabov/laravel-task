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
                    <div class="col">
                        <div class="card ">
                                <div class="card-body">
                                    <p class="fs-3">{{$application->user->name}}</p>
                                    <samp > {{$application->user->email}}</samp>
                                    <hr class="border border-danger border-2 opacity-50 mb-2 mt-1"> 
                                <div class="flex justify-between">
                                    <div>
                                        <h5 class="card-title fs-2 ">{{$application->subject}}</h5>
                                        <p class="card-text mb-4">{{$application->message}}</p>
                                    </div>
                                    <div>
                                        @if ($application->file_url==null)
                                           <div class="flex m-6 p-6 cursor-pointer hover:bg-gray-50 transition">
                                            No file
                                            </div> 
                                        @else
                                            <a href="{{asset('storage/images/'.$application->file_url)}}" target="_blank" class="flex m-6 p-6 cursor-pointer hover:bg-gray-50 transition ">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                                </svg>
                                            </a>
                                        @endif
                                     </div>
                                </div>
                                </div>
                          <div class="card-footer flex justify-between">
                            <div>
                                <small class="text-body-secondary">{{$application->created_at}}</small>
                                <p class="btn btn-outline-primary">id: {{$application->id}}</p>
                            </div>
                             
                               
                             </div>
                          </div>

                        </div>
                        <div class="text-center fs-5 m-3">
                            @if (auth()->user()->role->name=='manager')
                            <a class="btn btn-danger mt-2" href="/">Orqaga</a>
                            @else
                            <a class="btn btn-danger mt-2" href="/applications">Orqaga</a>
                            @endif
                            
                            <div class="m-4">
                            Yuborilgan Javoblar: {{$count}} ta javob mavjud:
                            </div>
                        </div>
                        @foreach ($answers as $answer)
                            <div class="card text-center m-3">
                                <div class="card-header">
                                 Javob: {{$loop->index+1}}
                                </div>
                                <div class="card-body">
                                  <h5 class="card-title"></h5>
                                  <p class="card-text">{{$answer->answer}}</p>
                                </div>
                                <div class="card-footer text-body-secondary">
                                    {{$answer->created_at}}
                                </div>
                              </div>
                              <hr class="border border-primary border-3 opacity-75">
                            @endforeach
                            
                      </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

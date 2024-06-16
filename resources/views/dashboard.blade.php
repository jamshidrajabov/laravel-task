<link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">

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
                        <div class="col">
                            <div class="card h-100">
                              <div class="card-body">
                                  <p class="fs-3">Jamshid</p>
                                  <samp > manager@gmail.com</samp>
                                  <hr class="border border-danger border-2 opacity-50 mb-2 mt-1">
                                <h5 class="card-title fs-2 ">Card title</h5>
                                <p class="card-text mb-4">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                              </div>
                              <div class="card-footer">
                                  <small class="text-body-secondary">2024-06-15 15:15:15</small>
                                  <p class="btn btn-outline-primary">id: 15</p>
                              </div>
                            </div>
                          </div>
                          <div class="col">
                            <div class="card h-100">
                              <div class="card-body">
                                  <p class="fs-3">Jamshid</p>
                                  <samp > manager@gmail.com</samp>
                                  <hr class="border border-danger border-2 opacity-50 mb-2 mt-1">
                                <h5 class="card-title fs-2 ">Card title</h5>
                                <p class="card-text mb-4">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                              </div>
                              <div class="card-footer">
                                  <small class="text-body-secondary">2024-06-15 15:15:15</small>
                                  <p class="btn btn-outline-primary">id: 15</p>
                              </div>
                            </div>
                          </div>
                    </div>
                                     
                    @else
                        <form class="form" action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <p class=" fs-3 text-center">Ariza yuborish formasi</p>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Subject</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="subject" placeholder="name@example.com">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Message</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">file yuklang</label>
                            <input class="form-control" type="file" id="formFile">
                          </div>
                          <div class="d-grid">
                            <button class="btn btn-primary" type="submit">Yuborish</button>
                          </div>
                          
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

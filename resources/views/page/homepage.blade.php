<x-template>
    <!--Sezione cerca-->
    <div class="container my-5 justify-content-between sez-cerca-custom">
        <h2 class="mb-4 text-center">
            Filtri
        </h2>
        <div class="row">
            <div class="col-12 col-md-3">
                <a class="nav-link dropdown-toggle active text-center mt-2" href="#" data-bs-toggle="dropdown"
                    aria-expanded="false">Categorie</a>
                <ul class="dropdown-menu">
                    @foreach ($categories as $category)
                        <li><a href="{{ route('categoryShow', compact('category')) }}"
                                class="dropdown-item">{{ $category->name }}</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="col-12 col-md-3">
                <input type="text" class="rounded p-2" id="cerca-per-nome" placeholder="Cerca per Nome">
            </div>
            <div class="col-12 col-md-3">
                <input type="number" class="rounded p-2" id="price-min" placeholder="Price Min.">
            </div>
            <div class="col-12 col-md-3">
                <input type="number" class="rounded p-2" id="price-max" placeholder="Price Max.">
            </div>
        </div>
    </div>


    <!-- sezione annunci -->

    <div class="container">

        <div class="row">


            @foreach ($announcements as $announcement)
                <div class="col-12 col-md-4 my-4 d-flex justify-content-center">

                    <a href="{{ route('announcement.show', ['announcement' => $announcement]) }}">


                        <div class="card">
                            <div class="card-inner">
                                <div class="card-front">
                                    <img src="{{ Storage::url('\images\No-Image-Placeholder.png') }}" alt=""
                                        class="card-img-top p-3 rounded">
                                </div>
                                <div class="card-back container d-flex justify-content-evenly align-items-center">

                                    <h5 class="card-title">{{ $announcement->title }}</h5>

                                    <span class="badge bg-success">{{ $announcement->price }}</span>

                                    {{-- <a href="" class="my-2 border-top pt-2 border-dark card-link shadow btn btn-succes">Categoria:{{$announcement->category->name ?? 'Nessuna Categoria'}}</a> --}}
                                    {{-- <p class="card-footer">Pubblicato il:{{$announcement->created_at->format('d-m-Y')}}</p> --}}
                                </div>
                            </div>
                        </div>


                    </a>


                </div>
            @endforeach
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-2">
                        {{ $announcements->links() }}
                    </div>
                </div>
            </div>

        </div>

    </div>

    <x-categories />


</x-template>

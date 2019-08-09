<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('assets/images/logo.png') }}">
    <script src="{{ asset('assets/fontawesome/js/all.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/styleNoBanner.css') }}">
    <title>{{ config('app.name', 'Kontacts-Hub') }}</title>
</head>
<body class="bd-body">
<header>
    @include('includes.nav')

    @yield('content')

    @foreach ($errors->all() as $error)
        <p class="alert alert-danger">{{ $error }}</p>
    @endforeach
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

</header>

{{--@yield('content')--}}


<!-- contact Modal -->
<div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="contactTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content bg-light">
            <div class="modal-header">
                <h5 class="modal-title" id="contactTitle">KontactsHub</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{--<div class="modal-body">--}}
                <form action="{{route('contacts.update', ['contact' => $contact->id ])}}" method="post">
                    @csrf
                    @method('PUT')
                    @foreach ($errors->all() as $error)
                        <p class="alert alert-danger">{{ $error }}</p>
                    @endforeach
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputName">Name</label>
                            <input type="text" class="form-control" name="name" id="inputName"  value="{{ $contact->name}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail">Email</label>
                            <input type="email" class="form-control" name="email" id="inputEmail" value="{{ $contact->email }}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputPhone">Phone</label>
                            <input type="tel" class="form-control" name="phone_1" id="inputPhone" value="{{ $contact->phone_1 }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPhone2">Phone 2</label>
                            <input type="tel" class="form-control" name="phone_2" id="inputPhone2" value="{{ $contact->phone_2 }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Address</label>
                        <input type="text" class="form-control" name="address" id="inputAddress" value="{{ $contact->address }}">
                    </div>

                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck">
                            <label class="form-check-label" for="gridCheck">
                                Favourite
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button  type="submit" class="btn btn-primary">Save Contact</button>
                        <a href="" class="" data-dismiss="modal"><i class="fas fa-edit"></i></a>
                        <a href="" class=""><i class="fas fa-check"></i></a>
                    </div>
                </form>
                {{--</div>--}}

            </div>
            {{--<div class="modal-footer">--}}
            {{--<a href="" class="" data-dismiss="modal"><i class="fas fa-edit"></i></a>--}}
            {{--<a href="" class=""><i class="fas fa-check"></i></a>--}}
            {{--</div>--}}
        </div>
    </div>
</div>
<!-- End of contact modal -->
<!-- add contact modal -->
<div class="modal fade" id="addcontact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Contact</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('contacts.store')}}" method="post">
                    @csrf
                    @foreach ($errors->all() as $error)
                        <p class="alert alert-danger">{{ $error }}</p>
                    @endforeach
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputName">Name</label>
                            <input type="text" class="form-control" name="name" id="inputName" placeholder="Name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail">Email</label>
                            <input type="email" class="form-control" name="email" id="inputEmail" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputPhone">Phone</label>
                            <input type="tel" class="form-control" name="phone_1" id="inputPhone" placeholder="Mobile">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPhone2">Phone 2</label>
                            <input type="tel" class="form-control" name="phone_2" id="inputPhone2" placeholder="Home">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Address</label>
                        <input type="text" class="form-control" name="address" id="inputAddress" placeholder="Apartment, studio, or floor">
                    </div>

                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck">
                            <label class="form-check-label" for="gridCheck">
                                Favourite
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button  type="submit" class="btn btn-primary">Save Contact</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- end of add contact modal -->

<!-- Footer -->
<footer class="mt-5">
    <div class="container-fluid align-items-center">
        <div class="row">
            <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
                <div class="row pt-3">
                    <div class="col-lg-6 text-center"></div>
                    <div class="col-lg-6 text-center">
                        <p>&copy; 2019 Copyright. Made With <i class="fas fa-heart text-danger"></i> by <a href="#" class="text-danger">codefreakie</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- End of Footer -->


<script src="{{ asset('assets/script.js') }}"></script>
<script src="{{ asset('assets/bootstrap/jquery-3.3.1.slim.min.js') }}"></script>
<script src="{{ asset('assets/bootstrap/popper.min.js') }}"></script>
<script src="{{ asset('assets/bootstrap/bootstrap.min.js') }}"></script>
</body>
</html>

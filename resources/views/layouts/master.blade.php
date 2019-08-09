<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('assets/images/logo.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="{{ asset('assets/fontawesome/js/all.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
    <script src="{{ asset('assets/jquery.js') }}"></script>
    <title>{{ config('app.name', 'Kontacts-Hub') }}</title>
</head>
<body class="bd-body">
<header>
@include('includes.nav')
@foreach ($errors->all() as $error)
    <p class="alert alert-danger">{{ $error }}</p>
@endforeach
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
@include('includes.banner')

</header>

@yield('content')

@if (Auth::check())

<!-- contact Modal -->
<div class="modal fade" id="contactShow" tabindex="-1" role="dialog" aria-labelledby="contactTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content bg-light">
            <div class="modal-header">
                <h5 class="modal-title" id="contactTitle">KontactsHub</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-4">
                        <img src="{{ asset('assets/images/man2.jpg') }}" width="70" height="70">
                    </div>
                    <div class="col-8">

                        <input id="shownamehere" type="text" name="name" class="text-dark text-center text-info bg-info" disabled>
                        <p><i class="fas fa-phone"></i> +23470834523456</p>
                        <p><i class=""></i>test@html.com</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="" class=""><i class="fas fa-check"></i></a>
            </div>
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
<!-- edit contact modal -->
<div class="modal fade text-primary" id="editContact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit This Contact</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('contacts.update','test')}}" method="post">
                    @csrf
                    {{ method_field('patch') }}
                    @foreach ($errors->all() as $error)
                        <p class="alert alert-danger">{{ $error }}</p>
                    @endforeach
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <input type="hidden" name="contact_id" value="" id="contact_id">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputName">Name</label>
                            <input type="text" class="form-control" name="name" id="editName" placeholder="Name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail">Email</label>
                            <input type="email" class="form-control" name="email" id="editEmail" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputPhone">Phone</label>
                            <input type="tel" class="form-control" name="phone_1" id="editPhone" placeholder="Mobile">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPhone2">Phone 2</label>
                            <input type="tel" class="form-control" name="phone_2" id="editPhone2" placeholder="Home">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Address</label>
                        <input type="text" class="form-control" name="address" id="editAddress" placeholder="Apartment, studio, or floor">
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
                        <button  type="submit" class="btn btn-primary">Update Contact</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- end of edit contact modal -->
{{--delete contact--}}
<div class="modal fade" id="contactDelete" tabindex="-1" role="dialog" aria-labelledby="contactTitle" aria-hidden="true">
    <div class="modal-dialog font-weight-bold " role="document">
        <div class="modal-content text-danger font-weight-bolder" >
            <div class="modal-header ">
                <h5 class="modal-title text-center" id="contactTitle">Delete Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('contacts.destroy','test')}}" method="post">
                @csrf
                {{ method_field('delete') }}
                @foreach ($errors->all() as $error)
                    <p class="alert alert-danger">{{ $error }}</p>
                @endforeach
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="modal-body">

                    <input type="hidden" name="contact_id" value="" id="contact_id">
                    <div class="row">
                        <div class="col-12">
                            <p>are you sure you want to delete this contact ???</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="" class="btn btn-info text-left" data-dismiss="modal">No, go back</a>
                    <button type="submit" href="" class="btn btn-danger text-left">Yes, Confirm delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{--end of delete contact    --}}
@endif


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
<script>

    $('#editContact').on('show.bs.modal', function (event) {
        // console.log('modal opened');
        let button = $(event.relatedTarget);
        let name = button.data('contactname');
        let address = button.data('contactaddress');
        let phone1 = button.data('contactphone1');
        let phone2 = button.data('contactphone2');
        let email = button.data('contactemail');
        let contact_id = button.data('thiscontactid');
        // let nickname = button.data('contactnickname');
        let modal = $(this);
        modal.find('.modal-body #editName').val(name);
        modal.find('.modal-body #editAddress').val(address);
        modal.find('.modal-body #editEmail').val(email);
        modal.find('.modal-body #editPhone').val(phone1);
        modal.find('.modal-body #editPhone2').val(phone2);
        modal.find('.modal-body #contact_id').val(contact_id);

    });

    $('#contactShow').on('show.bs.modal', function (event) {
        let button = $(event.relatedTarget);
        let name = button.data('contactnameshow');
        let modal = $(this);
        modal.find('.modal-body #shownamehere').val(name);
    });

    $('#contactDelete').on('show.bs.modal', function (event) {
        let button = $(event.relatedTarget);
        let contact_id = button.data('thiscontactid');
        let modal = $(this);
        modal.find('.modal-body #contact_id').val(contact_id);
    });





</script>

</body>
</html>
